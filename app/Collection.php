<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\HashUrl;


class Collection extends Model
{
    //
    
    //fillable
    protected $fillable = ['name'];

    //appends
    protected $appends = ['url_hash'];
    
    
    
    //relationships                                      
    public function link(){return $this->belongsToMany('App\Link');}   
    public function user(){return $this->belongsToMany('App\User');} 
    function privacy(){return $this->belongsTo('App\Privacy','privacy_id');}  
    

    // getters
    // public function getUrlHashAttribute(){
    //     return "{$this->id} should be hashed";
    //     //return HashUrl::decode($this->id);
    // }
    public function getUrlHashAttribute()
{
    return HashUrl::encode($this->id);
}
    
}
