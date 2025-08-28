<?php
session_start();
include 'partial/_db_connection.php';
$qus_id = $_GET['question_id'];
$sql = "SELECT * FROM `questions` WHERE `ques_id` = '$qus_id'";
$result = mysqli_query($conn,$sql);
while ($rows = mysqli_fetch_assoc($result)) {
    $ques_title = $rows['ques_title'];
    $ques_desc = $rows['ques_desc'];
    $ques_time = $rows['ques_cr_time'];
    $ques_user_id = $rows['ques_user_id'];
} 
 $sql2 = "SELECT * FROM users WHERE `srno` = '$ques_user_id'";
       $result2 = mysqli_query($conn,$sql2);
       $rows2 = mysqli_fetch_assoc($result2);


$show_success = false;
$show_error = false;
if ($_SERVER['REQUEST_URI'] && isset($_POST['comm_desc'])) {
    $comm_desc = varification($_POST['comm_desc']);
    $qus_id = varification($_POST['ques_id']);
    $user_id = varification($_POST['user_id']);
    $sql = "INSERT INTO comments (`comm_desc`,`ques_id`,`comm_user_id`) VALUES('$comm_desc','$qus_id','$user_id')";
    $result = mysqli_query($conn,$sql);
    $show_success = true;
   header('Location: thread.php?question_id=' . $qus_id);
    exit;
}


function varification($var){
    $var = trim($var);
    $var = stripslashes($var);
    $var = htmlspecialchars($var);
    return $var;
}

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title><?php echo $ques_title ?> forum</title>
</head>
<body>
    <?php 
    
    include 'partial/_header.php' ;
    
    if($show_success){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  The comment has been added
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
if($show_error){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  The comment has not added something error found.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
    ?>
    <div class="container mt-5">
        <div class="jumbotron">
            <h1 class="display-4"><?php echo $ques_title?></h1>
            <p class="lead"><?php echo $ques_desc ?></p>
            <hr class="my-4">
            <p><ul>
                <li>Do not advertise on the support forums</li>
                 <li>Do not offer to pay for help</li>
                  <li>Do not post about commercial products</li>
            </ul></p>
           <?php echo  '<p>commented by: <b>'.$rows2["username"] .'</b> at: <b>'.$ques_time.'</b></p>'?>
        </div>
    </div>
    <div class="container">
        <h6>Add comment for <?php echo $ques_title ?> category</h6>
        <?php
         if(isset($_SESSION['username']) && $_SESSION['username']== true){ 
       echo '<form action="'.$_SERVER['PHP_SELF'].'" method="POST">
  <div class="form-group">
  <input type= "hidden" name="ques_id" value="'.$_GET['question_id'].'">
    <input type= "hidden" name="user_id" value="'.$_SESSION['user_id'].'">
    <label for="comm_desc">Example textarea</label>
    <textarea class="form-control" id="comm_desc" rows="3" name="comm_desc"></textarea>
  </div>
  <button type="submit" class="btn btn-success">Submit</button>
</form>';
         }
         else {
            echo "Please login to start posting comment.";
         }
?>
    </div>
    <div class="container mt-5 border p-3 rounded">
    <?php 
    $sql = "SELECT * FROM comments WHERE `ques_id` = '$qus_id'";
    $result = mysqli_query($conn,$sql);
    $result_not_avaliable = true;
    while ($rows = mysqli_fetch_assoc($result)) {
        $result_not_avaliable = false;
        $ques_fetch_id = $rows['comm_id'];
        $ques_fetch_desc = $rows['comm_desc'];
       $comm_fetch_time = $rows['comm_time']; 
       $comm_user_id = $rows['comm_user_id']; 
       $sql2 = "SELECT * FROM users WHERE `srno` = '$comm_user_id'";
       $result2 = mysqli_query($conn,$sql2);
       $rows2 = mysqli_fetch_assoc($result2);
        $show_success =true;
           echo '
        <div class="media mt-5">
            <img src="images/user-profile.jpg" width="42px" class="mr-3" alt="user profile">
            <div class="media-body">
                '.$ques_fetch_desc.'
                <p>commented by: <b>'.$rows2['username'] .'</b> at: <b>'.$comm_fetch_time.'</b></p>
            </div>
        </div>
          <hr>';
   

    }
     if ($result_not_avaliable) {
           echo '<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">comments not available</h1>
    <p class="lead">For now comments not available you can add a comment.</p>
  </div>
</div>';
        }
        ?>
      
    
    </div>
    <?php include 'partial/_footer.php' ?>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>
</html>