<?php
include 'dashboard_home.php';
include '../partials/connection.php';
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  header("location: login.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
</head>
<body>
<?php  
   include '../partials/connection.php';
   $usname=$_SESSION['username'];
   $sql1 = "SELECT userimg FROM usertable WHERE USERNAME='$usname'"; 
   $sql2 = "SELECT name,username,Email,phone_no,dob,gender FROM usertable WHERE USERNAME='$usname'";
   $result1 = mysqli_query($conn,$sql1);
   $result2 = mysqli_query($conn,$sql2);
   if (mysqli_num_rows($result2)==1)
   $row2=mysqli_fetch_array($result2)
?> 
<div id="main">
 
<div class="gallery"> 
        <?php while($row1 = $result1->fetch_assoc()){ ?> 
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row1['userimg']); ?>" alt="avatar" class="rounded-circle img-fluid mx-auto d-block" style="width: 250px;"></br> 
        <?php } ?> 
    </div> 
      <h5>Name : <?php  echo $row2['name'];?></h5></br>
      <h5>USERNAME : <?php echo $row2['username'];?></h5></br>
      <h5>Email Id : <?php echo $row2['Email']; ?></h5></br>
      <h5>Phone No : <?php echo $row2['phone_no']; ?></h5></br>
      <h5>DOB : <?php echo $row2['dob']; ?></h5></br>
      <h5>Gender : <?php echo $row2['gender']; ?></h5>

  
  <div class="panel-body bio-graph-info">
              
            

  </div>
  
</div>

  
</div>
</body>
</html>