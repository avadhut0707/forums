<?php
session_start();
include 'partial/_db_connection.php';
$cat_id = $_GET['cat_id'];
$sql = "SELECT * FROM `categories` WHERE `categories_id` = '$cat_id'";
$result = mysqli_query($conn,$sql);
while ($rows = mysqli_fetch_assoc($result)) {
    $categories_name = $rows['categories_name'];
    $categories_desc = $rows['categories_description'];
    $categories_time = $rows['created_date'];
} 
$show_success = false;
$show_error = false;
if ($_SERVER['REQUEST_URI'] && isset($_POST['ques_title'])) {
    $ques_title = varification($_POST['ques_title']);
    $ques_desc = varification($_POST['ques_desc']);
    $ques_user_id = varification($_POST['ques_user_id']);
    $cat_id = varification($_POST['cat_id']);
    $sql = "INSERT INTO questions (`ques_title`,`ques_desc`,`ques_cat_id`,`ques_user_id`) VALUES('$ques_title','$ques_desc','$cat_id','$ques_user_id')";
    $result = mysqli_query($conn,$sql);
    $show_success = true;
   header('Location: threadlist.php?cat_id=' . $cat_id);
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
    <title><?php echo $categories_name ?> forum</title>
</head>
<body>
    <?php 
    
    include 'partial/_header.php' ;
    
    if($show_success){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  The question has been added
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
if($show_error){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  The question has not added something error found.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
    ?>
    <div class="container mt-5">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to <?php echo $categories_name ?> thread</h1>
            <p class="lead"><?php echo $categories_desc ?></p>
            <hr class="my-4">
            <p><ul>
                <li>Do not advertise on the support forums</li>
                 <li>Do not offer to pay for help</li>
                  <li>Do not post about commercial products</li>
            </ul>
        
        </div>
    </div>
    <div class="container">
        <h6>Add question for <?php echo $categories_name ?> category</h6>
        <?php
         if(isset($_SESSION['username']) && $_SESSION['username']== true){ 
      echo '<form action="'.$_SERVER["PHP_SELF"].'" method="POST">
  <div class="form-group">
  <input type="hidden" value="'.$_GET['cat_id'].'" name="cat_id">
    <input type="hidden" value="'.$_SESSION['user_id'].'" name="ques_user_id">
    <label for="ques_title"></label>
    <input type="text" class="form-control" id="ques_title" aria-describedby="emailHelp" name="ques_title" placeholder="Enter question title">
    <small id="ques_title" class="form-text text-muted">Enter question title in short.</small>
  </div>
  <div class="form-group">
    <label for="ques_desc">Example textarea</label>
    <textarea class="form-control" id="ques_desc" rows="3" name="ques_desc"></textarea>
  </div>
  <button type="submit" class="btn btn-success">Submit</button>
</form>';
         }
         else {
            echo "Yor are not logged in please login to start posting question.";
         }
?>
    </div>
    <div class="container mt-5 border p-3 rounded">
    <?php 
    $sql = "SELECT * FROM questions WHERE `ques_cat_id` = '$cat_id'";
    $result = mysqli_query($conn,$sql);
    $result_not_avaliable = true;
    while ($rows = mysqli_fetch_assoc($result)) {
        $result_not_avaliable = false;
        $ques_fetch_id = $rows['ques_id'];
        $ques_fetch_title = $rows['ques_title'];
        $ques_fetch_desc = $rows['ques_desc'];
        $ques_time = $rows['ques_cr_time'];
        $ques_user_id = $rows['ques_user_id'];
         $sql2 = "SELECT * FROM users WHERE `srno` = '$ques_user_id'";
       $result2 = mysqli_query($conn,$sql2);
       $rows2 = mysqli_fetch_assoc($result2);
        $show_success =true;
           echo '
        <div class="media mt-5">
            <img src="images/user-profile.jpg" width="42px" class="mr-3" alt="user profile">
            <div class="media-body">
                <h5 class="mt-0"><a href="thread.php?question_id='.$ques_fetch_id.'">'.$ques_fetch_title.'</a></h5>
                '.$ques_fetch_desc.'
                  <p>commented by: <b>'.$rows2['username'] .'</b> at: <b>'.$ques_time.'</b></p>
            </div>
        </div>
         <hr>';
   

    }
     if ($result_not_avaliable) {
           echo '<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">question not available</h1>
    <p class="lead">For now question not available you can create new question.</p>
  </div>
</div>
';
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