<?php
include "dashboard_home.php";
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Account- <?php echo $_SESSION['adminusername'] ?></title>
<link rel="icon" href="../img/favicon.png" sizes="32x32" type="image/png">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
<script>
	$(document).ready(function() {
	var max_fields      = 10; //maximum input boxes allowed
	var wrapper   		= $(".input_fields_wrap"); //Fields wrapper
	var add_button      = $(".add_field_button"); //Add button ID
	
	var x = 1; //initlal text box count
	$(add_button).click(function(e){ //on add input button click
		e.preventDefault();
		if(x < max_fields){ //max input box allowed
			x++; //text box increment
			$(wrapper).append('<div><label >Choose a Store </label></br><select id="store" name="store"><option value="amazon">amazon</option><option value="flipkart">flipkart</option><option value="croma">croma</option><option value="tata">Tata CliQ</option></select></br><label>Add Link </label></br><textarea type="text" name="mytext"></textarea></br><label>Price </label></br><input type="text" name="price" required><a href="#" class="remove_field">Remove</a></div>'); //add input box
		}
	});
	
	$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
		e.preventDefault(); $(this).parent('div').remove(); x--;
	})
});
	</script>  
</body>
</html> 
<?php
	include "../partials/connection.php";
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
  
 <td> Product Description    </td>
<td> <textarea type="text" name="det"></textarea></td>
</tr>

<td> Category     </td>
<td> <input type="text" name="cat"  ></td>
</tr>
<tr>	
	<button class="add_field_button">Add References </button>
    <div>
		<label >Choose a Store </label>
	<select id="store" name="store">
		<option value="amazon">amazon</option>
		<option value="flipkart">flipkart</option>
		<option value="croma">croma</option>
		<option value="tata cliq">Tata CliQ</option>
	</select></br>
	<label>Add Link </label>
	<textarea type="text" name="mytext"></textarea></br>
	<label>Price </label>
	<input type="text" name="price" required>
</div>
<div class="input_fields_wrap">

</div>
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

mysqli_query($conn,"INSERT INTO `product` (`item_id`,`item_brand`, `item_name`, `category`, `description`, `item_image`) 
VALUES('','$_POST[bnm]','$_POST[pnm]', '$_POST[cat]', '$_POST[det]', '$dst1'  )");

mysqli_query($conn,"INSERT INTO `itemref` ( `item_id`, `store`, `reflink`, `price`) 
VALUES((SELECT item_id FROM product where item_name='$_POST[pnm]'), '$_POST[store]', '$_POST[mytext]', '$_POST[price]')");

echo '<div class="alert alert-success alert-dismissable" id="flash-msg">
<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
<h5><i class="icon fa fa-check"></i>Successfully Added Product!</h5>
</div>';

}

?>
