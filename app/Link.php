<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    //fillable
    protected $fillable = ['url','user_id','site_id','title','description','image','visits'];
    
    
    
    
    //relationships
    public function user(){return $this->belongsTo('App\User','user_id');} 
    public function site(){return $this->belongsTo('App\Site');} 
    public function privacy(){return $this->belongsTo('App\Privacy','privacy_id');} 
    //public function labels(){return $this->belongsToMany('App\Label');} 
    
    
    
}





