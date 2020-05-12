<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers;
use \App\Follow;
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
Route::post('/addComment','postcontroller@WriteComment');
Route::get('/','user_controller@add_user');
Route::post('/','user_controller@add_user');
Route::get('/home','postcontroller@show_posts');
Route::post('/search','postcontroller@search');
Route::post('/login','user_controller@login');
Route::get('/logout','user_controller@logout');
Route::post('/comment{id}','postcontroller@WriteComment');
Route::get('/comment{id}','postcontroller@show_comments');
Route::get('/follow/{id}', function ($id){
        $f=new Follow();
            $e=session()->get('user');
           $f->coach_id=$id;
           $f->trainee_id=$e[0]->trainee_id;
             $f->save();
          return redirect('home');
});
Route::get('/unfollow/{id}', function ($id){
          $e=session()->get('user');
 $f= Follow::where('trainee_id',$e[0]->trainee_id)->where('coach_id',$id)->delete();
 return redirect('home');
});
Route::get('profile{id}','user_controller@profile');

