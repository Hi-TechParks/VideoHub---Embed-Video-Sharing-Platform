<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VideoCategory;
use App\Video;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Home Categories
        $home_categories = VideoCategory::where('home_flag', '1')
                                    ->where('status', '1')
                                    ->orderBy('title', 'asc')
                                    ->get();

        // Videos
        $videos = Video::where('status', '1')
                        ->orderBy('id', 'desc')
                        ->take(100)
                        ->get();

        // Featured
        $featureds = Video::where('featured', '1')
                        ->where('status', '1')
                        ->orderBy('id', 'desc')
                        ->take(16)
                        ->get();

        // Latests
        $latests = Video::where('status', '1')
                        ->orderBy('id', 'desc')
                        ->take(6)
                        ->get();

        // MostViewed
        $most_views = Video::where('status', '1')
                            ->orderBy('views', 'desc')
                            ->orderBy('id', 'desc')
                            ->take(6)
                            ->get();

        // MostLiked
        $most_likes = Video::where('status', '1')
                            ->orderBy('like', 'desc')
                            ->orderBy('id', 'desc')
                            ->take(6)
                            ->get();

        return view('index', compact('home_categories', 'videos', 'featureds', 'latests', 'most_views', 'most_likes'));
    }
}
