<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    public $table="coaches";
    public function posts(){
        return $this->hasMany('App\Post');
    }
    public function answers(){
        return $this->hasMany('App\Answer');
    }
}
