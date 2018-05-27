
    
    <div class="profile_page container" >
    


    <div class="title"><h2>@{{user.user.name}}this</h2></div>
                
    <div class="controls">
        <div  ng-class="{'active':tabactive=='links'}"><a class="btn" href="#/user/@{{user.user.id}}/links">Recent Links</a></div>
        <div  ng-class="{'active':tabactive=='collections'}"><a class="btn" href="#/user/@{{user.user.id}}/collections">Collections</a></div>
    </div>  






<!-- links -->
<div ng-if="tabactive=='links'">

    <div class="links" ng-show="!loading" >
        <div class="" ng-repeat="link in alllinks.links">
            @include('reuse.link')
        </div>
    </div>
    <div class="noresults" ng-cloak ng-show="!alllinks.links.length"> No Links Found </div>   


</div>



<!-- collections -->
<div ng-if="tabactive=='collections'">

        <div class="collections" ng-show="!loading" >
            <div ng-repeat="collection in allcollections.collections">
                @include('reuse.collection')
            </div>
        </div>

        <div class="noresults" ng-cloak ng-show="!allcollections.collections.length"> No Collections Found </div>    


</div>
                

    
    
    </div>
    
    