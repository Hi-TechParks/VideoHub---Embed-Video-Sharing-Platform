<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //

    public function video()
    {
    	return $this->belongsTo('App\Video', 'video_id');
    }
}
