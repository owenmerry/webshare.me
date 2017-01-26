
    
    
    
    
    <!-- content - start -->
    <div class="contentcol_all">
        <div class="contentcol_content">
            
            
            
            <!-- page - start -->
            <div class="librarycollections_page">
            
            
        
                
                
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
                
                

      
      
      <!-- collections - end -->  
    <div role="tabpanel" >
        <div class="collections_all">
            <div class="container-fluid">
                <div class="title"><h3>Collections</h3></div>
                <div class="list">
                    <div class="loading" ng-if="loading"></div>
                    <div class="row">
                        <div class="col-md-5ths" ng-repeat="collection in mycollections.collections">
                            <div class="box" ng-click="getcollectionlinks(collection.id)">
                                <div class="name">@{{collection.name}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- collections - end --> 
                
                
 <!-- links - start -->
            <div class="links_all">
                <div class="container-fluid">
                    <div class="title">
                    <h3>Collection Links</h3>
                    </div>
                    <div class="list">

                        
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
                        
                        <div class="loading" ng-if="loading"></div>

                             <div class="row">
                                
                               
                                <div class="col-md-5ths" ng-repeat="link in collectionlinks.links">
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
    <!-- links - end -->           
      
   
            
            
            
            </div>
            <!-- page - end -->
            
                
        </div>
    </div>
    <!-- content - end -->

