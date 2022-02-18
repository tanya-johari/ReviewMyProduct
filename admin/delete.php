<?php 
include "../partials/connection.php";
$error= 0;

$sql = "DELETE FROM product WHERE item_id='" . $_GET["item_id"] . "'";

$result = mysqli_query($conn,$sql);
echo($error); 
?>
