
    
    
        
    <div class="search_page">

        <div class="searchbox" ng-class="{'top':searching==true}" >
            <h2>Search</h2>
        
            <div class="textbox_holder">
                <input type="text" id="searchall-search" class="form-control textbox" ng-model="search" ng-change="searchlinks()" placeholder="Search Link, Collections or Profiles" />
            </div>
        </div>
        
        <div class="container" ng-show="searching">
            
            
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
            
            
        <div class="col-md-4" ng-repeat="link in searchlink.links">
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
        
    </div>
    
 