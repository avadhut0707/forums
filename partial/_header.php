<?php
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">Forum</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">


            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Categories
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">';
               
                    $sql = "SELECT categories_id, categories_name FROM `categories`";
                    $result = mysqli_query($conn,$sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<a class="dropdown-item" href="threadlist.php?cat_id='.$row['categories_id'].'">'.$row['categories_name'].'</a>';
                    }
                   
                
               echo  '
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.php">About us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact us</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" method="get" action="search.php">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" name="search_query" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>';
   if(isset($_SESSION['username']) && $_SESSION['username']== true){
    echo '<p class="text-white mr-3 ml-3 mt-3">  Welcome, '.$_SESSION['username'].'</p>'.'<a href="partial/_logout.php" type="button" class="btn btn-success" >Logout</a>';
   }
    else{
        echo '<div class="ml-3">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#loginModal">Login</button>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#signupModal">Signup</button>
        </div>';
           }
    echo '</div>
</nav>';

include '_signup_popup.php';
include '_login_popup.php';
?>
<script>
    // Wait 20 seconds
setTimeout(function() {
    // Create a new URL object based on the current location
    let url = new URL(window.location);

    // Remove the 'loggedin' parameter
    url.searchParams.delete('loggedin');
    url.searchParams.delete('signup');
    url.searchParams.delete('message');

    // Update the browser's URL without reloading the page
    window.history.replaceState({}, document.title, url);
}, 2000); // 20000 ms = 20 seconds

</script>