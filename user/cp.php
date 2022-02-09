<?php
session_start();
$id = (isset($_GET['userid']) ? intval($_GET['userid']) : -1);/* userid of the user */
$db_host = "localhost";
	$db_username = "root";
	$db_pass = "";
	$db_name = "product_reviewer";
$con = mysqli_connect($db_host,$db_username,$db_pass) or die('Unable To connect');
if(count($_POST)>0) {
$result = mysqli_query($con,"SELECT *from 'usertable' WHERE userid='" . $id . "'");
$row=mysqli_fetch_array($result);
if($_POST["currentPassword"] == $row["password"] && $_POST["newPassword"] == $row["confirmPassword"] ) {
mysqli_query($con,"UPDATE student set password='" . $_POST["newPassword"] . "' WHERE name='" . $id . "'");
$message = "Password Changed Sucessfully";
} else{
 $message = "Password is not correct";
}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Password Change</title>

</head>
<body>
<h3 align="center">CHANGE PASSWORD</h3>
<div><?php if(isset($message)) { echo $message; } ?></div>
<form method="post" action="" align="center">
Current Password:<br>
<input type="password" name="currentPassword"><span id="currentPassword" class="required"></span>
<br>
New Password:<br>
<input type="password" name="newPassword"><span id="newPassword" class="required"></span>
<br>
Confirm Password:<br>
<input type="password" name="confirmPassword"><span id="confirmPassword" class="required"></span>
<br><br>
<input type="submit">
</form>
<br>=
<br>
</body>
</html>