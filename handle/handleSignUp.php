<?php 
include '../core/init.php';
require_once '../core/classes/vaildation/Validator.php';
use validation\Validator;

if (isset($_POST['signup'])) {
   
    $email = $_POST['email'];
    $name = $_POST['name'];
    $password = $_POST['password'];


    if(!empty($email) || !empty($password) || !empty($name))   {
    $email = User::checkInput($email);
    $password = User::checkInput($password); 
    $name = User::checkInput($name); 
  


   } 
   
      

    $v = new Validator; 
    $v->rules('name' , $name , ['required' , 'string' , 'max:20']);
    $v->rules('email' , $email , ['required' , 'email']);
    $v->rules('password' , $password , ['required' , 'string' , 'min:5']);
    $errors = $v->errors;
    
    if ($errors == []){ 
        
        if(User::checkEmail($email) === true) {
            $_SESSION['errors_signup'] = ['This email is already use'];
            header('location: ../signup.php')  ;
        }  else if (preg_match("/[^a-zA-Z0-9\!]" , $name)) {
            $_SESSION['errors_signup'] = ['Only Chars and Numbers allowed in name'];
            header('location: ../signup.php')  ;
        } else {
                User::register($email , $password ,$name);
                

        }
    } else { 
        
        $_SESSION['errors_signup'] = $errors;  
        header('location: ../signup.php'); }
        
} else header('location: ../index.php')  ;








?>