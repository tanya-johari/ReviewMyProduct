<?php 
//include "../partials/connection.php";
$error= 0;
$db_host = "localhost";
$db_username = "root";
$db_pass = "";
$db_name = "product_reviewer";



$connection = mysqli_connect($db_host,$db_username,$db_pass);
$sql = "DELETE FROM product WHERE item_id='" . $_GET["item_id"] . "'";

$result = mysqli_query($connection,$sql);
echo($error); 
?>
