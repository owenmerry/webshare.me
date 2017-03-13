



    <div class="collection_page" >
    
        
        <div class="container">
            <div class="row">
                
                <div class="title"><h2>Collections @{{myid}}</h2></div>
                
                
               
             <div> 
                 <div><a class="back" href="#collection/all">Back</a></div>
                <div class="col-md-4"  ng-repeat="link in allcollectionlinks.links">
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
        </div>
   
        
    </div>

