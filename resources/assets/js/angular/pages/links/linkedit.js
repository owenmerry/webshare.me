
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
        if(file){
            Upload.upload({
                url: '/api/link/upload',
                data: {photo: file, 'linkid': $scope.linkedit.link.id }
            }).then(function (response) {
            });
        }
    };


    $scope.linkEditBtnClick = function(linkid,collectionid){
            $scope.linkeditshow=true;
            $http.get("/api/link/getlink/"+ linkid).then(function (response) {
                console.log(response.data);
                    $scope.linkedit = response.data;
                    $scope.linkedittitle = $scope.linkedit.link.title;
                    $scope.linkeditdescription = $scope.linkedit.link.description;
                    $scope.linkediturl = $scope.linkedit.link.url;
                    $scope.linkeditprivacy = $scope.linkedit.link.privacy.id.toString();
            });
    }
    $scope.linkEditBtnCloseClick = function(){
        $scope.linkeditshow=false;
    }
    $scope.linkEditSaveClick = function(){
        
        $http.post("/api/link/update",{linkid:$scope.linkedit.link.id,title:$scope.linkedittitle,description:$scope.linkeditdescription,url:$scope.linkediturl,privacy:$scope.linkeditprivacy}).then(function (response) {
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



