<?php
$login =false;
$showError= false;
if($_SERVER["REQUEST_METHOD"]== "POST"){
    include '../partials/connection.php';
    $adusername=$_POST["adusername"];
    $passwrd=$_POST["passwrd"];
  $sql = "SELECT * FROM admin WHERE adminusername ='$adusername' AND passwrd='$passwrd'";
  $result = mysqli_query($conn,$sql);
  $num = mysqli_num_rows($result);
  if ($num == 1){
      $login = true;
      session_start();
      $_SESSION['loggedin']= true;
      $_SESSION['adminusername']=$adusername;
      header("location: adprofile.php");
  }
  else {
      $showError = true;
  }
}
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styles.css">
    <title>LOGIN</title>
    <link rel="icon" href="../img/favicon.png" sizes="32x32" type="image/png">
    <style>
         body {
          width: 100%;
            background-image: url("/ReviewMyProduct/img/1.jpg");
            background-position: center;
            background-size: cover;
            height: 109vh;
         }
      </style>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
  <a><img src="../img/favicon.png" alt="logo" width="50" height="50"/></a>
    <a class="navbar-brand" href="../index.php">ReviewMyProduct</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link "  href="index.php">HOME </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            LOGIN
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="../login.php">USER</a></li>
            <li><a class="dropdown-item" href=" ../admin/login_admin.php">ADMIN</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            SIGN UP
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="../signup.php">USER</a></li>
            <li><a class="dropdown-item" href="../admin/signup_admin.php">ADMIN</a></li>
          </ul>
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
    <?php
    if($login){
      echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success</strong> You are login.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';}
    ?>
    <?php
    if($showError){
      echo '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error</strong>invalid Credentials
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';}
    ?>
    <h1 class="text-center" style="color:#ff7200;">Welcome To ReviewMyProduct</h1>
    <div class="content">
      <h2>Find Trends OR <br> <span>Make Them</span></h2>
      <p class="par">ReviewMyProduct is the best platform to turn your likes 
        into the Trends. But as admin its our responsiblity to make our user comfortable and maintain records.</p>

        <button class="cn"><a href="signup_admin.php">JOIN US</a></button>
    </div>  
    <div class="container">
        <h3> LOGIN HERE: </h3>
        <form action="../admin/login_admin.php" method="post">
        <div class="col-md-6">
        <label for="username" class="form-label">Username : </label>
        <input type="text" class="form-control" id="adusername" name="adusername" >
        </div>
        <div class="col-md-6">
        <label for="password" class="form-label">Password : </label>
        <input type="password" class="form-control" id="passwrd" name="passwrd">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">LOGIN</button>
        </form>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>