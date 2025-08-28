<?php
session_start();
include '_db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['loginusername'])) {
   $username = varification($_POST['loginusername']);
   $password = varification($_POST['loginpassword']);
   $exitstsql = "SELECT * FROM `users` WHERE `username` = '$username'";
   $result = mysqli_query($conn,$exitstsql);
   $num = mysqli_num_rows($result);
   $rows = mysqli_fetch_assoc($result);
   if ($num > 0) {
     if(password_verify($password,$rows['password'])){
      $_SESSION['logedin'] = true;
      $_SESSION['username'] = $username;
      $_SESSION['user_id'] = $rows['srno'];
     header('location:/forum/index.php?loggedin=true');
     exit;
    }
    else{
      $signup_error_message = "password credentails are wrong.";
    } 
}
else {
  $signup_error_message = "row credentails are wrong.";
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