<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use App\Utilities\Validator;
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
   public function WritePost(Request $request){
           //only execute when POST
           if ($request->isMethod('POST')){
               $post=new Post();
               $post->post_description = $request['description'];
               $post->coach_id=1;
               $post->save();
              //  $request->coach()->posts()->save($post);
           }
           return view('add_post');
   }

    public function WriteComment(Request $request){
           //only execute when POST

          $val= new Validator();
           if ($request->isMethod('POST')){
            if($val->validateCommentOrPost($request->input('description'))){
               $comment=new Comment();
               $comment->comment_description = $request->input('description');
               $comment->comment_id=1;
               $comment->post_id=1;
               $comment->trainee_id=1;
               $comment->post_rank=1;

               $comment->save();
              //  $request->coach()->posts()->save($post);
           }}
           return view('home');
   }
}
