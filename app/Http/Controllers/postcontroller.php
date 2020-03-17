<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
class postcontroller extends Controller
{
       public function show_posts(){
 $p=DB::table('trainees')->join('follows','trainees.trainee_id','follows.trainee_id')->join('coaches','coaches.coach_id','follows.coach_id')
  ->join('posts','coaches.coach_id','posts.coach_id')->where('trainees.trainee_id','1')->select('posts.post_description','posts.post_media','coaches.coach_name')->get(); 
      $arr=Array('posts'=>$p);
       return view('home',$arr) ;
   }
}