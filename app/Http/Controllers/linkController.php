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
use App\HashUrl;

class linkController extends Controller
{
   
    
    
    
    
    //Create link
    public function create(Request $request)
    {
    
        
        //variables
        $url=$request['website'];
        $user_id=Auth::user()->id;
        $title="";
        $description="";
        $image="";


        //test data
        //$url="https://www.rte.ie/news/2020/0516/1138765-italy-coronavirus/";
        //$user_id=3;
        
        //validate
        /*$this->validate($request, [
            'url' => 'required',
        ]);
        */
        
        
        //get website data
        $getwebdata = Website::getWebsiteData($url); 
        
        $title = substr($getwebdata['showtitle'], 0, 240);
        $description=substr($getwebdata['showdescription'], 0, 240);
        $image=substr($getwebdata['showimage'], 0, 240);
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
        $input_check = 
        array(
            'url' => $url,
            'user_id' => $user_id,
        );
        
        //create
        $link_check = Link::where(['url' => $url,'user_id' => $user_id, ])->first();
        $exists = $link_check !== null;
        if(!$exists){
            $link_create = Link::create($input); 
            $this->vars['status'] = 'created';
        } else {
            $link_create = $link_check;
            $this->vars['status'] = 'existed';
        }
        $this->vars['link'] = $link_create;
        
        
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
        
        
        //return data    
        $this->vars['added'] = true;             
            
        //return
        return $this->vars;
        
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

        
     
            
        //return data    
        $this->vars['added'] = true;             
            
        //return
        return $this->vars;
                
        
    }
    

    
    
    
    //get data
    public function getdata(Request $request)
    {
        
        ini_set('max_execution_time', 900);
        
        
        // seperate list
        //$linklist_data  = "http://flatuicolors.com/";
        //$linklist_data  = "https://www.templatemonster.com/wordpress-themes.php";
        //$linklist_data  = "https://themeforest.net/tags/monster";
        $linklist_data  = $request['website'];
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

        return $getwebdata;
            

        }
            

                
        
    }
    
    
    
    
    
    
    
    
    
    
    
    //View Links
    public function all(Request $request)
    {
        
    //get all users
    $links = Link::with('site')->with('privacy')->orderby('created_at','desc')->get();    
    $this->vars['links'] = $links;   

   
        
        //return
        return $this->vars;
        
        
    }
    
    //View Single Link 
    public function getLink(Request $request, $linkid)
    {
        
    //get all users
    $links = Link::with('privacy')->find($linkid);    
    $this->vars['link'] = $links;   

   
        
    //return
    return $this->vars;  
        
        
    }
    
    
    //Collection Links
    public function collection(Request $request, $collectionid)
    {
        
    //get collection links
    $links = Collection::find($collectionid)->link()->with('site')->orderBy('id','DESC')->get();
    $this->vars['links'] = $links;
        
    //get collection data    
    $collection = Collection::find($collectionid);
    $this->vars['collection'] = $collection;

    //get user data    
    $this->vars['user'] = $collection->user;

    //return
    return $this->vars;
        
        
    }


    //Collection Links
    public function collectionbyhash(Request $request)
    {
    $decodedId = HashUrl::decode($request['collectionid']);
        
    //get collection links
    $links = Collection::find($decodedId)->link()->with('site')->orderBy('id','DESC')->get();
    $this->vars['links'] = $links;
        
    //get collection data    
    $collection = Collection::find($decodedId);
    $this->vars['collection'] = $collection;

    //get user data    
    $this->vars['user'] = $collection->user;

    //editable
    if (Auth::check())
    {
        $user_id=Auth::user()->id;
        if($user_id==$collection->user[0]->id){
            $this->vars['isEditable'] = true;
        }
    }

    //return
    return $this->vars;
        
        
    }


    //Add Link to Collection
    public function linktocollection(Request $request, $linkid, $collectionid)
    {
        
    //get collection links
    $collection = Collection::find($collectionid);
    $collection->link()->attach($linkid);

    //return data    
    $this->vars['added'] = true;             
        
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
    $link->image = $request['image'];   
    $link->privacy_id = $request['privacy'];   
    $link->save();   
        
        
    //return data    
    $this->vars['updated'] = true;             
    
    //return
    return $this->vars;
        
        
    }

        //Link Update
        public function refresh(Request $request, $linkid)
        {

        //get website data
        $link = Link::find($linkid);
        $getwebdata = Website::getWebsiteData($link->url); 
        
        $title = substr($getwebdata['showtitle'], 0, 240);
        $description=substr($getwebdata['showdescription'], 0, 240);
        $image=substr($getwebdata['showimage'], 0, 240);
        $domain=$getwebdata['domain'];
            
        //get link and update visit
        $link->title = $title;   
        $link->description = $description;   
        $link->image = $image;  
        $link->save();   
            
            
        //return data    
        $this->vars['updated'] = true;             
        
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
        
        
    //return data    
    $this->vars['added'] = true;             
    $this->vars['visits'] = $links->visits +1;             
        
    //return
    return $this->vars;
        
        
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
    if (Auth::check())
    {
     $user_id=Auth::user()->id;
     $search = $request['search'];
        
    //get user links
    $links = Link::where('user_id',$user_id)->with('site')->with('privacy'); 
        

    //filter with search
    if($search){
        $search = "%". $request['search'] ."%"; 
        $links = $links->where('url','LIKE',$search)
        ->orwhere('title','LIKE',$search)
        ->orwhere('description','LIKE',$search);
    }

    //add to vars
    $this->vars['links'] = $links->get();  

        
    //return
    return $this->vars;
    }


        
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
            
        //return data    
        $this->vars['deleted'] = true;                      
            
        //return
        return $this->vars;
            
            
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
                    
                    
                //return data    
                $this->vars['added'] = true;    

            }

            //return data    
            $this->vars['added'] = false;   
        }
        else {
            //return data    
            $this->vars['added'] = false;   
        }                  
            
        //return
        return $this->vars;
    }
    
    


    //recent links
    public function recent(Request $request)
    {
            
    //get links
    $links = Link::with(['site','privacy'])
                    ->whereHas('privacy',function ($query) {
                        $query->where('name', '=', 'Public');
                    })
                    ->orderby('created_at','desc')
                    ->limit(6)
                    ->get();    
    $this->vars['links'] = $links;   
            
    //return
    return $this->vars;
    }
    
    
}
