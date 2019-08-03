<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Video;
use App\VideoCategory;
use App\Tag;
use App\Comment;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Page Data
        $this->title = 'Dashboard';
        $this->url = 'dashboard';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = $this->title;
        $url = $this->url;

        $videos = Video::all();
        $views = Video::sum('views');
        $likes = Video::sum('like');
        $comments = Comment::all();

        return view('admin.index', compact('title', 'url', 'videos', 'views', 'likes', 'comments'));
    }
}
