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

<?php
// Assuming you have established a PDO connection


$sql = "SELECT user_gender, COUNT(*) as count FROM tbl_user GROUP BY user_gender";
$stmt = $conn->prepare($sql);
$stmt->execute();
$data1 = $stmt->fetchAll(PDO::FETCH_ASSOC);

$chartData1 = [['Gender', 'Count']];
foreach ($data1 as $row) {
    $chartData1[] = [$row['user_gender'], (int)$row['count']];
}

$sql = "SELECT booking_status, COUNT(*) as count FROM tbl_booking GROUP BY booking_status";
$stmt = $conn->prepare($sql);
$stmt->execute();
$data2 = $stmt->fetchAll(PDO::FETCH_ASSOC);

$chartData2 = [['Status', 'Count']];
foreach ($data2 as $row) {
    if ($row['booking_status'] === null) {
        $row['booking_status'] = 'In Process';
    }
    $chartData2[] = [$row['booking_status'], (int)$row['count']];
}
?>





<!DOCTYPE html>
<html lang="en">
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawCharts);

        function drawCharts() {
            // Data for the first chart
            var data1 = google.visualization.arrayToDataTable(<?php echo json_encode($chartData1); ?>);

            // Options for the first chart
            var options1 = {
                chartArea: {
        width: '80%', // Set the desired width here
        height: '300%', // Set the desired height here
    },
              
                backgroundColor: 'transparent',
                legend: {
                textStyle: { color: 'white',
                    fontName: 'Arial', // Font family
                    fontSize: 14,  }, // Color for the labels
            },
                // is3D: true,
            };

            // Create and draw the first chart
            var chart1 = new google.visualization.PieChart(document.getElementById('chart1'));
            options1.slices =  {0: { color: '#421387' }, 1: { color: '#9a28d7' }, 2: { color: '#952323' }};
            chart1.draw(data1, options1);

            // Data for the second chart
            var data2 = google.visualization.arrayToDataTable(<?php echo json_encode($chartData2); ?>);

            // Options for the second chart
            var options2 = {
                chartArea: {
        width: '80%', // Set the desired width here
        height: '300%', // Set the desired height here
    },
                backgroundColor: "transparent",
                legend: {
                textStyle: { color: 'white',  fontName: 'Arial', // Font family
                    fontSize: 14,  }, 
                
                // Color for the labels
            },
                // is3D: true,
            };

            // Create and draw the second chart
            var chart2 = new google.visualization.PieChart(document.getElementById('chart2'));
            options2.slices = { 0: { color: '#421387' }, 1: { color: '#9a28d7' }, 2: { color: '#6527BE' } };
            chart2.draw(data2, options2);
        }
    </script>


<!-- index22:59-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/cop.jpeg">
    <title>Eventify</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
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
     background: linear-gradient(rgb(45, 43, 43),rgb(124, 101, 255),black); 
    color: rgb(255, 255, 255);

   
} 

 th:hover{
	transition: 0.2s;
    border: 2px solid rgb(53, 0, 0) !important;
    background: linear-gradient(rgb(40, 38, 38) ,#08011e, rgb(40, 38, 38));
    color:rgb(255, 255, 255);
    cursor: pointer;
	
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
				<a href="index-2.php" class="logo">
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
                            <a href="">View all Notifications</a>
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
                                <li><a href="Manage-user-events.php">Manage user Event</a></li>	
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

        <?php

$query = $conn->prepare("SELECT * FROM tbl_user");
$query->execute();
$UserRows = $query->rowCount();

$query = $conn->prepare("SELECT * FROM tbl_booking");
$query->execute();
$BookRows = $query->rowCount();

$query = $conn->prepare("SELECT * FROM tbl_events");
$query->execute();
$EventRows = $query->rowCount();

$query = $conn->prepare("SELECT * FROM tbl_category");
$query->execute();
$CatRows = $query->rowCount();



?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget"  style="background: url(assets/img/istockphoto-1.jpg) center no-repeat;">
							<span class="dash-widget-bg1"><i class="fa fa-book" aria-hidden="true"></i></span>
							<div class="dash-widget-info text-right">
								<h3 style="color:white; font-size:28px;"><?php  echo $BookRows;?></h3>
								<span class="widget-title1">Total Bookings<i class="fa fa-check" aria-hidden="true" ></i></span>
							</div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget"  style="background: url(assets/img/istockphoto-1.jpg) center no-repeat;">
                            <span class="dash-widget-bg2"><i class="fa fa-users"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3 style="color:white;font-size:28px;"><?php  echo $UserRows;?></h3>
                                <span class="widget-title2">Total Users<i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget"  style="background: url(assets/img/istockphoto-1.jpg) center no-repeat;">
                            <span class="dash-widget-bg3"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3 style="color:white; font-size:28px;"><?php  echo $EventRows;?></h3>
                                <span class="widget-title3">Total Events<i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget"  style="background: url(assets/img/istockphoto-1.jpg) center no-repeat;">
                            <span class="dash-widget-bg4"><i class="fa fa-file" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right" >
                                <h3 style="color:white; font-size:28px;"><?php  echo $CatRows;?></h3>
                                <span class="widget-title4">Listed Cat<i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                
				<div class="row">
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						
							<div class="card-body" >
								<div class="chart-title"  >
									<h4 style="color: white;">User's Total</h4>
                                    
									
								</div>	
								<div id="chart1" style="width: 470px; height: 400px; margin-left:90px;"></div>
							
						</div>
					</div>
					<div class="row">
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						
							<div class="card-body" >
								<div class="chart-title"  >
									<h4 style="color: white;">Booking In</h4>
                                    
									
								</div>	
								<div id="chart2" style="width: 470px; height: 400px; margin-left:90px;"></div>
							
						</div>
					</div>
					</div>
				</div>
                
				<div class="row">
					<div class="col-12 col-md-6 col-lg-8 col-xl-8">
						<div class="card">
							<div class="card-header"  style="background-color: #421387;">
								<h4 class="card-title d-inline-block" style="color:white;">Upcoming Booking</h4> <a href="Manage New Booking.php" class="btn btn-primary float-right">View all</a>
							</div>
							<div class="card-body p-0">
								<div class="table-responsive">
									<table class="table mb-0">
										<thead >
                                        <tr>
                                        
                                       
                                        <th>Event Name</th>
                                        <th>Full Name</th>
                                        <th>No of Members</th>
                                        <th style="min-width: 110px;">Booking Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php
$sql = "SELECT tbl_booking.id as id,tbl_booking.booking_id,tbl_events.event_name,tbl_user.full_name,tbl_booking.no_member,tbl_booking.booking_status,tbl_booking.booking_date from tbl_booking left join tbl_user on tbl_user.user_id=tbl_booking.user_id left join tbl_events on tbl_events.id=tbl_booking.event_id LIMIT 3";
$query = $conn -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{ 
    ?>               
										</thead>
										<tbody>
                                        <tr >


<td><?php echo htmlentities($row->event_name);?></td>
<td><?php echo htmlentities($row->full_name);?></td>
<td><?php echo htmlentities($row->no_member);?></td>
<td><?php echo htmlentities($row->booking_date);?></td>

<td><?php $status=$row->booking_status;
if($status==""){
echo htmlentities("Not Confirmed yet");    
} else {
echo htmlentities("$status");        
}
?></td>
												<td class="text-right">
													<a href="booking-details.php?bkid=<?php echo htmlentities($row->id);?>" class="btn btn-outline-primary take-btn">Take up</a>
												</td>
											</tr>
                                            <?php $cnt++;
    }} ?>                              
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div> 
                    
                    <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                        <div class="card">
							<div class="card-header" style="background-color: #421387;">
                            <h4 class="card-title d-inline-block" style="color:white;">Sponsers</h4> 
							</div>
                            <div class="card-body p-0">
								<div class="table-responsive">
									<table class="table mb-0">
										<thead>
											<tr>
												<th>Sponsers</th>
												<th>Sponsers Logo</th>
											</tr>
										</thead>
                                        <?php
$sql = "SELECT s_id,sponsers_name,sponsers_logo,posting_date from tbl_sponser LIMIT 3";
$query = $conn -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{ 
?>                            
										<tbody>
											<tr>
												<td>
													
													<h2 style="color:white;"><?php echo htmlentities($row->sponsers_name);?></h2>
                                                    
												</td>                 
												<td>
                                                <img src="sponser/<?php echo htmlentities($row->sponsers_logo);?>" width="150" height="70" />
												</td>
												
											</tr>
										
											</tr>
                                            <?php $cnt++;
    }} ?> 
										</tbody>
									</table>
                           
                            
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
<?php
$sql = "SELECT * From tbl_request";
$query = $conn -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{ 
    ?>


                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                    <div class="list-left">
    <span class="avatar"><?php echo htmlentities(substr($row->r_name, 0, 1));?></span>
</div>
                                        <div class="list-body">
                                            <span class="message-author"><?php echo htmlentities($row->r_name);?> </span>
                                            <h6><span class="message-author">Sponsor Request</span></h6>

                                            <span class="message-time"><?php echo date('h:i', strtotime($row->r_postingdate));?></span>
                                            <div class="clearfix"></div>
                                            <span class="message-content"><b>Company:</b> <?php echo htmlentities($row->r_company);?></span>
                                        </div>
                                    </div>
                                </a>
</li>
<?php $cnt++;
    }}?>
    <?php
$sql = "SELECT * From tbl_msg";
$query = $conn -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{ 
    ?>


                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                    <div class="list-left">
    <span class="avatar"><?php echo htmlentities(substr($row->m_name, 0, 1));?></span>
</div>
                                        <div class="list-body">
                                            <span class="message-author"><?php echo htmlentities($row->m_name);?> </span>
                                            <span class="message-time"><?php echo date('h:i', strtotime($row->m_postingdate));?></span>
                                            <div class="clearfix"></div>
                                            <span class="message-content"><?php echo htmlentities($row->m_msg);?></span>
                                        </div>
                                    </div>
                                </a>
</li>
<?php $cnt++;
    }}?>
                        </ul>
                    </div>
                    <div class="topnav-dropdown-footer">
                        <a href="">See all messages</a>
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
    <script src="assets/js/Chart.bundle.js"></script>
    <script src="assets/js/chart.js"></script>
    <script src="assets/js/app.js"></script>

</body>

<?php
}
?>

</html>