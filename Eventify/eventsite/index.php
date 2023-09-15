<?php
    session_start();

    include('connect.php');

$ret = "Select  site_name from tbl_gernalsetting ";
$querys = $conn -> prepare($ret);
$querys->execute();
$resultss=$querys->fetchAll(PDO::FETCH_OBJ);
$cnt=1;


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
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">

 
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

   <link rel="stylesheet" href="scroll.css">
   <link rel="stylesheet" href="ticket.css">
   <link rel="stylesheet" href="schedule.css">
   <style>

/* Media Query for Tablets */
@media (max-width: 1000px) {
  .frame {
    text-align: center;
    margin-bottom: 20px;
    border-radius: 150px;
  }
  
  .custom-btn {
    display: block;
    margin: 0 auto;
    border-radius: 172px;
  }
}
/* Media Query for Tablets */
@media (max-width: 768px) {
  .frame {
    text-align: center;
    margin-bottom: 20px;
    border-radius: 150px;
  }
  
  .custom-btn {
    display: block;
    margin: 0 auto;
    border-radius: 172px;
  }
}

/* Media Query for Mobile Devices */
@media (max-width: 480px) {
  .frame {
    text-align: center;
    margin-bottom: 20px;
  }
  
  .custom-btn {
    display: block;
    margin: 0 auto;
    font-size: 14px;
    padding: 8px 15px;
    border-radius: 172px;

  }
}


.bg-ticket {
  background: url(images/background/cta-ticket-bg.jpg) fixed no-repeat;
  background-size: cover;
  background-position: center center;
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
  background-image: linear-gradient(300deg,#5B61FF 0%, #FF59FC 100%,#A507FF);
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


.img-fluid {
    max-width: 100%;
    height: 200px;
}
.about .image-block img {
    border-radius: 50%;
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

.about .image-block img {
  height: 20rem;
  width: 20rem;
  border-radius:50%;
  box-shadow: 0px 0px 59px 0px rgba(11, 29, 66, 0.15);
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
            <img src="images/gallery/spor.jpeg" style="width: 100vw;height: 80vh">

        </div>
        <div class="slideshow-container">
            <div class="mySlides fade">
                <img src="images/gallery/tival.jpg" style="width: 100vw;height: 80vh">
    
            </div>
            <div class="slideshow-container">
                <div class="mySlides fade">
                    <img src="images/gallery/summer.jpg" style="width: 100vw;height: 80vh">
        
                </div>
                
                <div class="slideshow-container">
                    <div class="mySlides fade">
                        <img src="images/gallery/deposit.jpg" style="width: 100vw;height: 80vh">
            
                    </div>
        <div class="mySlides fade">

            <img src="images/gallery/corporate.jpeg" style="width: 100vw;height: 80vh">

        </div>
        <div class="mySlides fade">

            <img src="images/gallery/man.jpg" style="width: 100vw;height: 80vh">

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
                    <img class="img-fluid" src="images/gallery/sport.jpeg" alt="">
                </div>
            </div>
            <div class="col-lg-8 col-md-6 align-self-center">
                <div class="content-block">
                <h3><span class="alternate">About the Eventify</span></h3>
                    <div class="description-one">
                        <p>
                        Eventify is an online platform designed to facilitate the booking and reservation of various types of events, activities, tickets. 
                        </p>
                    </div>
                    <div class="description-two">
                        <p>In this website we are looking to secure a spot or participate in ticket, such as Concerts, Sports events, Festivals, Corporate, and more.</p>
                    </div>
                    <div class="description-two">
                        <p>We are aware that planning events can be difficult. Our collected and friendly demeanor will guarantee that every single detail is taken care of from the very beginning, giving you the time and mental space to focus on enjoying your event. </p>
                    </div>
                    <div class="description-two">
                        <p> No two events are the identical, from free venue searching to complete, end-to-end event administration. We create a customized solution keeping you in mind.</p>
                    </div>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="pricing.php"><button class="custom-btn btn-9">Buy Ticket</button></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="about-us.php"><button class="custom-btn btn-9">Read More</button></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!--====  End of About  ====-->

<!--==============================
=            Speakers            =
===============================-->

<div class="homepage-featured-events">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="featured-events-wrap flex flex-wrap justify-content-between">
                    <div class="event-content-wrap positioning-event-1">
                        <figure>
                            <a href="#"><img src="images/gallery/1.jpg" alt="1"></a>
                        </figure>

                        <header class="entry-header">
                            <h3 class="entry-title">Michael Smith in concert</h3>

                            <div class="posted-date">August 25</div>
                        </header>
                    </div>

                    <div class="event-content-wrap positioning-event-2">
                        <figure>
                            <a href="#"><img src="images/gallery/2.jpg" alt=""></a>
                        </figure>

                        <header class="entry-header">
                            <h3 class="entry-title">Street art fest</h3>

                            <div class="posted-date">November 28</div>
                        </header>
                    </div>

                    <div class="event-content-wrap positioning-event-3">
                        <figure>
                            <a href="#"><img src="images/gallery/3.jpg" alt=""></a>
                        </figure>

                        <header class="entry-header">
                            <h3 class="entry-title">Anabelle in concert</h3>

                            <div class="posted-date">August 28</div>
                        </header>
                    </div>

                    <div class="event-content-wrap positioning-event-4 half">
                        <figure>
                            <a href="#"><img src="images/gallery/events-in-london.jpg" alt=""></a>
                        </figure>
                    </div>

                    <div class="event-content-wrap positioning-event-5 half">
                        <figure>
                            <a href="#"><img src="images/gallery/check-july.png" alt=""></a>
                        </figure>
                    </div>

                    <div class="event-content-wrap positioning-event-6 half">
                        <figure>
                            <a href="#"><img src="images/gallery/summer-festivals.jpg" alt=""></a>
                        </figure>
                    </div>

                    <div class="event-content-wrap positioning-event-7">
                        <figure>
                            <a href="#"><img src="images/gallery/90.jpg" alt=""></a>
                        </figure>

                        <header class="entry-header">
                            <h3 class="entry-title">90’s Disco Night</h3>

                            <div class="posted-date">August 28</div>
                        </header>
                    </div>

                    <div class="event-content-wrap positioning-event-8">
                        <figure>
                            <a href="#"><img src="images/gallery/next3.jpg" height="394px" alt="1"></a>
                        </figure>

                        <header class="entry-header">
                            <h3 class="entry-title">Modern Ballet</h3>

                            <div class="posted-date">August 25</div>
                        </header>
                    </div>

                    <div class="event-content-wrap positioning-event-9">
                        <figure>
                            <a href="#"><img src="images/gallery/smoke.jpg" alt=""></a>
                        </figure>

                        <header class="entry-header">
                            <h3 class="entry-title">Smoke show</h3>

                            <div class="posted-date">August 28</div>
                        </header>
                    </div>

                    <div class="event-content-wrap positioning-event-10 half">
                        <figure>
                            <a href="#"><img src="images/gallery/summer-festival.jpg" alt=""></a>
                        </figure>
                    </div>

                    <div class="event-content-wrap positioning-event-11 half">
                        <figure>
                            <a href="#"><img src="images/gallery/autumn.jpg" alt=""></a>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--==============================
=            Schedule            =
===============================-->

<section class="schedule-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                <h3><span class="alternate">Our Schedule</span></h3>
                    <p>Do not miss anything topic about the event</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="schedule-tab">
                    <?php
// Fetching Upcomong events
$isactive=1;
    $sql = "SELECT event_name,event_location,event_start_date,event_end_date,event_image,id from tbl_events where is_active=:isactive order by id desc limit 5";
    $query = $conn -> prepare($sql);
    $query->bindParam(':isactive',$isactive,PDO::PARAM_STR);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
    if($query->rowCount() > 0)
    {
    foreach($results as $row)
    { 
    ?>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="st-content">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="sc-pic">
                                                <img src="../admin/admin/eventimages/<?php echo htmlentities($row->event_image);?>"  alt="">
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="sc-text">
                                                <h4><?php echo htmlentities($row->event_name);?> </h4>
                                                <ul>
                                                    <li><i class="fa fa-calendar"><br></i> <?php echo htmlentities($row->event_start_date);?> To <?php echo htmlentities($row->event_end_date);?></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <ul class="sc-widget">
                                                <li><i class="fa fa-globe"></i><?php echo htmlentities($row->event_name);?></li>
                                                <li><i class= "fa fa-map-marker"></i>  <?php echo htmlentities($row->event_location);?>
                                                </li>
                                            </ul>
                                           <div class="frame">
                                           <a href="det.php?evntid=<?php echo htmlentities($row->id);?>" <button class="custom-btn btn-9">View-Details</button></a>
                                           </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                            <?php } } ?>                        
                             
         
                            
        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Schedule Section End -->






<!--===================================
=            Pricing Table            =
====================================-->

<section class="section pricing">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                <h3><span class="alternate"> Get Tickets</span></h3>
                    <p>"Join us for an incredible day filled with entertainment. Get your tickets and be part of the excitement!" </p>
                </div>
            </div>
        </div>
        
        <div class="contain">
        <?php
    $sql = "SELECT * FROM tbl_events WHERE id = 1"; // Replace '1' with the specific s_id you want to display
    $query = $conn->prepare($sql);
    $query->execute();
    $row = $query->fetch(PDO::FETCH_OBJ);

    if ($row) {
    ?>
            <div class="item-contain">
                <div class="img-contain">
                    <img src="../admin/admin/eventimages/<?php echo htmlentities($row->event_image);?>" alt="Event image">
                </div>
    
                <div class="body-contain">
                    <div class="over"></div>
    
                    <div class="event-info">
                        <p class="title"><?php echo htmlentities($row->event_name);?></p>
                        <div class="sep"></div>
                        <p class="info"><?php echo htmlentities($row->event_location);?></p>
                        <p class="price">Rs <?php echo htmlentities($row->price);?></p>
    
                        <div class="addition">
                            <p class="info">
                                <i class="fas fa-map-marker-alt"></i>
                                <?php echo htmlentities($row->event_location);?>
                            </p>
                            <p class="info">
                                <i class="far fa-calendar-alt"></i>
                                <?php echo htmlentities($row->event_start_date);?>
                            </p>
    
                            <p class="info descrip">
                            <?php echo htmlentities($row->event_discription);?> <span>more...</span>
                            </p>
                        </div>
                    </div>
                   <a href="det.php?evntid=<?php echo htmlentities($row->id);?>"><button class="action">Book it</button></a> 
                </div>
            </div>
            <?php
    }
    ?>
         <?php
    $sql = "SELECT * FROM tbl_events WHERE id = 2"; // Replace '1' with the specific s_id you want to display
    $query = $conn->prepare($sql);
    $query->execute();
    $row = $query->fetch(PDO::FETCH_OBJ);

    if ($row) {
    ?>
            <div class="item-contain">
                <div class="img-contain">
                    <img src="../admin/admin/eventimages/<?php echo htmlentities($row->event_image);?>" alt="Event image">
                </div>
    
                <div class="body-contain">
                    <div class="over"></div>
    
                    <div class="event-info">
                        <p class="title"> <?php echo htmlentities($row->event_name);?></p>
                        <div class="sep"></div>
                        <p class="info"> <?php echo htmlentities($row->event_location);?></p>
                        <p class="price">Rs <?php echo htmlentities($row->price);?></p>
    
                        <div class="addition">
                            <p class="info">
                                <i class="fas fa-map-marker-alt"></i>
                                <?php echo htmlentities($row->event_location);?>
                            </p>
                            <p class="info">
                                <i class="far fa-calendar-alt"></i>
                                <?php echo htmlentities($row->event_start_date);?>
                            </p>
    
                            <p class="info descrip">
                            <?php echo htmlentities($row->event_discription);?> <span>more...</span>
                            </p>
                        </div>
                    </div>
                    <a href="det.php?evntid=<?php echo htmlentities($row->id);?>"><button class="action">Book it</button></a> 
                </div>
            </div>
            <?php
    }
    ?>
         <?php
    $sql = "SELECT * FROM tbl_events WHERE id = 3"; // Replace '1' with the specific s_id you want to display
    $query = $conn->prepare($sql);
    $query->execute();
    $row = $query->fetch(PDO::FETCH_OBJ);

    if ($row) {
    ?>
            <div class="item-contain">
                <div class="img-contain">
                    <img src="../admin/admin/eventimages/<?php echo htmlentities($row->event_image);?>" alt="Event image">
                </div>
    
                <div class="body-contain">
                    <div class="over"></div>
    
                    <div class="event-info">
                        <p class="title"><?php echo htmlentities($row->event_name);?></p>
                        <div class="sep"></div>
                        <p class="info"><?php echo htmlentities($row->event_location);?></p>
                        <p class="price">Rs <?php echo htmlentities($row->price);?></p>
    
                        <div class="addition">
                            <p class="info">
                                <i class="fas fa-map-marker-alt"></i>
                                <?php echo htmlentities($row->event_location);?>
                            </p>
                            <p class="info">
                                <i class="far fa-calendar-alt"></i>
                                <?php echo htmlentities($row->event_start_date);?>
                            </p>
    
                            <p class="info descrip">
                            <?php echo htmlentities($row->event_discription);?><span>more...</span>
                            </p>
                        </div>
                    </div>
                    <a href="det.php?evntid=<?php echo htmlentities($row->id);?>"><button class="action">Book it</button></a> 
                </div>
            </div>
            <?php
    }
    ?>
</section>

<!--====  End of Pricing Table  ====-->


<!--===========================================
=            Call to Action Ticket            =
============================================-->

<section class="cta-ticket bg-ticket overlay-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- Get ticket info -->
                <div class="content-block">
                    <h2>Get Ticket Now!</h2>
                    <p>"Experience the thrill and excitement at the event. Grab your tickets before they're gone!"</p>
                    <a href="pricing.php" class="btn btn-main-md">Buy ticket</a>
                </div>
            </div>
        </div>
    </div>
    <div class="image-block"><img src="" alt="" class="img-fluid"></div>
</section>
<br>
<br>
<br>
<br>

<!--====  End of Call to Action Ticket  ====-->

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

<!--================================
=            News Posts            =
=================================-->

<section class="news section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                <h3><span class="alternate">Eventify News</span></h3>
                    <p>When it comes to event news, a captivating caption is key. It can grab your audience's attention and motivate them to participate in the event.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-8 col-10 m-auto">
                <div class="blog-post">
                <?php
    $sql = "SELECT * FROM tbl_news WHERE n_id = 1"; // Replace '1' with the specific s_id you want to display
    $query = $conn->prepare($sql);
    $query->execute();
    $row = $query->fetch(PDO::FETCH_OBJ);

    if ($row) {
        $dateTimestamp = strtotime($row->posting_date);
        $dateTimestamp2 = strtotime($row->posting_date);
        
        
        // Format the timestamp to display only date and month in alphabets
        $formattedDate = date("d", $dateTimestamp);
        $formattedDate2 = date("M", $dateTimestamp2);
    ?>
                    <div class="post-thumb">
                        <a href="news-single.php?nid=<?php echo htmlentities($row->n_id);?>">
                            <img src="../admin/admin/newsimage/<?php echo htmlentities($row->news_img);?>" alt="post-image" class="img-fluid">
                        </a>
                    </div>
       
                    <div class="post-content">
                        <div class="date">
                            <h4><?php echo htmlentities($formattedDate);?><span><?php echo htmlentities($formattedDate2);?></span></h4>
                        </div>
                        <div class="post-title">
                            <h2><a href="news-single.html"><?php echo htmlentities($row->news_title);?>.</a></h2>
                        </div>
                        <div class="post-meta">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <i class="fa fa-user-o"></i>
                                    <a href="#">Admin</a>
                                </li>
                                <li class="list-inline-item">
                                    <i class="fa fa-heart-o"></i>
                                    <a href="#">350</a>
                                </li>
                                <li class="list-inline-item">
                                    <i class="fa fa-comments-o"></i>
                                    <a href="#">30</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <?php }
                        ?>
            <div class="col-lg-4 col-md-6 col-sm-8 col-10 m-auto">
                <div class="blog-post">
                <?php
    $sql = "SELECT * FROM tbl_news WHERE n_id = 2"; // Replace '1' with the specific s_id you want to display
    $query = $conn->prepare($sql);
    $query->execute();
    $row = $query->fetch(PDO::FETCH_OBJ);

    if ($row) {
        $dateTimestamp = strtotime($row->posting_date);
        $dateTimestamp2 = strtotime($row->posting_date);
        
        
        // Format the timestamp to display only date and month in alphabets
        $formattedDate = date("d", $dateTimestamp);
        $formattedDate2 = date("M", $dateTimestamp2);
    ?>
                    <div class="post-thumb">
                        <a href="news-single.php?nid=<?php echo htmlentities($row->n_id);?>">
                            <img src="../admin/admin/newsimage/<?php echo htmlentities($row->news_img);?>" alt="post-image" class="img-fluid">
                        </a>
                    </div>
                  
                    <div class="post-content">
                        <div class="date">
                            <h4><?php echo htmlentities($formattedDate);?><span><?php echo htmlentities($formattedDate2);?></span></h4>
                        </div>
                        <div class="post-title">
                            <h2><a href="news-single.html"><?php echo htmlentities($row->news_title);?>.</a></h2>
                        </div>
                        <div class="post-meta">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <i class="fa fa-user-o"></i>
                                    <a href="#">Admin</a>
                                </li>
                                <li class="list-inline-item">
                                    <i class="fa fa-heart-o"></i>
                                    <a href="#">350</a>
                                </li>
                                <li class="list-inline-item">
                                    <i class="fa fa-comments-o"></i>
                                    <a href="#">30</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <?php }
                        ?>


                        
            <div class="col-lg-4 col-md-6 m-md-auto col-sm-8 col-10 m-auto">
                <div class="blog-post">
                <?php
    $sql = "SELECT * FROM tbl_news WHERE n_id = 3"; // Replace '1' with the specific s_id you want to display
    $query = $conn->prepare($sql);
    $query->execute();
    $row = $query->fetch(PDO::FETCH_OBJ);

    if ($row) {
        $dateTimestamp = strtotime($row->posting_date);
        $dateTimestamp2 = strtotime($row->posting_date);
        
        
        // Format the timestamp to display only date and month in alphabets
        $formattedDate = date("d", $dateTimestamp);
        $formattedDate2 = date("M", $dateTimestamp2);
    ?>
                    <div class="post-thumb">
                        <a href="news-single.php?nid=<?php echo htmlentities($row->n_id);?>">
                            <img src="../admin/admin/newsimage/<?php echo htmlentities($row->news_img);?>" alt="post-image" class="img-fluid">
                        </a>
                    </div>
                    <div class="post-content">
                        <div class="date">
                            <h4><?php echo htmlentities($formattedDate);?><span><?php echo htmlentities($formattedDate2);?></span></h4>
                        </div>
                        <div class="post-title">
                            <h2><a href="news-single.html"><?php echo htmlentities($row->news_title);?>.</a></h2>
                        </div>
                        <div class="post-meta">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <i class="fa fa-user-o"></i>
                                    <a href="#">Admin</a>
                                </li>
                                <li class="list-inline-item">
                                    <i class="fa fa-heart-o"></i>
                                    <a href="#">350</a>
                                </li>
                                <li class="list-inline-item">
                                    <i class="fa fa-comments-o"></i>
                                    <a href="#">30</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <?php }
                        ?>
        </div>
    </div>
</section>

<!--====  End of News Posts  ====-->

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