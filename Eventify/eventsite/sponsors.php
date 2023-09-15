<?php
session_start();

include('connect.php');

if(isset($_POST['subscribe']))
{

// Getting Post values
$emailid=$_POST['email'];   
// query for data insertion
$sql="INSERT INTO tbl_subscriber(user_email) VALUES(:emailid)";
//preparing the query
$query = $conn->prepare($sql);
//Binding the values
$query->bindParam(':emailid',$emailid,PDO::PARAM_STR);
//Execute the query
$query->execute();
//Check that the insertion really worked
$lastInsertId = $conn->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Success : Successfully subscribed');</script>";
echo "<script>window.location.href='index.php'</script>";  
}
else 
{
echo "<script>alert('Error : Something went wrong. Please try again');</script>";   
}

}

?>
<!DOCTYPE html>
<html lang="en">
<head>

  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
  <!-- Slick Carousel -->
  <link href="plugins/slick/slick.css" rel="stylesheet">
  <link href="plugins/slick/slick-theme.css" rel="stylesheet">
  <!-- CUSTOM CSS -->
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="scroll.css">
  <!-- FAVICON -->
  <link href="images/cop.jpeg" rel="shortcut icon">
  <style>
		.bg-title{
  background: url(images/ro.jpeg)no-repeat;
  background-size: cover;
 
}
		</style>

</head>

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
					<h3>Our Sponsors</h3>
				</div>
				
			</div>
		</div>
	</div>
</section>

<!--====  End of Page Title  ====-->


<!--==============================
=            Sponsors            =
===============================-->

<section class="sponsors section  overlay-white">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h3><span class="alternate" style="color:white;">Our Sponsers</span></h3>
                   
                
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <!-- Title -->
                <div class="sponsor-title text-center">
                    <h5>Platinum Sponsors</h5>
                </div>
                <div class="block text-center">
                    <!-- Sponsors image list -->
                    <ul class="list-inline sponsors-list">
                        <?php
    $sql = "SELECT * FROM tbl_sponser WHERE s_id = 1"; // Replace '1' with the specific s_id you want to display
    $query = $conn->prepare($sql);
    $query->execute();
    $row = $query->fetch(PDO::FETCH_OBJ);

    if ($row) {
    ?>
        <li class="list-inline-item">
            <div class="image-block text-center">
                <a href="#">
                    <img src="../admin/admin/sponser/<?php echo htmlentities($row->sponsers_logo); ?>" class="img-fluid">
                </a>
            </div>
        </li>
    <?php
    }
    ?>


<?php
    $sql = "SELECT * FROM tbl_sponser WHERE s_id = 2"; // Replace '1' with the specific s_id you want to display
    $query = $conn->prepare($sql);
    $query->execute();
    $row = $query->fetch(PDO::FETCH_OBJ);

    if ($row) {
    ?>
        <li class="list-inline-item">
            <div class="image-block text-center">
                <a href="#">
                    <img src="../admin/admin/sponser/<?php echo htmlentities($row->sponsers_logo); ?>" class="img-fluid">
                </a>
            </div>
        </li>
    <?php
    }
    ?>
                            <?php
    $sql = "SELECT * FROM tbl_sponser WHERE s_id = 3"; // Replace '1' with the specific s_id you want to display
    $query = $conn->prepare($sql);
    $query->execute();
    $row = $query->fetch(PDO::FETCH_OBJ);

    if ($row) {
    ?>
        <li class="list-inline-item">
            <div class="image-block text-center">
                <a href="#">
                    <img src="../admin/admin/sponser/<?php echo htmlentities($row->sponsers_logo); ?>" class="img-fluid">
                </a>
            </div>
        </li>
    <?php
    }
    ?>
                             <?php
    $sql = "SELECT * FROM tbl_sponser WHERE s_id = 4"; // Replace '1' with the specific s_id you want to display
    $query = $conn->prepare($sql);
    $query->execute();
    $row = $query->fetch(PDO::FETCH_OBJ);

    if ($row) {
    ?>
        <li class="list-inline-item">
            <div class="image-block text-center">
                <a href="#">
                    <img src="../admin/admin/sponser/<?php echo htmlentities($row->sponsers_logo); ?>" class="img-fluid">
                </a>
            </div>
        </li>
    <?php
    }
    ?>
                    </ul>
                </div>
                <!-- Title -->
                <div class="sponsor-title text-center">
                    <h5>Gold Sponsors</h5>
                </div>
                <div class="block text-center">
                    <!-- Sponsors image list -->
                    <ul class="list-inline sponsors-list">
                        
                    <?php
    $sql = "SELECT * FROM tbl_sponser WHERE s_id = 5"; // Replace '1' with the specific s_id you want to display
    $query = $conn->prepare($sql);
    $query->execute();
    $row = $query->fetch(PDO::FETCH_OBJ);

    if ($row) {
    ?>
                        <li class="list-inline-item">
                            <div class="image-block text-center">
                                <a href="#">
                                    <img src="../admin/admin/sponser/<?php echo htmlentities($row->sponsers_logo); ?>" alt="sponsors-logo" class="img-fluid">
                                </a>
                            </div>
                        </li>
                        <?php }
                        ?>
                             <?php
    $sql = "SELECT * FROM tbl_sponser WHERE s_id = 6"; // Replace '1' with the specific s_id you want to display
    $query = $conn->prepare($sql);
    $query->execute();
    $row = $query->fetch(PDO::FETCH_OBJ);

    if ($row) {
    ?>
                        <li class="list-inline-item">
                            <div class="image-block text-center">
                                <a href="#">
                                    <img src="../admin/admin/sponser/<?php echo htmlentities($row->sponsers_logo); ?>" alt="sponsors-logo" class="img-fluid">
                                </a>
                            </div>
                        </li>
                        <?php }
                        ?>
                              <?php
    $sql = "SELECT * FROM tbl_sponser WHERE s_id = 7"; // Replace '1' with the specific s_id you want to display
    $query = $conn->prepare($sql);
    $query->execute();
    $row = $query->fetch(PDO::FETCH_OBJ);

    if ($row) {
    ?>
                        <li class="list-inline-item">
                            <div class="image-block text-center">
                                <a href="#">
                                    <img src="../admin/admin/sponser/<?php echo htmlentities($row->sponsers_logo); ?>" alt="sponsors-logo" class="img-fluid">
                                </a>
                            </div>
                        </li>
                        <?php }
                        ?>
                    </ul>
                </div>
                <div class="sponsor-btn text-center">
                    <a href="add_sponsor.php" class="btn btn-main-md">Become a sponsor</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!--====  End of Sponsors  ====-->

<!--==============================================
=            Call to Action Subscribe            =
===============================================-->

<div class="newsletter-subscribe">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <header class="entry-header">
                    <h2 class="entry-title">Subscribe to our newsletter to get the latest trends & news</h2>
                    <p>Join our database NOW!</p>
                </header>

                <div class="newsletter-form">
                    <form class="flex flex-wrap justify-content-center align-items-center" method="post" name="subscribe">
                        <!-- <div class="col-md-12 col-lg-3">
                            <input type="text" placeholder="Name">
                        </div> -->

                        <div class="col-md-12 col-lg-6">
                            <input type="email" placeholder="Your e-mail" name="email" required="true">
                        </div>

                        <div class="col-md-12 col-lg-3">
                            <input class="btn gradient-bg" type="submit" name="subscribe" value="Subscribe">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--====  End of Call to Action Subscribe  ====-->

<!--================================
=            Google Map            =
=================================-->

<section class="map">
	<!-- Google Map -->
	<div id="map"></div>
	<div class="address-block">
		<h4>Eventify</h4>
		<ul class="address-list p-0 m-0">
			<li><i class="fa fa-home"></i><span>D - 4 Block H North Nazimabad Town, <br>Karachi City, Sindh 74700.</span></li>
			<li><i class="fa fa-phone"></i><span> +92 308 0408601</span></li>
		</ul>
		<a href="#" class="btn btn-white-md">Get Direction</a>
	</div>
</section>

<!--====  End of Google Map  ====-->

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

</html>