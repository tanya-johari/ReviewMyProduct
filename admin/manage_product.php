<?php include 'dashboard_home.php';
include '../partials/connection.php';
$counter = 0;

if (isset($_POST['Delete'])) {
  // If you receive the Delete post data, delete it from your table
  $delete = 'DELETE FROM product WHERE item_id = ?';
  $stmt = $conn->prepare($delete);
  $stmt->bind_param("i", $_POST['Delete']);
  $stmt->execute();

  echo '<div class="alert alert-success alert-dismissable" id="flash-msg">
<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
<h5><i class="icon fa fa-check"></i>Successfully Deleted Product!</h5>
</div>';

}
$sql = "SELECT * FROM product ORDER BY item_id DESC ";
$result = $conn->query($sql);
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
<a href="add_product.php">
<button   class="btn btn-dark btn-lg float-right" >ADD PRODUCT</button>
</a>

<br>
<br>
<br>


<form method="POST"> 
<table class="table table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">SNO</th>
      <th scope="col">PRODUCT BRAND</th>
      <th scope="col">PRODUCT NAME</th>
      <th scope="col">PRICE</th>
      <th scope="col">IMAGE</th>
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
