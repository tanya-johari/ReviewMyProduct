<?php

	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "product_reviewer";

	//Create Connection
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	if(!$conn){
    /*cho "success";
	} 
	else {*/
		die('Could not connect: ' . mysql_error());
	} 

	return $conn;

?>