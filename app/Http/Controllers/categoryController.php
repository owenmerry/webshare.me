<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Collection;
use App\User;
use App\Category;

class categoryController extends Controller
{
    //
    
    
    
    
    //View Categories
    public function all(Request $request)
    {
        
    //get all categories        
    $this->vars['categories'] = Category::all();    

   
        
    //return back()
    return $this->vars;
        
        
        
        
        
    }
    
    

    
    
    
    
    
    
    
}
