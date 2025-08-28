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
    <title>Welcome - Forum</title>
</head>
<body>
    <?php include 'partial/_db_connection.php' ?>
    <?php include 'partial/_header.php' ;
    if (isset($_GET['signup']) && $_GET['signup']=='true') {
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  The user has successfully created. you can login now.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
        if (isset($_GET['signup']) && $_GET['signup']=='false') {
            $message = $_GET['message'];
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  '.$message.'
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
       if (isset($_GET['loggedin']) && $_GET['loggedin']=='true') {
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  welcome,'.$_SESSION['username'].'! You have successfully loggedin.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
    ?>
    
    <!-- slider section -->
    <div>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/slider/slider 1.jpg" class="w-100" alt="Random image">
                </div>
                <div class="carousel-item">
                    <img src="images/slider/slider 2.jpg" class="" alt="slider 2">
                </div>
                <div class="carousel-item">
                    <img src="images/slider/slider 3.jpg" class="" alt="slider 3">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="container d-flex mt-5 justify-content-between">
    <?php 
    $sql = "SELECT * FROM `categories`";
    $result = mysqli_query($conn,$sql);
    while ($rows = mysqli_fetch_assoc($result)) {
        $cat_id = $rows['categories_id'];
        $cat_name = $rows['categories_name'];
        $cat_desc = $rows['categories_description'];
        echo '
            <div class="card" style="width: 18rem;">
  <img src="images/categories/card-'.$cat_id.'.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">'.$cat_name.'</h5>
    <p class="card-text">'. substr($cat_desc,0,100).'...</p>
    <a href="threadlist.php?cat_id='.$cat_id.'" class="btn btn-success">check thread</a>
  </div>
    </div>
   ';
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