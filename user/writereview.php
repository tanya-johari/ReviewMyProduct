<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true ){
  header("location: login.php");
  exit;
}
$err =false;
$alert= false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
  $status = $statusMsg = ''; 
  include '../partials/connection.php';
    $status = 'error'; 
    $uid=$_SESSION['userid'] ;
    $iid=$_SESSION['item_id'] ;  
    $rate=$_POST["rate"];
    $content=$_POST["content"];
    $exists=false;
    $sql = "INSERT into reviews (`item_id`, `userid`, `content`, `rating`) VALUES ('$iid', '$uid', '$rate', '$content')";
             $result = mysqli_query($conn, $sql);}
            if($result){
            $err = true;}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Write Review</title>
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
          <a class="nav-link "  href="../index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../login.php">LOGIN</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../signup.php">SIGNUP</a>
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
</div>
<div class="container">
    <h1 class="text-center">Write Review for ReviewMyProduct</h1>
    <div class="write_review">
    <form action="/ReviewMyProduct/user/writereview.php" method="post" enctype="multipart/form-data">
    <div class="col-md-6">
    <label for="qual" class="form-label">Quality :</label>
    <input name="qual" type="text" class="form-control" placeholder="quality" required>
    </div>
    <div class="col-md-6">
    <label for="rate" class="form-label">Ratings :</label>
    <input name="rating" class="form-control" type="number" min="1" max="5" placeholder="Rating (1-5)" required>
    </div>
    <div class="col-md-6">
    <label for="cont" class="form-label">Contents :</label>
    <textarea name="content" class="form-control" placeholder="Write your review here..." required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit Review</button>
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