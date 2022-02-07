<?php


?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

<style>
body {
  font-family: "Lato", sans-serif;
}

.sidebar {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #5006e8;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidebar a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 20px;
  color: white;
  display: block;
  transition: 0.3s;
}

.sidebar a:hover {
  color: #f1f1f1;
}

.sidebar .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

.openbtn {
  font-size: 20px;
  cursor: pointer;
  background-color: #5006e8;
  color: white;
  padding: 10px 15px;
  border: none;
}

.openbtn:hover {
  background-color: #5006e8;
}

#main1 {
  transition: margin-left .5s;
  padding: 16px;
}

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}
</style>
</head>
<body>

<div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <a href="profile.php">👤Profile</a>
  <a href="#">✏Edit Profile</a>
  <a href="manage_product.php">🏷Manage Products</a>
  <a href="#">👥Manage User</a>
  <a href="../admin/manage_review.php">⭐Manage Review</a>
  <a href="#">🔑Change Password</a>
  <a href="../index.php">🔒Logout</a>
  
</div>

<div id="main">
  <button class="openbtn" onclick="openNav()">☰ ADMIN</button> 
  
  
</div>

<script>
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
   
</body>
</html> 


<?php
	$db_host = "localhost";
	$db_username = "root";
	$db_pass = "";
	$db_name = "product_reviewer";
	
	
	
	$link = mysqli_connect($db_host,$db_username,$db_pass);

	mysqli_select_db($link,$db_name);



?>


<div class="grid_10">
<div class="box round first">
  <h2>
ADD Product
</h2>
<div class="block">
<form name="form1" action="" method="post"  enctype="multipart/form-data"      >
  <table >
<tr>
 <td> Brand name     </td>
<td> <input type="text" name="bnm"  ></td>
</tr><tr>
 <td> Product name     </td>
<td> <input type="text" name="pnm"  ></td>
</tr>
<tr>
 <td> Price    </td>
<td> <input type="text" name="pprice"  ></td>
</tr>
<tr>
 <td> Image     </td>
<td> <input type="file" name="pimage"  ></td>
</tr>
<tr>

<td colspan="2" align="center"><input type="submit" name="submit1"> </td>
</tr>



<?php
if (isset($_POST["submit1"]))
{
  $v1=rand(1111,9999);
  $v2=rand(1111,9999);
  $v3=$v1.$v2;
  $v3=md5($v3);
$fnm=$_FILES["pimage"]["name"];
$dst="./products/".$v3.$fnm;
$dst1="../assets/products/".$v3.$fnm;
move_uploaded_file($_FILES["pimage"]["tmp_name"],$dst);



mysqli_query($link,"INSERT INTO `product` (`item_id`,`item_brand`, `item_name`, `item_price`, `item_image`) VALUES('','$_POST[bnm]','$_POST[pnm]','$_POST[pprice]','$dst1' )");







}

?>
