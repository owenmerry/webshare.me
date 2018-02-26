
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

