@extends('layouts.main-template') 


@section('content')
    
<!-- All - start -->
<div class="page login_page">
            <a class="closebtn" href="/"><i class="fa fa-times" aria-hidden="true"></i></a>
    
    
    
    <!-- portal - start -->
    <div class="login_all col-md-3">
                <div class="content">
                    <h2>Login to Webshare</h2>
                    <form>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email">
                            </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg">Login</button>
                        </div>
                    </form>
                </div>
    </div>
    <!-- portal - end -->
  
    
</div>    
<!-- All - end -->         


@stop