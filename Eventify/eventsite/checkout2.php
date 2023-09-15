<?php

session_start();

include('connect.php');
if(strlen($_SESSION['usrid'])==0)
{   
header('location:logout.php');
}
else{


 if (isset($_POST['add'])) {
   // Posted Values
   $userid = $_SESSION['usrid'];
   $ueventid =  $_POST['bkid'];
   $udate = $_POST['udate'];
   $uvenue = $_POST['venue'];
   $uservice = $_POST['service'];
   $utevent = $_POST['tevent'];
   $umember = $_POST['member'];
   $edescription = $_POST['edesc'];

   $sql = "INSERT INTO tbl_usrevent(uevent_id, uc_id, ser_id, user_id, uevent_discription, us_no_of_members, uevent_date, uevent_location)
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
           echo '<script>alert("Event booked successfully. Booking number is ' . $ueventid . '")</script>';
           echo "<script>window.location.href='My_Booking.php'</script>";
       } else {
           echo '<script>alert("Something went wrong. Please try again")</script>';
       }
   } else {
       echo '<script>alert("Database error. Please try again")</script>';
   }
   $sql1 = "DELETE FROM temp_cart2";
   $query2 = $conn->prepare($sql1);
   $query2->execute();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href= https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css>
    <link rel="stylesheet" href= https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js>
    <link rel="stylesheet" href= https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js>
    <link rel="stylesheet" href= https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css>
    <link rel="stylesheet" href=  https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css>
    
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


.row{
    margin: 0;
   
}
.upper{
    padding: 1rem 0;
    justify-content: space-evenly;
}
#three{
    border-radius: 1rem;
        width: 22px;
    height: 22px;
    margin-right:3px;
    border: 1px solid blue;
    text-align: center;
    display: inline-block;
}
#payment{
    margin:0;
    color: blue;
}
.icons{
    margin-left: auto;
}
form span{
    color:black;
}
form{
    padding: 2vh 0;
}
input{
    border: 1px solid black;
    padding: 1vh;
    margin-bottom: 4vh;
    outline: none;
    width: 100%;
    background-color: white;
}
input:hover{
   border:2px solid #421387;
}
input:focus::-webkit-input-placeholder
{
      color:transparent;
}
.header{
    font-size: 1.5rem;
    line-height:3;
    color:#421387;
   
}
.left{
    background-color: #ffffff;
    padding: 2vh; 
    border: 1px solid black;
}
.left img{
    width: 2rem;
}
.left .col-4{
    padding-left: 0;
}
.right .item{
    padding: 0.3rem 0;
}
.right{
    background-color: #ffffff;
    padding: 2vh;
}
.col-8{
    padding: 0 1vh;
}
.lower{
    line-height: 2.7;
}
.btn{
    background-color: #421387;
    border-color: rgb(23, 4, 189);
    color: white;
    width: 100%;
    text-align:center;
    font-size: 0.7rem;
    margin: 4vh 0 1.5vh 0;
    padding: 1.5vh;
    border-radius: 13px;
}
.btn:focus{
    box-shadow: none;
    outline: none;
    box-shadow: none;
    color: white;
    -webkit-box-shadow: none;
    -webkit-user-select: none;
    transition: none; 
}
.btn:hover{
    color: white;
}
a{
    color: black;
}
a:hover{
    color: black;
    text-decoration: none;
}
input[type=checkbox]{
    width: unset;
    margin-bottom: unset;
}


/* styles.css */
.icon {
   
    color: red; /* Text color */
    cursor: pointer;
  
}


.icon::before {
    content: "\f00d"; /* Unicode for the "times" icon in Font Awesome */
    font-family: FontAwesome; /* Use the Font Awesome font family */
    margin-right: 5px; /* Spacing between icon and text */
}

.greater-button {
    background-color: #4CAF50; /* Button background color */
    color: #fff; /* Text color */
    border: none;
    border-radius: 5px;
    padding: 5px 10px;
    cursor: pointer;
    display: flex;
    align-items: center;
}

.great {
     /* Icon size */
    margin-right: 5px; /* Spacing between icon and text (adjust as needed) */
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
          <h3>TICKET BOOKING</h3>
        </div>
      
      </div>
    </div>
  </div>
</section>
   

            <br>
            <br>
           
            <div class="row" >
                <div class="col-md-7">
                    <div class="left border">
                        <div class="row" >
                        <span class="header"><b> <i class="fa-solid fa-credit-card"></i> CARD DETAILS</b></span>
                           
                        </div>
                        <form method="post" >
                        <div class="col-12"><span>Cardholder's name:</span>
                        <input type="text" id="textInput" name="textInput" required>
        </div>

        <div class="col-12"> <span>Card Number:</span>
                            <input type="tel" id="numericTelInput" name="numericTelInput">
        </div>
                            <div class="row">
                                <div class="col-12"><span>Expiry date:</span>
                                <input type="date" required>
                                </div>
                                
                                <div class="col-12"><span>Security Code:</span>
                                <input type="text" required>
                                </div>
                            </div>
        
                          
                    </div>                        
                </div>
                <div class="col-md-5">
                    <div class="right border">
                    <span class="header"><b> <i class="fa-solid fa-cart-shopping"></i> YOUR BOOKING</b></span>
                       <hr>
                       <?php
$sql = "SELECT * FROM temp_cart2"; 
$query = $conn->prepare($sql);
$query->execute();
$row = $query->fetch(PDO::FETCH_OBJ);

if ($row) {
    $eid = $row->ser_id;
    $ucid = $row->uc_id; // Assuming ser_id is a column in temp_cart2
     // Assuming ser_id is a column in temp_cart2

    // Now, fetch the ser_price from tbl_services using $eid
    $sqlEvent = "SELECT ser_price FROM tbl_services WHERE ser_id=:eid";
    $queryEvent = $conn->prepare($sqlEvent);
    $queryEvent->bindParam(':eid', $eid, PDO::PARAM_STR);
    $queryEvent->execute();
    $eventData = $queryEvent->fetch(PDO::FETCH_ASSOC);
    $price = $eventData['ser_price'];
    $loc=200000;
    $total= $price+$loc;

    $sqlEvent = "SELECT uc_name FROM tbl_usrcategory WHERE uc_id=:ucid";
    $queryEvent = $conn->prepare($sqlEvent);
    $queryEvent->bindParam(':ucid', $ucid, PDO::PARAM_STR);
    $queryEvent->execute();
    $eventData = $queryEvent->fetch(PDO::FETCH_ASSOC);
    $eventname = $eventData['uc_name'];
    
    ?>
<input type="hidden" name="bkid" value="<?php echo htmlentities($row->uevent_id);?>">
<input type="hidden" name="tevent" value="<?php echo htmlentities($row->uc_id);?>">
<input type="hidden" name="service" value="<?php echo htmlentities($row->ser_id);?>">
<input type="hidden" name="usrid" value="<?php echo htmlentities($row->user_id);?>">
<input type="hidden" name="edesc" value="<?php echo htmlentities($row->uevent_discription);?>">
<input type="hidden" name="udate" value="<?php echo htmlentities($row->uevent_date);?>">
<input type="hidden" name="venue" value="<?php echo htmlentities($row->uevent_location);?>">
<input type="hidden" name="member" value="<?php echo htmlentities($row->us_no_of_members);?>">


   
                        <div class="row lower">
                            <div class="col text-left"><b>TITLE:</b></div>
                            <div class="col text-right"><b><?php echo htmlentities($eventname);?></b></div>
                        </div>
                        <div class="row lower">
                            <div class="col text-left"><b>No Of Members:</b></div>
                            <div class="col text-right"><b><?php echo htmlentities($row->us_no_of_members); ?></b></div>
                        </div>
                       
                        
                      
                        <div class="row lower">
                            <div class="col text-left"><b>Service Price:</b></div>
                            <div class="col text-right"><b>Rs <?php echo htmlentities($price);?></b></div>
                        </div>
                        <div class="row lower">
                            <div class="col text-left"><b>Location:</b></div>
                            <div class="col text-right"><b>Rs <?php echo htmlentities($loc);?></b></div>
                        </div>
                        <div class="row lower">
                            <div class="col text-left"><b>Total:</b></div>
                            <div class="col text-right"><b>Rs <?php echo htmlentities($total);?></b></div>
                        </div>
                        <button class="btn" type="submit" name="add" >Place order</button>
                        
                        <?php
    }
    ?>
                        </form>

<hr>
                        <!-- <div class="row lower">
                            <div class="col text-left"><a href="pricing.php">
            <span class="great">&gt;</span>Get More Tickets</a></i></div>

                            <div class="col text-right"><a href="index.php"> <span class="great">&gt;</span>Find More Events </a></i></div>
                            
                    </div>
                </div> -->
            </div>
        </div>
        
     <div>
    </div>
    </div>
        
    
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
      <script src="button.js"></script>

      <script>
        // Get the input element
        const numericTelInput = document.getElementById("numericTelInput");

        // Add an event listener to validate input on keypress
        numericTelInput.addEventListener("input", function (event) {
            // Remove non-numeric characters
            this.value = this.value.replace(/[^0-9]/g, "");
        });
    </script>
     <script>
        // Get the input element
        const textInput = document.getElementById("textInput");

        // Add an event listener to validate input on keypress
        textInput.addEventListener("input", function (event) {
            // Remove non-text (non-letter) characters
            this.value = this.value.replace(/[^a-zA-Z]/g, "");
        });
    </script>
  <?php
}
?>
</body>
</html>