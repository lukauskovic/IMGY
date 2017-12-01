<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function comments()
    {
        return $this->hasMany('App\Comment', 'image_id');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag','images_tags','image_id');
    }
}
