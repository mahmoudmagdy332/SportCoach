<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
       public $table="posts";
    public function coach(){
        return $this->belongsTo('App\Coach');
    }
    public function comments(){
        return $this->hasMany('App\Comment');
    }
}