<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers;

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

Route::get('/login', function () {
    return view('login');
});
Route::get('/add','postcontroller@WritePost');
Route::POST('/add','postcontroller@WritePost');
Route::get('/','user_controller@add_user');
Route::post('/','user_controller@add_user');
Route::get('/home','postcontroller@show_posts');
Route::post('/search','postcontroller@search');
