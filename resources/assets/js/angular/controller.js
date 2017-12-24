// JavaScript Document

var app = angular.module('mySite', ['ngRoute','angularMoment','ngAnimate']);



//controllers

app.controller('appController', function($scope, $http, $location) {
  
    //variables
    $scope.popupmenu = false; 
    $scope.pageactive = "addlink"; 
    $scope.searching = false;
    $scope.loginshow=false;
    $scope.loginstep='email';
    $scope.signupshow=false;
    $scope.signupstep='create';
    $scope.addlinkcollection=false;
    
    
    //startup
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
    }
    $scope.loginbtnCloseClick = function(){
        setTimeout(function(){ $scope.loginstep='password'; }, 1000); 
        $scope.loginshow=false;
    }
    $scope.loginEmailClick = function(){
        $scope.loginstep='password';
        setTimeout(function(){ document.getElementById('loginall-pass').focus(); }, 300);
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
                $location.path('link/all');
            }else{
                $scope.loginstatus = "No user found"; 
            }
            $scope.loading = false;
        });    
    };
    

    //logout button
    $scope.logoutbtnClick = function(){
       $http.get("/api/user/logout").then(function (response) {
             $scope.loggedin = response.data.loggedin;
             $location.path('home');
        });
        
    }



    
    //signup functions
    $scope.signupbtnClick = function(){
            $scope.signupstep='create';
            $scope.signupshow=true;
    }
    $scope.signupbtnCloseClick = function(){
        $scope.signupstep='create';
        $scope.signupshow=false;
    }
    $scope.signupCreateClick = function(){
        $scope.loading = true;
        
        $http.post("/api/user/signup",{name:$scope.name_signup,email:$scope.email_signup,password:$scope.password_signup,csrf:$scope.csrf_signup}).then(function (response) {
            $scope.usersignup = response.data;
            if($scope.usersignup=="ok"){
                $scope.name_signup="";
                $scope.email_signup="";
                $scope.password_signup = "";    
                $scope.loggedin = true;   
                $location.path('link/all');
            }else{
                $scope.loginstatus = "cant create account"; 
            }
            $scope.loading = false;
        });    
    };    
    
    
    
    
    //link edit functions
    $scope.linkEditBtnClick = function(linkid){
            $scope.linkeditshow=true;
            $http.get("/api/link/getlink/"+ linkid).then(function (response) {
                console.log(response.data);
                    $scope.linkedit = response.data;
                    $scope.linkedittitle = $scope.linkedit.link.title;
                    $scope.linkeditdescription = $scope.linkedit.link.description;
                    $scope.linkediturl = $scope.linkedit.link.url;
            });
    }
    $scope.linkEditBtnCloseClick = function(){
        $scope.linkeditshow=false;
    }
    $scope.linkEditSaveClick = function(){
        
        $http.post("/api/link/update",{linkid:$scope.linkedit.link.id,title:$scope.linkedittitle,description:$scope.linkeditdescription,url:$scope.linkediturl}).then(function (response) {
            $scope.linkeditupdate = response.data;
            $scope.linkeditshow=false;
        });    
    };    
    




});   









//-------------------- PAGES --------------------------------








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
    };
    $scope.addlinkcollectionshow = function(){
        $scope.addlinkcollection=true;
    };
    $scope.addlinkcollectionhide = function(){ 
        $scope.addlinkcollection=false;
    };   
    
    
    
});




// add link
app.controller('addlinkController', function($scope, $http) {

    //variables    
    $scope.addlinkcollection=false;
    
    //get data
    $http.get("/api/collection/all").then(function (response) {
        $scope.allcollections = response.data;
        $scope.loading = false;
    }); 

    //functions
 $scope.addlink = function(){
        
        //$scope.loading = true;
        
        $http.post("/api/link/addmany",{website:$scope.website,collection_id:$scope.collectionid}).then(function (response) {
            $scope.link = response.data;
            $scope.website="";
            $scope.preview = "";
            $scope.previewlink = true; 
            $scope.loading = false;
        });  
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
    
    //variables
    //$scope.loading = true;
    
    //onload
    setTimeout(function(){ document.getElementById('linkall_create').focus(); }, 300);
    
    //get data
    $http.get("/api/link/mylinks").then(function (response) {
            $scope.alllinks = response.data;
            $scope.loading = false;
    });
    
    //functions
     $scope.addlink = function(){
        
        $scope.loading = true;
        
        $http.post("/api/link/addmany",{website:$scope.website,collection_id:$scope.collectionid}).then(function (response) {
            $scope.link = response.data;
            $scope.website="";
            $http.get("/api/link/mylinks").then(function (response) {
                $scope.alllinks = response.data;
                $scope.loading = false;
            });
        });
        
    };
    
    
    
});

// Collection All page
app.controller('collectionallController', function($scope, $http) {
    
    //variables
    $scope.collectionmode="collection";
    $scope.createshow=false;
    $scope.collectionname="";
   // $scope.loading=true;
    
    //get data
    $http.get("/api/collection/mycollections").then(function (response) {
            $scope.allcollections = response.data;
            $scope.loading = false;
    });
    
    //functions
    $scope.toggleCreate = function(varmode){
        if(varmode=="show"){
            $scope.createshow=true;
            setTimeout(function(){ document.getElementById('collectionall_create').focus(); }, 300);               
                           };
        if(varmode=="hide"){$scope.createshow=false;};
    };
     $scope.addcollection = function(){
        
      //  $scope.loading = true;
        
        $http.post("/api/collection/add",{name:$scope.collectionname}).then(function (response) {
            $scope.collection = response.data;
            $scope.loading = false;
            $scope.collectionname="";
            
            $http.get("/api/collection/mycollections").then(function (response) {
            $scope.allcollections = response.data;
            $scope.loading = false;
            });
            
        });
        
    };
    
    
});


// Collection Single page
app.controller('collectionsingleController', function($scope, $http, $routeParams) {
    
    //variables
    $collectionid = $routeParams.ID;
    $scope.myid = $routeParams.ID; 
    //$scope.loading=true;
    
    //onload
    setTimeout(function(){ document.getElementById('collectionsingleall_create').focus(); }, 300);
    
    //get data
    $http.get("/api/link/collection/"+ $collectionid ).then(function (response) {
            $scope.allcollectionlinks = response.data;
            $scope.loading = false;
            
    });
    
    //functions
     $scope.addlink = function(){
        
       // $scope.loading = true;
        
        $http.post("/api/link/addmany",{website:$scope.website,collection_id:$collectionid}).then(function (response) {
            $scope.link = response.data;
            $scope.website="";
            $scope.preview = "";
            $scope.previewlink = true; 
            $scope.loading = false;
            $http.get("/api/link/collection/"+ $collectionid ).then(function (response) {
                $scope.allcollectionlinks = response.data;
            $scope.loading = false;
            
        });
            
            
        });  
    };
    $scope.addlinkcollectionshow = function(){
        $scope.addlinkcollection=true;
    };
    $scope.addlinkcollectionhide = function(){ 
        $scope.addlinkcollection=false;
    };
    
    
    
});



// search page
app.controller('searchController', function($scope, $http) {
    
    //varibles
    //$scope.loading = false;
    
    //run on open
    setTimeout(function(){ document.getElementById('searchall-search').focus(); }, 300);
    
    //functions
    $scope.searchlinks = function(){
            if(!$scope.search==""){
                $scope.searching=true;
               // $scope.loading = true;
            $http.post("/api/link/search",{search:$scope.search}).then(function (response) {
                $scope.searchlink = response.data;
                $scope.loading = false;
            });
            }else{
                $scope.searching=false;
                $scope.loading = false;
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




//directives

app.directive('ngEnter', function () {
    return function (scope, element, attrs) {
        element.bind("keydown keypress", function (event) {
            if (event.which === 13) {
                scope.$apply(function () {
                    scope.$eval(attrs.ngEnter);
                });
                event.preventDefault();
            }
        });
    };
});
