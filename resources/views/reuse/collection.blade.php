<div class="collection_all" ngf-drop="uploadcollection(filecollection,collection.collection_id)" ng-model="filecollection" 
    ngf-drag-over-class="dragover" ngf-multiple="true" ngf-allow-dir="true"
    accept="image/*,application/pdf"
    ngf-pattern="image/*,application/pdf">
            <div class="drop"></div>
            <div ng-hide="!isEditable" ng-click="collectionEditBtnClick(collection.collection_id)" ng-hide="!loggedin" class="edit">Edit</div>
            <a href="#/collection/single/@{{collection.collection_id}}"><div class="image" style="background-image:url(@{{collection.image}});" ></div></a>
                <div class="text">
                <a href="#/collection/single/@{{collection.collection_id}}">
                    <h2>@{{collection.name | strLimit: 37}} [@{{isEditable}}] (@{{collection.link_count}})</h2>
                </a>
                    <div class="clearfix"></div>
                </div>
</div>