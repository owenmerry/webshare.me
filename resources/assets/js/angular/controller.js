// JavaScript Document

var app = angular.module('mySite', ['ngRoute','angularMoment','ngAnimate','ngFileUpload','angular-files-drop']);



//controllers

app.controller('appController', function($scope, Upload, $http, $location, $rootScope, $interval) {
  
    //variables
    $scope.popupmenu = false; 
    $scope.pageactive = "addlink"; 
    $scope.searching = false;
    $scope.loginshow=false;
    $scope.loginstep='email';
    $scope.signupshow=false;
    $scope.signupstep='create';
    $scope.addlinkcollection=false;
    $scope.menumobile=false;
    $scope.linkEditCollection='';
    
    //page Global values
    //collection Global
    $scope.$on("collectionsingleEnter", function (event, args) {
        $scope.linkEditCollection = args.collectionid;
     }); 
     $scope.$on("collectionsingleLeave", function (event, args) {
        $scope.linkEditCollection = '';
     }); 
    
    //startup
    $http.get("/api/user/loggedin").then(function (response) {
            $scope.loggedin = response.data.loggedin;
            $scope.loading = false;
            $scope.start = true;
    });
    
    //page refresh
    var pageRefresh = $interval(function(){
        $rootScope.$broadcast('pageRefresh');
    },60000);
    
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
    
    $scope.menuMobileShowClick = function(){
        $scope.menumobile = true;
    }
    $scope.menuMobileHideClick = function(){
        $scope.menumobile = false;
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

        //refresh
        $rootScope.$broadcast('pageRefresh');
        
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
    $scope.onFilesDropped = function($files, $event) {
        console.log('$files', $files)
        console.log('$event', $event)
     
        $scope.previews = $files
    }

    $scope.$watch('files', function () {
        $scope.upload($scope.files);
    });

    $scope.upload = function (file) {
        Upload.upload({
            url: 'api/link/upload',
            data: {photo: file, 'username': 'owen'}
        }).then(function (response) {
            //console.log('Success ' + response.config.data.file.name + 'uploaded. Response: ' + response.data);
            //console.log(response.data);
        }, function (resp) {
            //console.log('Error status: ' + resp.status);
        }, function (evt) {
            //var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
            //console.log('progress: ' + progressPercentage + '% ' + evt.config.data.file.name);
        });
    };
    // for multiple files:
   /* $scope.uploadFiles = function (files) {
      if (files && files.length) {
        for (var i = 0; i < files.length; i++) {
          Upload.upload({..., data: {file: files[i]}, ...})...;
        }
        // or send them all together for HTML5 browsers:
        Upload.upload({..., data: {file: files}, ...})...;
      }
    }*/

    $scope.linkEditBtnClick = function(linkid,collectionid){
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

            //refresh data
            $rootScope.$broadcast('pageRefresh');
        });    
    };    
    $scope.linkDeleteBtnClick = function(){
        $http.delete("/api/link/delete/"+ $scope.linkedit.link.id).then(function (response) {
            console.log(response.data);
                $scope.linkdelete = response.data;
                $scope.linkeditshow=false;

                //refresh data
                $rootScope.$broadcast('pageRefresh');
        });
    }
    $scope.linkCollectionDeleteBtnClick = function(){
        $http.delete("/api/collection/delete/"+ $scope.linkEditCollection +"/"+ $scope.linkedit.link.id).then(function (response) {
            console.log(response.data);
                $scope.linkdelete = response.data;
                $scope.linkeditshow=false;

                //refresh data
                $rootScope.$broadcast('pageRefresh');
        });
    }




    //collection edit functions
    $scope.collectionEditBtnClick = function(collectionid){
            $scope.collectioneditshow=true;
            $http.get("/api/collection/getcollection/"+ collectionid).then(function (response) {
                console.log(response.data);
                    $scope.collectionedit = response.data;
                    $scope.collectioneditname = $scope.collectionedit.collection.name;
            });
    }
    $scope.collectionEditBtnCloseClick = function(){
        $scope.collectioneditshow=false;
    }
    $scope.collectionEditSaveClick = function(){
        
        $http.post("/api/collection/update",{collectionid:$scope.collectionedit.collection.id,name:$scope.collectionedittitle}).then(function (response) {
            $scope.collectioneditupdate = response.data;
            $scope.collectioneditshow=false;

            //refresh data
            $scope.$emit('collectionAllRefresh');

        });    
    };    
    $scope.collectionDeleteBtnClick = function(){
        $http.delete("/api/collection/delete/"+ $scope.collectionedit.collection.id).then(function (response) {
            console.log(response.data);
                $scope.collectiondelete = response.data;
                $scope.collectioneditshow=false;

                //refresh data
                $rootScope.$broadcast('pageRefresh'); 
        });
    }




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
app.controller('linkallController', function($scope, $http, $rootScope, $interval) {
    
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

    //refresh data
    $scope.refresh = function(){
        $http.get("/api/link/mylinks").then(function (response) {
            $scope.alllinks = response.data;
            $scope.loading = false;
        });
        //console.log('Link Refresh')
    }

    //remote refresh
    $scope.$on('linkAllRefresh', function(event) {
        $scope.refresh();
    });

    //auto refresh
    $scope.$on('pageRefresh', function(event) {
        $scope.refresh();
    });
    
});




// Collection All page
app.controller('collectionallController', function($scope, $http, $interval) {
    
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

    //refresh data
    $scope.refresh = function(){
        $http.get("/api/collection/mycollections").then(function (response) {
            $scope.allcollections = response.data;
            $scope.loading = false;
        });
        //console.log('Collection Refresh')
    }

    //remote refresh
    $scope.$on('collectionAllRefresh', function(event) {
        $scope.refresh();
    });
    
    //auto refresh
    $scope.$on('pageRefresh', function(event) {
        $scope.refresh();
    });
    
});




// Collection Single page
app.controller('collectionsingleController', function($scope, $rootScope, $http, $routeParams) {
    
    //variables
    $collectionid = $routeParams.ID;
    $scope.myid = $routeParams.ID; 
    //$scope.loading=true;
    
    //set up global variables
    $rootScope.$broadcast('collectionsingleEnter',{collectionid:$collectionid});
 

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

    $scope.linkSingleEditBtnClick = function(linkid){
        $scope.linkcollectioneditshow=true;
        $http.get("/api/link/getlink/"+ linkid).then(function (response) {
            console.log(response.data);
                $scope.linkedit = response.data;
                $scope.linkedittitle = $scope.linkedit.link.title;
                $scope.linkeditdescription = $scope.linkedit.link.description;
                $scope.linkediturl = $scope.linkedit.link.url;
        });
    }

    //collection leave
    $scope.$on('$locationChangeStart', function( event ) {
       $rootScope.$broadcast('collectionsingleLeave');
    }); 


    //refresh data
    $scope.refresh = function(){
        $http.get("/api/link/collection/"+ $collectionid ).then(function (response) {
            $scope.allcollectionlinks = response.data;
            $scope.loading = false;
        });
        //console.log('Collection Single Refresh')
    }
    
    //remote refresh
    $scope.$on('collectionSingleAllRefresh', function(event) {
        $scope.refresh();
    });
        
    //auto refresh
    $scope.$on('pageRefresh', function(event) {
        $scope.refresh();
    });
    
    
    
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
    
        //refresh data
        $scope.refresh = function(){
            $http.post("/api/link/search",{search:$scope.search}).then(function (response) {
                $scope.searchlink = response.data;
                $scope.loading = false;
            });
            //console.log('Search Refresh')
        }
    
        //remote refresh
        $scope.$on('SearchRefresh', function(event) {
            $scope.refresh();
        });
    
        //auto refresh
        $scope.$on('pageRefresh', function(event) {
            $scope.refresh();
        });
    
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
