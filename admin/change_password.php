
<?php
include 'dashboard_home.php';
include '../partials/connection.php';

  
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Account- <?php echo $_SESSION['adminusername'] ?></title>
	<link rel="icon" href="../img/favicon.png" sizes="32x32" type="image/png">
</head>
<body>
<div class="grid_10">
<div class="box round first">
	<?php
		$usname=$_SESSION['adminusername'];
		
		if (isset($_POST["Submit"])){
			$old_pass=$_POST['bnm'];
  			$new_pass=$_POST['pnm'];
  			$con_pass=$_POST['cps'];
			  if($old_pass=="SELECT passwrd FROM admin WHERE adminusername='$usname'"){
			if($new_pass==$con_pass) {
			mysqli_query($conn,"update admin set passwrd='$_POST[pnm]' where adminusername='$usname'") ;
			echo '<div class="alert alert-success alert-dismissable" id="flash-msg">
			<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
			<h5><i class="icon fa fa-check"></i>Successfully changed Password!</h5>
			</div>';
			}
			else {
				echo '<div class="alert alert-danger alert-dismissable" id="flash-msg">
				<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
				<h5><i class="icon fa fa-check"></i>Password does not match. Please try again!!!</h5>
				</div>';
			}
			  }
			  else {
				echo '<div class="alert alert-danger alert-dismissable" id="flash-msg">
				<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
				<h5><i class="icon fa fa-check"></i>OLD Password does not match. Please try again!!!</h5>
				</div>';
			  }
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
<td> <input type="password" name="bnm" required></td>
</tr><tr>
	</br>
 <td> NEW PASSWORD    </td>
<td> <input type="password" name="pnm" required></td>
</tr>
<tr>
</br>
 <td> CONFIRM NEW PASSWORD   </td>
<td> <input type="password" name="cps" required></td>
</br>
<tr>
<div id="checkconfirm"></div>
<td align="right"><button type="submit" class="btn btn-primary" name="Submit">SUBMIT</button></td>
</tr>

</center>

</body>
</html>


