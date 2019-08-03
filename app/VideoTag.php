<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoTag extends Model
{
    //

    public function tag()
    {
    	return $this->belongsTo('App\Tag', 'tag_id');
    }
}
