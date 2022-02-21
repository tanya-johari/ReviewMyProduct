<?php include 'dashboard_home.php';
include '../partials/connection.php';
if (isset($_POST['Delete'])) {
  
  $delete = 'DELETE FROM usertable WHERE userid = ?';
  $stmt = $conn->prepare($delete);
  $stmt->bind_param("i", $_POST['Delete']);
  $stmt->execute();

  echo '<div class="alert alert-success alert-dismissable" id="flash-msg">
<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
<h5><i class="icon fa fa-check"></i>Successfully Deleted User Account!</h5>
</div>';
}
$sql = "SELECT * FROM usertable";
$result = $conn->query($sql);
$counter = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage User</title>

</head>
<body>
<div class="container p-2 my-4 bg-light text-white">
<form method="POST"> 
<table class="table table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Sno</th>
      <th scope="col">User ID</th>
      <th scope="col">Name</th>
      <th scope="col">User Name</th>
      <th scope="col">User Img</th>
      <th scope="col">Phone no</th>
      <th scope="col">Email</th>
      <th scope="col">No of Reviews</th>
      <th scope="col">Delete</th>

    </tr>
  </thead>
  <tbody>
  <?php   
                while($rows=$result->fetch_assoc())
                {
                    $uid=$rows['userid'];
                    $sql1 = "SELECT userimg FROM usertable WHERE userid='$uid'";
                    $result1 = mysqli_query($conn,$sql1);
                    $sql2="SELECT COUNT(*) AS cnt FROM reviews WHERE userid='$uid'";
                    $result2 = $conn->query($sql2);
                    $total= $result2->fetch_assoc();
             ?>
    <tr>
    
      <th scope="row"><?php echo ++$counter;?></th>
      <td><?php echo $rows['userid'];?></td>
      <td><?php echo $rows['name'];?></td>
      <td><?php echo $rows['username'];?></td>
      <td><?php while($row1 = $result1->fetch_assoc()){ ?> 
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row1['userimg']); ?>" alt="avatar" width="100px" height="100px"></br> 
        <?php } ?></td>
      <td><?php echo $rows['phone_no'];?></td>
      <td><?php echo $rows['Email'];?></td>
      <td><?php echo $total['cnt'];?></td>
      <?php echo '<td><button type="submit" name="Delete" value="'.$rows['userid'].'">DELETE</button></td>';?>
    </tr>
    <?php }
    ?>
  </tbody>
</table>
</div>
</body>
</html>





