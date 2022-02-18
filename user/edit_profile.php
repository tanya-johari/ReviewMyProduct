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
        if ($_SERVER["REQUEST_METHOD"]=="POST") {
            if (1) {
                $fileName = basename($_FILES["image"]["name"]); 
                $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
                $allowTypes = array('jpg','png','jpeg','gif'); 
                if(in_array($fileType, $allowTypes)){ 
                    $image = $_FILES['image']['tmp_name']; 
                    $imgcontent = addslashes(file_get_contents($image));
            $Email=$_POST["Email"];
            $name=$_POST["name"];
            $username=$_POST["username"];
            $phone_no=$_POST["phone_no"];
            $dob=$_POST["dob"];
            $gender=$_POST["gender"];
            $update = "UPDATE usertable SET 
            userimg='$imgcontent',name='$name',username='$username', email='$Email',
            phone_no='$phone_no',dob='$dob',gender='$gender' where username='$username'";
            $sql3=mysqli_query($conn,$update);
            echo '<div class="alert alert-success alert-dismissable" id="flash-msg">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <h5><i class="icon fa fa-check"></i>Successfully Updated your Profile!</h5>
            </div>';}
            else{ 
                $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
               } 
        }          
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
<form action="/ReviewMyProduct/user/edit_profile.php" method="POST" enctype="multipart/form-data">

<div class="gallery"> 
        <?php while($row1 = $result1->fetch_assoc()){ ?> 
        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row1['userimg']); ?>" alt="avatar" class="rounded-circle img-fluid mx-auto d-block" style="width: 250px;"></br> 
        <?php } ?> 
        </br>
        <h6 align="center">CHANGE PROFILE PICTURE: <input type="file" name="image"></h6></br>
</div> 

      
    <h5>Name : <input type="text" name="name" value="<?php echo $row2['name'];?>"></h5></br>
    <h5>USERNAME : <input type="text" name="username" value="<?php echo $row2['username'];?>"></h5></br>
    <h5>Email Id : <input type="email" name="Email" value="<?php echo $row2['Email'];?>"></h5></br>
    <h5>Phone No : <input type="tel" name="phone_no" value="<?php echo $row2['phone_no'];?>" pattern="[6789][0-9]{9}" title="Please enter valid phone number"></h5></br>
    <h5>DOB : <input type="date" name="dob" value="<?php echo $row2['dob'];?>" min="1960-01-01" max="2011-12-31"></h5></br>
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