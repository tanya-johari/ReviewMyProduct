<?php
$err =false;
$alert= false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
  include 'partials/connection.php';
  $email=$_POST["email"];
  $name=$_POST["name"];
  $username=$_POST["username"];
  $phoneno=$_POST["phoneno"];
  $dob=$_POST["dob"];
  $password=$_POST["password"];
  $cpassword=$_POST["cpassword"];
  $avtar=1;
  $gender=$_POST["gender"];
  $exists=false;
  if(($password == $cpassword) && $exists == false){
    $sql = "INSERT into usertable (`name`, `gender`, `Email`, `phone_no`, `username`, `avtar_no`, `password`, `dob`) VALUES ('$name', '$gender', '$email', '$phoneno', '$username', '$avtar', '$password', '$dob')";
    $result = mysqli_query($conn, $sql);
    if($result){
      $err = true;
    }
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

    <title>Signup</title>
  </head>
  <body>
    <?php require 'partials/_nav.php' ?>
    <?php
    if($err){
      echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success</strong> Your account is now created and you can login.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';}
    ?>
    <?php
    if($alert){
      echo '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error</strong>'.$alert.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';}
    ?>
    <div class="container">
        <h1 class="text-center">Signup to Reviewersblog</h1>
        <form action="/ReviewMyProduct/signup.php" method="post">
        <div class="col-md-4">
        <label for="email" class="form-label">Email-id</label>
        <input type="text" class="form-control" id="email" name=email aria-describedby="emailHelp">
        </div>
        <div class="col-md-4">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" >
        </div>
        <div class="col-md-4">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" >
        </div>
        <div class="col-md-4">
        <label for="phoneno" class="form-label">Mobile Number</label>
        <input type="text" class="form-control" id="phoneno" name="phoneno">
        </div>
        <div class="col-md-4">
        <label for="dob" class="form-label">Date of Birth</label>
        <input type="date" class="form-control" id="dob" name="dob">
        </div>
        <div class="col-md-4">
        <label for="gender" class="form-label">Gender</label>
        <select id="gender" name="gender" class="form-select">
        <option selected>selected</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
        </select>
        </div>
        <div class="col-md-4">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="col-md-4">
        <label for="cpassword" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="cpassword" name="cpassword">
        <div id="emailHelp" class="form-text">Make sure to enter the same Password.</div>
        </div>
        <div class="col-md-4">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">All Entered Data is correct</label>
        </div>
        <button type="submit" class="btn btn-primary">Sign Up</button>
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