<?php
session_start();
error_reporting(0);

include('connect.php');
$userid=$_SESSION['usrid'];

?>
<!DOCTYPE html>
<html lang="en">
<head>

  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Eventify</title>
  <link href="images/cop.jpeg" rel="shortcut icon">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&family=Roboto:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  
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
  <!-- FAVICON -->
  <link href="images/favicon.png" rel="shortcut icon">

  <link rel="stylesheet" href="load.css">
  <link rel="stylesheet" href="button.css">
  <style>
      /* Base Styles */
      .crop{
    background-image: url("images/gallery/regional-events-bg.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    padding: 110px 0 50px;
    
}
.about .image-block img {
  height: 20rem;
  width: 20rem;
  border-radius:50%;
  box-shadow: 0px 0px 59px 0px rgba(11, 29, 66, 0.15);
}
.section-title {
    text-align: center;
    margin-bottom: 20px;
    margin-top:160px;
}

.section-title h3 {
    color: white;
    font-size: 38px;
}

.ui-card {
    width: 420px;
    height: 500px;
    display: inline-block;
    position: relative;
    margin: 0 33px;
    overflow: hidden;
    transition: all 0.3s ease-out;
    background: black;
    margin-bottom: 20px;
    margin-top:30px;
    
}

.ui-card img.box-image {
    width: 100%;
    height: 100%;
}

.ui-card .description {
    position: absolute;
    bottom: 0;
    left: 0;
    padding: 15px;
    width: 100%;
    text-align: center;
    color: #fff;
    font-size: 18px;
    background-color: rgba(0, 0, 0, 0.7);
    transform: translateY(100%);
    opacity: 0.2;
    transition: all 0.3s ease-out;
}

.ui-card:hover .description {
    transform: translateY(0);
    opacity: 1;
}

.ui-card .description h2 {
    color: white;
    font-size: 24px;
    margin: 12px 0;
}

.ui-card .description p {
    margin: 10px 0;
}

.ui-card .description a {
    color: #fff;
    background: #421387;
    display: inline-block;
    padding: 10px 25px;
    border-radius: 5px;
    text-decoration: none;
}

.ui-card .description a:hover {
    background: #421387;
}

/* Media Queries for Responsiveness */

/* Tablet (768px and below) */
@media screen and (max-width: 768px) {
    .ui-card {
        width: 100%;
        margin: 0;
    }

    .ui-card img.box-image {
        height:500px;
    }

    .section-title h3 {
        font-size: 20px;
    }
}

/* Mobile (576px and below) */
@media screen and (max-width: 576px) {
    .ui-card {
        width: 100%;
        margin: 0;
    }
}

/* Larger desktop screens (e.g., 1200px and above) */
@media screen and (min-width: 1200px) {
    .ui-card {
        /* Adjust styles for larger screens */
    }
}

.mySlides {
    display: none;
}
/* Slideshow container */
.slideshow{
    width: 100%;
    height: 90%;
    max-height: 100vh;
    margin: auto;
}
/* The dots/bullets/indicators */
.dot {

    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbb;
    border-radius: 50%;
    display: inline-block;
    transition: background-color 0.6s ease;

}



/* Fading animation */
.fade {
    -webkit-animation-name: fade;
    -webkit-animation-duration: 1.5s;
    animation-name: fade;
    animation-duration: 1.5s;
}

@-webkit-keyframes fade {
    from {
        opacity: .4
    }

    to {
        opacity: 1
    }
}

@keyframes fade {
    from {
        opacity: .4
    }

    to {
        opacity: 1
    }
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {

    .prev,
    .next,
    .text {
        font-size: 11px
    }
}

/* Next & previous buttons */
.prev,
.next {
    cursor: pointer;
    position: absolute;
    top: 50%;
    width: auto;
    padding: 16px;
    margin-top: -22px;
    color: white;
    font-weight: bold;
    font-size: 18px;
    transition: 0.6s ease;
    border-radius: 0 3px 3px 0;
    user-select: none;
}

/* Position the "next button" to the right */
.next {
    right: 0;
    border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
    background-color: rgba(0, 0, 0, 0.8);
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


<!--============================
=            Banner            =
=============================-->
<div class="slideshow">
        <div class="mySlides fade">
            <img src="images/gallery/graph.jpg" style="width: 100vw;height: 80vh">

        </div>
        <div class="slideshow-container">
            <div class="mySlides fade">
                <img src="images/gallery/pexels.jpg" style="width: 100vw;height: 80vh">
    
            </div>
            <div class="slideshow-container">
                <div class="mySlides fade">
                    <img src="images/gallery/DJ.jpg" style="width: 100vw;height: 80vh">
        
                </div>
                
                <div class="slideshow-container">
                    <div class="mySlides fade">
                        <img src="images/gallery/sound.jpg" style="width: 100vw;height: 80vh">
            
                    </div>
        <div class="mySlides fade">

            <img src="images/gallery/party.jpeg" style="width: 100vw;height: 80vh">

        </div>
        <div class="mySlides fade">

            <img src="images/gallery/deco.jfif" style="width: 100vw;height: 80vh">

        </div>
        <div style="text-align:center; margin:-5vh;">

            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
           
        </div>
        <a class="prev" onclick="prevSlide()">&#10094;</a>
        <a class="next" onclick="showSlides()">&#10095;</a>
    </div>


<!--====  End of Banner  ====-->

<!--===========================
=            About            =
============================-->

<section class="section about">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 align-self-center">
                <div class="image-block bg-about">
                    <img class="img-fluid" src="images/gallery/DJ.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-8 col-md-6 align-self-center">
                <div class="content-block">
                <h3><span class="alternate">Events For Your Guests</span></h3>
                    <div class="description-one">
                        <p>
                        Our top aim is giving you the ideal guest experience. ranging from informal summer parties to elegant dinners, bustling exhibitions, business hospitality, online training, and conferences.
                        </p>
                    </div>
                    <div class="description-two">
                        <p> Whatever the occasion, you can host it remotely, in Karachi, Pakistan. Eventify ensure optimum participation and a memorable visitor experience.</p>
                    </div>
                    <div class="description-two">
                        <p>We are aware that planning events can be difficult. Our collected and friendly demeanor will guarantee that every single detail is taken care of from the very beginning, giving you the time and mental space to focus on enjoying your event. </p>
                    </div>  
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="pricing.php"><button class="custom-btn btn-9">Buy Ticket</button></a>
                        </li>
                      
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--====  End of About  ====-->
<div class="crop">
<div class="section-title">
                <h3 style="color:white;">Types of Work We Specialize In</span></h3>
                <p>What We’ve Pulled Off</p>
</div>

<div class="ui-card">
        <img class = "box-image" src="images/gallery/pa.jpeg">
        <div class="description">
            <h2 style="color:white;">Private Party</h2>
        
    <p>Step into a world of exclusive ambiance tailored just for you. Our venue provides the ideal backdrop for your private gathering. With versatile spaces designed to accommodate your guest.</p>
  
    <?php
if(strlen($_SESSION['usrid']) == 0) {
?>
    <a href="login.php"><button style="background-color: #421387; border:none; color:white;">Create An Event</button></a>
<?php
} else {
?>
    <a href="user-booking.php"><button style="background-color: #421387; border:none; color:white;">Create An Event</button></a>
<?php
}
?>
            
        </div>
    </div>
    <div class="ui-card">
        <img  class = "box-image" src="images/gallery/gallery-full-four.jpg">
        <div class="description">
            <h2 style="color:white;">Corporate Event</h2>
            <p>Create a professional atmosphere that fosters productivity and collaboration. Our dedicated event team is here to assist with all aspects of your event planning, from layout design to audiovisual support.</p>
            <?php
if(strlen($_SESSION['usrid']) == 0) {
?>
    <a href="login.php"><button style="background-color: #421387; border:none; color:white;">Create An Event</button></a>
<?php
} else {
?>
    <a href="user-booking.php"><button style="background-color: #421387; border:none; color:white;">Create An Event</button></a>
<?php
}
?>
        </div>
    </div>
    <div class="ui-card">
        <img class = "box-image" src="images/gallery/wed.jpeg">
        <div class="description">
            <h2 style="color:white;">Wedding</h2>
            <p>Your special day deserves nothing less than perfection, and we're here to make your dream wedding a reality. At our venue, we understand the importance of this milestone in your life.</p>
            <?php
if(strlen($_SESSION['usrid']) == 0) {
?>
    <a href="login.php"><button style="background-color: #421387; border:none; color:white;">Create An Event</button></a>
<?php
} else {
?>
    <a href="user-booking.php"><button style="background-color: #421387; border:none; color:white;">Create An Event</button></a>
<?php
}
?>


        </div>
    </div>
</div>
<br>    
<br>
<br>
<br>    
<br>
<br>
<section class="speakers-full-width">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <!-- Speaker Slider -->
                <div class="speaker-slider">
                    <div class="speaker-image">
                        <img src="images/gallery/deco.jfif" alt="speaker" class="img-fluid">
                        <div class="primary-overlay text-center">
                            <h5>DECORATION</h5>
                            <p>We provide rental services such as marque/tent, ,furniture, LED lights etc. Decoration services are available as well. 
Please call +92 308 0408601 or email: daniyalarif2004@gmail.com </p>
<ul class="list-inline">
                                <li class="list-inline-item"><a href="https://www.facebook.com/profile.php?id=100068609501512"><i class="fa fa-facebook"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-whatsapp"></i></a></li>
                                <li class="list-inline-item"><a href=""><i class="fa fa-instagram"></i></a></li>
                            </ul>       
                        </div>
                    </div>
                    <div class="speaker-image">
                        <img src="images/gallery/DJ.jpg" alt="speaker" class="img-fluid">
                        <div class="primary-overlay text-center">
                            <h5>DJ & MUSIC</h5>
                            <p>We provide DJ and dane floors for all your events in Karachi Pakistan, Please call +92 308 0408601 or email: daniyalarif2004@gmail.com</p>
                            <ul class="list-inline">
                                <li class="list-inline-item"><a href="https://www.facebook.com/profile.php?id=100068609501512"><i class="fa fa-facebook"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-whatsapp"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                            
                        </div>
                    </div>
                    <div class="speaker-image">
                        <img src="images/gallery/graph.jpg" alt="speaker" class="img-fluid">
                        <div class="primary-overlay text-center">
                            <h5>PHOTOGRAPHY</h5>
                            <p>We provide professional photography for our events, for a quote please call
                            +92 308 0408601 or email: daniyalarif2004@gmail.com</p>
                            <ul class="list-inline">
                                <li class="list-inline-item"><a href="https://www.facebook.com/profile.php?id=100068609501512"><i class="fa fa-facebook"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-whatsapp"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                            
                        </div>
                    </div>
                    <div class="speaker-image">
                        <img src="images/gallery/sound.jpg" alt="speaker" class="img-fluid">
                        <div class="primary-overlay text-center">
                            <h5>LIGHTING & SOUND</h5>
                            <p>We provide Lighting and Sound services for all events in Karachi Pakistan, Please call
                            +92 308 0408601 or email: daniyalarif2004@gmail.com</p>
                            <ul class="list-inline">
                                <li class="list-inline-item"><a href="https://www.facebook.com/profile.php?id=100068609501512"><i class="fa fa-facebook"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-whatsapp"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                            
                        </div>
                    </div>
                    <div class="speaker-image">
                        <img src="images/gallery/dest.jpg" alt="speaker" class="img-fluid">
                        <div class="primary-overlay text-center">
                            <h5>DESTINATION WEDDINGS</h5>
                            <p>We provide destination wedding services our event managers will travel with your party to make sure everything goes smoothly
                            +92 308 0408601 or email: daniyalarif2004@gmail.com</p>
                            <ul class="list-inline">
                                <li class="list-inline-item"><a href="https://www.facebook.com/profile.php?id=100068609501512"><i class="fa fa-facebook"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-whatsapp"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                            
                        </div>
                    </div>
                    <div class="speaker-image">
                        <img src="images/gallery/party.jpeg" alt="speaker" class="img-fluid">
                        <div class="primary-overlay text-center">
                            <h5>PARTY</h5>
                            <p>We provide complete Party services with food and decor. Please call +92 308 0408601 or email: daniyalarif2004@gmail.com</p>
                            <ul class="list-inline">
                                <li class="list-inline-item"><a href="https://www.facebook.com/profile.php?id=100068609501512"><i class="fa fa-facebook"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-whatsapp"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="speaker-image">
                        <img src="images/gallery/lovepik.jpg" alt="speaker" class="img-fluid">
                        <div class="primary-overlay text-center">
                            <h5>SET DESIGN</h5>
                            <p>We provide set designing services at Eventify, Please call  +92 308 0408601 or email: daniyalarif2004@gmail.com</p>
                            <ul class="list-inline">
                                <li class="list-inline-item"><a href="https://www.facebook.com/profile.php?id=100068609501512"><i class="fa fa-facebook"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-whatsapp"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--=============================
=            Feature            =
==============================-->



<!--====  End of Feature  ====-->




<!--=============================
=            Gallery            =
==============================-->

<section class="gallery-full section pb-0">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                <h3><span class="alternate">Eventify Gallery</span></h3>
                   
                </div>
            </div>
        </div>
        <div class="row no-gutters">
            <!-- Gallery Image -->
            <div class="col-lg-3 col-md-4">
                <div class="image">
                    <img src="images/gallery/sound.jpg" alt="gallery-image" class="img-fluid">
                    <div class="primary-overlay">
                        <a class="image-popup" data-effect="mfp-with-zoom" href="images/gallery/sound.jpg"><i class="fa fa-picture-o"></i></a>
                    </div>
                </div>
            </div>
            <!-- Gallery Image -->
            <div class="col-lg-3 col-md-4">
                <div class="image">
                    <img src="images/gallery/dest.jpg" alt="gallery-image" class="img-fluid">
                    <div class="primary-overlay">
                        <a class="image-popup" data-effect="mfp-with-zoom" href="images/gallery/dest.jpg"><i class="fa fa-picture-o"></i></a>
                    </div>
                </div>
            </div>
            <!-- Gallery Image -->
            <div class="col-lg-3 col-md-4">
                <div class="image">
                    <img src="images/gallery/graph.jpg" alt="gallery-image" class="img-fluid">
                    <div class="primary-overlay">
                        <a class="image-popup" data-effect="mfp-with-zoom" href="images/gallery/graph.jpg"><i class="fa fa-picture-o"></i></a>
                    </div>
                </div>
            </div>
            <!-- Gallery Image -->
            <div class="col-lg-3 col-md-4">
                <div class="image">
                    <img src="images/gallery/lovepik.jpg" alt="gallery-image" class="img-fluid">
                    <div class="primary-overlay">
                        <a class="image-popup" data-effect="mfp-with-zoom" href="images/gallery/lovepik.jpg""><i class="fa fa-picture-o"></i></a>
                    </div>
                </div>
            </div>
            <!-- Gallery Image -->
            <div class="col-lg-3 col-md-4">
                <div class="image">
                    <img src="images/gallery/pexels.jpg" alt="gallery-image" class="img-fluid">
                    <div class="primary-overlay">
                        <a class="image-popup" data-effect="mfp-with-zoom" href="images/gallery/pexels.jpg"><i class="fa fa-picture-o"></i></a>
                    </div>
                </div>
            </div>
            <!-- Gallery Image -->
            <div class="col-lg-3 col-md-4">
                <div class="image">
                    <img src="images/gallery/deco.jfif" alt="gallery-image" class="img-fluid">
                    <div class="primary-overlay">
                        <a class="image-popup" data-effect="mfp-with-zoom" href="images/gallery/deco.jfif"><i class="fa fa-picture-o"></i></a>
                    </div>
                </div>
            </div>
            <!-- Gallery Image -->
            <div class="col-lg-3 col-md-4">
                <div class="image">
                    <img src="images/gallery/party.jpeg" alt="gallery-image" class="img-fluid">
                    <div class="primary-overlay">
                        <a class="image-popup" data-effect="mfp-with-zoom" href="images/gallery/party.jpeg"><i class="fa fa-picture-o"></i></a>
                    </div>
                </div>
            </div>
            <!-- Gallery Image -->
            <div class="col-lg-3 col-md-4">
                <div class="image">
                    <img src="images/gallery/DJ.jpg" alt="gallery-image" class="img-fluid">
                    <div class="primary-overlay">
                        <a class="image-popup" data-effect="mfp-with-zoom" href="images/gallery/DJ.jpg"><i class="fa fa-picture-o"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<br>
<br>
<br>

<!--====  End of Gallery  ====-->

<!--================================
=            Google Map            =
=================================-->



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
	  <script>
          var timeOut = 1000;
        var slideIndex = 0;
        var autoOn = true;

        autoSlides();

        function autoSlides() {
            timeOut = timeOut - 20;

            if (autoOn == true && timeOut < 0) {
                showSlides();
            }
            setTimeout(autoSlides, 20);
        }

        function prevSlide() {

            timeOut = 1400;

            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");

            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slideIndex--;

            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            if (slideIndex == 0) {
                slideIndex = 3
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
        }

        function showSlides() {

            timeOut = 1400;

            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");

            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slideIndex++;

            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
        }
    </script>
</body>
</html>