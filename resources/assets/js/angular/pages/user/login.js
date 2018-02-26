 
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
        if($scope.userlogin.data.user.loggedin=="ok"){
            $scope.userid = response.data.user.id;
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
$scope.loginUpload = function(file){
    if(file){
        Upload.upload({
            url: '/api/user/loginupload',
            data: {photo: file }
        }).then(function (response) {
            $scope.userlogin = response.data;
            if($scope.userlogin.user.loggedin=="ok"){
                $scope.userid = response.data.user.id;
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
        });
    }
}
