
    
    
    
    
    <!-- content - start -->
    <div class="contentcol_all">
        <div class="contentcol_content">
            
            
            
            <!-- page - start -->
            <div class="profiledetails_page">
            
            
            <!-- portal - start -->
            <div class="portal_all">
                <div class="content">
                    <div class="profileimage"></div>
                    <h1 class="light">@{{user.user.name}}</h1>
                </div>
            </div>
            <!-- portal - end -->
            
            
            
                
<!-- tabs - start -->                
  <ul class="nav nav-tabs" role="tablist">
    <li ng-class="{'active':tabactive=='links'}"><a ng-click="tabclick('links')">Recent Links</a></li>
    <li ng-class="{'active':tabactive=='collections'}"><a ng-click="tabclick('collections')">Collections</a></li>
    <li ng-class="{'active':tabactive=='about'}"><a ng-click="tabclick('about')">About @{{user.user.name}}</a></li>
    <li ng-class="{'active':tabactive=='following'}"><a ng-click="tabclick('following')">Following</a></li>
  </ul>
<!-- tabs - end -->
                
  <!-- tab areas - start -->
  <div class="tabholder">
      
      
      
      
    <!-- links - start -->
    <div role="tabpanel" ng-if="tabactive=='links'">
            <div class="links_all">
                <div class="container-fluid">
                    <div class="title">
                    <h3>Recent Links</h3>
                    </div>
                    <div class="list">

                        <div class="loading" ng-if="loading"></div>

                            <div class="row">
                                
                                <div class="col-md-5ths linkbox"  ng-repeat="link in userlinks.links">
                                    <div >
                                    <div class="linkbox">
                                    <div class="image" style="background-image:url(@{{link.image}});">
                                        <div class="overlay"></div>
                                        <div class="controls">
                                            <a href=""><i class="fa fa-share" aria-hidden="true"></i></a>
                                            <a href=""><i class="fa fa-heart" aria-hidden="true"></i></a>
                                            <a href=""><i class="fa fa-check" aria-hidden="true"></i></a>
                                        </div>
                                        <div class="controlaction"><a href=""><i class="fa fa-link" aria-hidden="true"></i></a></div>
                                    </div>  
                                    <div class="desc">
                                        <div class="title" ng-click="openlink(link.id,link.url)" ><a href=""><h4>@{{link.title}}</h4></a></div>
                                        <div class="site"><a href="">@{{link.site.name}}</a></div>
                                        <div class="stats"><span>@{{link.visits}} views</span> <span>3 hours ago</span></div>
                                    </div>
                                    </div>
                                    </div>
                                </div>
                                
                            </div>


                    </div>
                 </div>
            </div>
    </div>
    <!-- links - end -->
      
      
      
    <!-- collections - end -->  
    <div role="tabpanel" ng-if="tabactive=='collections'">
        <div class="collections_all">
            <div class="container-fluid">
                <div class="title"><h3>Collections</h3></div>
                <div class="list">
                    <div class="loading" ng-if="loading"></div>
                    <div class="row">
                        <div class="col-md-5ths" ng-repeat="collection in usercollections.collections">
                            <div class="box">
                                <div class="name">@{{collection.name}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- collections - end -->  
      
      
      
      
    <div role="tabpanel" ng-if="tabactive=='about'">about</div>
      
      
      
      
      
      
      
    <!-- following - start -->  
    <div role="tabpanel" ng-if="tabactive=='following'">
            <div class="following_all">
                <div class="container-fluid">
                    <div class="title">
                    <h3>Profiles</h3>
                    </div>
                    <div class="list">
                            <div class="loading" ng-if="loading"></div>
                            <div class="row">
                                
                                 
                                <div class="col-md-5ths linkbox" ng-repeat="user in userfollowing.users">
                                    <div class="image">
                                        <div class="controlaction"><a href="#/user"><i class="fa fa-user" aria-hidden="true"></i></a></div>
                                    </div>
                                    <div class="desc">
                                        <div class="title"><a href="#u/ser"><h4>Owen Merry</h4></a></div>
                                        <div class="site"><a>youtube.com</a></div>
                                        <div class="stats">3 similar shares</div>
                                    </div>
                                </div>
                                
                                
                            </div>
                            

                    </div>
                 </div>
            </div>
    </div>
    <!-- following - end -->  
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
  </div>    
  <!-- tab areas - end -->                
                
                
                
                
            
            
            
            
            </div>
            <!-- page - end -->
            
                
        </div>
    </div>
    <!-- content - end -->

