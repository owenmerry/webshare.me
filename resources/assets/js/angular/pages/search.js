
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




