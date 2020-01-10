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

Route::resource('products', 'ProductsController');
Route::resource('products.preorders', 'PreordersController');

Route::bind('products', function ($value, $route) {
    return App\Product::whereSlug($value)->first();
});

Route::bind('preorders', function ($value, $route) {
    return App\Preorder::whereSlug($value)->first();
});
