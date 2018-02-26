
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