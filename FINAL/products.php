<?php
  include '../partials/connection.php';
  $iid;
  $iname;
session_start();
$_Session["ratedindex"]=0;
if($_SESSION['counter']==0)
{
$iid= $_GET['itemid'];
$_SESSION['iid']=$_GET['itemid']; 
$_SESSION['counter']=$_SESSION['counter']+1;
}
if(isset($_POST['submit'])){
  $textareaValue = trim($_POST['content']);
  $status = $statusMsg = ''; 
  $iid=$_SESSION['iid'];
  $status = 'error'; 
  $uid=$_SESSION['uid'];
  $rate=Session["ratedIndex"];
  
  $exists=false;
  $sql = "INSERT into reviews (`item_id`, `userid`, `content`, `rating`) VALUES ('$iid', '$uid', '$rate', '$textareaValue')";
  $result = mysqli_query($conn, $sql);
}
   $iid=$_SESSION['iid'];
   $sql2 = "SELECT * FROM product WHERE item_id='$iid'";
   $sql3 = "SELECT * FROM reviews WHERE item_id='$iid'";
   $result2 = mysqli_query($conn,$sql2);
   if (mysqli_num_rows($result2)==1)
   $row2=mysqli_fetch_array($result2);
   $result = $conn->query($sql3);
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_GET['itemname'] ?></title>
    <!-- Bootstrap CDN -->
  
    <script src="https://kit.fontawesome.com/a720dc54e5.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
<img src="<?php echo $row2['item_image'] ?? "./assets/products/13.png"; ?>" alt="product1" class="img-fluid"></br>
<h3><?php echo $row2['item_name'];?></h3></br>
<h3><?php echo $row2['item_brand']; ?></h3></br>
<h3><?php echo $row2['item_price']; ?></h3></br>
<div class="container p-2 my-4 bg-light text-white">
<table class="table table-striped">
<?php   
while($rows=$result->fetch_assoc())
{
?>
  <thead class="thead-dark">
    <tr>
      <th scope="row"><?php echo $rows['userid']; ?></th>
     </tr>
  </thead>
  <tbody>
  <tr>
      <td><?php echo $rows['content'];
      echo $rows['rating'];?></td>
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
    <label for="qual" class="form-label">Quality :</label>
    <input name="qual" type="text" class="form-control" placeholder="quality" required>
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
    <div class="col-md-6">
    <label for="cont" class="form-label">Content :</label>
    <textarea name="content" class="form-control" placeholder="Write your review here..." required></textarea>
    </div>
    <div align="center">
    <input type="submit" name="sub" class="btn btn-primary" value="submit">
    <script>
  var ratedIndex =-1;
  $(document).ready(function(){
    resetStarColors();
   $('.fa-star').on('click',function(){
     
          '<% Session["ratedindex"] = " ' + parseInt($(this).data('index'))+ ' "; %>';
    })
    $('.fa-star').mouseover(function(){
    
      var currindex=parseInt($(this).data('index'));
      for(var i=0;i<=currindex;i++)
       $('#submit_star_'+i).addClass('text-warning');
    });
    $('.fa-star').mouseleave(function(){
      resetStarColors();
      if(ratedIndex!=-1){
        for(var i=0;i<=ratedIndex;i++)
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
    function saverating(){
      $.ajax({
        url:"/ReviewMyProduct/FINAL/products.php",
        method:"POST",
        dataType: 'json',
        data: {
          save:1,
          ratedIndex: ratedIndex+1
        },success: function(r){
          ratedIndex=r.ratedIndex;
        }
      });
    }
</script>
    </form>
</div>
<?php
}
?>
</body>
</html>
