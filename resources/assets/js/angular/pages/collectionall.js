
// Collection All page
app.controller('collectionallController', function($scope, $http, $interval, $routeParams, Upload) {
    
    //variables
    $scope.collectionid = $routeParams.ID;
    $scope.collectionmode="collection";
    $scope.createshow=false;
    $scope.collectionname="";
   // $scope.loading=true;
    
    //get data
    $http.get("/api/collection/user/"+ $scope.collectionid ).then(function (response) {
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
            
            $scope.refresh();
            
        });
        
    };

    //refresh data
    $scope.refresh = function(){
        $http.get("/api/collection/user/"+ $scope.collectionid).then(function (response) {
            $scope.allcollections = response.data;
            $scope.loading = false;
        });
    }

    //upload
    $scope.uploadcollection = function(file,collectionid){
        Upload.upload({
            url: '/api/collection/upload',
            data: {photo: file, 'collectionid': collectionid }
        }).then(function (response) {
            $scope.refresh();
        });   
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
