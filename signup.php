<?php
$err =false;
$alert= false;
$status = $statusMsg = ''; 
if($_SERVER["REQUEST_METHOD"]=="POST"){
  include 'partials/connection.php';
    $status = 'error'; 
    if(!empty($_FILES["image"]["name"])) { 
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            $imgcontent = addslashes(file_get_contents($image));        
            $email=$_POST["email"];
            $name=$_POST["name"];
            $username=$_POST["username"];
            if(!empty($_POST["username"])){
            $sql = "Select * from usertable where username ='$username'";
            $result1 = mysqli_query($conn,$sql);
            $num = mysqli_num_rows($result1);
            if ($num == 1)
            {
              $alert=true;
            }}
            $phoneno=$_POST["phoneno"];
            $dob=$_POST["dob"];
            $password=$_POST["password"];
            $cpassword=$_POST["cpassword"];
            $gender=$_POST["gender"];
            $exists=false;
            if(($password == $cpassword) && ($exists == false) && !$alert){
            $sql = "INSERT into usertable (`name`, `gender`, `Email`, `phone_no`, `username`, `userimg`, `password`, `dob`) VALUES ('$name', '$gender', '$email', '$phoneno', '$username', '$imgcontent', '$password', '$dob')";
             $result = mysqli_query($conn, $sql);
            if($result){
            $err = true;
           }}
          } else{ 
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
       } 
}else{ 
$statusMsg = 'Please select an image file to upload.'; 
} 
}  
echo $statusMsg; 
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/signup.css">
    <title>Signup</title>
    <link rel="icon" href="img/favicon.png" sizes="32x32" type="image/png">
    <style>
         body {
          width: 100%;
            background-image: url("/ReviewMyProduct/img/4.jpeg");
            background-position: center;
            background-size: cover;
            height: 130vh;
         }
      </style>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
  <a><img src="img/favicon.png" alt="logo" width="50" height="50"/></a>
    <a class="navbar-brand" href="index.php">ReviewMyProduct</a>
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
            <li><a class="dropdown-item" href="../ReviewMyProduct/login.php">USER</a></li>
            <li><a class="dropdown-item" href=" ../ReviewMyProduct/admin/login_admin.php">ADMIN</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            SIGN UP
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="../ReviewMyProduct/signup.php">USER</a></li>
            <li><a class="dropdown-item" href="../ReviewMyProduct/admin/signup_admin.php">ADMIN</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact-form.php">CONTACT</a>
        </li>
       

      </ul>
    </div>
  </div>
  <div class="navbar-brand">
  
    
</nav>
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
    <strong>Error</strong> username already exist
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';}
    ?>
    <div class="container">
        <h1 class="text-center" style="color:#ff7200;">Welcome To ReviewMyProduct</h1>
        <form action="/ReviewMyProduct/signup.php" method="post" enctype="multipart/form-data">
        <div class="form1">
        <div class="col-md-6">
        <label style="color:#ff7200;">Select profile photo * :</label>
        <input type="file" name="image" required>
        </div>
        <div class="col-md-6">
        <label for="email" class="form-label" style="color:#ff7200;">Email-id * :</label>
        <input type="text" class="form-control" id="email" name=email aria-describedby="emailHelp" placeholder="Enter Email Id Here" required>
        </div>
        <div class="col-md-6">
        <label for="name" class="form-label" style="color:#ff7200;">Name * :</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name Here" required>
        </div>
        <div class="col-md-6">
        <label for="username" class="form-label" style="color:#ff7200;">Username * :</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Enter UserName Here" required>
        </div>
        <div class="col-md-6">
        <label for="phoneno" class="form-label" style="color:#ff7200;">Mobile Number * :</label>
        <input type="tel" class="form-control" id="phoneno" name="phoneno" placeholder="Enter Phone no Here" required>
        </div>
    </div>
    <div class="form2">
        <div class="col-md-6">
        <label for="dob" class="form-label" style="color:#ff7200;">Date of Birth * :</label>
        <input type="date" class="form-control" id="dob" name="dob" min="1960-01-01" max="2011-12-31" placeholder="Select DOB " required>
        </div>
        <div class="col-md-6">
        <label for="gender" class="form-label" style="color:#ff7200;">Gender (optional) :</label>
        <select id="gender" name="gender" class="form-select">
        <option selected>selected</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
        </select>
        </div>
        <div class="col-md-6">
        <label for="password" class="form-label" style="color:#ff7200;">Password * :</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password Here" required>
        </div>
        <div class="col-md-6">
        <label for="cpassword" class="form-label" style="color:#ff7200;">Confirm Password * :</label>
        <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm password" required>
        <div id="emailHelp" class="form-text">Make sure to enter the same Password.</div>
        </div>
        <br>
        <br>
    </div>
    <div class="f3">
        <div class="col-md-6">
        <input type="checkbox" class="form-check-input" id="exampleCheck1" style="color:#ff7200;">
        <label class="form-check-label" for="exampleCheck1" style="color:#ff7200;">All Entered Data is correct</label>
        </div>
        <br>
        <button type="submit" class="btn btn-primary" style="color:#ffffff;">Sign Up</button>
    </div>  
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