<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Auth;
use App\Collection;
use App\User;
use App\HashUrl;

use Hash;
use Crypt;

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
        
        
        $this->vars['added'] = true;             
        
        //return
        return $this->vars;
        
        
        
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
    $search = $request['search']; 
        
    //get users collections     
    $collections = User::find($user_id)->collection()->orderBy('id','DESC');
   
    //filter with search
    if($search){
        $search = "%". $request['search'] ."%"; 
        $links = $collections->where('url','LIKE',$search)
        ->orwhere('title','LIKE',$search)
        ->orwhere('description','LIKE',$search);
    }

    //add to vars
    $this->vars['collections'] = $collections->get();  
        
    //return back()
    return $this->vars;

        
    }

    //View My Collections
    public function mycollectionsByParentId(Request $request, $parentId)
    {
    
    //variables
    $user_id=Auth::user()->id;

    //get users collections     
    $collections = User::find($user_id)
        ->collection()->where('parent_id', '=', $parentId)
        ->orderBy('id','DESC');

    //add to vars
    $this->vars['collections'] = $collections->get();  
        
    //return back()
    return $this->vars;

        
    }
    
    
    
    //User Collection
    public function user(Request $request,$userid)
    { 
    //get users collections     
    $this->vars['collections'] = User::find($userid)->collection()->orderBy('collections.id','DESC')->withCount('link')->get();
   
    //iseditable
    if (Auth::check())
    {
        $user_id=Auth::user()->id;
        if($user_id==$userid){
            $this->vars['isEditable'] = true;
        }
    }
        
    //return back()
    return $this->vars;
        
        
        
        
        
    }




    //View Single Collection 
    public function getcollection(Request $request, $collectionid)
    {
        
    //get all
    $collections = Collection::find($collectionid);    
    $this->vars['collection'] = $collections;  

   
        
    //return
    return $this->vars;  
        
        
    }


    //View Single Collection by hash
    public function getcollectionbyhash(Request $request, $collectionid)
    {
        //decode
        $decodedId = HashUrl::decode($collectionid);

        //get all links
        $links = Collection::find($decodedId);    
        $this->vars['collection'] = $links;  

        // get collections
        $user_id=Auth::user()->id; 
        $collections = User::find($user_id)
            ->collection()->where('parent_id', '=', $decodedId)
            ->orderBy('id','DESC');
        $this->vars['collections'] = $collections;

        //return
        return $this->vars;      
        
    }





    //Collection Update
    public function update(Request $request)
    {
    
    //variables
    $collectionid = $request['collectionid'];
        
    //get collection and update visit
    $collection = Collection::find($collectionid);
    $collection->name = $request['name'];     
    $collection->save();   
        
        
    //return data
    $this->vars['updated'] = true;             
        
    //return
    return $this->vars;
        
        
    }




       //Colleciton Delete
       public function delete(Request $request, $collectionid)
       {
           
       //get collection and delete
       $collection = Collection::find($collectionid); 
       $collection->delete();   
        
       //return data
       $this->vars['deleted'] = true;             
        
       //return
       return $this->vars;
              
       }
    



       //Collection link detach
       public function deletelinkcollection(Request $request, $collectionid, $linkid)
       {
           
       //get collection and delete
       $collection = Collection::find($collectionid);
       $collection->link()->detach($linkid);
    
       //return data
       $this->vars['deleted'] = true;             
        
       //return
       return $this->vars;  
           
       }
    
    

    //Upload Image
    public function upload(Request $request)
    {
        if ($request->hasFile('photo')) {
            if ($request->file('photo')[0]->isValid()) {

                $saved = $request->file('photo')[0]->store('public/images');
                $url = Storage::url($saved);

                //variables
                $collectionid = $request['collectionid'];
                    
                //get link and update visit
                $link = Collection::find($collectionid);
                $link->image = $url;     
                $link->save();   
                    
                    
                //return data
                $this->vars['uploaded'] = true;             

            }
            //return data
            $this->vars['uploaded'] = false;
        } else {
              
            //return data
            $this->vars['uploaded'] = false;
        }

        //return
        return $this->vars;
    }
    
    


      
    //Recent Collections
    public function recent(Request $request)
    {
        
    //get all users        
    $this->vars['collections'] = Collection::with(['privacy'])
                                ->whereHas('privacy',function ($query) {
                                    $query->where('name', '=', 'Public');
                                })
                                ->limit(6)
                                ->orderBy('id','DESC')
                                ->get();    
  

        
    //return back()
    return $this->vars;
        
    } 


    //Collection move
    public function move(Request $request, $collectionid, $parentid)
    {
    
        //get collection and update parent id
        $collection = Collection::find($collectionid);
        $collection->parent_id = $parentid;     
        $collection->save();   
            
        //return data
        $this->vars['updated'] = true;             
            
        //return
        return $this->vars;
        
    }
    
    
    
}
