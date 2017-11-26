@extends('layouts.main-template')



@section('content')

    
<!-- App - start -->
<div class="app_all" ng-controller="appController">
    
  
    <div class="logo_all">
        <div class="logo"><a href="#home"><img src="/images/app/webshare-logo.svg" /></a></div>
    </div>
    
   
   
    
    
   
    
     <div class="menu_all">
         <ul class="nav nav-pills">
             <li><a href="#addlink" ng-cloak ng-show="loggedin">Create Link</a></li>
             <li><a href="#link/all" ng-cloak ng-show="loggedin">My Links</a></li>
             <li><a href="#collection/all" ng-cloak ng-show="loggedin">My Collections</a></li>
             <li><a href="#search" ng-cloak ng-show="loggedin">Search</a></li>
             <li><a class="background" ng-show="!loggedin"ng-cloak ng-show="loggedin" ng-click="loginbtnClick()">Login</a></li>
             <li><a class="background" ng-cloak ng-show="loggedin" >Owen Merry</a></li>
             <li><a class="background" ng-hide="loggedin" ng-click="signupbtnClick()">Sign Up</a></li>
             <li><a class="background" ng-hide="!loggedin" ng-click="logoutbtnClick()">Logout</a></li>
        </ul>
         
         

         
    </div>  
    
    
    
    <div class="login_all" ng-cloak ng-show="loginshow==true">
        
        <div class="close" ng-click="loginbtnCloseClick()"><img src="/images/icons/close.svg" /></div>
        
        <div class="step" ng-show="loginstep=='email'">
            <div class="center">
            <h2>Enter Your Email</h2>
            <div class="textbox_holder">
                <input id="loginall-email" type="text" class="form-control textbox email-input" ng-model="email" placeholder="Email" ng-enter="loginEmailClick()" />
            </div>
            <div class="buttons">
                <a class="btn btn-primary" ng-click="loginEmailClick()">Next</a>
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
                <a class="btn btn-primary" ng-click="loginPasswordClick()">Login</a>
                <a class="btn btn-primary">Back</a>
            </div>
            </div>
        </div>
        
    </div>
    
    
    
    <div class="signup_all" ng-cloak ng-show="signupshow==true">
        
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
    
    
    
    
  <!-- Pages - start -->      
    

    <div ng-view class="page_all" autoscroll="true"></div>
    
    
    
    
   
    
    </div>    
<!-- App - end -->         



@stop
