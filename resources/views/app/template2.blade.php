@extends('layouts.main-template')



@section('content')

    
<!-- App - start -->
<div class="app_all" ng-controller="appController">
    
  
    <div class="logo_all">
        <div class="logo"><a href="#home"><img src="/images/app/webshare-logo.svg" /></a></div>
    </div>
    
    <div class="gradient_all">
    </div>
   
    
    
   
    
     <div class="menu_all">
         <ul class="nav nav-pills desktop">
             <li><a href="#link/all" ng-cloak ng-show="loggedin">My Links</a></li>
             <li><a href="#collection/all" ng-cloak ng-show="loggedin">My Collections</a></li>
             <li><a href="#search" ng-cloak ng-show="loggedin">Search</a></li>
             <li><a class="boxed" ng-show="!loggedin"ng-cloak ng-show="loggedin" ng-click="loginbtnClick()">Login</a></li>
             <li><a class="boxed" ng-cloak ng-show="loggedin" >Owen Merry</a></li>
             <li><a class="boxed" ng-hide="loggedin" ng-click="signupbtnClick()">Sign Up</a></li>
             <li><a class="boxed" ng-hide="!loggedin" ng-click="logoutbtnClick()">Logout</a></li>
        </ul> 
        <ul class="nav nav-pills mobile">
             <li><a class="boxed" ng-cloak ng-click="menuMobileShowClick()">Menu</a></li>
        </ul>  
    </div>  
    
    
    <div class="collectionedit_all" ng-cloak ng-show="collectioneditshow">
        <div class="content">
            <div class="close" ng-click="collectionEditBtnCloseClick()"><img src="/images/icons/close-black.svg" /></div>
            <div class="delete"><a class="btn btn-primary" ng-click="collectionDeleteBtnClick()">Delete</div></a>
        <div class="center">
            <h2>Edit Details</h2>
            <div class="textbox_holder">
                <div><label>Title</label></div>
                <input type="text" class="form-control textbox" ng-model="collectioneditname" placeholder="Title" />
            </div>
            <div class="buttons">
                <a class="btn btn-primary" ng-click="collectionEditSaveClick()">Save Details</a>
            </div>
            </div>
        </div>
    </div>



    <div class="linkedit_all" ng-cloak ng-show="linkeditshow" ngf-drop="" ng-model="files" 
    ngf-drag-over-class="dragover" ngf-multiple="true" ngf-allow-dir="true"
    accept="image/*,application/pdf" 
    ngf-pattern="image/*,application/pdf">
        <div class="content">
            <div class="drop"></div>
            <div class="close" ng-click="linkEditBtnCloseClick()"><img src="/images/icons/close-black.svg" /></div>
            <div class="delete">
                <a ng-show="linkEditCollection" class="btn btn-primary" ng-click="linkCollectionDeleteBtnClick()">Remove</a>
                <a class="btn btn-primary" ng-click="linkDeleteBtnClick()">Delete</a>
            </div>
        <div class="center">
            <h2>Edit Details</h2>
            <div class="textbox_holder">
                <div><label>Title</label></div>
                <input type="text" class="form-control textbox" ng-model="linkedittitle" placeholder="Title" />
            </div>
            <div class="textbox_holder">
                <div><label>Description</label></div>
                <textarea class="form-control textarea" ng-model="linkeditdescription" placeholder="Description of the link"></textarea>
            </div>
            <div class="textbox_holder">
                <div><label>Link</label></div>
                <textarea class="form-control textarea" ng-model="linkediturl" placeholder="Paste Link Here"></textarea>
            </div>
            
            <div class="buttons">
                <a class="btn btn-primary" ng-click="linkEditSaveClick()">Save Details</a>
            </div>
            </div>

            

        </div>
    </div>
    
    
    <div class="login_all" ng-cloak ng-show="loginshow">
        
        <div class="close" ng-click="loginbtnCloseClick()"><img src="/images/icons/close.svg" /></div>
        
        <div class="step" ng-show="loginstep=='email'">
            <div class="center">
            <h2>Enter Your Email</h2>
            <div class="textbox_holder">
                <input id="loginall-email" type="text" class="form-control textbox email-input" ng-model="email" placeholder="Email" ng-enter="loginEmailClick()" />
            </div>
            <div class="buttons">
                <a class="btn" ng-click="loginEmailClick()">Next</a>
            </div>
            </div>
        </div>
        
        <div class="step"  ng-show="loginstep=='password'">
            <div class="center">
            <h2>Enter Your Password</h2>
                <div class="info"><p class="bg-danger">@{{loginstatus}}</p></div>
            <div class="textbox_holder">
                <input id="loginall-pass" type="password" class="form-control textbox" ng-model="password" placeholder="Password" ng-enter="loginPasswordClick()" />
                <input type="hidden" ng-model="csrf" ng-init="csrf='{{ csrf_token() }}'" class="form-control" >
            </div>
            <div class="buttons">
                <a class="btn" ng-click="loginPasswordClick()">Login</a>
                <a class="btn" ng-click="loginBackClick()">Back</a>
            </div>
            </div>
        </div>
        
    </div>
    
    
    
    <div class="signup_all" ng-cloak ng-show="signupshow">
        
        <div class="close" ng-click="signupbtnCloseClick()"><img src="/images/icons/close.svg" /></div>
        
        <div class="step" ng-show="signupstep=='create'">
            <div class="center">
            <h2>Full Name</h2>
            <div class="textbox_holder">
                <input type="text" class="form-control textbox email-input" ng-model="name_signup" placeholder="Full Name" />
            </div>
            <h2>Enter Your Email</h2>
            <div class="textbox_holder">
                <input type="text" class="form-control textbox email-input" ng-model="email_signup" placeholder="Email" />
            </div>
            <h2>Enter Your Password</h2>
            <div class="textbox_holder">
                <input type="password" class="form-control textbox email-input" ng-model="password_signup" placeholder="Password" />
            </div>    
            <div class="buttons">
                <a class="btn btn-primary" ng-click="signupCreateClick()">Create Account</a>
            </div>
            <input type="hidden" ng-model="csrf_signup" ng-init="csrf='{{ csrf_token() }}'" class="form-control" >
            </div>
        </div>
        
    </div>
    
    
    <div class="menumobile_all" ng-cloak ng-show="menumobile">
        <div class="close" ng-click="menuMobileHideClick()"><img src="/images/icons/close.svg" /></div>
        <div class="content">
        <div class="center">
            <ul class="nav">
             <li><a href="#link/all" ng-cloak ng-show="loggedin" ng-click="menuMobileHideClick()">My Links</a></li>
             <li><a href="#collection/all" ng-cloak ng-show="loggedin" ng-click="menuMobileHideClick()">My Collections</a></li>
             <li><a href="#search" ng-cloak ng-show="loggedin" ng-click="menuMobileHideClick()">Search</a></li>
             <li><a class="boxed" ng-show="!loggedin"ng-cloak ng-show="loggedin" ng-click="loginbtnClick();menuMobileHideClick()">Login</a></li>
             <li><a class="boxed" ng-cloak ng-show="loggedin" ng-click="menuMobileHideClick()">Owen Merry</a></li>
             <li><a class="boxed" ng-hide="loggedin" ng-click="signupbtnClick();menuMobileHideClick()">Sign Up</a></li>
             <li><a class="boxed" ng-hide="!loggedin" ng-click="logoutbtnClick();menuMobileHideClick()">Logout</a></li>
        </ul>
        </div>
        </div>
    </div>
    
    
    
    
  <!-- Pages - start -->      
    

    <div ng-view class="page_all" autoscroll="true"></div>
    
    
    
    
   
    
    </div>    
<!-- App - end -->         



@stop
