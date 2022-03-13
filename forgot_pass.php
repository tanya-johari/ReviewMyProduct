<?php
session_start();
include_once 'partials/connection.php';
if(isset($_POST['submit']))
{
    $user_id = $_POST['email'];
    $result = mysqli_query($conn,"SELECT * FROM usertable where Email='" . $_POST['email'] . "'");
    $row = mysqli_fetch_assoc($result);
	$fetch_user_id=$row['Email'];
	$email_id=$row['Email'];
	$password=$row['password'];
	if($user_id==$fetch_user_id) {
				$to = $email_id;
                $subject = "Password";
                $txt = "Your password is : $password.";
                $headers = "From: helpreviewmyproduct@gmail.com" . "\r\n" .
                "";
                mail($to,$subject,$txt,$headers);

                echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success</strong> Please Check Your Mail.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
			}
				else{
					echo 'invalid userid';
				}
}
?>
<!DOCTYPE HTML>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">

    <title>Forgot Password</title>
    <link rel="icon" href="img/favicon.png" sizes="32x32" type="image/png">
    <style>
         body {
          width: 100%;
            background-image: url("/ReviewMyProduct/img/bg.jpg");
            background-position: center;
            background-size: cover;
            height: 109vh;
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
            <li><a class="dropdown-item" href="login.php">USER</a></li>
            <li><a class="dropdown-item" href="admin/login_admin.php">ADMIN</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            SIGN UP
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="signup.php">USER</a></li>
            <li><a class="dropdown-item" href="admin/signup_admin.php">ADMIN</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact-form.php">CONTACT</a>
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
<style type="text/css">
 input{
 border:1px solid olive;
 border-radius:5px;
 }
 h1{
  color:darkgreen;
  font-size:22px;
  text-align:center;
 }

</style>
</head>
<body>
<h1>Forgot Password<h1>
<form action='' method='post'>
<table cellspacing='5' align='center'>
<tr><td>Email id:</td><td><input type='text' name='email'/></td></tr>
<tr><td></td><td><input type='submit' name='submit' value='Submit'/></td></tr>
</table>
</form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>
