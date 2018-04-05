
    
    <div class="profile_page container" >
    


    <div class="title"><h2>@{{user.user.name}}</h2></div>
                
    <div class="controls">
        <div ng-class="{'active':tabactive=='links'}"><a ng-click="tabclick('links')">Recent Links</a></div>
        <div ng-class="{'active':tabactive=='collections'}"><a ng-click="tabclick('collections')">Collections</a></div>
    </div>  






<!-- links -->
<div ng-if="tabactive=='links'">

    <div class="links" ng-show="!loading" >
        <div class="" ng-repeat="link in alllinks.links">
            <div class="link_all">
                <div ngf-drop="uploadlink(filelink,link.id)" ng-model="filelink" 
                ngf-drag-over-class="dragover" ngf-multiple="true" ngf-allow-dir="true"
                accept="image/*,application/pdf"
                ngf-pattern="image/*,application/pdf">
                <div class="drop"></div>
                <!--<div ng-click="linkEditBtnClick(link.id)" class="edit">Edit</div>-->
                <div ng-if="link.privacy.name == 'Private'">
                    <div class="privacy"><i class="fa fa-lock"></i></div>
                </div>
                <div class="image" ng-click="openlink(link.id,link.url)" style="background-image:url(@{{link.image}});">
                </div>
                <div class="text">
                <h2 ng-click="openlink(link.id,link.url)" >@{{link.title | strLimit: 30}}</h2>
                <h3>@{{link.site.name | strLimit: 20}}</h3>
                <h3 class="views">@{{link.visits}} views</h3>
                    <div class="clearfix"></div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="noresults" ng-cloak ng-show="!alllinks.links.length"> No Links Found </div>   


</div>



<!-- collections -->
<div ng-if="tabactive=='collections'">

<div class="col-md-4" ng-repeat="collection in allcollections.collections">
            <div class="collection_all" ngf-drop="uploadcollection(filecollection,collection.id)" ng-model="filecollection" 
    ngf-drag-over-class="dragover" ngf-multiple="true" ngf-allow-dir="true"
    accept="image/*,application/pdf"
    ngf-pattern="image/*,application/pdf">
            <div class="drop"></div>
            <!--<div ng-click="collectionEditBtnClick(collection.id)" ng-hide="!loggedin" class="edit">Edit</div>-->
            <a href="#/collection/single/@{{collection.id}}"><div class="image" style="background-image:url(@{{collection.image}});" ></div></a>
                <div class="text">
                <a href="#/collection/single/@{{collection.id}}">
                    <h2>@{{collection.name | strLimit: 37}}</h2>
                </a>
                    <div class="clearfix"></div>
                </div>
            </div>
                </div>

                <div class="noresults" ng-cloak ng-show="!allcollections.collections.length"> No Collections Found </div>    


</div>
                

    
    
    </div>
    
    