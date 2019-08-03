<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;
use Session;
use DB;

class RatingController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function like(Request $request)
    {
        
        // must use get option for get data from ajax
        $video_id = $request->get('video_id');

        Video::where('id', $video_id)->increment('like');

        // video
        $videos = Video::where('id', $video_id)->get();

        foreach($videos as $video){

            //$data ='<i class="fa fa-thumbs-up" aria-hidden="true"></i>'.$video->like;
            $data ='<span class="meta-i rated" id="video_like">
                  <i class="fa fa-thumbs-up" aria-hidden="true"></i>'.$video->like.'</span>
                  <span class="meta-i" id="video_dislike">
                  <i class="fa fa-thumbs-down" aria-hidden="true"></i>'.$video->dislike.'</span>';

        }

        
        // Send data directly controller to view using json
        return response()->json(['values'=> $data]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function dislike(Request $request)
    {
        
        // must use get option for get data from ajax
        $video_id = $request->get('video_id');

        Video::where('id', $video_id)->increment('dislike');

        // video
        $videos = Video::where('id', $video_id)->get();

        foreach($videos as $video){

            //$data ='<i class="fa fa-thumbs-down" aria-hidden="true"></i>'.$video->dislike;
            $data ='<span class="meta-i" id="video_like">
                  <i class="fa fa-thumbs-up" aria-hidden="true"></i>'.$video->like.'</span>
                  <span class="meta-i rated" id="video_dislike">
                  <i class="fa fa-thumbs-down" aria-hidden="true"></i>'.$video->dislike.'</span>';

        }

        
        // Send data directly controller to view using json
        return response()->json(['values'=> $data]);
    }

}
