<?php
 session_start();

 include('connect.php');
 if(strlen($_SESSION['usrid'])==0)
 {   
header('location:login.php');
}
else{


  if (isset($_POST['add'])) {
    // Posted Values
    $userid = $_SESSION['usrid'];
    $ueventid = mt_rand(100000000, 999999999);
    $udate = $_POST['udate'];
    $uvenue = $_POST['venue'];
    $uservice = $_POST['service'];
    $utevent = $_POST['tevent'];
    $umember = $_POST['member'];
    $edescription = $_POST['edesc'];

    $sql = "INSERT INTO temp_cart2 (uevent_id, uc_id, ser_id, user_id, uevent_discription, us_no_of_members, uevent_date, uevent_location)
            VALUES (:ueventid, :ucid, :serid, :userid, :udecs, :members, :udate, :venue)";

    $query = $conn->prepare($sql);
    $query->bindParam(':ueventid', $ueventid, PDO::PARAM_STR);
    $query->bindParam(':ucid', $utevent, PDO::PARAM_STR);
    $query->bindParam(':serid', $uservice, PDO::PARAM_STR);
    $query->bindParam(':userid', $userid, PDO::PARAM_STR);
    $query->bindParam(':udecs', $edescription, PDO::PARAM_STR);
    $query->bindParam(':members', $umember, PDO::PARAM_STR);
    $query->bindParam(':udate', $udate, PDO::PARAM_STR);
    $query->bindParam(':venue', $uvenue, PDO::PARAM_STR);

    if ($query->execute()) {
        $lastInsertId = $conn->lastInsertId();
        if ($lastInsertId) {
            // echo '<script>alert("Event booked successfully. Booking number is ' . $ueventid . '")</script>';
            echo "<script>window.location.href='checkout2.php'</script>";
        } else {
            echo '<script>alert("Something went wrong. Please try again")</script>';
        }
    } else {
        echo '<script>alert("Database error. Please try again")</script>';
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
  <link rel="stylesheet" href="button.css">
  <!-- FAVICON -->
  <link href="images/cop.jpeg" rel="shortcut icon">
</head>
<style>
label {
    font-weight: bold;
    padding: 5px;
    color: #421387;
    font-size: 18px;
}
input:focus::placeholder{
        color: transparent;
    }
    ::placeholder{
        color: white;
    }
    input{
      color: black;
    }
   
    .banner{
      background: url(images/gallery/wedding.jpg);
      height: 50vh;
      background-size: cover;
      background-position: center;
      overflow: hidden ;
      
    }
   
</style>
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
    <!--====  End of Page Title  ====-->

<section class="banner">
</section>

<section class="section contact-form">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="section-title">
        <h3><span class="alternate">Submit Proposal</span></h3>
          <p>We have years of experience in private event planning. Event planning is our passion, and we take great pride in our work. We are here to create luxurious private events and host community gatherings and trip retreats for black and brown communities and corporates.</p>
        </div>
      </div>
    </div>
   
    <form action="#" class="row" method="post">
    
      <div class="col-md-6">
        <label> Event Date<span>*</span></label>
        <input type="date" class="form-control main" name="udate" id="email" required>
      </div>
      <div class="col-md-6">
        <label>Venue<span>*</span></label>
        <input type="text" class="form-control main" name="venue" id="phone" placeholder="Your Venue Here" required>
      </div>
      <div class="col-md-6">
        <div class="form-group">
            <label>Services<span>*</span></label>    
                    <select class="form-control main" name="service" id="event_select">
                      <option >Select an Option</option>
                      <?php
                            $sql = "SELECT ser_id,ser_name,ser_price from tbl_services";
                            $query = $conn->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            $cnt = 1;
                            if ($query->rowCount() > 0) {
                                foreach ($results as $row) {
                            ?>
                                    <option value="<?php echo htmlentities($row->ser_id); ?>"><?php echo htmlentities($row->ser_name); ?>---------Rs<?php echo htmlentities($row->ser_price);  ?></option>
                            <?php }
                            } ?>
                       </select>      
                        </div>
                       </div>
      <div class="col-md-6">
        <div class="form-group">
            <label>What Type Of Event Are You Looking For<span>*</span></label>    
                    <select class="form-control main" name="tevent" id="event_select">
                    <option >Select an Option</option>
                      <?php
                            $sql = "SELECT uc_id,uc_name,uc_discription,uc_creationdate,Is_Active from tbl_usrcategory";
                            $query = $conn->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            $cnt = 1;
                            if ($query->rowCount() > 0) {
                                foreach ($results as $row) {
                            ?>
                                    <option value="<?php echo htmlentities($row->uc_id); ?>"><?php echo htmlentities($row->uc_name); ?></option>
                            <?php }
                            } ?>
                       </select>      
                        </div>
                       </div>

            <div class="col-md-6">
              <label>Estimated Guest Count<span>*</span></label>
        <input type="text" class="form-control main" name="member" id="phone" placeholder="E.g. 200" required>
      </div>
            <!-- <div class="col-md-6">
              <label>Budget<span>*</span></label>
        <input type="text" class="form-control main" name="phone" id="phone" placeholder="E.g. Rs 23000" required>
      </div> -->
      <div class="col-md-6">
              <label>Tell Me More About Your Event<span>*</span></label>
        <input type="text" class="form-control main" name="edesc" id="phone" placeholder="What Do I Need To Know About Your Event " required>
      </div>
      <div class="col-12 text-center">
      <button class="custom-btn btn-9" type="submit" name="add" >Book Now</button>
      </div>
    </form>
  </div>
</section>

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