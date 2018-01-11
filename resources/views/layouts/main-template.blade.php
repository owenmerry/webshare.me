<!DOCTYPE html>
<html lang="en" ng-app="mySite">
<head>
    
    
<!--
#########################################################
  _____      _____ _ __  _ __ ___   ___ _ __ _ __ _   _ 
 / _ \ \ /\ / / _ \ '_ \| '_ ` _ \ / _ \ '__| '__| | | |
| (_) \ V  V /  __/ | | | | | | | |  __/ |  | |  | |_| |
 \___/ \_/\_/ \___|_| |_|_| |_| |_|\___|_|  |_|   \__, |
                                                  |___/     
#########################################################
Made with ♥ by Owen Merry - owenmerry.com
#########################################################
-->       
    
    
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>    
<meta name="description" content="">
<meta name="author" content="">
<title>Webshare App</title>
<link rel="icon" type="image/png" href="./favicon.ico">
    

<!-- My Styles -->
<link rel="stylesheet" href="{{ elixir('css/all.css') }}" type="text/css">  
    
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>


<body >
<!-- Google Analytics - start --> 
<!-- Google Analytics - end --> 
    

     
@yield('content')        
    



<!--runscripts:start--> 
<!-- my scripts --> 
<script src="{{ elixir('js/all.js') }}" type="text/javascript"></script> 
<!--runscripts:end-->
    
</body>
</html>
    