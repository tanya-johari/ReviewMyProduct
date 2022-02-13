<?php include 'dashboard_home.php';
include '../partials/connection.php';
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
    <title>EDIT PROFILE</title>
</head>
<body>
    <?php 
        
        
        $usname=$_SESSION['adminusername'];

        $sql1 = "SELECT adminimg FROM admin WHERE adminusername='$usname'"; 
        $sql2 = "SELECT fname,lname,adminusername,email,phoneno,dob,gender FROM admin WHERE adminusername='$usname'";
        $result1 = mysqli_query($conn,$sql1);
        $result2 = mysqli_query($conn,$sql2);
       
        if (mysqli_num_rows($result2)==1)
        $row2=mysqli_fetch_array($result2)
    ?>
<div id="main">
<form action="" method="POST">

<div class="gallery"> 
        <?php while($row1 = $result1->fetch_assoc()){ ?> 
        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row1['adminimg']); ?>" alt="avatar" class="rounded-circle img-fluid mx-auto d-block" style="width: 250px;"></br> 
        <?php } ?> 
        </br>
        <h6 align="center">CHANGE PROFILE PICTURE: <input type="file" name="adminimg"></h6></br>
</div> 

    <h5>First Name :<input type="text" name="fname" value="<?php echo $row2['fname'];?>"></h5></br>   
    <h5>last Name : <input type="text" name="lname" value="<?php echo $row2['lname'];?>"></h5></br>
    <h5>USERNAME : <input type="text" name="adminusername" value="<?php echo $row2['adminusername'];?>"></h5></br>
    <h5>Email Id : <input type="text" name="email" value="<?php echo $row2['email'];?>"></h5></br>
    <h5>Phone No : <input type="text" name="phoneno" value="<?php echo $row2['phoneno'];?>"></h5></br>
    <h5>DOB : <input type="date" name="dob" value="<?php echo $row2['dob'];?>"></h5></br>
    <h5>Gender : <select type="gender" name="gender" value="<?php echo $row2['gender'];?>">
                                <option selected><?php echo $row2['gender'];?></option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                </select></h5></br>
    <button type="submit" class="btn btn-primary" name="Submit">Save Changes</button>
</form>
<?php
    if (isset($_POST['Submit'])) {
        $v1=rand(1111,9999);
        $v2=rand(1111,9999);
        $v3=$v1.$v2;
        $v3=md5($v3);
        $fnm=$_FILES["adminimg"]["name"];
        $dst="../assets/img/".$v3.$fnm;
        move_uploaded_file($_FILES["adminimg"]["tmp_name"],$dst);
        $Email=$_POST["email"];
        $fname=$_POST["fname"];
        $lname=$_POST["lname"];
        $usname=$_POST["adminusername"];
        $phoneno=$_POST["phoneno"];
        $dob=$_POST["dob"];
        $gender=$_POST["gender"];
        $update = "UPDATE admin SET adminimg='$dst',fname='$fname',lname='$lname',email='$Email',phoneno='$phoneno',
        dob='$dob',gender='$gender' where adminusername='$usname'";
        $sql3=mysqli_query($conn,$update);
    }
?>
</div>
</body>
</html>