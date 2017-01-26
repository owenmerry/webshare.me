<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\User;
use App\Link;
use App\Website;
use App\Site;
use App\Collection;

class linkController extends Controller
{
   
    
    
    
    
    //Create link
    public function create(Request $request)
    {
        
    //get all users        
    $this->vars['users'] = User::where("id",1)->first();    

    //results   
    //return $this->vars;
    //return "worked". $request['website'] ;  
      
        
        //variables
        $url=$request['website'];
        //$url="http://www.webydo.com/";
        $user_id=Auth::user()->id;
        //$user_id=1;
        $title="";
        $description="";
        $image="";
        
        //validate
        /*$this->validate($request, [
            'url' => 'required',
        ]);
        */
        
        
        //get website data
        $getwebdata = Website::getWebsiteData($url); 
        
        $title=$getwebdata['title'];
        $description=$getwebdata['description'];
        $image=$getwebdata['image'];
        $domain=$getwebdata['domain'];
        
        


        
        
        
       // print_r($getwebdata['title']->getElementsByTagName('h1'));
        
        
        //add site
        $site = Site::firstOrCreate(array('name' => $domain));
        
        
        
        //add link
        $input = 
        [
            'url' => $url,
            'site_id' => $site->id,
            'user_id' => $user_id,
            'title' => $title,
            'description' => $description,
            'image' => $image,
        ];
        
        //create
        $link_create = Link::create($input); 
        $link_info='Link added';
        
        
        /*
        if($request['collection_id']){
        $collection = Collection::find($request['collection_id']);
        $collection->link()->attach($link_create->id);
        $link_info='Link added to '. $collection->name .' collection';
        }
        */
        
        
        //add to collection
        
        if($request['collection_id']){
        $collection = Collection::find($request['collection_id']);
        $collection->link()->attach($link_create->id);
        }
        
        
        //return back()
        return "added";
        
        //return $getwebdata;
        
        
    }
    
    
    
    
    
    
    
    
    
    
    
    //View Links
    public function all(Request $request)
    {
        
    //get all users
    $links = Link::with('site')->orderby('created_at','desc')->get();    
    $this->vars['links'] = $links;   

   
        
        //return
        return $this->vars;
        
        
        
        
        
    }
    
    
    //Collection Links
    public function collection(Request $request, $collectionid)
    {
        
    //get collection links
    $links = Collection::find($collectionid)->link()->orderBy('id','DESC')->get();
    $this->vars['links'] = $links;
        
    //return
    return $this->vars;
        
        
    }
        
    
    //Links add a view
    public function visit(Request $request, $linkid)
    {
        
    //get link and update visit
    $links = Link::find($linkid);
    $links->visits = $links->visits +1;   
    $links->save();   
        
        
    //return
    return "updated";
        
        
    }
    
    //Links for a user
    public function user(Request $request, $userid)
    {
        
    //get user links
    $links = Link::where('user_id',$userid)->get();
    $this->vars['links'] = $links;   
        
        
    //return
    return $this->vars;
        
        
    }
    
    
    
    
    
    
    
    
        //View Links
    public function test(Request $request)
    {
        
    //get all users
    $links = Link::with('site')->get();    
    $this->vars['links'] = $links;   

   
        
        //return back()
        return $this->vars;
        
        
        
        
        
    }
    
    
    
    
     //search users
    public function search(Request $request)
    {
        //get search string
        $search = "%". $request['search'] ."%";
        
        //get link details        
        $this->vars['links'] = Link::where('url','LIKE',$search)
            ->orwhere('title','LIKE',$search)
            ->orwhere('description','LIKE',$search)
            ->get(); 
        
    
        return $this->vars;
        
    }
    
    
    
    
    
    
    
    
}
