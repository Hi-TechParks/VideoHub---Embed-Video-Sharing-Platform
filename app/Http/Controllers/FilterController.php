<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;
use App\Tag;
use Session;
use DB;

class FilterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function latest(Request $request)
    {                               
        // Videos
        $videos = Video::where('status', '1')
                        ->orderBy('id', 'desc')
                        ->paginate(16);

        // Filter Display
        $filter = "Latest Videos";

        return view('filter', compact('videos', 'filter'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function featured(Request $request)
    {                               
        // Videos
        $videos = Video::where('featured', '1')
                        ->where('status', '1')
                        ->orderBy('id', 'desc')
                        ->paginate(16);

        // Filter Display
        $filter = "Featured Videos";

        return view('filter', compact('videos', 'filter'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mostViewed(Request $request)
    {                               
        // Videos
        $videos = Video::where('status', '1')
                        ->orderBy('views', 'desc')
                        ->orderBy('id', 'desc')
                        ->paginate(16);

        // Filter Display
        $filter = "Most Viewed";

        return view('filter', compact('videos', 'filter'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mostLiked(Request $request)
    {                               
        // Videos
        $videos = Video::where('status', '1')
                        ->orderBy('like', 'desc')
                        ->orderBy('id', 'desc')
                        ->paginate(16);

        // Filter Display
        $filter = "Most Liked";

        return view('filter', compact('videos', 'filter'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mostCommented(Request $request)
    {                               
        // Videos
        $videos = Video::where('status', '1')
                        ->withCount('comments')
                        ->orderBy('comments_count', 'desc')
                        ->orderBy('id', 'desc')
                        ->paginate(16);

        // Filter Display
        $filter = "Most Commented";

        return view('filter', compact('videos', 'filter'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function quality(Request $request)
    {                               
        // Videos
        $videos = Video::where('quality', '1')
                        ->where('status', '1')
                        ->orderBy('id', 'desc')
                        ->paginate(16);

        // Filter Display
        $filter = "HD Videos";

        return view('filter', compact('videos', 'filter'));
    }

}
