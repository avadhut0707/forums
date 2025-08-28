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
?>
<!-- Hero Section -->
<section class="bg-light py-5 text-center">
  <div class="container">
    <h1 class="display-4 fw-bold">About Us</h1>
    <p class="lead">Learn more about who we are and what we do.</p>
  </div>
</section>

<!-- About Content -->
<section class="py-5">
  <div class="container">
    <div class="row align-items-center">
      <!-- Left Side (Image) -->
      <div class="col-md-6 mb-4 mb-md-0">
        <img src="images/company.jpg" class="img-fluid rounded shadow" alt="About Us">
      </div>
      <!-- Right Side (Text) -->
      <div class="col-md-6">
        <h2 class="fw-bold">Our Story</h2>
        <p>
          We are a passionate team dedicated to delivering high-quality solutions 
          to our clients. Since our founding, we have worked with companies across 
          different industries to create meaningful impact.
        </p>
        <p>
          Our mission is to combine creativity, innovation, and technology to help 
          businesses grow and succeed in today’s digital world.
        </p>
        <a href="contact.php" class="btn btn-success">Get in Touch</a>
      </div>
    </div>
  </div>
</section>

<!-- Team Section -->
<section class="bg-light py-5">
  <div class="container text-center">
    <h2 class="fw-bold mb-4">Meet Our Team</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card shadow border-0">
          <img src="images/employee/1.jpg" class="card-img-top" alt="Team Member">
          <div class="card-body">
            <h5 class="card-title">John Doe</h5>
            <p class="card-text">CEO & Founder</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card shadow border-0">
          <img src="images/employee/2.jpg" class="card-img-top" alt="Team Member">
          <div class="card-body">
            <h5 class="card-title">Jane Smith</h5>
            <p class="card-text">Project Manager</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card shadow border-0">
          <img src="images/employee/3.jpg" class="card-img-top" alt="Team Member">
          <div class="card-body">
            <h5 class="card-title">Mike Johnson</h5>
            <p class="card-text">Lead Developer</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
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