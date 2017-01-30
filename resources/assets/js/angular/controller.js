// JavaScript Document

var app = angular.module('mySite', ['ngRoute','angularMoment']);


app.controller('appController', function($scope, $http) {
  
    //variables
    $scope.popupmenu = false; 
    $scope.pageactive = "addlink"; 
    
    
    //functions
    $scope.menuClick = function(){
        $scope.popupmenu = true; 
    }
    
    $scope.menubuttonClick = function(varpage){
        $scope.popupmenu = false; 
        $scope.pageactive = varpage;
    }
    
    
});



