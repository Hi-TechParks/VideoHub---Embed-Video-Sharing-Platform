<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //

    public function category()
    {
        return $this->belongsTo('App\VideoCategory', 'category_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment', 'video_id', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'video_tags', 
          'video_id', 'tag_id');
    }
}
