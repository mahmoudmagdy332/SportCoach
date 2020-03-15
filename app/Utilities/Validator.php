<?php
namespace App\Utilities;
//class to check validation
abstract class Validator {

   /*
      check if email is not empty and valid
      if email is not valid, will return false(boolean)
      if email is valid and not empty, will return true(boolean)
      */
    public static function validateEmail(String $email)
    {
        if(empty($email))
            return false;

        else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            return false;

        else
            return true;
    }

    /*
      valid username, alphanumeric & longer than or equals 5 chars
      check if username is longer than 5 chars and valid
      if email is not valid, will return false(boolean)
      if email is valid, will return true(boolean)
      */
    public static function validateUsername(String $username){
        if(preg_match('/^\w{5,}$/', $username)) {
            return true;
        }
        return false;
    }

    /*
    return true if password is valid, otherwise retuen false
    Password must be at least 8 characters in length.
    Password must include at least one upper case letter.
    Password must include at least one number.
    Password must include at least one special characte
    */
    public static function validatePassword(String $password){
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);
        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8){
            return false;
        }
        else
            return true;
    }

    /*
     valid age is a number with bigger than
     or equal to 16 value and not smaller than
     or equal to 100 value.
     return true if age is valid, otherwise return false
    */
    public static function validateAge(String $age){
        $uppercase = preg_match('@[A-Z]@', $age);
        $lowercase = preg_match('@[a-z]@', $age);
        $specialChars = preg_match('@[^\w]@', $age);
        if($uppercase || $lowercase || $specialChars )
            return false;

            else if($age >= 16 && $age <= 100){
            return true;
        }
        else
            return false;
    }

    /*
    check if user name is valid or not
    is trainee or coach
    */
    public static function validateUserType(String $usertype){
        if($usertype != "coach" && $usertype != "trainee")
            return false;
        else
            return true;
    }

    /*
    check if size of string is longer than 0 and also have anything else
    except white-space.
    */
    public static function validateCommentOrPost(String $comment)
    {
      $size = strlen($comment);
      for($i = 0; $i < $size; $i++)
      {
        if($comment[$i] != " " && $comment[$i] != "\n")
            return true;
      }
      return false;
    }


}

?>
