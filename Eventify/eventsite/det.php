<?php
session_start();
error_reporting(0);

include('connect.php');

$ret = "Select site_name from tbl_gernalsetting ";
$querys = $conn -> prepare($ret);
$querys->execute();
$resultss=$querys->fetchAll(PDO::FETCH_OBJ);
$cnt=1;

if(isset($_POST['book']))
{

$bokkingid = mt_rand(100000000, 999999999);
$userid=$_SESSION['usrid'];
$eid=intval($_GET['evntid']);
$price=intval($_GET['price']);

// Getting Post values
$noofmembers=$_POST['noofmembers'];
$price=$_POST['price'];
$usrremark=$_POST['userremark'];
$status="Confirmed";
$total= $price*$noofmembers;

// query for data insertion
$sql="INSERT INTO temp_cart(booking_id,user_id,event_id,no_member,user_remarks,booking_status,price,total) VALUES(:bokkingid,:userid,:eid,:noofmembers,:usrremark,:status,:price,:total)";
//preparing the query
$query = $conn->prepare($sql);
//Binding the values
$query->bindParam(':bokkingid',$bokkingid,PDO::PARAM_STR);
$query->bindParam(':price',$price,PDO::PARAM_STR);
$query->bindParam(':total',$total,PDO::PARAM_STR);

$query->bindParam(':userid',$userid,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
$query->bindParam(':noofmembers',$noofmembers,PDO::PARAM_STR);
$query->bindParam(':usrremark',$usrremark,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);

//Execute the query
$query->execute();
//Check that the insertion really worked

$lastInsertId = $conn->lastInsertId();
if($lastInsertId)
{
// echo '<script>alert("Event booked successfully. Booking number is "+"'.$bokkingid.'")</script>';
echo "<script>window.location.href='checkout.php'</script>";  
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventify</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<link href="images/cop.jpeg" rel="shortcut icon">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="cs/bootstrap.min.css">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="cs/fontawesome-all.min.css">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="cs/swiper.min.css">
    
   
    <!-- CUSTOM CSS -->
  <link href="css/style.css" rel="stylesheet">
 


  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/venobox/venobox.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- all css here -->
    <!-- bootstrap v3.3.6 css -->
        
    <!-- Metrial iconic fonts css -->
        <link rel="stylesheet" href="cm/material-design-iconic-font.min.css">
    <!-- style css -->
    
    <link rel="stylesheet" href="code.css">
    <!-- responsive css -->
        <link rel="stylesheet" href="cm/responsive.css">
        <style>
                           
    .bg-title{
  background: url(images/ro.jpeg)no-repeat;
  background-size: cover;
 
}
    

  /* Overlay background */
  .modal-backdrop {
  background-color:black;
}

/* Modal content */
.modal-content {
  border-radius: 10px;
  box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3);
}

/* Modal header */
.modal-header {
  background-color:#421387;
  color: #fff;

  padding: 15px;
}

/* Modal title */
.modal-title {
  margin: 0;
  color: white;
}

/* Modal body */
.modal-body {
  padding: 20px;
}

/* Form controls */
.form-control {
  margin-bottom: 15px;
  padding: 10px;
  border-radius: 5px;
  border: 1px solid #ccc;
}

/* Modal footer */
.modal-footer {
  background-color:white;
  padding: 15px;
  text-align: right;
}

/* Close button */
.close {
  color: #fff;
  opacity: 0.8;
  transition: opacity 0.2s;
}

.close:hover {
  opacity: 1;
}

/* Buttons */
.btn-secondary {
  background-color: #ccc;
  color: #000;
  border: none;
  border-radius: 5px;
  padding: 10px 20px;
  cursor: pointer;
}
.btn-primary:hover{
  background-color:#421387;
}
.btn-primary {
  background-color:#421387;
  color: #fff;
  border: none;
  border-radius: 5px;
  padding: 10px 20px;
  cursor: pointer;

}

/* Media Query for Small Screens */
@media screen and (max-width: 576px) {
  .modal-dialog {
    max-width: 90%;
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
                    <h3>Event Details</h3>
                </div>
               
            </div>
        </div>
    </div>
</section>
<br>
<br>
<br>
     <!--body-wraper-are-start-->
     <div id="home" class="wrapper event-details">
         
         <!--slider header area are start-->
         <div id="home" class="header-slider-area">
              <!--header start-->
        
              <!-- header End-->
          </div>
         <!--slider header area are end-->

         

         <?php
// Event Details
$eid=intval($_GET['evntid']);
$isactive=1;
$sql = "SELECT tbl_category.cat_name,tbl_events.event_name,tbl_events.event_location,tbl_events.price,tbl_events.event_start_date,tbl_events.event_end_date,tbl_events.event_image,tbl_events.id,tbl_events.event_discription,tbl_events.posting_date,tbl_sponser.sponsers_name,tbl_sponser.sponsers_logo,tbl_events.event_image from tbl_events left join tbl_category on tbl_category.cat_id=tbl_events.Cat_Id left join tbl_sponser on tbl_sponser.s_id=tbl_events.sponser_id where tbl_events.id=:eid and tbl_events.is_active=:isactive";
$query = $conn -> prepare($sql);
$query->bindParam(':isactive',$isactive,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{ 
    ?> 
          <!--about area are start-->
          <div class="about-area ptb100 fix" id="about-event">
              <div class="container">
                  <div class="row">
                      <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="about-left">
                              <div class="about-top">
                                  <h1 class="section-title" style="color:#421387; line-height:42px; font-size:31px;"><?php echo htmlentities($row->event_name);?></h1>
                                  <div class="total-step">
                                      <div class="descp">
                                          <p style="margin-top:4%; text-align:justify; line-height:42px; color:black;"><b><?php echo htmlentities($row->event_name);?> : <?php echo htmlentities($row->event_discription);?></b></p>
                                      </div>
                                      <p style="margin-top:4% text-align:justify; line-height:42px; color:black;"><b>Posting Date: <?php echo htmlentities($row->posting_date);?></b> </p>    
                                      <p style="margin-top:4% text-align:justify; line-height:42px; color:black;"><b>Price: Rs <?php echo htmlentities($row->price);?></b> </p>         

                                   </div>
                              </div>
                              <hr />
  <h3 style="margin-top:4% line-height:42px; color:#421387;">Sponser</h3>
                              <div class="total-step">
                                  
                                      <h5 class="sub-title"></h5>
                                      <div class="descp">
<p><img src="../admin/admin/sponser/<?php echo htmlentities($row->sponsers_logo);?>" width="170"></p>


                                      </div>
                                  </div>
                           
                                  <hr />
                                  <br>
                                  <br>
                                 
                                  <div class="total-step">
                                  <div class="about-right" style="background-color:white;  box-shadow: 0px 0px 30px 10px rgba(11, 29, 66, 0.15);">
        <ul>
          <li style="margin-top:4% text-align justify; line-height:42px; color:black;"><i class="fa-solid fa-palette"></i><?php echo htmlentities($row->cat_name);?>(Category)</li>
        <li  style="margin-top:4% text-align:justify; line-height:42px; color:black;"><i class="fa-solid fa-calendar-days"></i>
        <?php echo htmlentities($row->event_start_date);?>  To <?php echo htmlentities($evntenddate=$row->event_end_date);?>
            </li>
        <li  style = "line-height:42px; color:black;"><i class="fa-solid fa-location-dot"></i><?php echo htmlentities($row->event_location);?></li>             
    </ul>
    <?php 
$cadte=date('Y-m-d');
if($cadte<=$evntenddate){
if(strlen($_SESSION['usrid'])=='0'){
    ?>   
                              <div class="about-btn"> 
<a href="login.php"><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#exampleModalCenter"  style="background-color:#421387; border-color:#421387;">Book Now</button></a>
</div> 
<?php } else{?>
  <div class="about-btn"> 
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#exampleModalCenter"  style="background-color:#421387; border-color:#421387;">Book Now</button>
</div> 

<?php }} else { ?>
  <div class="about-btn"> 
<button type="button" class="btn btn-info btn-lg"   style="background-color:#421387; border-color:#421387;">Expired</button>
</div> 
<?php
  }}}
                                        ?>
</div>                        
</div>


                             
                          </div>        
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12" >

                           <p align="center"><img src="../admin/admin/eventimages/<?php echo htmlentities($row->event_image);?>"   width="370" height="600" style="border: 1px solid black; margin-top:80px; box-shadow: 0px 0px 30px 10px rgba(11, 29, 66, 0.15);"></p>
                         
                            
</div>

                      </div>
                  </div>
              </div>
          </div>

          <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Book Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <form name="bookevent" method="POST">
                      <input type="text" class="form-control"  name="noofmembers" placeholder="Number Of Members" required>
                 <br>
                 <input class="form-control" type="text" name="userremark" style="height: 70px;" placeholder="User Remarks" required>
<input type="hidden" name="price" value="<?php echo htmlentities($row->price);?>">

                </div>
                
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="book" class="btn btn-primary">Submit</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <br>
        <br>
        <br>
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
     

</body>
</html>