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


// page accueil & formulaire accueil
Route::get('/', 'App\Http\Controllers\HomeController@index');
Route::post('/','App\Http\Controllers\HomeController@index');
// page se connecter
Route::get('/signin', 'App\Http\Controllers\UserController@signin');
Route::post('/signin', 'App\Http\Controllers\UserController@signin');
// page s'inscrire
Route::get('/signup', 'App\Http\Controllers\UserController@signup');
Route::post('/signup', 'App\Http\Controllers\UserController@signup');
// page modifier son profil
Route::get('/user', 'App\Http\Controllers\UserController@user');
Route::post('/user', 'App\Http\Controllers\UserController@user');
// page carte et affichage liste evenements & formulaire recherche evenement
Route::get('/map', 'App\Http\Controllers\MapController@index');
Route::post('/map', 'App\Http\Controllers\MapController@index');






