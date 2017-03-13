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
    $scope.addlinkcollection=false;
    
    
    //startup
    $http.get("/api/link/all").then(function (response) {
            $scope.alllinks = response.data;
            $scope.loading = false;
    });
    
    $http.get("/api/collection/all").then(function (response) {
            $scope.allcollections = response.data;
            $scope.loading = false;
    });
    $http.get("/api/user/loggedin").then(function (response) {
            $scope.loggedin = response.data.loggedin;
            $scope.loading = false;
            $scope.start = true;
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
    //collection page functions
    //default
    $scope.collectionmode="collection";
    
    $scope.getcollectionlinks = function(varcollectionid){
            $scope.collectionid = varcollectionid;
            
            $scope.collectionmode="link";
        
            $http.get("/api/link/collection/"+ varcollectionid ).then(function (response) {
            $scope.allcollectionlinks = response.data;
            $scope.loading = false;
            
            });
        
    };
    $scope.collectionback = function(){
        
        $scope.collectionmode="collection";
        
        
    };
    
    
    //links page functions
    $scope.openlink = function(linkid,linkurl){
        var myWindow = window.open(linkurl);
        
        $http.get("/api/link/visit/"+ linkid).then(function (response) {
            $http.get("/api/link/all").then(function (response) {
            $scope.alllinks = response.data;
            });
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
            // $scope.email.focus();
            //$('.email-input').focus();
            //alert("focus");
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





// home page
app.controller('homeController', function($scope, $http) {

    //variables    
    $scope.addlinkcollection=false;
    
    //get data
    $http.get("/api/collection/all").then(function (response) {
        $scope.allcollections = response.data;
        $scope.loading = false;
    }); 

    //functions
 $scope.addlink = function(){
        
        $scope.loading = true;
        
        $http.post("/api/link/addmany",{website:$scope.website,collection_id:$scope.collectionid}).then(function (response) {
            $scope.link = response.data;
            $scope.website="";
            $scope.preview = "";
            $scope.previewlink = true; 
            $scope.loading = false;
        });
        
        
       /* $http.post("/api/link/add",{website:$scope.website}).then(function (response) {
            $scope.link = response.data;
            $scope.website="";
            $scope.preview = "";
            $scope.previewlink = true;
            $scope.loading = false;
        }); */ 
        
    };
    $scope.addlinkcollectionshow = function(){
        $scope.addlinkcollection=true;
    };
    $scope.addlinkcollectionhide = function(){ 
        $scope.addlinkcollection=false;
    };   
    
    
    
});




// Link All page
app.controller('linkallController', function($scope, $http) {
    

    $http.get("/api/link/all").then(function (response) {
            $scope.alllinks = response.data;
            $scope.loading = false;
    });    
    
    
    
});

// Collection All page
app.controller('collectionallController', function($scope, $http) {
    
    //variables
    $scope.collectionmode="collection";
    
    //get data
    $http.get("/api/collection/all").then(function (response) {
            $scope.allcollections = response.data;
            $scope.loading = false;
    });
    
    //functions
    $scope.getcollectionlinks = function(varcollectionid){
            $scope.collectionid = varcollectionid;
            
            $scope.collectionmode="link";
        
            $http.get("/api/link/collection/"+ varcollectionid ).then(function (response) {
            $scope.allcollectionlinks = response.data;
            $scope.loading = false;
            
            });
        
    };
    $scope.collectionback = function(){
        
        $scope.collectionmode="collection";
        
        
    };   
    
    
    
});


// Collection Single page
app.controller('collectionsingleController', function($scope, $http, $routeParams) {
    
    //variables
    $collectionid = $routeParams.ID;
    $scope.myid = $routeParams.ID; 
    
    //get data
    $http.get("/api/link/collection/"+ $collectionid ).then(function (response) {
            $scope.allcollectionlinks = response.data;
            $scope.loading = false;
            
    });    
    
    
    
});



// search page
app.controller('searchController', function($scope, $http) {
    

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
