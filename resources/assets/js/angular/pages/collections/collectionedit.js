
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
    console.log('run edit save..');
    $http.post("/api/collection/update",{collectionid:$scope.collectionedit.collection.id,name:$scope.collectioneditname}).then(function (response) {
        $scope.collectioneditupdate = response.data;
        $scope.collectioneditshow=false;

        //refresh data
        $rootScope.$broadcast('pageRefresh'); 

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
