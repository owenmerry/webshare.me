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
    
    
    
    
    
    
    
    <div class="add_page">
    
    <div class="addlink_all" ng-show="pageactive=='addlink'">
        <h2>Add Website</h2>
    
        <div class="textbox_holder">
            <input type="text" class="form-control textbox" placeholder="Paste website link here" />
        </div>
        <div class="buttons">
            <a class="btn btn-primary">Add Link</a>
            <a class="btn btn-primary">Add to Collection</a>
        </div>
        
    </div>
        
    </div>
    
    
    
    
    
    
    <div class="link_page"  ng-show="pageactive=='links'">
    
        
        <div class="container">
            <div class="row">
                
                <div class="title"><h2>Owen Merry Recent Links</h2></div>
                
                
                <?php for ($x = 0; $x <= 10; $x++) { ?>
                <div class="col-md-4">
            <div class="link_all">
                <div class="image"></div>
                <div class="text">
                <h2>Link Title</h2>
                <h3>Link details</h3>
                </div>
            </div>
                </div>
                <?php }; ?>


            </div>
        </div>
   
        
    </div>
    
    
    
    
    
   
    
    </div>    
<!-- App - end -->         



@stop
