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

/**
 * @author Konstantin Bogdanoski (konstantin.b@live.com)
 */

Route::get('/', function () {
    return view('welcome');
});

Route::get('/news/top', 'NewsController@top')->name('news.top');

Route::bind('news', function ($value, $route) {
    return App\News::where('id', $value)->first();
});

Route::bind('news.comments', function ($value, $route) {
    return App\Comment::where('id', $value)->first();
});

Route::resource('news', 'NewsController');

Route::resource('news.comments', 'CommentsController');
