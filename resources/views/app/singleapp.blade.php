@extends('layouts.main-template')



@section('content')

    
<!-- App - start -->
<div class="app_all" ng-controller="appController">
    
  
    <div class="logo_all">
    <div class="logo"><img src="/images/app/webshare-logo.svg" /></div>
    </div>
    
   
   
    
    
     <div class="menu_all" ng-click="menuClick()">
        <div class="button">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
    </div>
    
    <div class="loginbtn_all" ng-show="!loggedin" ng-click="loginbtnClick()">
        <div class="button">
            <i class="fa fa-user" aria-hidden="true"></i>
        </div>
    </div>
    
    <div class="loginbtn_all" ng-show="loggedin" ng-click="loginbtnClick()">
        <div class="button">
           O
        </div>
    </div>
    
    
    
    <div class="popupmenu_all" ng-show="popupmenu">
        <div class="container-fluid">
            <div class="row row-no-gutter">
                <div class="col-md-3">
                    <div class="button" ng-click="menubuttonClick('addlink')">Home</div>
                </div>
                <div class="col-md-3">
                    <div class="button" ng-click="menubuttonClick('links')">Links</div>
                </div>
                <div class="col-md-3">
                    <div class="button" ng-click="menubuttonClick('collections')">Collections</div>
                </div>
                <div class="col-md-3">
                    <div class="button" ng-click="menubuttonClick('search')">Search</div>
                </div>
            </div>
        </div>
    </div>  
    
    
    
    <div class="login_all" ng-show="loginshow==true">
        
        <div class="close" ng-click="loginbtnCloseClick()"><img src="/images/icons/close.svg" /></div>
        
        <div class="step" ng-show="loginstep=='email'">
            <div class="center">
            <h2>Enter Your Email / Username</h2>
            <div class="textbox_holder">
                <input id="loginall-email" type="text" class="form-control textbox email-input" ng-model="email" placeholder="Email" />
            </div>
            <div class="buttons">
                <a class="btn btn-primary" ng-click="loginEmailClick()">Next</a>
                <a class="btn btn-primary" ng-click="loginFocusClick()">Focus</a>
            </div>
            </div>
        </div>
        
        <div class="step"  ng-show="loginstep=='password'">
            <div class="center">
            <h2>Enter Your Password</h2>
            <div class="textbox_holder">
                <input type="password" class="form-control textbox" ng-model="password" placeholder="Password" />
                <input type="hidden" ng-model="csrf" ng-init="csrf='{{ csrf_token() }}'" class="form-control" >
            </div>
            <div class="buttons">
                <a class="btn btn-primary" ng-click="loginPasswordClick()">Login</a>
                <a class="btn btn-primary">Back</a>
            </div>
            </div>
        </div>
        
    </div>
    
    
    
    
  <!-- Pages - start -->      
    
    <div class="add_page">
    
    <div class="addlink_all" ng-show="pageactive=='addlink'">
        <h2>Add Website</h2>
    
        <div class="textbox_holder">
            <input type="text" class="form-control textbox" ng-model="website" placeholder="Paste website link here" />
        </div>
        <div class="collections" ng-show="addlinkcollection">
            <select class="form-control">
                <option value="">Select Collection</option>
                <option  ng-repeat="collection in allcollections.collections" value="@{{collection.id}}">@{{collection.name | strLimit: 37}}</option>
            </select>
        </div> 
        <div class="buttons">
            <a class="btn btn-primary" ng-click="addlink()">Add Link</a>
            <a class="btn btn-primary" ng-show="!addlinkcollection" ng-click="addlinkcollectionshow()">Add to Collection</a>
            <a class="btn btn-primary" ng-show="addlinkcollection" ng-click="addlinkcollectionhide()">Hide Collections</a>
        </div>
        
    </div>
        
    </div>
    
    
    
    
    <div class="addone_page">
    
    <div class="addlink_all" ng-show="pageactive=='addlinkone'">
        <h2>Add Website</h2>
    
        <div class="textbox_holder">
            <input type="text" class="form-control textbox" ng-model="website" placeholder="Paste website link here" />
        </div>
        <div class="collections" ng-show="addlinkcollection">
            <select class="form-control">
                <option value="">Select Collection</option>
                <option  ng-repeat="collection in allcollections.collections" value="@{{collection.id}}">@{{collection.name | strLimit: 37}}</option>
            </select>
        </div> 
        <div class="buttons">
            <a class="btn btn-primary" ng-click="addlink()">Add Link</a>
            <a class="btn btn-primary" ng-show="!addlinkcollection" ng-click="addlinkcollectionshow()">Add to Collection</a>
            <a class="btn btn-primary" ng-show="addlinkcollection" ng-click="addlinkcollectionhide()">Hide Collections</a>
        </div>
        
    </div>
        
    </div>
    
    
    
    
    
    
    <div class="link_page"  ng-show="pageactive=='links'">
    
        
        <div class="container">
            <div class="row">
                
                <div class="title"><h2>Owen Merry Recent Links</h2></div>
                
                

                <div class="col-md-4" ng-repeat="link in alllinks.links">
            <div class="link_all">
                <div class="image" ng-click="openlink(link.id,link.url)" style="background-image:url(@{{link.image}});"></div>
                <div class="text">
                <h2 ng-click="openlink(link.id,link.url)" >@{{link.title | strLimit: 37}}</h2>
                <h3>@{{link.site.name | strLimit: 20}}</h3>
                <h3 class="views">@{{link.visits}} views</h3>
                    <div class="clearfix"></div>
                </div>
            </div>
                </div>



            </div>
        </div>
   
        
    </div>
    
    
        
    
    <div class="collection_page"  ng-show="pageactive=='collections'">
    
        
        <div class="container">
            <div class="row">
                
                <div class="title"><h2>Collections</h2></div>
                
                
                
            <div class="col-md-4" ng-show="collectionmode=='collection'" ng-repeat="collection in allcollections.collections">
            <div class="collection_all" ng-click="getcollectionlinks(collection.id)">
                <div class="image" ></div>
                <div class="text">
                <h2 >@{{collection.name | strLimit: 37}}</h2>
                    <div class="clearfix"></div>
                </div>
            </div>
                </div>
               
             <div ng-show="collectionmode=='link'"> 
                 <div class="back" ng-click="collectionback()"><i class="fa fa-arrow-left" aria-hidden="true"></i></a></div>
                <div class="col-md-4"  ng-repeat="link in allcollectionlinks.links">
            <div class="link_all">
               <div class="image" ng-click="openlink(link.id,link.url)" style="background-image:url(@{{link.image}});"></div>
                <div class="text">
                <h2 ng-click="openlink(link.id,link.url)" >@{{link.title | strLimit: 37}}</h2>
                <h3>@{{link.site.name | strLimit: 20}}</h3>
                <h3 class="views">@{{link.visits}} views</h3>
                    <div class="clearfix"></div>
                </div>
            </div>        
                </div>
                </div>



            </div>
        </div>
   
        
    </div>
    
    
    
    

    
    
    
    
    
   
    
    </div>    
<!-- App - end -->         



@stop
