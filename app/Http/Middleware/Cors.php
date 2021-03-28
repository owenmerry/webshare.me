<?php

namespace App\Http\Middleware;

use Closure;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {


        return $next($request)
        ->header('owen-api', 'owen');
        //->header('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, DELETE, PUT')
        //->header('Access-Control-Allow-Headers', 'x-requested-with, Content-Type, origin, authorization, accept, client-security-token')
        //->header('Access-Control-Allow-Credentials', 'true')
        //->header('Access-Control-Allow-Headers', '*');
        //->header('Access-Control-Allow-Origin', 'http://local.webshare.me:3000')
      
    }
}
