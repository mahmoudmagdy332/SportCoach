<?php

namespace App\Http\Controllers;
use App\Coach;
use App\Post;
use App\Comment;
<<<<<<< HEAD
use App\Question;
=======
>>>>>>> 15a78d0b45aa1d7883c0baa3216fdde888aba69e
use App\Utilities\Validator;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
class postcontroller extends Controller
{
       public function show_posts(){ 
             $e=session()->get('mode');
             if($e[0]['m']==0){
      $c= Coach::all();  
 //$c= Coach::join('posts','coaches.coach_id','posts.coach_id')->join('comments','posts.post_id','comments.post_id')->where('coaches.coach_id',); 
 $e=session()->get('user');
 $p=DB::table('trainees')->join('follows','trainees.trainee_id','follows.trainee_id')->join('coaches','coaches.coach_id','follows.coach_id')
  ->join('posts','coaches.coach_id','posts.coach_id')->where('trainees.trainee_id',$e[0]->trainee_id)->select('posts.post_description','posts.post_media','coaches.coach_name','posts.post_id')->get();
      $arr=Array('posts'=>$p,'coaches'=>$c);
       return view('home',$arr) ;
             }
             else{
                $e=session()->get('user');  
                $p= Post::where('coach_id',$e[0]->coach_id)->get();
                $arr=Array('posts'=>$p,'coach'=>$e);
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

<<<<<<< HEAD
    public function WriteComment(Request $request,$id){
=======
    public function WriteComment(Request $request){
>>>>>>> 15a78d0b45aa1d7883c0baa3216fdde888aba69e
           //only execute when POST

          $val= new Validator();
           if ($request->isMethod('POST')){
            if($val->validateCommentOrPost($request->input('description'))){
               $comment=new Comment();
               $comment->comment_description = $request->input('description');
<<<<<<< HEAD
               $comment->post_id=$id;
               $comment->trainee_id=session()->get('user')[0]->trainee_id;
           

               $comment->save();
          
           }}
 return redirect('/home') ;
   }
            public function search(Request $request){
          $q=$request['q'];
         if($q!="") {
             $p=DB::table('posts')->where('post_description','LIKE','%'.$q.'%')->get();
             if(count($p)>0){
                 return $p;
             }
         }
      }
      public function show_comments($id){
          
         $c= Comment::where('post_id',$id)->get();
           $arr=Array('comments'=>$c,'post'=>$id);
         return view('comment',$arr);
      }
=======
               $comment->comment_id=1;
               $comment->post_id=1;
               $comment->trainee_id=1;
               $comment->post_rank=1;

               $comment->save();
              //  $request->coach()->posts()->save($post);
           }}
           return view('home');
   }
>>>>>>> 15a78d0b45aa1d7883c0baa3216fdde888aba69e
}
