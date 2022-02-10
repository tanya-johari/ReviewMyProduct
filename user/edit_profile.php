<?php include 'dashboard_home.php';
include '../partials/connection.php';
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  header("location:/ReviewMyProduct/login.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT PROFILE</title>
</head>
<body>
    <?php 
        if (isset($_POST['Submit'])) {
            $Email=$_POST["Email"];
            $name=$_POST["name"];
            $username=$_POST["username"];
            $phone_no=$_POST["phone_no"];
            $dob=$_POST["dob"];
            $gender=$_POST["gender"];
            $userimg=$_POST["userimg"];
            $update = "UPDATE usertable SET userimg='$userimg',name='$name',username='$username', email='$Email',
            phone_no='$phone_no',dob='$dob',gender='$gender' where username='$username'";
            $sql3=mysqli_query($conn,$update);
        }
        
        $username=$_SESSION['username'];

        $sql1 = "SELECT userimg FROM usertable WHERE username='$username'"; 
        $sql2 = "SELECT name,username,Email,phone_no,dob,gender FROM usertable WHERE username='$username'";
        $result1 = mysqli_query($conn,$sql1);
        $result2 = mysqli_query($conn,$sql2);
       
        if (mysqli_num_rows($result2)==1)
        $row2=mysqli_fetch_array($result2)
    ?>
<div id="main">
<form action="" method="POST">

<div class="gallery"> 
        <?php while($row1 = $result1->fetch_assoc()){ ?> 
        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row1['userimg']); ?>" alt="avatar" class="rounded-circle img-fluid mx-auto d-block" style="width: 250px;"></br> 
        <?php } ?> 
        </br>
        <h6 align="center">CHANGE PROFILE PICTURE: <input type="file" name="userimg"></h6></br>
</div> 

      
    <h5>Name : <input type="text" name="name" value="<?php echo $row2['name'];?>"></h5></br>
    <h5>USERNAME : <input type="text" name="username" value="<?php echo $row2['username'];?>"></h5></br>
    <h5>Email Id : <input type="text" name="Email" value="<?php echo $row2['Email'];?>"></h5></br>
    <h5>Phone No : <input type="text" name="phone_no" value="<?php echo $row2['phone_no'];?>"></h5></br>
    <h5>DOB : <input type="date" name="dob" value="<?php echo $row2['dob'];?>"></h5></br>
    <h5>Gender : <select type="gender" name="gender" value="<?php echo $row2['gender'];?>">
                                <option selected><?php echo $row2['gender'];?></option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                </select></h5></br>
    <button type="submit" class="btn btn-primary" name="Submit">Save Changes</button>
</form>

</div>
</body>
</html>