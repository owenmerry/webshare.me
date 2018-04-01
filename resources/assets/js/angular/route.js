// JavaScript Document

// JavaScript Document


    // configure our routes

    app.config(function($routeProvider) {
        $routeProvider

            // route for the home page
            .when('/', {
                templateUrl : 'home',
                controller  : 'homeController'
            })
            .when('/home', {
                templateUrl : 'home',
                controller  : 'homeController'
            })
            .when('/addlink', {
                templateUrl : 'addlink',
                controller  : 'addlinkController'
            })
            .when('/search', {
                templateUrl : 'search',
                controller  : 'searchController'
            })
            .when('/browse/all', {
                templateUrl : 'browse/all',
                controller  : 'browseallController'
            })
            .when('/link/all', {
                templateUrl : 'link/all',
                controller  : 'linkallController'
            })
            .when('/collection/user/:ID', {
                templateUrl : 'collection/all',
                controller  : 'collectionallController'
            })
            .when('/collection/single/:ID', {
                templateUrl : 'collection/single',
                controller  : 'collectionsingleController'
            })
            .when('/library/links', {
                templateUrl : 'library/links',
                controller  : 'mylinksController'
            })
            .when('/library/collections', {
                templateUrl : 'library/collections',
                controller  : 'mycollectionsController'
            })
            .when('/user/list', {
                templateUrl : 'user/list',
                controller  : 'userlistController'
            })
            .when('/user/settings', {
                templateUrl : 'user/settings',
                controller  : 'settingsController'
            })
            .when('/user/:ID/:Type/:TypeID', {
                templateUrl : 'user',
                controller  : 'userController'
            })
            .when('/user/:ID/:Type', {
                templateUrl : 'user',
                controller  : 'userController'
            })
            .when('/user/:ID/', {
                templateUrl : 'user',
                controller  : 'userController'
            })
        
        
        
                
        
        
    });
    