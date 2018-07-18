<div class="link_all">
            <div ngf-drop="uploadlink(filelink,link.id)" ng-model="filelink" 
    ngf-drag-over-class="dragover" ngf-multiple="true" ngf-allow-dir="true"
    accept="image/*,application/pdf"
    ngf-pattern="image/*,application/pdf">
                <div class="drop"></div>
                <div ng-hide="!isEditable" ng-click="linkDropdownClick(link.id);$event.stopPropagation()" class="edit">...</div>
                <div ng-if="linkDropdownShow==link.id;" ng-click="linkDropdownClick(link.id);$event.stopPropagation()" class="dropdown">
                    <div class="line"><a ng-click="linkEditBtnClick(link.id);linkDropdownClick('');" >Edit</a></div>
                    <div class="line"><a ng-click="linkDeleteBtnClick(link.id);linkDropdownClick('');" >Delete</a></div>
                    <div class="line"><a ng-click="collectionAddBtnClick(link.id);linkDropdownClick('');" >Add to Collection</a></div>
                </div>
                <div ng-if="link.privacy.name == 'Private'">
                    <div class="privacy"><i class="fa fa-lock"></i></div>
                </div>
                <div class="image" ng-click="openlink(link.id,link.url)" style="background-image:url(@{{link.image}});">
                </div>
                <div class="text">
                <h2 ng-click="openlink(link.id,link.url)" >@{{link.title | strLimit: 30}} [@{{isEditable}}]</h2>
                <h3>@{{link.site.name | strLimit: 20}}</h3>
                <h3 class="views">@{{link.visits}} views</h3>
                    <div class="clearfix"></div>
                </div>
            </div>
</div>