
    <!-- right navigation - start -->
    <div class="rightcol_all" ng-controller="rightpanelController">
        <div class="rightcol_content">
            
            
            
            
            <div ng-show="!start">
            <div class="loading" ng-if="loading"></div>
            </div>
            
            <div ng-show="start">
            
            
            
            <!-- login - end -->
            <div class="login_all" ng-show="!loggedin">
            <p>You are not logged in yet</p>
            <div>
                <a class="btn btn-primary" ng-click="login_show()">Log In</a>
                <a class="btn btn-primary" ng-click="signup_show()">Sign Up</a>
            </div>
                
                <div class="login" ng-show="loginmode=='login'">
                    <h3>Login</h3>
                <div class="form-group">
                <input type="text" ng-model="email" class="form-control" placeholder="Email">
                </div>
                
                <div class="form-group">
                <input type="password" ng-model="password" class="form-control" placeholder="Password">
                </div>
                    
                <div class="form-group">
                <input type="hidden" ng-model="csrf" ng-init="csrf='{{ csrf_token() }}'" class="form-control" >
                </div>
                
                <div class="form-group">
                    <a class="btn btn-primary" ng-click="login()" >Login</a>
                </div>
                     <div>@{{loginstatus}}</div>
                     <div class="loading" ng-if="loading"></div>
                </div>
                
                
                
                <div class="signup" ng-show="loginmode=='signup'">
                    <h3>Sign Up</h3>
                <div class="form-group">
                <input type="text" ng-model="name_signup" class="form-control" placeholder="Full Name">
                </div>
                    
                <div class="form-group">
                <input type="text" ng-model="email_signup" class="form-control" placeholder="Email">
                </div>
                
                <div class="form-group">
                <input type="password" ng-model="password_signup" class="form-control" placeholder="Password">
                </div>
                    
                <div class="form-group">
                <input type="hidden" ng-model="csrf_signup" ng-init="csrf_signup='{{ csrf_token() }}'" class="form-control" >
                </div>
                
                <div class="form-group">
                    <a class="btn btn-primary" ng-click="signup()" >Sign Up</a>
                </div>
                     <div class="loading" ng-if="loading"></div>
                </div>
                
                
            </div>
            <!-- login - end -->
            
            
            
            
            
            
            <!-- loggedin - end -->
            <div class="loggedin_all" ng-show="loggedin">
                
                
             <!-- logout - start -->    
                <div class="logout_all">
                    <a class="btn btn-primary" ng-click="logout()">Log Out</a>    
                </div>
             <!-- logout - end -->    
            
             <!-- addlink - start -->
            <div class="addlink_all">
            <p>Add a Link</p>
            <div>
                <div class="form-group">
                <input type="text" ng-model="website" class="form-control" placeholder="Paste website link here">
                </div>
                <div class="form-group">
                    <a class="btn btn-primary" ng-click="addlink()" >Add Link</a>
                </div>
                
                 <div class="loading" ng-if="loading"></div>
                
                <div class="preview">
                @{{preview}}
                    
                    <div class="link" ng-show="previewlink">
                        <div>Details:</div>
                        @{{link.users.email}}
                        @{{link}}
                    </div>    
                </div>
                
                
            </div>
            </div>
            <!-- addlink - end -->
            
             <!-- addcollection - end -->
            <div class="addcollection_all">
            <p>Add a Collection</p>
            <div>
                <div class="form-group">
                <input type="text" ng-model="name" class="form-control" placeholder="Name">
                </div>
                <div class="form-group">
                    <a class="btn btn-primary" ng-click="addcollection()" >Add Collection</a>
                </div>
                
                 <div class="loading" ng-if="loading"></div>
                
                <div class="preview">
                @{{preview}}
                    
                    <div class="link" ng-show="previewcollection">
                        <div>Details:</div>
                        @{{collection}}
                    </div>    
                </div>
                
                
            </div>
            </div>
            <!-- addcollection - end -->
            
            
            
            </div>
            
            
            </div>
            
            
            
        </div>
    </div>
    <!-- right navigation - end -->
    
  