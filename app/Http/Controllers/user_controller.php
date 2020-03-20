<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utilities\Validator;
use App\Coach;
class user_controller extends Controller
{
  public function add_user(Request $req){
        $a="";
        if($req->isMethod('post')){
            $this->validate($req, [
              'name'  =>'required' 
              ,'email'  =>'required' 
            ]);
         $v=new Validator();
       if($v->validateUsername($req->input('name')) &&$v->validateEmail($req->input('email')) &&$v->validatePassword($req->input('pass')) &&$v->validateAge($req->input('age'))  )  { 
            $u=new Coach();
            $u->coach_name=$req->input('name');
            $u->coach_email=$req->input('email');
            $u->coach_pass=$req->input('pass');
            $u->coach_age=$req->input('age');
            $u->coach_gender=$req->input('gender');
            $u->save();
            return redirect('/home');
       }
  
   elseif($v->validateUsername($req->input('name'))==false){ 
      $a="user name is wrong";
       return view('welcome',['ar'=>$a]);
       
  }
     elseif($v->validateEmail($req->input('email'))==false){
           $a="email is wrong";
      return view('welcome',['ar'=>$a]);
       
  }
       elseif($v->validatePassword($req->input('pass'))==false){
          $a="Password is weak";
       return view('welcome',['ar'=>$a]);
       
  }
         elseif($v->validateAge($req->input('age'))==false){
           $a="age is wrong";
  return view('welcome',['ar'=>$a]);
       
  }
         }
      else{  
        return view('welcome',['ar'=>$a]);
       
  }
}
}