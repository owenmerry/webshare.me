  //logout button
  $scope.logoutbtnClick = function(){
    $http.get("/api/user/logout").then(function (response) {
          $scope.loggedin = response.data.loggedin;
          $scope.userid = "";
          $location.path('home');
     });
     
 }
