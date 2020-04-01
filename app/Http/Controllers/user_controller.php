<?php

namespace App\Http\Controllers;
use \Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Utilities\Validator;
use App\Coach;
class user_controller extends Controller
{
  public function add_user(Request $req){
        $nameErr=$emailErr=$passErr=$ageErr="";
        if($req->isMethod('post')){
    $user = Coach::where('coach_email',$req->input('email'))->first();
    if ($user != null) {
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
            $u=new Coach();
            $u->coach_name=$req->input('name');
            $u->coach_email=$req->input('email');
            $u->coach_pass=$req->input('pass');
            $u->coach_age=$req->input('age');
            $u->coach_gender=$req->input('gender');
            $u->save();
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
}