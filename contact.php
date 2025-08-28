<?php
session_start();
include 'partial/_db_connection.php' ;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $subject = validate($_POST['subject']);
    $message = validate($_POST['message']);
  $sql = "INSERT INTO `contact`(`contact_name`,`contact_email`,`contact_subject`,`contact_messsage`)VALUES('$name','$email','$subject','$message')";
  $result = mysqli_query($conn,$sql);
  $message = "Form has been submitted admin will contact you soon.";
  header('location:contact.php?message=' .$message);
  exit;
}
function validate($var){
    $var = trim($var);
    $var = htmlspecialchars($var);
    $var = stripslashes($var);
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
    <title>Welcome - Forum</title>
</head>
<body>
    
    <?php include 'partial/_header.php' ;
?>
<?php 
if (isset($_GET['message']) ) {
    echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
  '.$_GET['message'].'
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}

?>
<!-- Hero Section -->
<section class="bg-light py-5 text-center">
  <div class="container">
    <h1 class="display-4 fw-bold">Contact Us</h1>
    <p class="lead">We’d love to hear from you. Please reach out using the form below.</p>
  </div>
</section>

<!-- Contact Form Section -->
<section class="py-5">
  <div class="container">
    <div class="row g-4">
      <!-- Contact Info -->
      <div class="col-md-5">
        <h2 class="fw-bold mb-4">Get In Touch</h2>
        <p>If you have any questions or need assistance, feel free to contact us.</p>
        <ul class="list-unstyled">
          <li><strong>Address:</strong> 123 Main Street, City, Country</li>
          <li><strong>Email:</strong> user@forum.com</li>
          <li><strong>Phone:</strong> +1 234 567 890</li>
        </ul>

      </div>

      <!-- Contact Form -->
      <div class="col-md-7">
        <div class="card shadow border-0 p-4">
          <h4 class="mb-3">Send a Message</h4>
          <form action=<?php echo $_SERVER['PHP_SELF']?> method = "POST">
            <div class="mb-3">
              <label for="name" class="form-label">Your Name</label>
              <input type="text" id="name" class="form-control" placeholder="Enter your name" name="name" required >
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Your Email</label>
              <input type="email" id="email" class="form-control" placeholder="Enter your email" name="email" required >
            </div>
            <div class="mb-3">
              <label for="subject" class="form-label">Subject</label>
              <input type="text" id="subject" class="form-control" placeholder="Enter subject" name="subject" required >
            </div>
            <div class="mb-3">
              <label for="message" class="form-label">Message</label>
              <textarea id="message" rows="5" class="form-control" placeholder="Type your message" name="message" required></textarea>
            </div>
            <button type="submit" class="btn btn-success w-100">Send Message</button>
          </form>
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