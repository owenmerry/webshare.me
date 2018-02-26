// JavaScript Document

var app = angular.module('mySite', ['ngRoute','angularMoment','ngAnimate','ngFileUpload','angular-files-drop']);




//-------------------- Main Controller --------------------------------

app.controller('appController', function($scope, Upload, $http, $location, $rootScope, $interval) {
  

//start up
require('./main/startup');

//add global controllers
require('./pages/user/login.js');
require('./pages/user/logout.js');
require('./pages/user/signup.js');

//edit
require('./pages/links/linkedit.js');
require('./pages/collections/collectionedit');



//global functions

//user



});   

//-------------------- Page Controllers --------------------------------

//content
//window._ = require('lodash');
require('./pages/home');

//links
require('./pages/linkall');
require('./pages/linkadd');

//collections
require('./pages/collectionall');
require('./pages/collectionsingle');

//search
require('./pages/browse');
require('./pages/search');



//-------------------- Plugins --------------------------------


//filters
require('./main/filters.js');

//directives
require('./main/directives.js');















