<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Collection extends Model
{
    //
    
    //fillable
    protected $fillable = ['name'];
    
    
    
    //relationships                                      
    public function link(){return $this->belongsToMany('App\Link');}   
    public function user(){return $this->belongsToMany('App\User');} 
    function privacy(){return $this->belongsTo('App\Privacy','privacy_id');}  
    
    
}
