
    
    
    
    
    <!-- content - start -->
    <div class="contentcol_all">
        <div class="contentcol_content">
            
            
            
            <!-- page - start -->
            <div class="librarylinks_page">
            
            
        
                
                
     <!-- addlink - start -->
            <div class="addlink_all">
            <p>Add a Link</p>
            <div>
                <div class="form-group">
                <input type="text" ng-model="website" class="form-control" placeholder="Paste website link here">
                </div>
                
                <div class="form-group">
                    <select class="form-control" ng-model="collection">
                        <option value="">Select a collection</option>
                         <option ng-repeat="collection in collectionlist.collections" value="@{{collection.id}}">@{{collection.name}}</option>
                    </select>

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
                
                

      
      
    <!-- links - start -->
            <div class="links_all">
                <div class="container-fluid">
                    <div class="title">
                    <h3>Recent Links</h3>
                    </div>
                    <div class="list">

                        <div class="loading" ng-if="loading"></div>

                             <div class="row">
                                
                               
                                <div class="col-md-5ths" ng-repeat="link in mylinks.links">
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

