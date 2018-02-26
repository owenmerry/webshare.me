
    
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



