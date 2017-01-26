
    
    
    
    
    <!-- content - start -->
    <div class="contentcol_all">
        <div class="contentcol_content">
            
            
            
            <!-- page - start -->
            <div class="search_page">
            
            
            
            
             <!-- grid - start -->
            <div class="grid_all" >
                <div class="container-fluid">
                    <div class="title">
                    <h3>Search</h3>
                    </div>
                    <div class="search">
                        <input type="text" class="form-control" ng-model="search" ng-change="searchlinks()" />
                    </div>
                    
                    <div class="list">

                        
                        <div class="loading" ng-if="loading"></div>
                        
                            <div class="row">
                                
                               
                                <div class="col-md-5ths" ng-repeat="link in searchlink.links">
                                    <a target="_blank" href="@{{link.url}}">
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
                                        <div class="title"><a href=""><h4>@{{link.title | strLimit: 70}}</h4></a></div>
                                        <div class="site"><a href="">@{{link.site.name | strLimit: 20}}</a></div>
                                        <div class="stats"><span>@{{link.visits}} views</span> <span am-time-ago="link.created_at"></span></div>
                                    </div>
                                    </div>
                                    </a>
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
    
    
 