<?php include 'dashboard_home.php';
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  header("location:/ReviewMyProduct/admin/login_admin.php");
  exit;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
<div id="main">
 
<div class="gallery"> 
        <?php while($row1 = $result1->fetch_assoc()){ ?> 
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row1['userimg']); ?>" alt="avatar" class="rounded-circle img-fluid mx-auto d-block" style="width: 250px;"></br> 
        <?php } ?> 
    </div> 
   
     <h5>First Name : <?php  echo $row2['fname'];?></h5></br>
     <h5>last Name : <?php  echo $row2['lname'];?></h5></br>
      <h5>USERNAME : <?php echo $row2['adminusername'];?></h5></br>
      <h5>Email Id : <?php echo $row2['Email']; ?></h5></br>
      <h5>Phone No : <?php echo $row2['phoneno']; ?></h5></br>
      <h5>DOB : <?php echo $row2['dob']; ?></h5></br>
      <h5>Gender : <?php echo $row2['gender']; ?></h5>
  </div>
  
</div>
  
</div>
</body>
</html>