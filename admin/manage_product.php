<?php include 'dashboard_home.php';
//Include '../partials/connection.php';
	$db_host = "localhost";
	$db_username = "root";
	$db_pass = "";
	$db_name = "product_reviewer";
	
	
	
	$connection = mysqli_connect($db_host,$db_username,$db_pass);
if (!$connection) {
    die("Database connection failed: " . mysqli_error());
}
	$db_select = mysqli_select_db($connection,$db_name);
if (!$db_select) {
    die("Database selection failed: " . mysqli_error());
}



$sql = "SELECT * FROM product ORDER BY item_id DESC ";
$result = $connection->query($sql);
$counter = 0;

if (isset($_POST['Delete'])) {
  // If you receive the Delete post data, delete it from your table
  $delete = 'DELETE FROM product WHERE item_id = ?';
  $stmt = $connection->prepare($delete);
  $stmt->bind_param("i", $_POST['Delete']);
  $stmt->execute();
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Review</title>

</head>
<body>
<div class="container p-2 my-4 bg-light text-white">
<a href="../assets/add_product.php">
<button   class="btn btn-dark btn-lg float-right" >ADD PRODUCT</button>
</a>

<br>
<br>
<br>


<form method="POST"> 
<table class="table table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Sno</th>
      <th scope="col">ITEM ID</th>
      <th scope="col">ITEM BRAND</th>
      <th scope="col">ITEM NAME</th>
      <th scope="col">ITEM PRICE</th>
      <th scope="col">ITEM IMAGE</th>
      <th scope="col">Delete</th>

    </tr>
  </thead>
  <tbody>
  <?php   
                while($rows=$result->fetch_assoc())
                {
             ?>
    <tr>
    
      <th scope="row"><?php echo ++$counter;?></th>
      <td><?php echo $rows['item_id'];?></td>
      <td><?php echo $rows['item_brand'];?></td>
      <td><?php echo $rows['item_name'];?></td>
      <td><?php echo $rows['item_price'];?></td>
      <td><image src="<?php echo $rows['item_image'];?>" width="100px" height="100px" alt=""></td>

      
     
      <?php echo '<td><button type="submit" name="Delete" value="'.$rows['item_id'].'">DELETE</button></td>';?>
      
    </tr>
    <?php }
    ?>
  </tbody>
</table>
</div>
</body>
</html>
