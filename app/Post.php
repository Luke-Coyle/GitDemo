<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function admin(){
        return $this->belongsTo('App\Admin');
    }

    public function comments()
    {
        return $this-> hasMany('App\Comment');
    }
}
