// JavaScript Document

var app = angular.module('mySite', ['ngRoute','angularMoment']);


app.controller('mainController', function($scope, $http) {
  
    $scope.status = "updated "; 
    $scope.val = "running"; 
    
});



//##################
//## Views
//##################

 




//##### browse #####

app.controller('browseController', function($scope, $http) {

    //variables
    $scope.loading = true; 
    
    
    //startup    
    $http.get("/api/link/all").then(function (response) {
            $scope.recentlink = response.data;
            $scope.loading = false;
    });
    $http.get("/api/category/all").then(function (response) {
            $scope.categories = response.data;
            $scope.loading = false;
    });
    
    
    
});



//##### search #####

app.controller('searchController', function($scope, $http) {

    //variables
    $scope.loading = true;
    
    
    //startup    
    $http.get("/api/link/all").then(function (response) {
            $scope.searchlink = response.data;
            $scope.loading = false;
    });
    
    //functions
    $scope.searchlinks = function(){
        if(!$scope.search==""){
        $http.post("/api/link/search",{search:$scope.search}).then(function (response) {
            $scope.searchlink = response.data;
            $scope.loading = false;
        });
        }else{
        $http.get("/api/link/all").then(function (response) {
            $scope.searchlink = response.data;
            $scope.loading = false;
        });     
        };
        
    };
    
    
    
});




//##### my collections #####

app.controller('mycollectionsController', function($scope, $http) {
  
    //variables
    $scope.loading = true;
    $scope.collectionid = "";
    
    
    //startup    
    $http.get("/api/collection/all").then(function (response) {
            $scope.mycollections = response.data;
            $scope.loading = false;
    });
    
    
    //functions
    $scope.addcollection = function(){
        
        $scope.loading = true;
        
        $http.post("/api/collection/add",{name:$scope.name}).then(function (response) {
            $scope.collection = response.data;
            $scope.name="";
            $scope.preview = "";
            $scope.previewcollection = true;
            $scope.loading = false;
            
            $http.get("/api/collection/all").then(function (response) {
            $scope.mycollections = response.data;
            $scope.loading = false;
            });
            
        });
        
    };
    
    $scope.getcollectionlinks = function(varcollectionid){
    
            $scope.collectionid = varcollectionid;
    
            $http.get("/api/link/collection/"+ varcollectionid ).then(function (response) {
            $scope.collectionlinks = response.data;
            $scope.loading = false;
            });
        
    };
    
     $scope.addlink = function(){
        
        $scope.loading = true;
        
        $http.post("/api/link/add",{website:$scope.website,collection_id:$scope.collectionid}).then(function (response) {
            $scope.link = response.data;
            $scope.website="";
            $scope.preview = "";
            $scope.previewlink = true;
            $scope.loading = false;
            
            $http.get("/api/link/collection/"+ $scope.collectionid ).then(function (response) {
            $scope.collectionlinks = response.data;
            $scope.loading = false;
            });
            
        });  
        
    };
    
});



//##### my links #####

app.controller('mylinksController', function($scope, $http) {
  
    //variables
    $scope.loading = true;
    $scope.tabactive = "links";
    
    
    //startup    
    $http.get("/api/link/all").then(function (response) {
            $scope.mylinks = response.data;
            $scope.loading = false;
    });
    $http.get("/api/collection/all").then(function (response) {
            $scope.collectionlist = response.data;
            $scope.loading = false;
    });
    
    
    //functions
    $scope.addlink = function(){
        
        $scope.loading = true;
        
        $http.post("/api/link/add",{website:$scope.website,collection_id:$scope.collection}).then(function (response) {
            $scope.link = response.data;
            $scope.website="";
            $scope.preview = "";
            $scope.previewlink = true;
            $scope.loading = false;
            
            $http.get("/api/link/all").then(function (response) {
            $scope.mylinks = response.data;
            $scope.loading = false;
            });
            
        });  
        
    };
    
});

//##### user details #####

app.controller('userController', function($scope, $http, $routeParams) {
  
    //variables
    $scope.loading = true;
    $scope.tabactive = "links";
    $userid = $routeParams.ID;
    
    //startup    
    $http.get("/api/user/show/"+ $userid).then(function (response) {
            $scope.user = response.data;
            $scope.loading = false;
    });
    $http.get("/api/link/user/"+ $userid).then(function (response) {
            $scope.userlinks = response.data;
            $scope.loading = false;
    });
    
    $http.get("/api/user/all").then(function (response) {
            $scope.userfollowing = response.data;
            $scope.loading = false;
    });
    
    $http.get("/api/collection/user/"+$userid).then(function (response) {
            $scope.usercollections = response.data;
            $scope.loading = false;
    });
    
    
    //functions
    $scope.tabclick = function(tabactive){
        $scope.tabactive = tabactive;
    };
    $scope.openlink = function(linkid,linkurl){
        var myWindow = window.open(linkurl);
        
        $http.get("/api/link/visit/"+ linkid).then(function (response) {
            $http.get("/api/link/all").then(function (response) {
            $scope.userlinks = response.data;
            });
        });
    };
    
    
});


//##### settings #####

app.controller('settingsController', function($scope, $http, $routeParams) {
  
    //variables
    
    
    //startup    
    
    
    
    //functions
   
    
    
});


//##### user list #####

app.controller('userlistController', function($scope, $http) {
  
    //variables
    $scope.loading = true;
    
    //startup    
    $http.get("/api/user/all").then(function (response) {
            $scope.userlist = response.data;
            $scope.loading = false;
    });
    
    //functions
    $scope.searchusers = function(){
        if(!$scope.search==""){
        $http.post("/api/user/search",{search:$scope.search}).then(function (response) {
            $scope.userlist = response.data;
            $scope.loading = false;
        });
        }else{
        $http.get("/api/user/all").then(function (response) {
            $scope.userlist = response.data;
            $scope.loading = false;
        });     
        };
        
    };
    
    
});




//##### right panel #####


app.controller('rightpanelController', function($scope, $http) {
  
    //variables
    $scope.loading = true;
    $scope.preview = "this is the preview";
    $scope.previewlink = false;
    $scope.loggedin = false;
    $scope.start = false;
    
    
    //startup
    $http.get("/api/user/loggedin").then(function (response) {
            $scope.loggedin = response.data.loggedin;
            $scope.loading = false;
            $scope.start = true;
    });
    
    //functions
    $scope.login_show = function(){
        $scope.loginmode='login';
    };
    
    $scope.signup_show = function(){
        $scope.loginmode='signup';
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
    
    $scope.addcollection = function(){
        
        $scope.loading = true;
        
        $http.post("/api/collection/add",{name:$scope.name}).then(function (response) {
            $scope.collection = response.data;
            $scope.name="";
            $scope.preview = "";
            $scope.previewcollection = true;
            $scope.loading = false;
        });  
        
    };
    
    $scope.login = function(){
        
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
            }else{
                $scope.loginstatus = "No user found"; 
            }
            $scope.loading = false;
        });    
    };
    
    
    $scope.signup = function(){
        
         $scope.loading = true;
        $scope.loginstatus = ""; 
           
        
        $http.post("/api/user/signup",{name:$scope.name_signup,email:$scope.email_signup,password:$scope.password_signup,csrf:$scope.csrf_signup}).then(function (response) {
            $scope.usersignup = response.data;
            if($scope.usersignup=="ok"){
                $scope.name_signup="";
                $scope.email_signup="";
                $scope.password_signup = "";    
                $scope.loggedin = true;
                $scope.loginmode= "";
                $scope.loginstatus = "";   
            }else{
                $scope.loginstatus = "No user found"; 
            }
            $scope.loading = false;
        });
    };
    
    
    $scope.logout = function(){
        
        $scope.loginstatus = "loading...";
        
        $http.get("/api/user/logout").then(function (response) {
             $scope.loggedin = response.data.loggedin;
        });    
    };
    
    
    
});


//##################
//## Links
//##################




//##################
//## Collection
//##################






//##################
//## Users
//##################






//##################
//## Filters
//##################




app.filter('strLimit', ['$filter', function($filter) {
   return function(input, limit) {
      if (! input) return;
      if (input.length <= limit) {
          return input;
      }

      return $filter('limitTo')(input, limit) + '...';
   };
}]);


