   




<div class="addlink_page">
    
    
    
    
    <div class="addlink_all">
        <div class="content">
        <h2>Add Website</h2>
    
        <div class="textbox_holder">
            <input type="text" class="form-control textbox" ng-model="website" placeholder="Paste website link here" />
        </div>
        <div class="collections" ng-show="addlinkcollection">
            <select class="form-control" ng-model="collectionid">
                <option value="">Select Collection</option>
                <option  ng-repeat="collection in allcollections.collections" value="@{{collection.id}}">@{{collection.name | strLimit: 37}}</option>
            </select>
        </div> 
        <div class="buttons">
            <a class="btn btn-primary" ng-click="addlink()">Add Link</a>
            <a class="btn btn-primary" ng-show="!addlinkcollection" ng-click="addlinkcollectionshow()">Add to Collection</a>
            <a class="btn btn-primary" ng-show="addlinkcollection" ng-click="addlinkcollectionhide()">Hide Collections</a>
        </div>
        </div>
    </div>
    
    
    
    
        
    </div>





