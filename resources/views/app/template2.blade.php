@extends('layouts.main-template')



@section('content')

    
<!-- App - start -->
<div class="app_all" ng-controller="appController">
    
  
    <div class="logo_all">
    <div class="logo"><img src="/images/app/webshare-logo.svg" /></div>
    </div>
    
   
   
    
    
    <div class="loginbtn_all" ng-show="!loggedin" ng-click="loginbtnClick()">
        <div class="button">
            <i class="fa fa-user" aria-hidden="true"></i>
        </div>
    </div>
    
    <div class="loginbtn_all" ng-show="loggedin">
        <div class="button">
           O
        </div>
    </div>    
    
     <div class="menu_all">
        <div class="button">
            <a href="#home">Home</a>
        </div>
         <div class="button">
             <a href="#link/all">Link</a>
        </div>
        <div class="button">
            <a href="#collection/all">Collections</a>
        </div>
        <div class="button">
            <a href="#search">Search</a>
        </div> 
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
