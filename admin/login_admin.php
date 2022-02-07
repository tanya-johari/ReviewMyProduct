<?php
$login =false;
$showError= false;
if($_SERVER["REQUEST_METHOD"]== "POST"){
    include '../partials/connection.php';
    $username=$_POST["username"];
    $password=$_POST["password"];
  $sql = "Select * from admin where adminusername ='$username' AND passwrd='$password'";
  $result = mysqli_query($conn,$sql);
  $num = mysqli_num_rows($result);
  if ($num == 1){
      $login = true;
      session_start();
      $_SESSION['loggedin']= true;
      $_SESSION['adminusername']=$username;
      header("location: profile.php");
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

    <title>LOGIN</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="../index.php">REVIEW.COM</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link "  href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin/login_admin.php">LOGIN</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin/signup_admin.php">SIGNUP</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">CONTACT</a>
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
    <div class="container">
        <h1 class="text-center">Login to Reviewersblog</h1>
        <form action="/ReviewMyProduct/admin/login_admin.php" method="post">
        <div class="col-md-4">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" >
        </div>
        <div class="col-md-4">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password">
        </div>
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