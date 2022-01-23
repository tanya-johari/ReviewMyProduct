<?php include 'dashboard_home.php';
include '../partials/connection.php';
$sql = "SELECT * FROM reviews ORDER BY submit_date DESC ";
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
<div class="container p-3 my-3 bg-white text-white">
 
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Sno</th>
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
    <?php $i = 1; ?>
      <th scope="row"><?php echo $i?></th>
      <td><?php echo $rows['item_id'];?></td>
      <td><?php echo $rows['userid'];?></td>
      <td><?php echo $rows['content'];?></td>
      <td><?php echo $rows['rating'];?></td>
      <td><?php echo $rows['submit_date'];?></td>
    </tr>
    <?php $i++;}
    ?>
  </tbody>
</table>
</div>
</body>
</html>





