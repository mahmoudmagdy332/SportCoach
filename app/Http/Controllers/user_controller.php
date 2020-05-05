<?php

namespace App\Http\Controllers;
use \Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Utilities\Validator;
use App\Coach;
use App\Trainee;
use \App\Follow;
       
class user_controller extends Controller
{
  public function add_user(Request $req){
        $nameErr=$emailErr=$passErr=$ageErr="";
        if($req->isMethod('post')){
    $user1 = Coach::where('coach_email',$req->input('email'))->first();
    $user2 = Trainee::where('trainee_email',$req->input('email'))->first();
    if ($user1 != null &&$user2 != null) {
  $emailErr="This site already exists";
}
 $v=new Validator();
   if($v->validateUsername($req->input('name'))==false){
      $nameErr="Only letters and white space allowed in user name";

  }
     if($v->validateEmail($req->input('email'))==false){
           $emailErr="email is wrong";

  }
       if($v->validatePassword($req->input('pass'))==false){
          $passErr="Password is weak";
  }
         if($v->validateAge($req->input('age'))==false){
           $ageErr="age is wrong";
  }

       if($nameErr==""&&$emailErr==""&&$passErr==""&&$ageErr=="")  {
       if($req->input('place')=="coach"){
            $u=new Coach();
            $u->coach_name=$req->input('name');
            $u->coach_email=$req->input('email');
            $u->coach_pass=$req->input('pass');
            $u->coach_age=$req->input('age');
            $u->coach_gender=$req->input('gender');
            $u->save();
            }
            else{
            $u=new Trainee();
            $u->trainee_name=$req->input('name');
            $u->trainee_email=$req->input('email');
            $u->trainee_pass=$req->input('pass');
            $u->trainee_age=$req->input('age');
            $u->trainee_gender=$req->input('gender');
            $u->save();
            }
            return redirect('/home');
       }
       else{
           $arr=array('ne'=>$nameErr,'ee'=>$emailErr,'pe'=>$passErr,'ae'=>$ageErr);
           return view('welcome',$arr);

       }
         }
      else{
       $arr=array('ne'=>$nameErr,'ee'=>$emailErr,'pe'=>$passErr,'ae'=>$ageErr);
      return view('welcome',$arr);

  }
}
     public function login(Request $req){

          $uc = Coach::where('coach_email',$req->input('email'))->where('coach_pass',$req->input('pass'))->first();
          $ut = Trainee::where('trainee_email',$req->input('email'))->where('trainee_pass',$req->input('pass'))->first();
          if($uc ==null && $ut==null){
              return view('login');
          }
          else{
              if($uc !=null){
              session()->push("user", $uc);
              session()->push("mode", ['m'=>1]);
               $e=session()->get('mode');
              }
              if($ut!=null) {
                session()->push("user", $ut);
               
               session()->push("mode", ['m'=>0]);
               $e=session()->get('mode');
               }
             //return $e[0]['m'];
              return redirect('/home');

     }}

   public function logout(){
           session()->forget('user');
            session()->forget('mode');
           return redirect('/login');
       }

       public function follow($id){
           $f=new Follow();
            $e=session()->get('user');
           $f->coach_id=$id;
           $f->trainee_id=$e[0]->trainee_id;
             $f->save();
           return redirect('profile'.$id);
            //  return $id;
       }
   

       public function profile($id){
     $e=session()->get('user');
 $f= \App\Follow::where('trainee_id',$e[0]->trainee_id)->where('coach_id',$id)->first();
 $arr=Array('follow'=>$f,'id'=>$id);
        return view('profile',$arr);
//if($f==null){$r=1;}else{$r=0;}
    //return $r;
       }

}
