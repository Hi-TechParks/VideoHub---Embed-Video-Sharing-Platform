<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //

    public function videos()
    {
        return $this->belongsToMany('App\Video', 'video_tags', 
          'tag_id', 'video_id');
    }

    public function videoTags()
    {
    	return $this->hasMany('App\VideoTag', 'tag_id', 'id');
    }
    
}
