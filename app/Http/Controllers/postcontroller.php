<?php

namespace App\Http\Controllers;
use App\Coach;
use App\Post;
use App\Comment;
use App\Like;

use App\Question;


use App\Utilities\Validator;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
class postcontroller extends Controller
{
       public function show_posts(){
             $e=session()->get('mode');
             if($e[0]['m']==0){
   
      $c= Coach::all()->take(3);  
 //$c= Coach::join('posts','coaches.coach_id','posts.coach_id')->join('comments','posts.post_id','comments.post_id')->where('coaches.coach_id',); 

      $c= Coach::all();
 //$c= Coach::join('posts','coaches.coach_id','posts.coach_id')->join('comments','posts.post_id','comments.post_id')->where('coaches.coach_id',);

 $e=session()->get('user');
 $p=DB::table('trainees')->join('follows','trainees.trainee_id','follows.trainee_id')->join('coaches','coaches.coach_id','follows.coach_id')
  ->join('posts','coaches.coach_id','posts.coach_id')->leftjoin('likes',function($join){
          $join->on('likes.post_id','=','posts.post_id');
          $join->on('trainees.trainee_id','=','likes.trainee_id');
  
  })->where('trainees.trainee_id',$e[0]->trainee_id)
         ->select('posts.post_description','posts.post_media','coaches.coach_name','posts.post_id','posts.post_rank','likes.like','likes.dislike')->get();
      $arr=Array('posts'=>$p,'coaches'=>$c);
        return view('home',$arr) ;
             }
             else{
                $e=session()->get('user');
                $p= Post::where('coach_id',$e[0]->coach_id)->get();
                $arr=Array('posts'=>$p,'coach'=>$e[0]);
       return view('home',$arr) ;
             }
   }
   public function WritePost(Request $request){
           //only execute when POST

           if ($request->isMethod('POST')){
                $e=session()->get('mode');
             if($e[0]['m']==1){
           $e=session()->get('user');
               $post=new Post();
               $post->post_description = $request['description'];
               $post->post_media = $request['file'];
               $post->coach_id=$e[0]->coach_id;
               $post->save();
             }
             else{
               $e=session()->get('user');
               $question=new Question();
               $question->question_description = $request['description'];
               $question->question_media = $request['file'];
               $question->trainee_id=$e[0]->trainee_id;
               $question->save();
             }
           }
           return view('add_post');
   }




    public function WriteComment(Request $request,$id){

           //only execute when POST

           if ($request->isMethod('POST')){
            if(Validator::validateCommentOrPost($request->input('description'))){
               $comment=new Comment();
               $comment->comment_description = $request->input('description');

               $comment->post_id=$id;
               $comment->trainee_id=session()->get('user')[0]->trainee_id;


               $comment->save();

           }}
 return redirect('/home') ;
   }
            public function search(Request $request){
          $q=$request['q'];
         if($q!="") {
            $p=DB::table('coaches')->join('posts','coaches.coach_id','posts.coach_id')->leftJoin('likes','likes.post_id','posts.post_id') ->where('post_description','LIKE','%'.$q.'%')->get();
                 return view('search',['posts'=>$p]);
             
         }
      }
      public function show_comments($id){

         $c= Comment::where('post_id',$id)->get();
           $arr=Array('comments'=>$c,'post'=>$id);
         return view('comment',$arr);


      }
      public function like($id){
     $c=Like::where('trainee_id',session()->get('user')[0]->trainee_id)->where('post_id',$id)->get()->first();
     $p= Post::where('post_id',$id)->get()->first();

     
          if($c==null){
           $like=new Like();
               $like->like = true;
               $like->post_id=$id;
               $like->trainee_id=session()->get('user')[0]->trainee_id;
               $like->save();
               $r=$p->post_rank+1;
          }
          else{
             $like=Like::where('trainee_id',session()->get('user')[0]->trainee_id)->where('post_id',$id);
              if($like->get()[0]->like==1){
                  $like->update(['like'=>0]);
                   $r=$p->post_rank-1;
              }
              else{
                  if($like->get()[0]->dislike==1){
                      $r=$p->post_rank+2;
                  }
                  else {
                        $r=$p->post_rank+1;
                  }
                   $like->update(['like'=>1,'dislike'=>0]);
                
              }
          }
        Post::where('post_id',$id)->update(['post_rank'=>$r]);
       return redirect('/home');
      }
      public function dislike($id){
      $c=Like::where('trainee_id',session()->get('user')[0]->trainee_id)->where('post_id',$id)->get()->first();
           $p= Post::where('post_id',$id)->get()->first();
      if($c==null){
           $like=new Like();
               $like->dislike = true;
               $like->post_id=$id;
               $like->trainee_id=session()->get('user')[0]->trainee_id;
                $like->save();
                 $r=$p->post_rank-1;
          }
          else{
              $like=Like::where('trainee_id',session()->get('user')[0]->trainee_id)->where('post_id',$id);
              if($like->get()[0]->dislike==1){
                  $like->update(['dislike'=>0]);
                   $r=$p->post_rank+1;
              }
              else{
                  if($like->get()[0]->like==1){
                       $r=$p->post_rank-2; 
                  }
                  else{
                      $r=$p->post_rank-1; 
                  }
                   $like->update(['like'=>0,'dislike'=>1]);
              }
             
              
          }
         Post::where('post_id',$id)->update(['post_rank'=>$r]);
               return redirect('/home');

      }

}
