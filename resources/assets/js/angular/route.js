// JavaScript Document

// JavaScript Document


    // configure our routes

    app.config(function($routeProvider) {
        $routeProvider

            // route for the home page
            .when('/', {
                templateUrl : 'browse',
                controller  : 'browseController'
            })
            .when('/browse', {
                templateUrl : 'browse',
                controller  : 'browseController'
            })
            .when('/search', {
                templateUrl : 'search',
                controller  : 'searchController'
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
    