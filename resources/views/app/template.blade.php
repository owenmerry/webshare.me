@extends('layouts.main-template')



@section('content')

    
<!-- App - start -->
<div class="app_all">
    
  
@include('layouts.components.app-leftpanel')    
    
      
<div ng-view autoscroll="true"> 
</div>


@include('layouts.components.app-rightpanel')       
    
   
    
    </div>    
<!-- App - end -->         



@stop
