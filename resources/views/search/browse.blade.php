 <!-- content - start -->
    <div class="contentcol_all">
        <div class="contentcol_content">
            
            
            
            <!-- page - start -->
            <div class="browse_page">
            
            
                
                
            <?php if (1==0){ ?>    
            <!-- portal - start -->
            <div class="portal_all">
                <div class="overlay"></div>
                <div class="content">
                    <h1 class="light">Browse</h1>
                </div>
            </div>
            <!-- portal - end -->
            <?php } ?>
            
                
      
                
                
            <!-- categories - start -->
            <div class="categories_all">
                <div class="container-fluid">
                    <div class="title">
                    <h3>Browse</h3>
                    </div>
                    <div class="list">

                        
                       
                            <div class="row">
                                
                                 
                                <div class="col-md-5ths linkbox"  ng-repeat="category in categories.categories">
                                    <div class="image">
                                        <div class="overlay"></div>
                                        <div class="content">
                                            
                                                
                                                @{{category.name}}
                                            
                                        </div>
                                    </div>  
                                </div>
                                
                                
                            </div>
                            

                    </div>
                 </div>
            </div>
            <!-- categories - end -->    
                
                
                
            
            
            <!-- grid - start -->
            <div class="grid_all" >
                <div class="container-fluid">
                    <div class="title">
                    <h3>Recently added</h3>
                    </div>
                    <div class="list">

                        
                        <div class="loading" ng-if="loading"></div>
                        
                            <div class="row">
                                
                               
                                <div class="col-md-5ths" ng-repeat="link in recentlink.links">
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
                                        <div class="title"><a href=""><h4>@{{link.title}}</h4></a></div>
                                        <div class="site"><a href="">@{{link.site.name}}</a></div>
                                        <div class="stats"><span>@{{link.visits}} views</span> <span>3 hours ago</span></div>
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
    
  