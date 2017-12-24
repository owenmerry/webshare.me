<?php

namespace App\Http\Controllers;


use Auth;
use Illuminate\Http\Request;


use App\User;
use App\Website;

class userController extends Controller
{
    //
    
    
    
    
    //test
    public function test(Request $request)
    {
        
              
        /*
        $website_domain = parse_url("http://www.ign.com", PHP_URL_HOST);
        preg_replace('/^www./', '', $website_domain);      
   
        return "this->". $website_domain;
        */
        $url = "http://www.ign.com";
        $url = "https://www.drupal.org/node/1930488";
        $url = "https://www.spotify.com/";
        $getwebdata = Website::getWebsiteData($url); 
        
        $title=$getwebdata['title'];
        
        //return $getwebdata['title'];
        //return $title;
        return $getwebdata;
    }   
    
    
    
    //Login
    public function login(Request $request)
    {
        //varibles
        $remember = true;
        
        //check details
        if(Auth::attempt($request->only(['email','password'],$remember))){
            return "ok";  
        }else{
            return "error";
        }
        
              
    
    
    }
    
    
    //Signup
    public function signup(Request $request)
    {
        //varibles
        $remember = true;
        
        //Create User
        User::create([
        'name'  => $request['name'],  
        'email' => $request['email'],    
        'password' => bcrypt($request['password']),    
        ]);
        
        
        //LoginUser
        if(Auth::attempt($request->only(['email','password'],$remember))){
            return "ok";  
        }else{
            return "error";
        }
        
              
    
    
    }   
    
    
    //get user details
    public function show(Request $request,$userid)
    {
        
        //get user details        
        $this->vars['user'] = User::find($userid);    
    
        return $this->vars;
    
    
    }
    
    
    
    //search users
    public function search(Request $request)
    {
        //get search string
        $search = "%". $request['search'] ."%";
        
        //get user details        
        $this->vars['users'] = User::where('name','LIKE',$search)->get();    
    
        return $this->vars;
        
    }
    
    
    
    
    
     //View Links
    public function all(Request $request)
    {
        
    //get all users        
    $this->vars['users'] = User::all();    

   
        
        //return back()
        return $this->vars;
   
    }
    
    
        
    
    
     //loggedin
    public function loggedin(Request $request)
    {
    
    //variables
    $this->vars['loggedin'] = false;     
        
    //check if logged in    
    if (Auth::check())
    {
    $this->vars['loggedin'] = true;    
    }    
        
    //return
    return $this->vars;
   
    }
    
    
    
    
    //logout
    public function logout(Request $request)
    {    
        
    //logout    
    Auth::logout();   
    
    //set variable logout    
    $this->vars['loggedin'] = false;             
        
    //return
    return $this->vars;
   
    }
    
    
    
    
    
    
    
    
    
    
}
