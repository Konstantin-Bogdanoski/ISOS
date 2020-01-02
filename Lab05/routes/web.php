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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::bind('vehicles', function ($value, $route) {
    return App\Vehicle::whereSlug($value)->first();
});

Route::bind('companies', function ($value, $route) {
    return App\Company::whereSlug($value)->first();
});


Route::resource('companies', 'CompanyController');

Route::resource('companies.vehicles', 'VehicleController');

