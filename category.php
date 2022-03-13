<?php
session_start();
$_SESSION['loggedin'] = true;
$_SESSION['counter']=0;
$_SESSION['iid']=0;
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ReviewMyProduct</title>
  <link rel="icon" href="img/favicon.png" sizes="32x32" type="image/png">
  <link rel="stylesheet" href="css/components.css">
  <link rel="stylesheet" href="css/icons.css">
  <link rel="stylesheet" href="css/responsee.css">
  <link rel="stylesheet" href="owl-carousel/owl.carousel.css">
  <link rel="stylesheet" href="owl-carousel/owl.theme.css">
  <!-- CUSTOM STYLE -->
  <link rel="stylesheet" href="css/template-style.css">
  <link rel="stylesheet" href="css/new.css">
  <link href="https://fonts.googleapis.com/css?family=Barlow:100,300,400,700,800&amp;subset=latin-ext" rel="stylesheet">
  <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui.min.js"></script>
  <script type="text/javascript" src="js/validation.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<!--
    You can change the color scheme of the page. Just change the class of the <body> tag. 
    You can use this class: "primary-color-white", "primary-color-red", "primary-color-orange", "primary-color-blue", "primary-color-aqua", "primary-color-dark" 
    -->

<!--
    Each element is able to have its own background or text color. Just change the class of the element.  
    You can use this class: 
    "background-white", "background-red", "background-orange", "background-blue", "background-aqua", "background-primary" 
    "text-white", "text-red", "text-orange", "text-blue", "text-aqua", "text-primary"
    -->

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
          
          <li><a href="user/profile.php">MY ACCOUNT</a></li>
        
          <li><a href="about.php">ABOUT US</a></li>
          <li><a href="contact-form.php">Contact</a></li>

        </ul>
      </div>
    </nav>
  </header>

  <br>
  <br>


  <center>
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/laptop.avif" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/qoute.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/hp1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/mp.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
        <h2 class="s-12 l-6 center text-thin text-size-30 text-white text-uppercase margin-bottom-30">
          <b>CATEGORIES</b>
        </h2>
      </center>

      <center>
        <p class="s-12 l-6 center">
          <span>
            MOBILES
            LAPTOP
            HEADPHONES
            SMART WATCHES
            It's a good idea to headline each category and to write succinct explanations for each part of the
            phone; a potential buyer won't linger too long for the advice. Talk about what you like about the smartphone
            you're reviewing, how easy it is to use, what features in particular are of worthy note.
          </span>
        </p>
      </center>
    </section>
    <BR>
    <BR>
    <!-- SECTION 1 -->
    <section class="grid margin text-center">

      <a href="FINAL/mobile.php" class="s-12 m-6 l-3 padding-2x vertical-center margin-bottom background-red">
        <br>
        <img src="img/11.jpg"></img>
        <h3 class="text-strong text-size-20 text-line-height-1 margin-bottom-30 text-uppercase">MOBILE PHONES
        </h3>
      </a>
      <a href="FINAL/laptop.php" class="s-12 m-6 l-3 padding-2x vertical-center margin-bottom background-blue">
        <br>
        <br>
        <img src="img/22.jfif" class="icon-sli-equalizer text-size-60 text-white center margin-bottom-15"
          style="height: 300;"></img>
        <h3 class="text-strong text-size-20 text-line-height-1 margin-bottom-30 text-uppercase">LAPTOP
        </h3>
      </a>

      <!-- Image-->


      <a href="FINAL/headphone.php" class="s-12 m-6 l-3 padding-2x vertical-center margin-bottom background-orange">
        <br>
        <img src="img/headphones.jpg" class="icon-sli-equalizer text-size-60 text-white center margin-bottom-15"></img>
        <h3 class="text-strong text-size-20 text-line-height-1 margin-bottom-30 text-uppercase">HEADPHONES</h3>
      </a>
      <a href="FINAL/smartwatches.php" class="s-12 m-6 l-3 padding-2x vertical-center margin-bottom background-aqua">
        <br>
        <img src="img/HP.jpg" class="icon-sli-equalizer text-size-60 text-white center margin-bottom-15"></img>
        <h3 class="text-strong text-size-20 text-line-height-1 margin-bottom-30 text-uppercase">SMART WATCHES</h3>
      </a>
    </section>

    <!-- SECTION 2 -->




    <script type="text/javascript" src="js/responsee.js"></script>
    <script type="text/javascript" src="owl-carousel/owl.carousel.js"></script>
    <script type="text/javascript" src="js/template-scripts.js"></script>

</body>
</br>
<h5 align="center">
© <?php echo date("Y"); ?> 
</br>
Made by : <a href="https://github.com/tanya-johari" style="color:orange;"> Tanya Johari </a>
<a href="https://github.com/YesVishakha" style="color:yellow;"> Vishakha Yadav </a>
<a href="https://github.com/lavi-chadha" style="color:lightblue;"> Lavi Chadha </a>
</br>
</br>
</html>