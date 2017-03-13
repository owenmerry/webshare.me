



    <div class="collection_page" >
    
        
        <div class="container">
            <div class="row">
                
                <div class="title"><h2>Collections</h2></div>
                
                
                
            <div class="col-md-4" ng-repeat="collection in allcollections.collections">
            <a href="#/collection/single/@{{collection.id}}">
            <div class="collection_all">
                <div class="image" ></div>
                <div class="text">
                <h2 >@{{collection.name | strLimit: 37}}</h2>
                    <div class="clearfix"></div>
                </div>
            </div>
                </a>
                </div>
               



            </div>
        </div>
   
        
    </div>

