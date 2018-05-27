


    <div class="link_page container" ng-click="linkDropdownClick(0);">
    
        

                
                <div class="title"><h2>My Links</h2></div>
                
                <div class="controls">
                    <div class="create-link">
                        <div class="create" ng-show="!createshow"><a class="btn" ng-click="toggleCreate('show')">Add a link</a></div>
                        <div class="create-text" ng-show="createshow"><input type="text" id="linkall_create" class="form-control" placeholder="Paste website link here" ng-model="website" /><a class="btn" ng-click="addlink()">Add Link</a></div>
                    </div>
                    <div class="search-link"><input type="text" id="linkall_search" class="form-control" placeholder="Search Links" ng-model="search" ng-change="searchlinks()" /></div>
                </div> 
                
            <div class="loading" ng-show="loading">
                <?php for ($x = 1; $x <= 6; $x++) { ?>
                <div class="link_all">
                    <div class="image" ></div>
                    <div class="text">
                    <h2></h2>
                    <h3>&nbsp;</h3>
                    <h3 class="views">&nbsp;</h3>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <?php }; ?>
            </div>
                
                
                <div class="links" ng-show="!loading" >
                <div class="" ng-repeat="link in alllinks.links">
                    @include('reuse.link')
                </div>
                </div>
                
                <div class="noresults" ng-cloak ng-show="!alllinks.links.length"> No Links Found </div>   



   
        
    </div>