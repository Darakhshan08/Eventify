<?php
include("includes/connect.php");
session_start();
// error_reporting(0);

if (strlen($_SESSION['adminFullName']) == 0) {
    header('location:../login.php');
} else {

    if (isset($_POST['update'])) {
        // Getting Values
        $eventid = intval($_GET['sid']);
        // Posted Values
        $catid = $_POST['category'];
        $spnserid = $_POST['sponser'];
        $ename = $_POST['eventname'];
        $ediscription = $_POST['eventdescription'];
        $esdate = $_POST['eventstartdate'];
        $price = $_POST['price'];
        $eedate = $_POST['eventenddate'];
        $elocation = $_POST['eventlocation'];

        // Query for updating data into the database
        $sql = "UPDATE tbl_events SET cat_id=:catid, sponser_id=:spnserid, event_name=:ename, event_discription=:ediscription, event_start_date=:esdate, event_end_date=:eedate, event_location=:elocation, price=:price WHERE id=:eid";
        $query = $conn->prepare($sql);
        $query->bindParam(':catid', $catid, PDO::PARAM_STR);
        $query->bindParam(':spnserid', $spnserid, PDO::PARAM_STR);
        $query->bindParam(':ename', $ename, PDO::PARAM_STR);
        $query->bindParam(':price', $price, PDO::PARAM_STR);
        $query->bindParam(':ediscription', $ediscription, PDO::PARAM_STR);
        $query->bindParam(':esdate', $esdate, PDO::PARAM_STR);
        $query->bindParam(':eedate', $eedate, PDO::PARAM_STR);
        $query->bindParam(':elocation', $elocation, PDO::PARAM_STR);
        $query->bindParam(':eid', $eventid, PDO::PARAM_STR);
        $query->execute();

        echo "<script>alert('Success: Event details updated successfully');</script>";
        // Redirect to a relevant page after the update, e.g., 'Manage Events.php'
        // echo "<script>window.location.href='Manage Events.php'</script>";
    }
}

// Fetch categories and sponsors from the database (adjust the SQL queries accordingly)
$sqlCategories = "SELECT cat_id, cat_name FROM tbl_category";
$queryCategories = $conn->prepare($sqlCategories);
$queryCategories->execute();
$categories = $queryCategories->fetchAll(PDO::FETCH_OBJ);

$sqlSponsors = "SELECT s_id, sponsers_name FROM tbl_sponser";
$querySponsors = $conn->prepare($sqlSponsors);
$querySponsors->execute();
$sponsors = $querySponsors->fetchAll(PDO::FETCH_OBJ);

// Fetch the event details based on the 'sid' parameter (adjust this part as needed)
$eventid = intval($_GET['sid']);
$sqlEvent = "SELECT  tbl_events.id as eid,tbl_events.event_name,tbl_events.event_start_date,tbl_events.event_end_date,tbl_events.price,tbl_category.cat_name as catname,tbl_category.cat_id as catid,tbl_sponser.sponsers_name as spnrname,tbl_sponser.s_id as spnserid,tbl_events.event_discription,tbl_events.event_location,tbl_events.event_image from tbl_events left join tbl_category on tbl_category.cat_id=tbl_events.cat_id left join tbl_sponser on tbl_sponser.s_id=tbl_events.sponser_id where tbl_events.id=:eid";
$queryEvent = $conn->prepare($sqlEvent);
$queryEvent->bindParam(':eid', $eventid, PDO::PARAM_STR);
$queryEvent->execute();
$result = $queryEvent->fetch(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">


<!-- edit-department24:07-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/cop.jpeg">
    <title>Eventify</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <style>
        body{
           
            background-image: url(assets/img/featured-events-bg.jpg);
            background-repeat:no-repeat;
            background-size:cover;  
       

        }
        </style>
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <div class="header">
			<div class="header-left">
				<a href="index-2.html" class="logo">
				<img src="assets/img/cop.jpeg" width="145" height="35" alt="">
				</a>
			</div>
			<a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
            <ul class="nav user-menu float-right">
                <li class="nav-item dropdown d-none d-sm-block">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><i class="fa fa-bell-o"></i> <span class="badge badge-pill bg-danger float-right">3</span></a>
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            <span>Notifications</span>
                        </div>
                        <div class="drop-scroll">
                            <ul class="notification-list">
                            <?php
$sql = "SELECT * From tbl_subscriber";
$query = $conn -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{ 
    ?>
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media">
											<span class="avatar"><?php echo htmlentities(substr($row->user_email, 0, 1));?></span>
											<div class="media-body">
												<p class="noti-details"><span class="noti-title"><?php echo htmlentities($row->user_email);?> </span> subscribed to your site</p>
												<p class="noti-time"><span class="notification-time"><?php echo date('h:i', strtotime($row->r_postingdate));?></span></p>
											</div>
                                        </div>
                                    </a>
                                </li>                                 <?php $cnt++;
    }} ?> 
                            </ul>
                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="activities.html">View all Notifications</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown d-none d-sm-block">
                    <a href="javascript:void(0);" id="open_msg_box" class="hasnotifications nav-link"><i class="fa fa-comment-o"></i> <span class="badge badge-pill bg-danger float-right">8</span></a>
                </li>
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img"><img class="rounded-circle" src="assets/img/user.jpg" width="40" alt="Admin">
							<span class="status online"></span></span>
                        <span><?php echo htmlentities($_SESSION['adminFullName'])?></span>
                    </a>
					<div class="dropdown-menu">
					<a class="dropdown-item" href="profile.php">My Profile</a>
						<a class="dropdown-item" href="../logout.php">Logout</a>
					</div>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu float-right">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="profile.php">My Profile</a>
						<a class="dropdown-item" href="../logout.php">Logout</a>
                </div>
            </div>
        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="active">
                            <a href="index-2.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                        </li>
                        <li class="submenu">
                            <a href="#"> <i class="fa fa-file fa-5x"></i></i> <span>Category</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
								<li><a href="Manage Category.php">Manage Category</a></li>
								
							</ul>
                        </li>
                        <li>
                            <a href="Manage Sponsers.php"><i class="fa fa-file"></i> <span>Manage Sponsers</span></a>
                        </li>

                        <li class="submenu">
                            <a href="#"> <i class="fa fa-calendar fa-5x"></i></i> <span>Event</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
								<li><a href="Manage Events.php">Manage Event</a></li>
								
							</ul>
                        </li>
                        <li class="active">
                            <a href="Manage User.php"><i class="fa fa-user"></i> <span>Manage User</span></a>
                        </li>
                    </li>
                    <li class="active">
                        <a href="Manage Subscriber.php"><i class="fa fa-user"></i> <span>Manage Subscriber</span></a>
                    </li>
						<li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-book"></i> <span>Manage Booking</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="booking.php">All Bookings</a></li>
                                <li><a href="Manage New Booking.php">New Bookings</a></li>
                                <li><a href="Cancelled Booking.php">Cancelled Bookings</a></li>
                                <li><a href="Confirmed Booking.php">Confirmed Bookings</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href=""> <i class="fa fa-file fa-5x"></i></i> <span>News</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
								<li><a href="News.php">Manage News</a></li>
								
							</ul>
                        </li>
                        </li>
                        <li class="submenu">
                            <a href=""> <i class="fa fa-wrench fa-5x"></i></i> <span>Website Setting</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="Website settings.php">General Setting</a></li>
                                
                            </ul>
                        </li>
                    </li>
                     
                     
                </div>
            </div>
        </div>
        <div class="content">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h4 class="page-title" style="font-size: 40px; margin-left: -200px;">Edit Event</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <form method="post" enctype="multipart/form-data">
                <!-- Category Select -->
                <div class="form-group">
                    <label>Category</label>
                    <select class="form-control" name="category">
                        <option value="<?php echo htmlentities($result->catid); ?>"><?php echo htmlentities($result->catname); ?></option>
                        <?php
                        foreach ($categories as $category) {
                            if ($result->catname != $category->cat_name) {
                                echo '<option value="' . htmlentities($category->cat_id) . '">' . htmlentities($category->cat_name) . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>

                <!-- Event Sponsors Select -->
                <div class="form-group">
                    <label>Event Sponsors:</label>
                    <select class="form-control" name="sponser">
                        <option value="<?php echo htmlentities($result->spnserid); ?>"><?php echo htmlentities($result->spnrname); ?></option>
                        <?php
                        foreach ($sponsors as $sponsor) {
                            if ($result->spnrname != $sponsor->sponsers_name) {
                                echo '<option value="' . htmlentities($sponsor->s_id) . '">' . htmlentities($sponsor->sponsers_name) . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>

                <!-- Other Form Inputs -->
                <div class="form-group">
                    <label>Event Name</label>
                    <input class="form-control" name="eventname" type="text" value="<?php echo htmlentities($result->event_name); ?>">
                </div>

                <div class="form-group">
                    <label>Event Description</label>
                    <textarea class="form-control" name="eventdescription" rows="3"><?php echo htmlentities($result->event_discription); ?></textarea>
                </div>

                <div class="form-group">
                    <label>Event Start Date</label>
                    <input class="form-control" name="eventstartdate" type="date" value="<?php echo htmlentities($result->event_start_date); ?>">
                </div>

                <div class="form-group">
                    <label>Event End Date</label>
                    <input class="form-control" type="date" name="eventenddate" value="<?php echo htmlentities($result->event_end_date); ?>">
                </div>

                <div class="form-group">
                    <label>Event Location</label>
                    <input class="form-control" type="text" name="eventlocation" value="<?php echo htmlentities($result->event_location); ?>">
                </div>

                <div class="form-group">
                    <label>Price</label>
                    <input class="form-control" type="text" name="price" value="<?php echo htmlentities($result->price); ?>">
                </div>

                <div class="form-group">
                    <label>Event Featured Image</label>
                    <div class="upload-input">
                        <img src="eventimages/<?php echo htmlentities($result->event_image); ?>" style="border: solid #000 1px" width="200px">
                        <a href="change-event-image.php?evntid=<?php echo htmlentities($result->eid); ?>">Change Event Image</a>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="form-group text-center">
                    <button class="btn btn-primary" type="submit" name="update">Update Event</button>
                </div>
            </form>
        </div>
    </div>
</div>

			<div class="notification-box">
                <div class="msg-sidebar notifications msg-noti">
                    <div class="topnav-dropdown-header">
                        <span>Messages</span>
                    </div>
                    <div class="drop-scroll msg-list-scroll" id="msg_list">
                        <ul class="list-box">
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">R</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Richard Miles </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item new-message">
                                        <div class="list-left">
                                            <span class="avatar">J</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">John Doe</span>
                                            <span class="message-time">1 Aug</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">T</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Tarah Shropshire </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">M</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Mike Litorus</span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">C</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Catherine Manseau </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">D</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Domenic Houston </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">B</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Buster Wigton </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">R</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Rolland Webber </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">C</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Claire Mapes </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">M</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Melita Faucher</span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">J</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Jeffery Lalor</span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">L</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Loren Gatlin</span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">T</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Tarah Shropshire</span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="topnav-dropdown-footer">
                        <a href="chat.html">See all messages</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>


<!-- edit-department24:07-->
</html>
