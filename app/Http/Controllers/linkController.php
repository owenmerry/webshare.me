<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Storage;

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
    
    
    
    
    
    
    //Create link for many
    public function createmany(Request $request)
    {
        
        ini_set('max_execution_time', 900);
        
        
        // seperate list
        $linklist_data  = $request['website'];
        $linklist_ary = explode(",", $linklist_data);
        
        
        
        //get users account        
        $this->vars['users'] = User::where("id",1)->first(); 
        
        
        //run through list
        foreach ($linklist_ary as &$linklist_url) {   
      
        
        //variables
        $url=$linklist_url;
        $user_id=Auth::user()->id;
        $title="";
        $description="";
        $image="";
        
        
        //get website data
        $getwebdata = Website::getWebsiteData($url); 
        
        //set variables
        $title=substr($getwebdata['title'], 0, 250);
        $description=substr($getwebdata['description'], 0, 250);
        $image=$getwebdata['image'];
        $domain=$getwebdata['domain'];
            
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
        $link_create = Link::firstOrCreate($input); 
        $link_info='Link added';
        
        
        //add to collection
        if($request['collection_id']){
        $collection = Collection::find($request['collection_id']);
        $collection->link()->attach($link_create->id);
        }
            
            
            
        };

        
     
            
            
        
        
        return "added";
                
        
    }
    
    
    
    
    
    
    //get data
    public function getdata(Request $request)
    {
        
        ini_set('max_execution_time', 900);
        
        
        // seperate list
        $linklist_data  = "http://flatuicolors.com/";
        //$linklist_data  = "https://www.templatemonster.com/wordpress-themes.php";
        $linklist_data  = "https://themeforest.net/tags/monster";
        $linklist_ary = explode(",", $linklist_data);
        
        
        
        //get users account        
        $this->vars['users'] = User::where("id",1)->first(); 
        
        
        //run through list
        foreach ($linklist_ary as &$linklist_url) {   
      
        
        //variables
        $url=$linklist_url;
        //$user_id=Auth::user()->id;
        $title="";
        $description="";
        $image="";
        
        
        //get website data
        $getwebdata = Website::getWebsiteData($url); 
        
        //set variables
        //$title=substr($getwebdata['title'], 0, 250);
        $description=substr($getwebdata['description'], 0, 250);
        $image=$getwebdata['image'];
        $domain=$getwebdata['domain'];
        
            
        echo "<div>title:". $getwebdata['title'] ."</div>";
        //echo "<div>". $title ."</div>";
        echo "<div>". $description ."</div>";
        echo "<div>". $image ."</div>";
        echo "<div>". $domain ."</div>";
        echo "<div><img src='". $image ."' /></div>";
            

        }
            

                
        
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
    
    //View Single Link 
    public function getLink(Request $request, $linkid)
    {
        
    //get all users
    $links = Link::find($linkid);    
    $this->vars['link'] = $links;   

   
        
    //return
    return $this->vars;  
        
        
    }
    
    
    //Collection Links
    public function collection(Request $request, $collectionid)
    {
        
    //get collection links
    $links = Collection::find($collectionid)->link()->orderBy('id','DESC')->get();
    $this->vars['links'] = $links;
        
    //get collection data    
    $collection = Collection::find($collectionid);
    $this->vars['collection'] = $collection;

    //return
    return $this->vars;
        
        
    }
    
    
    //Link Update
    public function update(Request $request)
    {
    
    //variables
    $linkid = $request['linkid'];
        
    //get link and update visit
    $link = Link::find($linkid);
    $link->title = $request['title'];   
    $link->description = $request['description'];   
    $link->url = $request['url'];   
    $link->save();   
        
        
    //return
    return "updated";
        
        
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
    
    
    
    
    //Links for logged in user
    public function mylinks(Request $request)
    {
        
    //variables
     $user_id=Auth::user()->id;
        
    //get user links
    $links = Link::where('user_id',$user_id)->orderBy('id','DESC')->get();
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
    
    


        //Link Delete
        public function delete(Request $request, $linkid)
        {
            
        //get link and delete
        $link = Link::find($linkid); 
        $link->delete();   
            
        //return
        return "deleted";
            
            
        }
    
    


    //Upload Image
    public function upload(Request $request)
    {
        //return $request->username;
        if ($request->hasFile('photo')) {
            if ($request->file('photo')[0]->isValid()) {

                $saved = $request->file('photo')[0]->store('public/images');
                $url = Storage::url($saved);

                //variables
                $linkid = $request['linkid'];
                    
                //get link and update visit
                $link = Link::find($linkid);
                $link->image = $url;     
                $link->save();   
                    
                    
                //return
                return "updated";





            }
            

            return "file found and stored - " . $url;
        }else{
            return "file not found";
        }

    }
    
    
    
    
}
