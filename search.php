<?php
session_start();
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
    <title>Search result- <?php echo  $_GET['search_query'] ?></title>
</head>
<body>
    <?php include 'partial/_db_connection.php' ?>
    <?php include 'partial/_header.php' ;
    ?>
    <div class="container mt-5"><h1 class="display-4">search result for <?php echo $_GET['search_query']?></h1></div>
    <div class="container my-5 border p-5">
     
     <?php 
     $search_query = $_GET['search_query'];
    $sql = "SELECT * FROM questions WHERE MATCH (ques_title, ques_desc) AGAINST ('+$search_query' IN BOOLEAN MODE);";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
    $resultnot = true;
    if ($num > 1) {
       while ($row = mysqli_fetch_assoc($result)) {
     $thread_title = $row['ques_title'];
     $thread_desc = $row['ques_desc'];
     $thread_id = $row['ques_id'];
     $resultnot = false;
    echo ' <div class="media-body ">
                <h5 class="mt-0"><a href="thread.php?question_id=27">'.$thread_title.'</a></h5>
                  <p>'.$thread_desc.'</p>
            </div> <hr>'
            ;
   }}
   else{
 echo '<div class=" mt-5">
        <div class="jumbotron">
            <h1 class="display-4">search result not found</h1>
            
            <hr class="my-4">
            <ul>
                <li>Please check the keyword</li>
                 <li>please search for correct thread</li>
                 
            </ul></div>
    </div>';
   }
     ?>
    </div>
    <?php include 'partial/_footer.php' ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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