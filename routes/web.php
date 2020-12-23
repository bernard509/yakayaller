<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapController;

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

Route::get('/user', function () {
    return view('user');
});

Route::get('/map', 'App\Http\Controllers\MapController@index');
Route::get('/home', 'App\Http\Controllers\HomeController@index');
Route::get('/profil', 'App\Http\Controllers\ProfilController@index');

Route::post('/map', 'App\Http\Controllers\MapController@index');


