

// Link All page
app.controller('linkallController', function($scope, $http, $rootScope, $interval,Upload) {
    
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

    //upload
    $scope.uploadlink = function(file,linkid){
        Upload.upload({
            url: '/api/link/upload',
            data: {photo: file, 'linkid': linkid }
        }).then(function (response) {
            $scope.refresh();
        });   
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

