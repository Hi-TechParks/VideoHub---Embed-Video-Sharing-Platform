<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Home Route
Route::get('/', 'HomeController@index')->name('home');

// Video Routes
Route::get('/videos', 'VidoesController@index');
Route::get('/video/category/{id}', 'VidoesController@category');
Route::get('/video/{id}', 'VidoesController@show');

// Search Route
Route::get('/search', 'SearchController@index')->name('search');
Route::get('/search/{slug}', 'SearchController@tag')->name('tag.search');

// Filter Route
Route::get('/filter/latest-videos', 'FilterController@latest');
Route::get('/filter/featured-videos', 'FilterController@featured');
Route::get('/filter/most-viewed', 'FilterController@mostViewed');
Route::get('/filter/most-liked', 'FilterController@mostLiked');
Route::get('/filter/most-commented', 'FilterController@mostCommented');
Route::get('/filter/full-hd', 'FilterController@quality');

// Comment Route
Route::post('/video-comment', 'CommentController@store')->name('user.comment.store');

// Contact Route
Route::get('/contact', 'ContactController@index');
Route::post('/contact', 'ContactController@sendMail');

// Rating By Ajax
Route::get('/video-like','RatingController@like');
Route::get('/video-dislike','RatingController@dislike');


// Auth Routes
//Auth::routes();
Auth::routes(['register' => false]);

// Admin Routes
Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function()
{
    // Dashboard Route
    Route::get('/', 'Admin\DashboardController@index')->name('dashboard.index');
    Route::get('dashboard', 'Admin\DashboardController@index')->name('dashboard.index');

    // Admin Routes
    Route::resource('video-category', 'Admin\VideoCategoryController');
    Route::resource('video', 'Admin\VideoController');
    Route::resource('comment', 'Admin\CommentController');
    Route::resource('tag', 'Admin\TagController');
    Route::resource('ad', 'Admin\AdController');
    Route::resource('file-upload', 'Admin\FileUploadController');

    // Setting Routes
    Route::get('setting', 'Admin\SettingController@index')->name('setting.index');
    Route::post('siteinfo', 'Admin\SettingController@siteInfo')->name('setting.siteinfo');
    Route::post('contactinfo', 'Admin\SettingController@contactInfo')->name('setting.contactinfo');
    Route::post('changepass', 'Admin\SettingController@changePass')->name('setting.changepass');
    Route::post('socialinfo', 'Admin\SettingController@socialInfo')->name('setting.socialinfo');
});
