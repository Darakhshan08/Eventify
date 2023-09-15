<?php
include("includes/connect.php");
session_start();
// error_reporting(0);

if(strlen($_SESSION['adminFullName'])==0)
{   
header('location:../login.php');
}
else{ 


if(isset($_POST['update']))
  {
$cat=$_POST['service'];
$decrption=$_POST['price'];

$cid=intval($_GET['ser_id']);
$sql="update tbl_services set ser_name=:cat,ser_price=:decrption where ser_id=:cid";
$query = $conn->prepare($sql);
$query->bindParam(':cid',$cid,PDO::PARAM_STR);
$query->bindParam(':cat',$cat,PDO::PARAM_STR);
$query->bindParam(':decrption',$decrption,PDO::PARAM_STR);

$query->execute();

$msg="Category updated.";


  }



?>


<!DOCTYPE html>
<html lang="en">


<!-- edit-patient24:07-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/special.png">
    <title>Event Planners</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
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
					<img src="assets/img/special.png" width="35" height="35" alt=""> <span>Event Planners</span>
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
						<a class="dropdown-item" href="profile.html">My Profile</a>
						<a class="dropdown-item" href="edit-profile.html">Edit Profile</a>
						<a class="dropdown-item" href="settings.html">Settings</a>
						<a class="dropdown-item" href="../logout.php">Logout</a>
					</div>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu float-right">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="profile.html">My Profile</a>
                    <a class="dropdown-item" href="edit-profile.html">Edit Profile</a>
                    <a class="dropdown-item" href="settings.html">Settings</a>
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
                                <li><a href="user-category.php">User Category</a></li>
								
							</ul>
                        </li>
                        <li>
                            <a href="Manage Sponsers.php"><i class="fa fa-file"></i> <span>Manage Sponsers</span></a>
                        </li>

                        <li class="submenu">
                            <a href="#"> <i class="fa fa-calendar fa-5x"></i></i> <span>Event</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
								<li><a href="Manage Events.php">Manage Event</a></li>
                                <li><a href="Manage-user-events.php">Manage User Event</a></li>		
							</ul>
                        </li>
                        <li class="active">
                            <a href="Manage User.php"><i class="fa fa-user"></i> <span>Manage User</span></a>
                        </li>
                    </li>
                    <li class="active">
                        <a href="./services.php"><i class="fa fa-user"></i> <span>Manage Services</span></a>
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
        <style>
    /* CSS for smaller screens (max-width: 768px) */
    @media (max-width: 768px) {
        .page-title {
            font-size: 30px;
            text-align: center;
            position: static;
            top: 0;
            margin-left: 0;
        }
        .second-title {
            top: 10px;
        }
        .form-control {
            width: 100%;
        }
        .respond {
            width: 100%;
        }
        .submit-btn {
            margin-left: 0;
            margin-top: 20px;
            position: relative;
            top: 0;
        }
        .col-sm-12 {
            margin-left: 0;
            margin-right: 0;
            top: 0;
        }
    }
</style>

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h4 class="page-title">Edit Category</h4>
                <h4 class="page-title second-title">Last Updated At:</h4>
            </div>
        </div>
        <?php
        $cid=intval($_GET['ser_id']);
        $sql = "SELECT ser_id,ser_name,ser_price,ser_posting_date from tbl_services where ser_id=:cid";
        $query = $conn -> prepare($sql);
        $query->bindParam(':cid',$cid,PDO::PARAM_STR);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($query->rowCount() > 0) {
            foreach($results as $row) { 
        ?>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <form method="POST">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Services</label>
                                <input class="form-control" name="service" value="<?php echo htmlentities($row->ser_name);?>" type="text">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Services_Price</label>
                                <input class="form-control" name="price" type="text" value="<?php echo htmlentities($row->ser_price);?>">
                            </div>
                        </div>

                       

                        <div class="col-sm-12 text-center">
                            <button class="btn btn-primary submit-btn" type="submit" name="update" style="background-color: #9a28d7;">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php }} ?>
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
	<script src="assets/js/moment.min.js"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>

<?php
}
?>

<!-- edit-patient24:07-->
</html>
