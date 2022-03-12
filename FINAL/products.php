<?php
  include '../partials/connection.php';
  $iid;
  $iname;
session_start();
if($_SESSION['counter']==0)
{
$iid= $_GET['itemid'];
$_SESSION['iid']=$_GET['itemid']; 
$_SESSION['counter']=$_SESSION['counter']+1;
}
if($_SERVER["REQUEST_METHOD"]=="POST"){

  $status = $statusMsg = ''; 
  $iid=$_SESSION['iid'];
  $status = 'error'; 
  $uid=$_SESSION['uid'];
  $rate=$_POST['rating'];
  $content=$_POST["content"];
  $exists=false;
  $sql = "INSERT into reviews (`item_id`, `userid`, `rating`, `content`) VALUES ('$iid', '$uid', '$rate', '$content')";
  $result = mysqli_query($conn, $sql);
}
   $iid=$_SESSION['iid'];
   $sql2 = "SELECT * FROM product WHERE item_id='$iid'";
   $sql3 = "SELECT * FROM reviews JOIN usertable WHERE usertable.userid = reviews.userid AND item_id='$iid'";
   $sql4 = "SELECT * FROM itemref WHERE item_id='$iid'";
   $sql5 = "SELECT COUNT(content) AS ttr FROM reviews WHERE item_id='$iid'";
   $totalReview = $conn->query($sql5);
   $sql6 = "SELECT COUNT(rating) AS rt FROM reviews WHERE item_id='$iid'";
   $totalRating = $conn->query($sql6);
   $sql7 = "SELECT ROUND(AVG(rating),2) AS ar FROM reviews WHERE item_id='$iid'";
   $avgrating = $conn->query($sql7);
   
   $result1 = $conn->query($sql4);
   $result2 = mysqli_query($conn,$sql2);
   if (mysqli_num_rows($result2)==1)
   $row2 = mysqli_fetch_array($result2);
   $result = $conn->query($sql3);
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_GET['itemname'] ?></title>
    <link rel="icon" href="../img/favicon.png" sizes="32x32" type="image/png">
    <!-- Bootstrap CDN -->
  
    <script src="https://kit.fontawesome.com/a720dc54e5.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/product.css">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="../index.php">ReviewMyProduct</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">

          
          <a class="nav-link "  href="../index.php">HOME </a>
 </li>
        
            <li><a class="dropdown-item" href="../login.php">Login</a></li>
            <li><a class="dropdown-item" href="../signup.php">Sign Up</a></li>
          
        <li class="nav-item">
          <a class="nav-link" href="../contact-form.php">CONTACT</a>
        </li>
       

      </ul>
    </div>
  </div>
  <div class="navbar-brand">
  
    <form class="d-flex">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
</form>
</nav>
<div class=f1>
<img src="<?php echo $row2['item_image'] ?? "./assets/products/13.png"; ?>" alt="product1" class="img-fluid center" style="width: 350px;"></br>
<div class="col-md-5">
<h4 style="color:#810CA6; "><?php echo $row2['item_name'];?></h4></br></div>
<div class="col-md-5">
<h4 style="color:#311CA6; "><?php echo $row2['item_brand']; ?></h4></br></div>
</div>
<div class=f2>
  <h3 style="color:#336296">SPECFICATIONS:</h3>
<h5><?php echo $row2['description']; ?></h5></br>
</div>


<div class="container p-2 my-4 bg-light text-white">
<table class="table table-striped">
<thead class="thead-dark">
    <tr>
      <th scope="row"><h4>Store</h4></th>
      <th scope="row"><h4>Link</h4></th>
      <th scope="row"><h4>Price</h4></th>
     </tr>
  </thead>
  <tbody>
  <tr>
  <?php   
while($rows1=$result1->fetch_assoc())
{ $src;
  if($rows1['store'] == 'amazon')
    $src="http://media.corporate-ir.net/media_files/IROL/17/176060/Oct18/Amazon%20logo.PNG";
  if($rows1['store'] == 'flipkart')
    $src="https://i.pinimg.com/originals/15/aa/16/15aa1678d4ee5615c5c53ed5c9968126.png";
    if($rows1['store'] == 'croma')
    $src="https://m.media-amazon.com/images/S/abs-image-upload-na/8/AmazonStores/A21TJRUUN4KGV/19dae191bb75eda8e3fc9ffc1e335b9f.w400.h400.jpg";
    
    ?>
      <td><h5><?php echo $rows1['store'];?></h5></td>
      <td>
      <p><a href="<?php echo $rows1['reflink'];?>">
      <img src="<?php echo $src; ?>" width="80" height="100">
      </a></p></td>
      <td><h5>Rs <?php echo $rows1['price']; ?></h5></td>
    </tr>
    
    <?php }
    ?>
  </tbody>
</table>
</div>
<?php $tr=$totalReview->fetch_assoc();
      $rt=$totalRating->fetch_assoc();
      $ar=$avgrating->fetch_assoc();
?>
<h4 align="center" style="color:blue;">Total Reviews and Ratings</h4>
<h5 align="center">(<?php echo $tr['ttr'] ;?>) Reviews and (<?php echo $rt['rt'];?>) Ratings</h5>
<?php if($ar['ar'] > 0) {?>
<h4 align="center" style="color:orange;">Average Rating : <?php echo $ar['ar'];?></h4>
<?php } ?>

<div class="container p-2 my-4 bg-light text-white">
<table class="table table-striped">
<?php   
while($rows=$result->fetch_assoc())
{
  $date = date_create($rows['submit_date']);
?>
  <thead class="thead-dark">
    <tr>
    <th scope="row"><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($rows['userimg']); ?>" alt="avatar" class="rounded-circle img-fluid " style="width:80px;">
      
      <h4>@<?php echo $rows['username']; ?></h4></th>
      <th scope="row"></th>
      <th scope="row"><?php echo date_format($date, 'jS F Y'); ?></th>
     </tr>
  </thead>
  <tbody>
  <tr>
      <td><?php echo $rows['content'];?></td>
      <td> </td>
      <td><h6><?php echo $rows['rating'];?>⭐</h6></td>
    </tr>
    
    <?php }
    ?>
  </tbody>
</table>
</div>
<?php
if($_SESSION['loggedin']==true){
?>
<div class="container">
    <h1 class="text-center">Write Review for ReviewMyProduct</h1>
    <div class="write_review">
    <form action="/ReviewMyProduct/FINAL/products.php" method="post" enctype="multipart/form-data">
    <div class="col-md-6">
    </div>
    <div class="col-md-6">
    <label for="rate" class="form-label">Ratings :</label>
    <h4 class="text-center mt-2 mb-4">
      <i class="fas fa-star fa-2x" id="submit_star_0" data-index="0"></i>
      <i class="fas fa-star fa-2x" id="submit_star_1" data-index="1"></i>
      <i class="fas fa-star fa-2x" id="submit_star_2" data-index="2"></i>
      <i class="fas fa-star fa-2x" id="submit_star_3" data-index="3"></i>
      <i class="fas fa-star fa-2x" id="submit_star_4" data-index="4"></i>
    </div>
    <input type="hidden" name="rating" id="rating" />
    <script>
  var rating = -1;
  $(document).ready(function(){
    resetStarColors();
   $('.fa-star').on('click',function(){
   rating = parseInt($(this).data('index'));
   rating=rating+1;
   $("#rating").val(rating);
    })
    $('.fa-star').mouseover(function(){
    
      var currindex=parseInt($(this).data('index'));
      for(var i=0;i<=currindex;i++)
       $('#submit_star_'+i).addClass('text-warning');
    });
    $('.fa-star').mouseleave(function(){
      resetStarColors();
      if(rating!=-1){
        for(var i=0;i<=rating;i++)
       $('#submit_star_'+i).addClass('text-warning');
      }
    });
  function resetStarColors(){
    for(var i=0;i<5;i++){
       $('#submit_star_'+i).addClass('star-light');
       $('#submit_star_'+i).removeClass('text-warning');
    }
    }
    });
</script>
    <div class="col-md-6">
    <label for="cont" class="form-label">Content :</label>
    <textarea name="content" class="form-control" placeholder="Write your review here..." required></textarea>
    </div>
    <br>
    <button type="submit" class="btn btn-primary" >Submit Review</button>
    </form>
</div>
<?php
}
include 'footer.php';
?>
</body>
</html>
