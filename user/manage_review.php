<?php include 'dashboard_home.php';
include '../partials/connection.php';
if (isset($_POST['Delete'])) {
  // If you receive the Delete post data, delete it from your table
  $delete = 'DELETE FROM reviews WHERE review_id = ?';
  $stmt = $conn->prepare($delete);
  $stmt->bind_param("i", $_POST['Delete']);
  $stmt->execute();
}
$sql = "SELECT * FROM reviews WHERE userid='' ORDER BY submit_date DESC ";
$result = $conn->query($sql);
$counter = 0;
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
<button type="submit" class="btn btn-dark btn-lg float-right" onclick="add_review.php">ADD REVIEW</button>
<form method="POST"> 
<table class="table table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Sno</th>
      <th scope="col">Review ID</th>
      <th scope="col">Product ID</th>
      <th scope="col">User ID</th>
      <th scope="col">Review</th>
      <th scope="col">Rating</th>
      <th scope="col">Submit Date</th>
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
      <td><?php echo $rows['review_id'];?></td>
      <td><?php echo $rows['item_id'];?></td>
      <td><?php echo $rows['userid'];?></td>
      <td><?php echo $rows['content'];?></td>
      <td><?php echo $rows['rating'];?></td>
      <td><?php echo $rows['submit_date'];?></td>
      <?php echo '<td><button type="submit" name="Delete" value="'.$rows['review_id'].'">DELETE</button></td>';?>
    </tr>
    <?php }
    ?>
  </tbody>
</table>
</div>
</body>
</html>





