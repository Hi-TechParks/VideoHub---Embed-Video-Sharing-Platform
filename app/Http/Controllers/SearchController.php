<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;
use App\Tag;
use Session;
use DB;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Videos                                
        $videos = DB::table('videos')
                    ->join('video_tags', 'video_tags.video_id', '=', 'videos.id')
                    ->join('tags', 'tags.id', '=', 'video_tags.tag_id')
                    ->select('videos.*')
                    ->where('videos.title', 'LIKE', '%'.$request->search.'%' )
                    ->orWhere('tags.title', 'LIKE', '%'.$request->search.'%' )
                    ->where('videos.status', '1')
                    ->orderBy('videos.id', 'desc')
                    ->distinct('videos.id')
                    ->paginate(16);

        // Search Keyword Display
        $search = $request->search;

        return view('search', compact('videos', 'search'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tag(Request $request, $slug)
    {
        // Videos                                
        $videos = DB::table('videos')
                    ->join('video_tags', 'video_tags.video_id', '=', 'videos.id')
                    ->join('tags', 'tags.id', '=', 'video_tags.tag_id')
                    ->select('videos.*')
                    ->where('tags.slug', $slug)
                    ->where('videos.status', '1')
                    ->orderBy('videos.id', 'desc')
                    ->distinct('videos.id')
                    ->paginate(16);

        // Search Tag Display
        $tags = Tag::where('slug', $slug)->take(1)->get();

        foreach($tags as $tag){
            $search = $tag->title;
        }


        // Increment Views
        $tagKey = 'tag_' . $slug;

        if (!Session::has($tagKey)) {
            Tag::where('slug', $slug)->increment('views');
            Session::put($tagKey, 1);
        }

        return view('search', compact('videos', 'search'));
    }

}
