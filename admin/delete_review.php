<?php 
include "../partials/connection.php";
$error= 0;

$deleteRow= mysql_query("DELETE FROM `reviews` WHERE `review_id`= '" . $_GET["rowID"] . "';") or $error= 1;

echo($error); 
?>
