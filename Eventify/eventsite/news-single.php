<?php
include('connect.php');

session_start();

$sqlAll2 = "SELECT * FROM tbl_category";
$stmtAll2 = $conn->prepare($sqlAll2);
$stmtAll2->execute();
$cnt2=1;
$allResults2 = $stmtAll2->fetchAll(PDO::FETCH_OBJ);

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
					<h3>News Details</h3>
				</div>
				
			</div>
		</div>
	</div>
</section>

<!--====  End of Page Title  ====-->


<!--================================
=            News Posts            =
=================================-->

<section class="news section">
	<div class="container">
		<div class="row mt-30">
			<div class="col-lg-8 col-md-10 mx-auto">
			<?php
     $bid=intval($_GET['nid']);     
$sql = "SELECT * FROM tbl_news where n_id=:bid";
$query = $conn -> prepare($sql);
$query->bindParam(':bid',$bid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{ 
	$dateTimestamp = strtotime($row->posting_date);
			$dateTimestamp2 = strtotime($row->posting_date);
			
			
			// Format the timestamp to display only date and month in alphabets
			$formattedDate = date("d", $dateTimestamp);
			$formattedDate2 = date("M", $dateTimestamp2);
    ?>
				<div class="block">
					<!-- Article -->
					<article class="blog-post single">
						<div class="post-thumb">
						<img src="../admin/admin/newsimage/<?php echo htmlentities($row->news_img);?>" alt="post-image" class="img-fluid">
						</div>
				
						<div class="post-content">
							<div class="date">
								<h4>
								<?php echo htmlentities($formattedDate);?>	
									
								<span><?php echo htmlentities($formattedDate2);?></span></h4>
							</div>
							<div class="post-title">
								<h3><?php echo htmlentities($row->news_title);?></h3>
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
							<div class="post-details">
								<p>
								<?php echo htmlentities($row->news_details);?>
								</p>
								<p>
								<?php echo htmlentities($row->news_details);?>

								</p>
								<p>
								<?php echo htmlentities($row->news_details);?>

								</p>


<?php }} ?>

								<div class="share-block">
									<div class="tag">
										<p>
											Tags: 
										</p>
										<ul class="list-inline">
											<li class="list-inline-item">
												<a href="#">Event,</a>
											</li>
											<li class="list-inline-item">
												<a href="#">Conference,</a>
											</li>
											<li class="list-inline-item">
												<a href="#">Business</a>
											</li>
										</ul>
									</div>
									<div class="share">
										<p>
											Share: 
										</p>
										<ul class="social-links-share list-inline">
							              <li class="list-inline-item">
							                <a href="#"><i class="fa fa-facebook"></i></a>
							              </li>
							              <li class="list-inline-item">
							                <a href="#"><i class="fa fa-twitter"></i></a>
							              </li>
							              <li class="list-inline-item">
							                <a href="#"><i class="fa fa-instagram"></i></a>
							              </li>
							              <li class="list-inline-item">
							                <a href="#"><i class="fa fa-rss"></i></a>
							              </li>
							              <li class="list-inline-item">
							                <a href="#"><i class="fa fa-vimeo"></i></a>
							              </li>
							            </ul>
									</div>
								</div>
							</div>
						</div>
					</article>
			
					
				</div>
			</div>
			<div class="col-lg-4 col-md-10 mx-auto">
				<div class="sidebar">
					<!-- Search Widget -->
					<div class="widget search p-0">
						<div class="input-group">
						    <input type="text" class="form-control main m-0" id="expire" placeholder="Search...">
						    <span class="input-group-addon"><i class="fa fa-search"></i></span>
					    </div>
					</div>
					<!-- Category Widget -->
					<div class="widget category">
						<!-- Widget Header -->
						<h5 class="widget-header">Categories</h5>
						<ul class="category-list m-0 p-0">
						<?php foreach ($allResults2 as $row2): ?>

							<li><a href=""> <?php echo htmlentities($row2->cat_name);?><span class="float-right"></span></a></li>
							<?php $cnt2++;
         ?>  
                <?php endforeach;
				 ?>
						
						</ul>
					</div>
					<!-- Latest post -->
					<div class="widget latest-post">
						<h5 class="widget-header">Latest Post</h5>
						<!-- Post -->
						<div class="media">
							<img src="images/news/post-thumb-sm-one.jpg" class="img-fluid" alt="post-thumb">
							<div class="media-body">
								<h6><a href="">Nam hendrerit eros in ligula suscipit suscipit</a></h6>
								<p href="#"><span class="fa fa-calendar"></span>02 Feb, 2017</p>
							</div>
						</div>
						<!-- Post -->
						<div class="media">
							<img src="images/news/post-thumb-sm-two.jpg" class="img-fluid" alt="post-thumb">
							<div class="media-body">
								<h6><a href="">Nam hendrerit eros in ligula suscipit suscipit</a></h6>
								<p href="#"><span class="fa fa-calendar"></span>02 Feb, 2017</p>
							</div>
						</div>
						<!-- Post -->
						<div class="media">
							<img src="images/news/post-thumb-sm-three.jpg" class="img-fluid" alt="post-thumb">
							<div class="media-body">
								<h6><a href="">Nam hendrerit eros in ligula suscipit suscipit</a></h6>
								<p href="#"><span class="fa fa-calendar"></span>02 Feb, 2017</p>
							</div>
						</div>
						<!-- Post -->
						<div class="media">
							<img src="images/news/post-thumb-sm-four.jpg" class="img-fluid" alt="post-thumb">
							<div class="media-body">
								<h6><a href="">Nam hendrerit eros in ligula suscipit suscipit</a></h6>
								<p href="#"><span class="fa fa-calendar"></span>02 Feb, 2017</p>
							</div>
						</div>
					</div>
					<!-- Popular Tag Widget -->
					<div class="widget tags">
						<!-- Widget Header -->
						<h5 class="widget-header">Popular Tags</h5>
						<ul class="list-inline">
							<li class="list-inline-item"><a href="#">Culture</a></li>
							<li class="list-inline-item"><a href="#">Social</a></li>
							<li class="list-inline-item"><a href="#">News</a></li>
							<li class="list-inline-item"><a href="#">Events</a></li>
							<li class="list-inline-item"><a href="#">Sports</a></li>
							<li class="list-inline-item"><a href="#">Music</a></li>
						</ul>
					</div>
				</div>
			</div>
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

<!--================================
=            Google Map            =
=================================-->

<section class="map">
	<!-- Google Map -->
	<div id="map"></div>
	<div class="address-block">
		<h4>Eventify</h4>
		<ul class="address-list p-0 m-0">
			<li><i class="fa fa-home"></i><span>D - 4 Block H North Nazimabad Town, <br> Karachi City, Sindh 74700.</span></li>
			<li><i class="fa fa-phone"></i><span>+92 308 0408601</span></li>
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