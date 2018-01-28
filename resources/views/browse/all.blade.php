


    <div class="browse_page" >
    
        
    <div class="container">
        
            
            <div class="title"><h2>Browse Links</h2></div>
            
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
            <div class="row">    
            <div class="col-md-4 col-sm-6" ng-repeat="link in alllinks.links">
        <div class="link_all" ngf-drop="uploadlink(filelink,link.id)" ng-model="filelink" 
ngf-drag-over-class="dragover" ngf-multiple="true" ngf-allow-dir="true"
accept="image/*,application/pdf"
ngf-pattern="image/*,application/pdf">
            <div class="drop"></div>
            <div ng-click="linkEditBtnClick(link.id)" class="edit">Edit</div>
            <div class="image" ng-click="openlink(link.id,link.url)" style="background-image:url(@{{link.image}});">
            </div>
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
            

            <div class="title"><h2>Browse Collections</h2></div>

            <div class="row">
            <div class="col-md-4" ng-repeat="collection in allcollections.collections">
            <div class="collection_all" ngf-drop="uploadcollection(filecollection,collection.id)" ng-model="filecollection" 
    ngf-drag-over-class="dragover" ngf-multiple="true" ngf-allow-dir="true"
    accept="image/*,application/pdf"
    ngf-pattern="image/*,application/pdf">
            <div class="drop"></div>
            <div ng-click="collectionEditBtnClick(collection.id)" ng-hide="!loggedin" class="edit">Edit</div>
            <a href="#/collection/single/@{{collection.id}}"><div class="image" style="background-image:url(@{{collection.image}});" ></div></a>
                <div class="text">
                <a href="#/collection/single/@{{collection.id}}">
                    <h2>@{{collection.name | strLimit: 37}}</h2>
                </a>
                    <div class="clearfix"></div>
                </div>
            </div>
                </div>
                </div>
            
            



    </div>

    
</div>