
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MOBILES</title>
    <link rel="icon" href="../img/favicon.png" sizes="32x32" type="image/png">
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

    <?php
    // require functions.php file
    require ('functions.php');
    ?>

</head>
<body>

<!-- start #header -->


    <!-- Primary Navigation -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
  <a><img src="../img/favicon.png" alt="logo" width="50" height="50"/></a>
    <a class="navbar-brand" href="../index.php"> ReviewMyProduct</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link "  href="../index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../login.php">LOGIN</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../signup.php">SIGNUP</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../contact-form.php">CONTACT</a>
        </li>
       

      </ul>
    </div>
  </div>
  <div class="navbar-brand">
  
    <form class="d-flex">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
</form>
</nav>
    <!-- !Primary Navigation -->

</header>
<!-- !start #header -->

<!-- start #main-site -->
<main id="main-site">

<?php

   

    /*  include special price section  */
         include ('_special-price.php');
    /*  include special price section  */


?>


<?php
// include footer.php file
include ('footer.php');
?>