<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Collection;
use App\User;

class collectionController extends Controller
{
    //
    
    
    
    
    //Create link
    public function create(Request $request)
    {
        
        //variables
        $name=$request['name'];
        $user_id=Auth::user()->id;
        
        
        //add values
        $input = 
        [
            'name' => $name,
        ];
        
        //create
        $collection_create = Collection::create($input); 
        $collection_create->user()->attach($user_id);
        
        
        //return back()
        return "added";
        
        
        
    }
    
    
    
    
    //View Collection
    public function all(Request $request)
    {
        
    //get all users        
    $this->vars['collections'] = Collection::orderBy('id','DESC')->get();    

   
        
    //return back()
    return $this->vars;
        
        
        
        
        
    }    
    
    
    
    //View My Collections
    public function mycollections(Request $request)
    {
    
    //variables
    $user_id=Auth::user()->id;    
        
    //get users collections     
    $this->vars['collections'] = User::find($user_id)->collection()->orderBy('id','DESC')->get();
   
        
    //return back()
    return $this->vars;

        
    }
    
    
    
    //User Collection
    public function user(Request $request,$userid)
    {
        
    //get users collections     
    $this->vars['collections'] = User::find($userid)->collection()->orderBy('id','DESC')->get();
   
        
    //return back()
    return $this->vars;
        
        
        
        
        
    }
    
    
    
    
    
    
    
}
