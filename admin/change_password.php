
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
 <td> OLD PASSWORD     </td>
<td> <input type="text" name="bnm"  ></td>
</tr><tr>
  
 <td> NEW PASSWORD    </td>
<td> <input type="text" name="pnm"  ></td>
</tr>
<tr>
 <td> CONFIRM NEW PASSWORD   </td>
<td> <input type="text" name="cps"  ></td>

<tr>

<td colspan="2" align="center"><input type="submit" name="submit1"> </td>
</tr>

</center>

<?php
if (isset($_POST["submit1"])){
    mysqli_query($link,"update users set password='$_POST[pnm]' where id='1'") ;
   
}
?>
