<?php
include "dashboard_home.php";
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>  
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
<center> 
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

</center>

<?php
if (isset($_POST["submit1"]))
{
  $v1=rand(1111,9999);
  $v2=rand(1111,9999);
  $v3=$v1.$v2;
  $v3=md5($v3);
$fnm=$_FILES["pimage"]["name"];
$dst="../assets/products/".$v3.$fnm;
$dst1="../assets/products/".$v3.$fnm;
move_uploaded_file($_FILES["pimage"]["tmp_name"],$dst);

mysqli_query($link,"INSERT INTO `product` (`item_id`,`item_brand`, `item_name`, `item_price`, `item_image`) 
VALUES('','$_POST[bnm]','$_POST[pnm]','$_POST[pprice]','$dst1' )");
echo '<div class="alert alert-success alert-dismissable" id="flash-msg">
<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
<h5><i class="icon fa fa-check"></i>Successfully Added Product!</h5>
</div>';

}
else {
	echo '<div class="alert alert-danger alert-dismissable" id="flash-msg">
				<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
				<h5><i class="icon fa fa-check"></i>Sorry. Product can not be added!!!</h5>
				</div>';
}
?>
