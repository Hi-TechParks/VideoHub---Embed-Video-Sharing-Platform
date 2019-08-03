<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Setting;
use App\Social;
use App\VideoCategory;
use App\Tag;
use App\Ad;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);


        // Share view for Common Data
        $settings = Setting::where('status', '1')->get();
        $categories = VideoCategory::where('status', '1')->orderBy('title', 'asc')->get();
        $socials = Social::where('status', '1')->get();
        $tags = Tag::where('status', '1')->orderBy('views', 'desc')->get();
        $popular_tags = Tag::where('status', '1')->orderBy('views', 'desc')->take(10)->get();
        $ads = Ad::where('status', '1')->get();


        View::share(['settings' => $settings, 'categories' => $categories, 'socials' => $socials, 'tags' => $tags, 'popular_tags' => $popular_tags, 'ads' => $ads]);

    }
}
