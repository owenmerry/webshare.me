




 //variables
 $scope.popupmenu = false; 
 $scope.pageactive = "addlink"; 
 $scope.searching = false;
 $scope.loginshow=false;
 $scope.loginstep='email';
 $scope.signupshow=false;
 $scope.signupstep='create';
 $scope.addlinkcollection=false;
 $scope.menumobile=false;
 $scope.linkEditCollection='';
 
 //page Global values
 //collection Global
 $scope.$on("collectionsingleEnter", function (event, args) {
     $scope.linkEditCollection = args.collectionid;
  }); 
  $scope.$on("collectionsingleLeave", function (event, args) {
     $scope.linkEditCollection = '';
  }); 
 
 //startup
 $http.get("/api/user/loggedin").then(function (response) {
         $scope.loggedin = response.data.loggedin;
         $scope.userid = response.data.user.id;
         $scope.loading = false;
         $scope.start = true;
 });
 
 //page refresh
 var pageRefresh = $interval(function(){
     $rootScope.$broadcast('pageRefresh');
 },60000);
 
 //menu functions
 $scope.menuClick = function(){
     $scope.popupmenu = true; 
 }
 
 $scope.menubuttonClick = function(varpage){
     $scope.popupmenu = false; 
     $scope.pageactive = varpage;
 }
 
 $scope.menulinkaddClick = function(){
     $scope.popupmenu = false; 
     $scope.pageactive = "addlink";
 }
 
 $scope.menuMobileShowClick = function(){
     $scope.menumobile = true;
 }
 $scope.menuMobileHideClick = function(){
     $scope.menumobile = false;
 }
 
 
 
 //collection page functions
 //default
 $scope.collectionmode="collection";
 
 $scope.getcollectionlinks = function(varcollectionid){
         $scope.collectionid = varcollectionid;
         
         $scope.collectionmode="link";
     
         $http.get("/api/link/collection/"+ varcollectionid ).then(function (response) {
         $scope.allcollectionlinks = response.data;
         $scope.loading = false;
         
         });
     
 };
 $scope.collectionback = function(){
     
     $scope.collectionmode="collection";
     
     
 };
 
 
 //links page functions
 $scope.openlink = function(linkid,linkurl){
     var myWindow = window.open(linkurl);
     
     $http.get("/api/link/visit/"+ linkid).then(function (response) {
         $http.get("/api/link/all").then(function (response) {
         $scope.alllinks = response.data;
         });
     });

     //refresh
     $rootScope.$broadcast('pageRefresh');
     
 };

 
 
 //search functions
 $scope.searchlinks = function(){
     if(!$scope.search==""){
         $scope.searching=true;
     $http.post("/api/link/search",{search:$scope.search}).then(function (response) {
         $scope.searchlink = response.data;
         $scope.loading = false;
     });
     }else{
         $scope.searching=false;   
     };
 };
 




