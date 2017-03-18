


    <div class="link_page" >
    
        
        <div class="container">
            <div class="row">
                
                <div class="title"><h2>Owen Merry Recent Links</h2></div>
                
                <div class="controls">
                    <div class="create-link"><input type="text" class="form-control" placeholder="Paste website link here" ng-model="website" /><a class="btn" ng-click="addlink()">Add Link</a></div>
                </div>
                
            <div class="loading" ng-show="loading">
                <?php for ($x = 1; $x <= 6; $x++) { ?>
                <div class="col-md-4">
                <div class="link_all">
                    <div class="image" ></div>
                    <div class="text">
                    <h2 ></h2>
                    <h3>&nbsp;</h3>
                    <h3 class="views">&nbsp;</h3>
                        <div class="clearfix"></div>
                    </div>
                </div>
                </div>
                <?php }; ?>
            </div>
                
                
                <div class="links" ng-show="!loading" >
                <div class="col-md-4" ng-repeat="link in alllinks.links">
            <div class="link_all">
                <div class="image" ng-click="openlink(link.id,link.url)" style="background-image:url(@{{link.image}});"></div>
                <div class="text">
                <h2 ng-click="openlink(link.id,link.url)" >@{{link.title | strLimit: 37}}</h2>
                <h3>@{{link.site.name | strLimit: 20}}</h3>
                <h3 class="views">@{{link.visits}} views</h3>
                    <div class="clearfix"></div>
                </div>
            </div>
                </div>
                </div>
                
                <div class="noresults" ng-cloak ng-show="!alllinks.links.length"> No Links Found </div>   


            </div>
        </div>
   
        
    </div>