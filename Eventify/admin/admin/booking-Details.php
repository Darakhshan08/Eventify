<?php
include("includes/connect.php");

session_start();
error_reporting(0);

if(strlen($_SESSION['adminFullName'])==0)
{   
header('location:../login.php');
}
else{ 



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/cop.jpeg">
    <title>Eventify</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

 
</head>
<style>
    body{
       
        background-image: url(assets/img/featured-events-bg.jpg);
        background-repeat:no-repeat;
        background-size:cover;  
   

    }
   
    tr{
border: 5px solid white;
 background: linear-gradient(rgb(45, 43, 43),rgb(124, 101, 255),black); 
color: rgb(255, 255, 255);


} 
tr:hover{
transition: 0.2s;
border: 2px solid rgb(53, 0, 0) !important;
background: linear-gradient(rgb(40, 38, 38) ,#08011e, rgb(40, 38, 38));
color:rgb(255, 255, 255);
cursor: pointer;

} 
th{
    border: 5px solid white;
    width: 190px;
}


</style>
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
                        <span class="user-img">
							<img class="rounded-circle" src="assets/img/user.jpg" width="24" alt="Admin">
							<span class="status online"></span>
						</span>
						<span><?php echo htmlentities($_SESSION['adminFullName'])?></span>
                    </a>
					<div class="dropdown-menu">
                    <a class="dropdown-item" href="profile.php">My Profile</a>
						<a class="dropdown-item" href="../logout.php">Logout</a>
					</div>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu float-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
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
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title" style="font-size: 40px;">Booking Details</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                       
                    </div>
                </div>
                <?php
     $bid=intval($_GET['bkid']);     
$sql = "SELECT tbl_booking.id as bid,tbl_booking.booking_id	,tbl_events.event_name,tbl_events.id as eid,tbl_user.full_name,tbl_booking.no_member,tbl_booking.booking_status,tbl_booking.booking_date,tbl_user.user_email,tbl_user.user_phoneno,tbl_booking.no_member,tbl_booking.user_remarks,tbl_booking.user_cancel_remarks,tbl_booking.admin_remarks	,tbl_booking.last_updation_date from tbl_booking left  join tbl_user on tbl_user.user_id=tbl_booking.user_id left join tbl_events on tbl_events.id=tbl_booking.event_id where tbl_booking.id=:bid";
$query = $conn -> prepare($sql);
$query->bindParam(':bid',$bid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{ 
    ?> 
                
                <div class="row">
                    <div class="col-md-12">
						<div class="table-responsive">
                            <table width="100%" class="table table-striped custom-table">
                                <tr>
                                    <th>Booking Id</th>    
                                    <td style="text-align: center;"><?php echo htmlentities($row->booking_id);?></td>
                                    <th>Booking Date</th>    
                                    <td style="text-align: center;"><?php echo htmlentities($row->booking_date);?></td>
                                    <th>Event Name</th>    
                                    <td style="text-align: center;"><?php echo htmlentities($row->event_name);?></td>
                                    </tr>   
                                    <tr>
                                        <th>Number of Members</th>    
                                        <td style="text-align: center;"><?php echo htmlentities($row->no_member);?></td>
                                        <th>Booking Status</th>    
                                        <td colspan="3"><?php $status=$row->booking_status;
if($status==""){
echo htmlentities("Not Confirmed yet");    
} else {
echo htmlentities("$status");        
}
?></td>
                                        </tr>
                                        
                                        <tr>
                                        <th>Full Name</th>    
                                        <td style="text-align: center;"><?php echo htmlentities($row->full_name);?></td>
                                        <th>Email Id</th>    
                                        <td style="text-align: center;"><?php echo htmlentities($row->user_email);?></td>
                                        <th>Phone Number</th>    
                                        <td style="text-align: center;"><?php echo htmlentities($row->user_phoneno);?></td>
                                        </tr>
                                        
                                        <tr>
                                        <th>User Remark</th> 
                                        <td colspan="5"><?php echo htmlentities($row->user_remarks);?></td>   
                                        </tr>
                                        
                                        <tr>
                                        <th>Admin Remark</th>  
                                        <td colspan="5"><?php echo htmlentities($row->admin_remarks);?></td>  
                                        </tr>
                                        
                                        <tr>
                                        <th>Last Updation Date</th>   
                                        <td colspan="5"><?php echo htmlentities($row->last_updation_date);?></td> 
                                        </tr> 

                               
                                <tbody>
<?php }} ?>

                                    <div class="sidebar-overlay" data-reff=""></div>
                                    <script src="assets/js/jquery-3.2.1.min.js"></script>
                                    <script src="assets/js/popper.min.js"></script>
                                    <script src="assets/js/bootstrap.min.js"></script>
                                    <script src="assets/js/jquery.slimscroll.js"></script>
                                    <script src="assets/js/Chart.bundle.js"></script>
                                    <script src="assets/js/chart.js"></script>
                                    <script src="assets/js/app.js"></script>
</body>
</html>
<?php
}
?>