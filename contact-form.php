<!doctype html>
<html>
<head>

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact US</title>
    <link rel="icon" href="img/favicon.png" sizes="32x32" type="image/png">
    <link rel="stylesheet" href="css/components.css">
    <link rel="stylesheet" href="css/icons.css">
    <link rel="stylesheet" href="css/responsee.css">
    <link rel="stylesheet" href="owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="owl-carousel/owl.theme.css">
    <!-- CUSTOM STYLE -->      
    <link rel="stylesheet" href="css/template-style.css">
    <link href="https://fonts.googleapis.com/css?family=Barlow:100,300,400,700,800&amp;subset=latin-ext" rel="stylesheet">  
    <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>  



<meta charset="utf-8">
<title>Contact Form in PHP</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<style>
.container {
max-width: 500px;
margin: 50px auto;
text-align: left;
font-family: sans-serif;
}
form {
border: 1px solid #1A33FF;
background: #ecf5fc;
padding: 40px 50px 45px;
}
.form-control:focus {
border-color: #000;
box-shadow: none;
}
label {
font-weight: 600;
}
.error {
color: red;
font-weight: 400;
display: block;
padding: 6px 0;
font-size: 14px;
}
.form-control.error {
border-color: red;
padding: .375rem .75rem;
}    
</style>
</head>
<body class="size-1520 primary-color-red background-dark">
 <!-- HEADER -->
    <header class="grid">
      <!-- Top Navigation -->
      <nav class="s-12 grid background-none background-primary-hightlight">
      <!-- logo -->
      <a>
      <img src="img/favicon.png" alt="logo" width="50" height="50"/>
      </a>


      </a>
      <div class="top-nav s-12 l-9">
        <ul class="top-ul right chevron">
          <li><a href="index.php">Home</a></li>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            LOGIN
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="../ReviewMyProduct/login.php">USER</a></li>
            <li><a class="dropdown-item" href=" ../ReviewMyProduct/admin/login_admin.php">ADMIN</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            SIGN UP
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="../ReviewMyProduct/signup.php">USER</a></li>
            <li><a class="dropdown-item" href="../ReviewMyProduct/admin/signup_admin.php">ADMIN</a></li>
          </ul>
        </li>
          <li><a href="about.php">ABOUT US</a></li>
          <li><a href="contact-form.php">Contact</a></li>

        </ul>
      </div>
    </nav>
    </header>
<div class="container mt-5">
<?php
//include('db.php');
$servername='localhost';
    $username='root';
    $password='';
    $dbname = "product_reviewer";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
      if(!$conn){
          die('Could not Connect MySql Server:' .mysql_error());
        }
        
if(!empty($_POST["send"])) {
$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$subject = $_POST["subject"];
$message = $_POST["message"];
// Recipient email
$toMail = $email;
$frommail = "helpreviewmyproduct@gmail.com";
$answer = "Dear " .$name. ", \r\n Thank You so much ! We'll soon get back to you.";
// Build email header
$header = "From: ReviewMyProduct <".$frommail.">\r\n";
// Send email
if(mail($toMail, $subject, $answer, $header)) {
// Store contactor data in database
$sql = $conn->query("INSERT INTO contacts_list(name, email, phone, subject, message, sent_date)
VALUES ('{$name}', '{$email}', '{$phone}', '{$subject}', '{$message}', now())");
if(!$sql) {
die("MySQL query failed.");
} else {
$response = array(
"status" => "alert-success",
"message" => "We have received your query and stored your information. We will contact you shortly."
);              
}
} else {
$response = array(
"status" => "alert-danger",
"message" => "Message coudn't be sent, try again"
);
}
}  
?>
<!-- Messge -->
<?php if(!empty($response)) {?>
<div class="alert text-center <?php echo $response['status']; ?>" role="alert">
<?php echo $response['message']; ?>
</div>
<?php }?>
<!-- Contact form -->
<form action="" name="contactForm" method="post" enctype="multipart/form-data">
<div class="form-group">
<label>Name</label>
<input type="text" class="form-control" name="name" id="name">
</div>
<div class="form-group">
<label>Email</label>
<input type="email" class="form-control" name="email" id="email">
</div>
<div class="form-group">
<label>Phone</label>
<input type="text" class="form-control" name="phone" id="phone">
</div>
<div class="form-group">
<label>Subject</label>
<input type="text" class="form-control" name="subject" id="subject">
</div>
<div class="form-group">
<label>Message</label>
<textarea class="form-control" name="message" id="message" rows="4"></textarea>
</div>
<input type="submit" name="send" value="Send" class="btn btn-dark btn-block">
</form>
</div>
<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
<script>
$(function() {
$("form[name='contactForm']").validate({
// Define validation rules
rules: {
name: "required",
email: "required",
phone: "required",
subject: "required",
message: "required",
name: {
required: true
},
email: {
required: true,
email: true
},          
phone: {
required: true,
minlength: 10,
maxlength: 10,
number: true
},          
subject: {
required: true
},          
message: {
required: true
}
},
// Specify validation error messages
messages: {
name: "Please provide a valid name.",
email: {
required: "Please enter your email",
minlength: "Please enter a valid email address"
},
phone: {
required: "Please provide a phone number",
minlength: "Phone number must be min 10 characters long",
maxlength: "Phone number must not be more than 10 characters long"
},
subject: "Please enter subject",
message: "Please enter your message"
},
submitHandler: function(form) {
form.submit();
}
});
});    
</script>
</body>
</html>