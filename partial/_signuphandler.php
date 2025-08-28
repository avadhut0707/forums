<?php
include '_db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['signupusername'])) {
   $username = varification($_POST['signupusername']);
   $email = varification($_POST['signupemail']);
   $password = varification($_POST['signuppassword']);
   $cpassword = varification($_POST['signupcpassword']);
   $exitstsql = "SELECT * FROM `users` WHERE `username` = '$username'";
   $result = mysqli_query($conn,$exitstsql);
   $num = mysqli_fetch_row($result);
   if (empty($username)) {
    $signup_error_message = "please enter username";
   }
   elseif(empty($email)){
    $signup_error_message = "please enter email.";
   }
   elseif ($num > 0) {
      $signup_error_message = "username already exits.";
   }
   elseif (empty($password)) {
     $signup_error_message = "Please enter password";
   }
   elseif (empty($cpassword)) {
     $signup_error_message = "Please enter confirm password";
   }
   elseif ($password != $cpassword) {
    $signup_error_message = "Password not matching.";
   }
   else {
    $hash = password_hash($password,PASSWORD_DEFAULT);
    $sql = "INSERT INTO users(`username`,`email`,`password`)VALUES('$username','$email','$hash' )";
    $result = mysqli_query($conn,$sql);
    header('location:/forum/index.php?signup=true');
    exit;
   }
    header('location:/forum/index.php?signup=false&message='.$signup_error_message);
    exit;
}


function varification($var){
    $var = trim($var);
    $var = stripslashes($var);
    $var = htmlspecialchars($var);
    return $var;
}


