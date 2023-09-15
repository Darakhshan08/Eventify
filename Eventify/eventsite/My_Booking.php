<?php
session_start();
//datbase connection file
include("connect.php");

// error_reporting(0);
if(strlen($_SESSION['usrid'])==0)
    {   
header('location:logout.php');
}
else{


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

  
  <link rel="stylesheet" type="text/css" href="cssp/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="cssp/select2.min.css">
  <link rel="stylesheet" type="text/css" href="cssp/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="cssp/bootstrap-datetimepicker.min.css">
 

 <style>

.bg-title{
  background: url(images/ro.jpeg)no-repeat;
  background-size: cover;
 
}


  /* Base styles for larger screens */
.cen {
  position: absolute;
  margin-top: 100px;
  margin-left: 160px;
  background-color: rgb(221, 221, 221);
  width: 300px;
}

li {
  list-style: none;
  color: white;
}

a {
  color: rgb(109, 109, 109);
  font-size: 20px;
}

a:hover {
  color: #9a28d7;
}

table {
  display: table;
  border: 2px solid silver;
  margin-left: 570px;
  width: 900px;
  margin-top: 17px;
  height: 280px;
}

tr,
th {
  border: 2px solid silver;
  color: black;
}

td {
  border: 2px solid silver;
}

tr:hover {
  transition: 0.2s;
  color: #9a28d7;
  cursor: pointer;
}

.num h2 {
  font-size: 32px;
  margin-top: 40px;
  margin-left: 570px;
}
.top h2 {
  font-size: 32px;
margin-bottom: -80px;
margin-left: 160px;
}

/* Responsive media queries for smaller screens */
@media (max-width: 1500px) {
  .cen {
    position: static;
    margin: 20px auto;
    background-color: rgb(221, 221, 221);
    width: 100%;
  }

  .num h2 {
    font-size: 24px;
    margin: 20px auto;
  text-align: center;
  margin-left: 60px;
  }
 .top h2 {
    font-size: 24px;
    margin: 20px auto;
  text-align: center;
  margin-left: 60px;
  }

  li {
    color: black;
  text-align: center;
  }

  a {
  color: rgb(109, 109, 109);
    font-size: 16px;
  text-align: center;
  }

  table {
    margin-left: 0px;
    width: 100%;
    height: 260px;
  }

  tr,
  th,
  td {
    border: 1px solid silver;
  }

  tr:hover {
    color: #9a28d7;
  }
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
              <a class="dropdown-item" href="single-speaker.php">Single Speaker</a>
             <a class="dropdown-item" href="gallery-two.php">Gallery</a>
              <a class="dropdown-item" href="pricing.php">Pricing</a>
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
                    <h3>My Booking</h3>
                </div>
                
            </div>
        </div>
    </div>
</section>

<br>
<br>
<div class="top">
  <h2 style="color:#421387; ">My Account</h2>
</div>
<div class="cen">
    <div class="cate">
        <ul>
 <br>       
 <li><a href="My_account.php">My Profile</a></li>
 <br>
 <li><a href="Change_password.php">Change Password</a></li>
 <br>
 <li><a href="My_Booking.php">My Booking </a></li>
 <br>
 <li><a href="logout.php">Logout</a></li>
  </ul>
</div>
</div>


<!--====  End of Page Title  ====-->
<div class="num">
    <h2 style="color:#421387; ">My Bookings</h2>
</div>
<table>
    <tr>
      <th >&nbsp;&nbsp;#</th>
      <th style="text-align: center;">Booking Id</th>
      <th style="text-align: center;">Event Name</th>
      <th style="text-align: center;">Booking Date</th>
      <th style="text-align: center;">Booking Status</th>
      <th style="text-align: center;">Action</th>
    </tr>
    <?php
    $uid=$_SESSION['usrid'];
    $sql = "SELECT tbl_booking.id as bid,tbl_booking.booking_id,tbl_booking.booking_date,tbl_booking.booking_status,tbl_events.event_name,tbl_events.id as event_id from tbl_booking left join tbl_events on tbl_events.id=tbl_booking.event_id where tbl_booking.user_id=:uid";
$query = $conn -> prepare($sql);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{ ?>
    <tr>
      <td>&nbsp;&nbsp;<?php echo htmlentities($cnt);?></td>
      <td style="text-align: center;" ><?php echo htmlentities($row->booking_id);?></td>
      <td style="text-align: center;"><a href="det.php?evntid=<?php echo htmlentities($row->event_id);?>"><?php echo htmlentities($row->event_name);?></a></td>
      <td style="text-align: center;"><?php echo htmlentities($row->booking_date);?></td>
      <td style="text-align: center;"><?php $bstatus=$row->booking_status;
if($bstatus==""){
echo htmlentities("Not confirmed Yet");
} else {
echo htmlentities($bstatus);
}?></td>  

      <td class="text-center">
        <div class="dropdown dropdown-action">
        <a href="Booking_Details.php?bkid=<?php echo htmlentities($row->bid);?>"><i class="fa fa-print m-r-5" style="color: black;"></i></a>
                
            </div>
        </div>
    </td>
    <?php $cnt++;}} ?>  
    <?php
     $sql = "SELECT tbl_usrevent.uevent_id as bid,tbl_usrevent.uevent_id,tbl_usrevent.uevent_date,tbl_usrcategory.uc_name,tbl_usrcategory.uc_id as event_id from tbl_usrevent left join tbl_usrcategory on tbl_usrcategory.uc_id=tbl_usrevent.uc_id where tbl_usrevent.user_id=:uid";
     $query = $conn -> prepare($sql);
     $query->bindParam(':uid',$uid,PDO::PARAM_STR);
     $query->execute();
     $results=$query->fetchAll(PDO::FETCH_OBJ);
     $cnt=1;
     if($query->rowCount() > 0)
     {
     foreach($results as $row)
     { ?>
         <tr>
           <td>&nbsp;&nbsp;<?php echo htmlentities($cnt);?></td>
           <td style="text-align: center;" ><?php echo htmlentities($row->uevent_id);?></td>
           <td style="text-align: center;"><?php echo htmlentities($row->uc_name);?></td>
           <td style="text-align: center;"><?php echo htmlentities($row->uevent_date);?></td>
           <td style="text-align: center;">Confirmed</td>  
     
           <td class="text-center">
             <div class="dropdown dropdown-action">
             <a href="#"><i class="fa fa-print m-r-5" style="color: black;"></i></a>
                     
                 </div>
             </div>
         </td>
    <?php $cnt++;}} ?>  


    </tr>
  </table>
  
        <br>
        <br>
        <br>
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


      <div class="sidebar-overlay" data-reff=""></div>
    <script src="jsp/jquery-3.2.1.min.js"></script>
    <script src="jsp/popper.min.js"></script>
    <script src="jsp/bootstrap.min.js"></script>
    <script src="jsp/select2.min.js"></script>
    <script src="jsp/app.js"></script>
    
</body>
<?php
}
?>
</html>