



    <div class="collectionsingle_page" ng-click="linkDropdownClick(0);">
    
        
        <div class="container">
            <div class="row">
                
                <div class="title">
                    <h3>Collection</h3>
                    <h2>@{{allcollectionlinks.collection.name}}</h2>
                </div>
                
                
               
             <div> 
                 <div class="controls" ng-hide="!loggedin">
                     
                     <!--<a class="back btn" href="#/collection/user/@{{allcollectionlinks.user[0].id}}">Back</a>-->
                     <div class="create-link" ng-hide="!loggedin"><input type="text" id="collectionsingleall_create" class="form-control" placeholder="Paste website link here" ng-model="website" /><a class="btn" ng-click="addlink()">Add Link</a></div>
                     <div class="search-link"><input type="text" id="linkall_search" class="form-control" placeholder="Search Collections" ng-model="search" ng-change="searchlinks()" /></div>
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
                 
                 
                <div class="row">
                    <div class="col-md-4"  ng-repeat="link in allcollectionlinks.links">
       
                    @include('reuse.link')


                    </div>
                </div>



                </div>

                <div class="noresults" ng-cloak ng-show="!allcollectionlinks.links.length"> No Links Found </div>   

            </div>
        </div>
   
        
    </div>

