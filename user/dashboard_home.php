<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

<style>
body {
  font-family: "Lato", sans-serif;
}

.sidebar {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #b00046;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidebar a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 20px;
  color: white;
  display: block;
  transition: 0.3s;
}

.sidebar a:hover {
  color: #f1f1f1;
}

.sidebar .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

.openbtn {
  font-size: 20px;
  cursor: pointer;
  background-color: #b00046;
  color: white;
  padding: 10px 15px;
  border: none;
}

.openbtn:hover {
  background-color: #b00046;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}

.bio-graph-info {
    color: white;
}
.bio-row {
    width: 50%;
    float: left;
    margin-bottom: 10px;
    padding:0 15px;
}

.bio-row p span {
    width: 100px;
    display: inline-block;
}

</style>
</head>
<body>

<div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <a href="#">👤Profile</a>
  <a href="#">✏Edit Profile</a>
  <a href="#">⭐Manage Review</a>
  <a href="#">🔑Change Password</a>
  <a href="../logout.php">🔒Logout</a>
  
</div>

<div id="main">
  <button class="openbtn" onclick="openNav()">☰ USER</button> 
  <div class="container p-3 my-3 bg-dark text-white">
  <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar" class="rounded-circle img-fluid mx-auto d-block" style="width: 150px;"></br>
   
  <div class="panel-body bio-graph-info">
              
              <div class="row">
                  <div class="bio-row">
                      <p><span>First Name </span>: </p>
                  </div>
                  <div class="bio-row">
                      <p><span>Last Name </span>: </p>
                  </div>
                  <div class="bio-row">
                      <p><span>User ID </span>: </p>
                  </div>
                  <div class="bio-row">
                      <p><span>Birthday</span>: </p>
                  </div>
                  <div class="bio-row">
                      <p><span>Occupation </span>: </p>
                  </div>
                  <div class="bio-row">
                      <p><span>Email </span>: </p>
                  </div>
                  <div class="bio-row">
                      <p><span>Mobile </span>: </p>
                  </div>
                  <div class="bio-row">
                      <p><span>Gender </span>: </p>
                  </div>
              </div>
          </div>
      
  </div>
  
</div>

<script>
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
   
</body>
</html> 
