@extends('layouts.main-template')



@section('content')


@include('pages.components.menu-front')



<!-- All - start -->
    


<h2>Angular view</h2>

<div class="view page @{{pageClass}}" ng-view autoscroll="true"> 
</div>



    <!-- portal - start -->
    <div class="section portal_all">
        <div class="content">
            <h1 class="light">Webshare</h1>
        </div>
    </div>
    <!-- portal - end -->
    
    <!-- article - start -->
    <div class="section article_all article_01">
        <div class="content">
            <h2>Title of article</h2>
            <p>Title of article</p>
            <a class="btn btn-primary">Click Here</a>
        </div>
    </div>
    <!-- article - end -->
    
    <!-- article - start -->
    <div class="section article_all article_02">
        <div class="content right">
            <h2>Title of article</h2>
            <p>Title of article</p>
            <a class="btn btn-primary">Click Here</a>
        </div>
    </div>
    <!-- article - end -->
    
    <!-- article - start -->
    <div class="section article_all article_03">
        <div class="content">
            <h2>Title of article</h2>
            <p>Title of article</p>
            <a class="btn btn-primary">Click Here</a>
        </div>
    </div>
    <!-- article - end -->
    
    <!-- article - start -->
    <div class="section article_all article_04">
        <div class="content">
            <h2>Title of article</h2>
            <p>Title of article</p>
            <a class="btn btn-primary">Click Here</a>
        </div>
    </div>
    <!-- article - end -->
    
    <!-- footer - start -->
    <div class="footer footall">
        <div class="content">
            <h2>Title of article</h2>
            <p>Title of article</p>
            <a class="btn btn-primary">Click Here</a>
        </div>
    </div>
    <!-- footer - end -->
    
    
    
    
<!-- All - end -->   


@stop
