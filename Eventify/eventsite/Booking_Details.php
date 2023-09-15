
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
  if(isset($_POST['cancellbooking']))
    {
$uid=$_SESSION['usrid'];
$bkngid=intval($_GET['bkid']);
$cancelremark=$_POST['cancelltionremark'];
$status="Cancelled";
$sql="update tbl_booking set user_cancel_remarks=:cancelremark,booking_status=:status where user_id=:uid and id=:bkngid";
$query = $conn->prepare($sql);
$query-> bindParam(':uid', $uid, PDO::PARAM_STR);
$query-> bindParam(':bkngid', $bkngid, PDO::PARAM_STR);
$query-> bindParam(':cancelremark', $cancelremark, PDO::PARAM_STR);
$query-> bindParam(':status', $status, PDO::PARAM_STR);
$query->execute();
echo "<script>alert('Success :Booking Cancelled.');</script>";
echo "<script>window.location.href='My_Booking.php'</script>"; 
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

  
  <link rel="stylesheet" type="text/css" href="cssp/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="cssp/select2.min.css">
  <link rel="stylesheet" type="text/css" href="cssp/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="cssp/bootstrap-datetimepicker.min.css">
  
 
  <style>
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
  .num span {
    font-size: 24px;
    margin: 20px auto;
  
 

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
  .frame{
    font-size: 24px;
    margin: 20px auto;

  margin-right: 120px;
  }

  tr:hover {
    color: #9a28d7;
  }
  
}
.frame {
  width: 90%;

  
}
.frame,td:hover{
  background-color: transparent;
}
.cust-btn {
  width: 240px;
  height: 50px;
  top: 0px;
  left: 40px;
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
.cust-btn{
  border: none;
  transition: all 0.3s ease;
  overflow: hidden;
  
}
.cust-btn:after {
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
.cust-btn:hover {
  background: transparent;
  box-shadow:  4px 4px 6px 0 rgba(255,255,255,.5),
              -4px -4px 6px 0 rgba(116, 125, 136, .2), 
    inset -4px -4px 6px 0 rgba(255,255,255,.5),
    inset 4px 4px 6px 0 rgba(116, 125, 136, .3);
  color: #fff;
}
.cust-btn:hover:after {
  -webkit-transform: scale(2) rotate(180deg);
  transform: scale(2) rotate(180deg);
  box-shadow:  4px 4px 6px 0 #1fd1f9(255,255,255,.5),
              -4px -4px 6px 0 #20716A (116, 125, 136, .2), 
    inset -4px -4px 6px 0  #F11A7B(255,255,255,.5),
    inset 4px 4px 6px 0 (116, 125, 136, .3);
}
.num span{
 
  font-size: 32px;
margin-bottom: -60px;
margin-left: 860px;


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
          <h3>My Booking</h3>
        </div>
        <ol class="breadcrumb p-0 m-0">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">My Booking</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<div class="cen">
  <div class="cate">
    <ul>
    <h4 style="position: absolute; top: -50px; text-align: center;">My Account</h4>
 <br>   
 <li><a href="My_account.php">My Profile</a></li>
 <br>
 <li><a href="Change_password.php">Change Password</a></li>
 <br>
 <li><a href="My_Booking.php">My Booking </a></li>
 <br>
 <li><a href="">Logout</a></li>
  </ul>
</div>
</div>


<!--====  End of Page Title  ====-->


<?php
// Fetching Booking Details
$uid=$_SESSION['usrid'];
$bkngid=intval($_GET['bkid']);
$sql = "SELECT tbl_booking.booking_id,tbl_booking.booking_date,tbl_booking.booking_status,tbl_events.event_name,tbl_events.id as evtid,tbl_booking.user_remarks,tbl_booking.no_member,tbl_booking.admin_remarks,tbl_booking.last_updation_date,tbl_booking.user_cancel_remarks,tbl_events.event_start_date,tbl_events.event_end_date,tbl_events.event_location from tbl_booking left join tbl_events on tbl_events.id=tbl_booking.event_id where tbl_booking.user_id=:uid and  tbl_booking.id=:bkngid";
$query = $conn -> prepare($sql);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->bindParam(':bkngid',$bkngid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{ ?>
        
 <div class="num">
            <a href="view-details.html"><h2><?php echo htmlentities($row->event_name);?></h2></a>
 </div>
                <table>
                    
                        <tr>
                            <th> &nbsp;&nbsp;Booking Number</th>    
                            <td style="text-align: center;"><?php echo htmlentities($row->booking_id);?></td>
                            <th> &nbsp;&nbsp;Booking Date</th>    
                            <td style="text-align: center;"><?php echo htmlentities($row->booking_date);?></td>
                           
                            </tr>   
                            <tr>
                                <th>&nbsp;&nbsp;Number of Members</th>    
                                <td style="text-align: center;"><?php echo htmlentities($row->no_member);?></td>
                                <th>&nbsp;&nbsp;User Remark</th>    
                                <td style="text-align: center;"><?php echo htmlentities($row->user_remarks);?></td>
                                </tr>
                                
                                <tr>
                                <th>&nbsp;&nbsp;Event Name</th>    
                                <td style="text-align: center;"> <?php echo htmlentities($row->event_name);?></td>
                                <th>&nbsp;&nbsp;Event Date</th>    
                                <td style="text-align: center;"><?php echo htmlentities($esdate=  $row->event_start_date);?></td>
                               
                                </tr>
                                
                                <tr>
                                    <th>&nbsp;&nbsp;Event Location</th>    
                                    <td style="text-align: center;"><?php echo htmlentities($row->event_location);?></td>  
                                    <th>&nbsp;&nbsp;Booking Status</th>    
                                <td style="text-align: center;"><?php $bstatus=$row->booking_status;
                                if($bstatus==""){
                                  echo htmlentities("Not confirmed Yet");
                                  } else {
                                  echo htmlentities($bstatus);
                                  }
                                
                                
                                ?></td>
                                </tr>
<?php if($row->admin_remarks!=""){ ?>
                                
                                <tr>
                                <th>&nbsp;&nbsp;Admin Remark</th>  
                                <td colspan="5"><?php echo htmlentities($row->admin_remarks);?></td>  
                                </tr>
<?php } ?> 


<?php if($row->last_updation_date!=""){ ?>
                                
                                <tr>
                                <th>&nbsp;&nbsp;Last Updation Date</th>   
                                <td colspan="5"><?php echo htmlentities($row->last_updation_date);?></td> 
                                </tr> 
<?php } ?> 

                                <div class="frame">
                                  <th colspan="2"><a><button class="cust-btn"  data-toggle="modal" data-target="#exampleModalCenter" >Cancel this Booking</button></a></th>
                                    <th colspan="6"><a><button class="cust-btn"  onclick="window.print()" >Print</button></a></th>
                                        
                                     
                                  </td>
                                 </div>
                                 </form>  

                </table>
    <?php $cnt++;}} ?>                                   

                
                        
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
            
            
                  <div class="sidebar-overlay" data-reff=""></div>
                <script src="jsp/jquery-3.2.1.min.js"></script>
                <script src="jsp/popper.min.js"></script>
                <script src="jsp/bootstrap.min.js"></script>
                <script src="jsp/select2.min.js"></script>
                <script src="jsp/app.js"></script>
                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

               
                
    <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          
          <h5 class="modal-title" id="exampleModalLongTitle" style="color: black;">Book Event Cancellation</h5>
          <button type="submit"  class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>

          <?php
  $cadte=date('Y-m-d');
  if(($cadte<=$esdate) && ($bstatus=="")){
      ?>

        
        </div>
        <form action="" method="post">

        <div class="modal-body">
        <input class="form-control" type="text" name="cancelltionremark" style="height: 70px;" placeholder="User Cancel Remarks">
        <div class="modal-footer">
          <button type="submit"  name="cancellbooking" class="btn btn-primary" >Submit</button>
        
        </div>
       
        </div>
        </form>

        <?php  } if(($bstatus=='Confirmed' || $bstatus=='Cancelled') && ($esdate<=$cadte)) {?>

        <div class="modal-body">
          Booking cannot be cancelled now.You can only cancel booking thhat are not confirmed yet.
        </div>
  <?php }  if(($esdate<$cadte) && ($bstatus=="")){ ?>
    <div class="modal-body">
          You can't cancel the booking after the event has started,
        </div>
  <?php } if(($bstatus=='Confirmed' || $bstatus=='Cancelled') && ($esdate>=$cadte)) {?>
    <div class="modal-body">
          Booking cannot be cancelled now.You can only cancel booking thhat are not confirmed yet.
        </div>
        <?php }
        ?>

        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        
        </div> -->
      </div>
  </div>
</div>


                           
</body>
<?php
};
?>
</html>