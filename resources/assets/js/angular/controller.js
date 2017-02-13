// JavaScript Document

var app = angular.module('mySite', ['ngRoute','angularMoment','ngAnimate']);



//controllers

app.controller('appController', function($scope, $http) {
  
    //variables
    $scope.popupmenu = false; 
    $scope.pageactive = "addlink"; 
    $scope.searching = false;
    $scope.loginshow=false;
    $scope.loginstep='email';
    
    
    //startup
    $http.get("/api/link/all").then(function (response) {
            $scope.alllinks = response.data;
            $scope.loading = false;
    });
    
    $http.get("/api/collection/all").then(function (response) {
            $scope.allcollections = response.data;
            $scope.loading = false;
    });
    
    
    
    //menu functions
    $scope.menuClick = function(){
        $scope.popupmenu = true; 
    }
    
    $scope.menubuttonClick = function(varpage){
        $scope.popupmenu = false; 
        $scope.pageactive = varpage;
    }
    
    $scope.menulinkaddClick = function(){
        $scope.popupmenu = false; 
        $scope.pageactive = "addlink";
    }
    
    //links page functions
    $scope.openlink = function(linkid,linkurl){
        var myWindow = window.open(linkurl);
        
        $http.get("/api/link/visit/"+ linkid).then(function (response) {
            $http.get("/api/link/all").then(function (response) {
            $scope.alllinks = response.data;
            });
        });
    };
    $scope.addlink = function(){
        
        $scope.loading = true;
        
        $http.post("/api/link/add",{website:$scope.website}).then(function (response) {
            $scope.link = response.data;
            $scope.website="";
            $scope.preview = "";
            $scope.previewlink = true;
            $scope.loading = false;
        });  
        
    };
    
    //search functions
    $scope.searchlinks = function(){
        if(!$scope.search==""){
            $scope.searching=true;
        $http.post("/api/link/search",{search:$scope.search}).then(function (response) {
            $scope.searchlink = response.data;
            $scope.loading = false;
        });
        }else{
            $scope.searching=false;   
        };
    };
    
    
    //login functions
    $scope.loginbtnClick = function(){
        $scope.loginstep='email';
        $scope.loginshow=true;
    }
    $scope.loginbtnCloseClick = function(){
        $scope.loginstep='email';
        $scope.loginshow=false;
    }
    $scope.loginEmailClick = function(){
        $scope.loginstep='password';
    }
    $scope.loginPasswordClick = function(){
        $scope.loading = true;
        $scope.loginstatus = ""; 
        
        $http.post("/api/user/login",{email:$scope.email,password:$scope.password,csrf:$scope.csrf}).then(function (response) {
            $scope.userlogin = response.data;
            if($scope.userlogin=="ok"){
                $scope.email="";
                $scope.password = "";    
                $scope.loggedin = true;
                $scope.loginmode= "";
                $scope.loginstatus = "";
                $scope.loginshow=false;
            }else{
                $scope.loginstatus = "No user found"; 
            }
            $scope.loading = false;
        });    
    };
    
});







//filters

app.filter('strLimit', ['$filter', function($filter) {
   return function(input, limit) {
      if (! input) return;
      if (input.length <= limit) {
          return input;
      }

      return $filter('limitTo')(input, limit) + '...';
   };
}]);
