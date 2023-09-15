<?php
session_start();
include("connect.php");

error_reporting(0);
if(strlen($_SESSION['usrid'])==0)
    {   
header('location:logout.php');
}
else{
	if(isset($_POST['change']))
    {
$password=md5($_POST['password']);
$newpassword=md5($_POST['newpassword']);
$uid=$_SESSION['usrid'];
    $sql ="SELECT user_password FROM tbl_user WHERE user_id=:uid and user_password=:password";
$query= $conn -> prepare($sql);
$query-> bindParam(':uid', $uid, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update tbl_users set user_password=:newpassword where user_id=:uid";
$chngpwd1 = $conn->prepare($con);
$chngpwd1-> bindParam(':uid', $uid, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();
echo "<script>alert('Success : Your Password succesfully changed.');</script>";
echo "<script>window.location.href='Change_password.php'</script>"; 
}
else {
echo "<script>alert('Success : Your current password is wrong');</script>";
echo "<script>window.location.href='Change_password.php'</script>"; 
}
}

	?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventify</title>
     <!-- PLUGINS CSS STYLE -->
  <!-- Bootstrap -->
  <link href="plugins/bootstrap/css/bootstra.min.css" rel="stylesheet">
  <!-- Themefisher Font -->  
  <link href="plugins/themefisher-font/style.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="plugins/font-awsome/css/font-awesome.min.css" rel="stylesheet">
  <!-- Magnific Popup -->
  <link href="plugins/magnific-popup/magnific-popup.css" rel="stylesheet">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
  <!-- Slick Carousel -->
  <link href="plugins/slick/slick.css" rel="stylesheet">
  <link href="plugins/slick/slick-theme.css" rel="stylesheet">
  <!-- CUSTOM CSS -->
  <link href="css/style.css" rel="stylesheet">
  <!-- FAVICON -->
  <link href="images/cop.jpeg" rel="shortcut icon">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/venobox/venobox.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <style>
	.bg-title{
  background: url(images/ro.jpeg)no-repeat;
  background-size: cover;
 
}

/* Default styles */
.cen{
		position: absolute;
		margin-top: 100px;
		margin-left: 160px;
		background-color:rgb(221, 221, 221);
	   width: 300px;
		
	}
	li{
		list-style: none;
		color: white;
		
		
	}
	a{
		color:rgb(109, 109, 109);
		font-size: 20px;
	}
	.col-md-6 input{
		width: 900px;
	}
	a:hover{
		color: #9a28d7;
	}
	
	.cen h3{
		color: aqua;
		
	}
    .tap{
		margin-top: 20px;
		margin-left: 550px;
		
	}
	.num h2 {
  font-size: 32px;
  margin-top: 40px;
  margin-left: 570px;
}

/* Responsive media queries for smaller screens */
@media (max-width: 1500px) {
  .cen {
    position: static;
    margin: 20px auto;
    background-color: rgb(221, 221, 221);
    width: 100%;
  }

  .col-md-6{
    position: static;
    margin: 20px auto;
    width: 100%;
  }
  .col-md-6 input{
    position: static;
    margin: 20px auto;
    width: 100%;
  }
  .tap{
    font-size: 24px;
    margin: 20px auto;
	text-align: center;
  }
  .frame{
    font-size: 24px;
    margin: 20px auto;
	text-align: center;
  }

  li {
    color: black;
	text-align: center;
  }
  .num h2 {
    font-size: 24px;
    margin: 20px auto;
	text-align: center;
	margin-left: 60px;
  }

  a {
    color:rgb(109, 109, 109);
    font-size: 16px;
	text-align: center;
  }

}
    .frame {
  width: 90%;

  
}
.custom-btn {
  width: 160px;
  height: 40px;
  top: 0px;
  color: #fff;
  border-radius: 5px;
  padding: 10px 25px;
  font-family: 'Lato', sans-serif;
  font-weight: 500;
  background: transparent;
  cursor: pointer;
  transition: all 0.3s ease;
  position: relative;
  display: inline-block;
   box-shadow:inset 2px 2px 2px 0px rgba(255,255,255,.5),
   7px 7px 20px 0px rgba(0,0,0,.1),
   4px 4px 5px 0px rgba(0,0,0,.1);
  outline: none;
}

/* 9 */
.btn-9 {
  border: none;
  transition: all 0.3s ease;
  overflow: hidden;
  
}
.btn-9:after {
  position: absolute;
  content: " ";
  z-index: -1;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-image: linear-gradient(315deg, #1fd1f9 0%, #b621fe 74%);
  transition: all 0.3s ease;
}
.btn-9:hover {
  background: transparent;
  box-shadow:  4px 4px 6px 0 rgba(255,255,255,.5),
              -4px -4px 6px 0 rgba(116, 125, 136, .2), 
    inset -4px -4px 6px 0 rgba(255,255,255,.5),
    inset 4px 4px 6px 0 rgba(116, 125, 136, .3);
  color: #fff;
}
.btn-9:hover:after {
  -webkit-transform: scale(2) rotate(180deg);
  transform: scale(2) rotate(180deg);
  box-shadow:  4px 4px 6px 0 #1fd1f9(255,255,255,.5),
              -4px -4px 6px 0 #20716A (116, 125, 136, .2), 
    inset -4px -4px 6px 0  #F11A7B(255,255,255,.5),
    inset 4px 4px 6px 0 (116, 125, 136, .3);
}
label {
    font-weight: bold;
    padding: 5px;
    color: #421387;
    font-size: 18px;
}
  </style>
</head>
<body>
<body class="body-wrapper">


<!--========================================
=            Navigation Section            =
=========================================-->

<nav class="navbar main-nav border-less fixed-top navbar-expand-lg p-0">
  <div class="container-fluid p-0">
      <!-- logo -->
      <a class="navbar-brand" href="index.php">
      <img src="images/cop.jpeg" alt="logo" width="170" height="38" >
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="fa fa-bars"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item dropdown active dropdown-slide">
          <a class="nav-link" href="#"  data-toggle="dropdown">Home
            <span>/</span>
          </a>
          <!-- Dropdown list -->
          <div class="dropdown-menu">
            <a class="dropdown-item" href="index.php">Homepage</a>
            <a class="dropdown-item" href="homepage-two.php">Homepage 2</a>
           
          </div>
        </li>
       
        <li class="nav-item dropdown dropdown-slide">
          <a class="nav-link" href="#" data-toggle="dropdown">Pages<span>/</span></a>
            <!-- Dropdown list -->
            <div class="dropdown-menu">
            <a class="dropdown-item" href="about-us.php">About Us</a>
              <a class="dropdown-item" href="speakers.php">speakers</a>
              <!-- <a class="dropdown-item" href="schedule.php">Schedule</a> -->
              <!-- <a class="dropdown-item" href="single-speaker.php">Single Speaker</a> -->
             <a class="dropdown-item" href="gallery-two.php">Gallery</a>
              <a class="dropdown-item" href="pricing.php">Tickets</a>
            </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="sponsors.php">Sponsors<span>/</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="news-right-sidebar.php">News<span>/</span></a>
        </li>
     
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact<span>/</span></a>
        </li>
       
        <?php if(empty($_SESSION['usrid'])) { ?>
    <li class="nav-item">
        <a class="nav-link" href="signup.php">Signup<span>/</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
    </li>
<?php } else { ?>
    <li class="nav-item">
        <a class="nav-link" href="My_account.php">My Account</a>
    </li>
<?php } ?>



      </ul>
      <a href="pricing.php" class="ticket">
        <img src="images/icon/ticket.png" alt="ticket">
        <span>Buy Ticket</span>
      </a>
      </div>
  </div>
</nav>


<!--====  End of Navigation Section  ====-->


		

		<!--================================
=            Page Title            =
=================================-->

<section class="page-title bg-title overlay-dark">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<div class="title">
					<h3>Change Password</h3>
				</div>
			
			</div>
		</div>
	</div>
</section>


<!--====  End of Page Title  ====-->

<div class="cen">
	<div class="cate">
		<ul>
		<h4 style="position: absolute; top: -50px; text-align: center;">My Account</h4>
 <br>		
 <li ><a href="My_account.php">My Profile</a></li>
 <br>
 <li><a href="Change_password.php">Change Password</a></li>
 <br>
 <li><a href="My_Booking.php">My Booking </a></li>
 <br>
 <li><a href="logout.php">Logout</a></li>
  </ul>
</div>
</div>


<div class="num">
	<h2 style="color:#421387; ">Change Password</h2>
</div>

		<div class="tap">
		<form method="post"> 
			<div class="col-md-6">
      <label>Your Current Password<span>*</span></label>
				<input type="password" name="password" class="form-control main" placeholder="Current Password">
			</div>
			<div class="col-md-6">
      <label>Your New Password<span>*</span></label>
				<input type="password"  name="newpassword" class="form-control main" placeholder="New Password">
			</div>
			<div class="col-md-6">
      <label>Your Confirm Password<span>*</span></label>
				<input type="password" name="confirmpassword" class="form-control main" placeholder="Confirm Password">
			</div>
			
			<div class="frame">
				<a href=""><button class="custom-btn btn-9" type="submit" name="change" style="margin-left: 13px;">CHANGE</button></a>
			   </div>
		</form>
	</div>
<br>
	<br>
	<!--============================
=            Footer            =
=============================-->

<footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
          <img src="images/cp.png" alt="logo" width="170" height="38">
            <p>
            Eventify is an online platform designed to facilitate the booking and reservation of various types of events, activities, tickets. In this website we are looking to secure a spot or participate in ticket, such as Concerts, Sports events, Festivals, Corporate, and more.</p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="fa fa-angle-right"></i> <a href="index.php">Home</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="about-us.php">About us</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="speakers.php">Speakers</a></li>
              <!-- <li><i class="fa fa-angle-right"></i> <a href="#">Schedule</a></li> -->
              <li><i class="fa fa-angle-right"></i> <a href="single-speaker.php">Single Speaker</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="contact.php">Contact</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="fa fa-angle-right"></i> <a href="gallery-two.php">Gallery</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="pricing.php">Pricing</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="sponsors.php">Sponsers</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="news-right-sidebar.php">News</a></li>
          
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
            D - 4 Block H North Nazimabad Town, Karachi, Karachi City, Sindh 74700<br>
             
              <strong>Phone:</strong> +92 308 0408601<br>
              <strong>Email:</strong> daniyalarif2004@gmail.com<br>
            </p>

            <div class="social-links">
              <a href="https://twitter.com/" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="https://www.facebook.com/" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="https://www.instagram.com/" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="https://www.google.com/" class="google-plus"><i class="fa fa-google"></i></a>
              <a href="https://www.linkedin.com/" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong> Eventify</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=TheEvent
        -->
      </div>
    </div>
  </footer><!-- #footer -->
  <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>
  

  <!-- JAVASCRIPTS -->
  <!-- jQuey -->
  <script src="plugins/jquery/jquery.js"></script>
  <!-- Popper js -->
  <script src="plugins/popper/popper.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
  <!-- Smooth Scroll -->
  <script src="plugins/smoothscroll/SmoothScroll.min.js"></script>  
  <!-- Isotope -->
  <script src="plugins/isotope/mixitup.min.js"></script>  
  <!-- Magnific Popup -->
  <script src="plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
  <!-- Slick Carousel -->
  <script src="plugins/slick/slick.min.js"></script>  
  <!-- SyoTimer -->
  <script src="plugins/syotimer/jquery.syotimer.min.js"></script>
  <!-- Google Mapl -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
  <script type="text/javascript" src="plugins/google-map/gmap.js"></script>
  <!-- Custom Script -->
  <script src="js/custom.js"></script>

      <!-- JavaScript Libraries -->
      <script src="lib/jquery/jquery.min.js"></script>
      <script src="lib/jquery/jquery-migrate.min.js"></script>
      <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="lib/easing/easing.min.js"></script>
      <script src="lib/superfish/hoverIntent.js"></script>
      <script src="lib/superfish/superfish.min.js"></script>
      <script src="lib/wow/wow.min.js"></script>
      <script src="lib/venobox/venobox.min.js"></script>
      <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    
      <!-- Contact Form JavaScript File -->
      <script src="contactform/contactform.js"></script>
    
      <!-- Template Main Javascript File -->
      <script src="jss/main.js"></script>
</body>
<?php
}
?>
</html>