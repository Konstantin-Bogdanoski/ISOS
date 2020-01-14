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

Route::get('/', function () {
    return view('welcome');
});

Route::bind('blogs', function ($value, $route) {
    return App\Blog::where('id', $value);
});

Route::bind('blogs.comments', function ($value, $route) {
    return App\Comment::where('id', $value);
});

Route::bind('blogs.images', function ($value, $route) {
    return App\Image::where('id', $value);
});

Route::resource('blogs', 'BlogsController');

Route::resource('blogs.comments', 'CommentsController');

Route::resource('blogs.images', 'ImagesController');
