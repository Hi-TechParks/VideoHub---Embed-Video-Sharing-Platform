<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;
use App\VideoCategory;
use App\VideoTag;
use App\Comment;
use Session;
use DB;

class VidoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Videos                                
        $videos = Video::where('status', '1')
                        ->orderBy('id', 'desc')
                        ->paginate(16);

        return view('videos', compact('videos'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function category($id)
    {
        // Videos                                
        $videos = Video::where('category_id', $id)
                        ->where('status', '1')
                        ->orderBy('id', 'desc')
                        ->paginate(16);

        // Category
        $category = VideoCategory::find($id);

        return view('category', compact('videos', 'category'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Increment Views
        $videoKey = 'video_' . $id;

        if (!Session::has($videoKey)) {
            Video::where('id', $id)->increment('views');
            Session::put($videoKey, 1);
        }

        
        // Videos                                
        $videos = Video::where('id', $id)
                        ->where('status', '1')
                        ->get();

        // Video Tags
        $video_tags = VideoTag::where('video_id', $id)->get();

        // Related Lists
        foreach( $videos as $video ){
            $cat_id = $video->category_id;
        }
        $related_videos = Video::where('category_id', $cat_id)
                        ->where('id', '!=', $id)
                        ->where('status', '1')
                        ->orderBy('id', 'desc')
                        ->take(12)
                        ->get();

        // Comments                                
        $comments = Comment::where('video_id', $id)
                            ->where('status', '1')
                            ->orderBy('id', 'desc')
                            ->get();


        return view('video', compact('videos', 'video_tags', 'related_videos', 'comments'));
    }
}
