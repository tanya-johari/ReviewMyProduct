
<?php
include 'dashboard_home.php';
include '../partials/connection.php';
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
	header("location:/ReviewMyProduct/admin/login_admin.php");
	exit;
  }
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Change Password</title>
</head>
<body>
<div class="grid_10">
<div class="box round first">
	<?php
		$usname=$_SESSION['adminusername'];
		if (isset($_POST["Submit"])){
			mysqli_query($conn,"update admin set passwrd='$_POST[pnm]' where adminusername='$usname'") ;
		    
		}
	
	?>
<center> 
<h2>
Change Password
</h2>
<div class="block">
<form name="form1" action="" method="post"  enctype="multipart/form-data">
  <table >
<tr>
 <td> OLD PASSWORD     </td>
<td> <input type="password" name="bnm"  ></td>
</tr><tr>
	</br>
 <td> NEW PASSWORD    </td>
<td> <input type="password" name="pnm"  ></td>
</tr>
<tr>
</br>
 <td> CONFIRM NEW PASSWORD   </td>
<td> <input type="text" name="cps"  ></td>
</br>
<tr>

<td align="right"><button type="submit" class="btn btn-primary" name="Submit">SUBMIT</button></td>
</tr>

</center>

</body>
</html>


