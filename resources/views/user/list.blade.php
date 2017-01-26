
    
    
    
    
    <!-- content - start -->
    <div class="contentcol_all">
        <div class="contentcol_content">
            
            
            
            <!-- page - start -->
            <div class="profilelist_page">
            
            
            
            
            
            <!-- grid - start -->
            <div class="grid_all">
                <div class="container-fluid">
                    <div class="title">
                    <h3>Profiles</h3>
                    </div>
                    <div class="search">
                        <input type="text" class="form-control" ng-model="search" ng-change="searchusers()" />
                    </div>
                    <div class="list">
                        <div class="loading" ng-if="loading"></div>
                        

                            <div class="row">
                                
                                <div class="col-md-5ths linkbox" ng-repeat="user in userlist.users">
                                    <div class="image">
                                        <div class="controlaction"><a href="#/user"><i class="fa fa-user" aria-hidden="true"></i></a></div>
                                    </div>
                                    <div class="desc">
                                        <div class="title"><a href="#/user/@{{user.id}}"><h4>@{{user.name}}</h4></a></div>
                                        <div class="site"><a>youtube.com</a></div>
                                        <div class="stats">3 similar shares</div>
                                    </div>
                                </div>
                                
                            </div>

                    </div>
                 </div>
            </div>
            <!-- grid - end -->
            
            </div>
            <!-- page - end -->
            
                
        </div>
    </div>
    <!-- content - end -->
    
    
 