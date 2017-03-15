@extends('layouts.main-template')



@section('content')

    
<!-- App - start -->
<div class="app_all" ng-controller="appController">
    
  
    <div class="logo_all">
    <div class="logo"><img src="/images/app/webshare-logo.svg" /></div>
    </div>
    
   
   
    
    
   
    
     <div class="menu_all">
         <ul class="nav nav-pills">
             <li><a href="#home">Home</a></li>
             <li><a href="#link/all">Link</a></li>
             <li><a href="#collection/all">Collections</a></li>
             <li><a href="#search">Search</a></li>
             <li><a class="background" ng-show="!loggedin" ng-click="loginbtnClick()">Login</a></li>
             <li><a class="background" ng-show="loggedin" ng-click="loginbtnClick()">Owen Merry</a></li>
             <li><a class="background" href="#search">Sign Up</a></li>
         </ul>
         
         

         
    </div>  
    
    
    
    <div class="login_all" ng-show="loginshow==true">
        
        <div class="close" ng-click="loginbtnCloseClick()"><img src="/images/icons/close.svg" /></div>
        
        <div class="step" ng-show="loginstep=='email'">
            <div class="center">
            <h2>Enter Your Email</h2>
            <div class="textbox_holder">
                <input type="text" class="form-control textbox email-input" ng-model="email" placeholder="Email" />
            </div>
            <div class="buttons">
                <a class="btn btn-primary" ng-click="loginEmailClick()">Next</a>
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
    

    <div ng-view autoscroll="true"></div>
    
    
    
    
   
    
    </div>    
<!-- App - end -->         



@stop
