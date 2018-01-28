



    <div class="collection_page" >
    
        
        <div class="container">
            <div class="row">
                
                <div class="title"><h2>Collections</h2></div>
                
                <div class="controls" ng-hide="!loggedin">
                    <div class="create" ng-show="!createshow"><a class="btn" ng-click="toggleCreate('show')">Create Collection</a></div>
                    <div class="create-text" ng-show="createshow"><input type="text" id="collectionall_create" class="form-control" ng-model="collectionname" /><a class="btn" ng-click="addcollection()">Add</a></div>
                </div>
            
                
                
            <div class="loading" ng-show="loading">
                <?php for ($x = 1; $x <= 6; $x++) { ?>
                <div class="col-md-4">
                <div class="link_all">
                    <div class="image" ></div>
                    <div class="text">
                    <h2 ></h2>
                        <div class="clearfix"></div>
                    </div>
                </div>
                </div>
                <?php }; ?>
            </div>    
                
                
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

                <div class="noresults" ng-cloak ng-show="!allcollections.collections.length"> No Collections Found </div>    

            </div>
        </div>
   
        
    </div>




    