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
            .when('/search', {
                templateUrl : 'search',
                controller  : 'searchController'
            })
            .when('/link/all', {
                templateUrl : 'link/all',
                controller  : 'linkallController'
            })
            .when('/collection/all', {
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
            .when('/user/:ID', {
                templateUrl : 'user',
                controller  : 'userController'
            })
        
        
        
                
        
        
    });
    