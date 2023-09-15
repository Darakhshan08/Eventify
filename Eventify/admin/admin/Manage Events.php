<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    include("includes/connect.php");
// ww
    session_start();
    error_reporting(0);

    if(strlen($_SESSION['adminFullName'])==0)
    {   
    header('location:../login.php');
    }
    else{ 

        if (isset($_GET['del'])) {
            require 'vendor/autoload.php';
        
            // Assuming you have a database connection named $conn
            $id = $_GET['del'];
            
            try {
                $sqlEvent = "SELECT event_name FROM tbl_events WHERE id=:id";
                $queryEvent = $conn->prepare($sqlEvent);
                $queryEvent->bindParam(':id', $id, PDO::PARAM_INT);
                $queryEvent->execute();
                $eventData = $queryEvent->fetch(PDO::FETCH_ASSOC);
                $eventname = $eventData['event_name'];
                // Delete the event
                $sql = "DELETE FROM tbl_events WHERE id = :id";
                $query = $conn->prepare($sql);
                $query->bindParam(':id', $id, PDO::PARAM_INT); // Use PARAM_INT for integer IDs
                $query->execute();
          
                
                // Check if the deletion was successful
                if ($query->rowCount() > 0) {
                    // Event was deleted successfully
                    $msg = "<div class='alert alert-success'>Event deleted.</div>";
                    
                    // Fetch the event name
               
                
                    // Now, send email notifications to subscribers
                    $sqlEvent = "SELECT user_email FROM tbl_subscriber";
                    $queryEvent = $conn->prepare($sqlEvent);
                    $queryEvent->execute();
                    $eventData = $queryEvent->fetchAll(PDO::FETCH_ASSOC);
                
                    // Create an instance; passing `true` enables exceptions
                    $mail = new PHPMailer(true);
                
                    // Server settings
                    $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output
                    $mail->isSMTP(); // Send using SMTP
                    $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
                    $mail->SMTPAuth = true; // Enable SMTP authentication
                    $mail->Username = 'daniyal.arif2004@gmail.com'; // SMTP username
                    $mail->Password = 'syuppmxmmjnzwrsl'; // SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Enable implicit TLS encryption
                    $mail->Port = 465; // TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                
                    // Recipients
                    $mail->setFrom('daniyal.arif2004@gmail.com');
                
                    foreach ($eventData as $data) {
                        $email = $data['user_email'];
                        $mail->addAddress($email);
                    }
                
                    // Content
                    $mail->isHTML(true); // Set email format to HTML
                    $mail->Subject = 'Eventify';
                    $mail->Body = '<b>The ' . $eventname . ' event has been cancelled</b>'; // You need to define $eventname
                
                    $mail->send();
                    echo 'Message has been sent';

             header('location:Manage Events.php');
                    
                } else {
                    // Event with the provided ID was not found or deletion failed
                    $msg = "<div class='alert alert-danger'>Event not found or deletion failed.</div>";
                }
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }
        } else {
            $msg = "<div class='alert alert-danger'>Something went wrong.</div>";
        }
        
        
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['search_button'])) {
        // Get the search query from the form
        $searchQuery = '%'.$_POST['search_query'].'%';

        // Construct the SQL query using a prepared statement
        $sql =  "SELECT 
        b.cat_name,
        e.event_name,event_start_date,event_end_date,price
    FROM 
    tbl_category AS b
    LEFT JOIN 
    tbl_events AS e ON b.cat_id = e.cat_id 
    WHERE 
        e.event_name LIKE :search_query
        OR b.cat_name LIKE :search_query";;
        
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':search_query', '%' . $searchQuery . '%', PDO::PARAM_STR);
        $stmt->execute();

        // Fetch the results as associative array
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }   

    $searchQuery = isset($_GET['search_query']) ? $_GET['search_query'] : '';
    $showFetchedData = empty($searchQuery); // Flag to determine whether to show fetched data

    $recordsPerPage = 3; // Number of records to display on each page
    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // Current page number

    // Calculate the OFFSET for your query
    $offset = ($currentPage - 1) * $recordsPerPage;

    $sqlAll = "SELECT
    tbl_events.id AS eid,
    tbl_events.event_name,
    tbl_events.event_start_date,
    tbl_events.event_end_date,
    tbl_events.price,
    tbl_category.cat_name
    FROM
    tbl_events
    JOIN
    tbl_category ON tbl_category.cat_id = tbl_events.cat_id
    LIMIT $recordsPerPage OFFSET $offset"; // Concatenate values directly

    $stmt = $conn->prepare($sqlAll);
    $stmt->execute();
    $stmtAll = $conn->prepare($sqlAll);
    $stmtAll->execute();
    $cnt = 1;
    $allResults = $stmtAll->fetchAll(PDO::FETCH_OBJ);

    // Fetch filtered data based on search query
    $results = [];
    if (!empty($searchQuery)) {
        $sql =  "SELECT 
        b.cat_name,
        e.event_name,event_start_date,event_end_date,price
    FROM 
    tbl_category AS b
    LEFT JOIN 
    tbl_events AS e ON b.cat_id = e.cat_id 
    WHERE 
        e.event_name LIKE :search_query
        OR b.cat_name LIKE :search_query";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':search_query', '%' . $searchQuery . '%', PDO::PARAM_STR);
        $stmt->execute();
        $cnt=1;
        $results = $stmt->fetchAll(PDO::FETCH_OBJ);
    } 

    ?>




    <!DOCTYPE html>
    <html lang="en">


    <!-- departments23:21-->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/cop.jpeg">
        <title>Eventify</title>
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
        <script src="https://kit.fontawesome.com/d97b87339f.js" crossorigin="anonymous"></script>

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

    .search-bar {
        display: flex;
        justify-content: center;
        align-items: center;
        max-width: 600px;
        margin: 0 auto;
        padding: 10px; 
        border-radius: 5px;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
    
    
    }

    .search {
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        padding: 10px;
    }

    input:focus::placeholder{
        color: transparent;
    }
    ::placeholder{
        color: white;
    }

    .search-edit {
    width: 100%;
    font-family: 'Montserrat', sans-serif;
    font-size: 16px;
    padding: 15px 45px 15px 15px;
    background-color:#fff;
    color:white;
    border-radius: 10px;
    border:none;
    transition: all .4s;
    }

    .search-edit:focus {
    border:none;
    outline:none;
    box-shadow: 0 1px 12px #fff;
    -moz-box-shadow: 0 1px 12px #fff;
    -webkit-box-shadow: 0 1px 12px #fff;
    }
    .search-edit input{
    background-color: #fff;
    }

    .search{
    background-color: transparent;
    font-size: 18px;
    padding: 6px 9px;
    margin-left:-45px;
    border:none;
    color:white;
    transition: all .4s;
    z-index: 10;
    }

    .search:hover {
    transform: scale(1.2);
    cursor: pointer;
    color: black;
    }

    .search:focus {
    outline:black;
    color:black;
    }
    @media screen and (max-width: 100px) {
        .search-bar {
        flex-direction: column;
        }
        
        .search{
        width: 100%;
        margin-bottom: 10px;
        }
    }
    .pagination{
        justify-content:right;
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
                                    </li>              </ul>
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
                                    <li><a href="Manage-user-events.php">Manage User-Event</a></li>

                                    
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
            <div class="page-wrapper">
                <div class="content">
                    <div class="row">
                        <div class="col-sm-5 col-5">
                            <h4 class="page-title" style="font-size: 40px;">Manage Events</h4>
                        </div>
                        <div class="col-sm-7 col-7 text-right m-b-30">
                            <a href="add event.php" class="btn btn-primary btn-rounded"  style="background-color: #9a28d7; color: white;">Add Event</a>
                        </div>
                    </div>

                    <form action="" method="get">
                    <div class="search-bar">
                        <input class="search-edit" name="search_query" type="text" placeholder="Search Something...">
                        <button class="search" name="search_button" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                    </form>
                    <br>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped custom-table-no-pagination">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Event Name</th>
                                            <th>Category</th>
                                            <th>Event From-To</th>
                                            <th>Price</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            <form action="" method="POST">

                            <?php if ($showFetchedData): ?>
            <?php foreach ($allResults as $row): ?>
                                        <tr>
                                            <td><?php echo htmlentities($cnt);?></td>
                                            <td><?php echo htmlentities($row->event_name);?></td>
                                            <td><?php echo htmlentities($row->cat_name);?></td>
                                            <td><?php echo htmlentities($row->event_start_date."----".$row->event_end_date);?></td>
                                            <td><?php echo htmlentities($row->price );?></td>

                                            <td class="text-right">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="edit-event.php?sid=<?php echo htmlentities($row->eid);?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_department"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        
                                        <div id="delete_department" class="modal fade delete-modal" role="dialog" >
                <div class="modal-dialog modal-dialog-centered"  >
                    <div class="modal-content" style="background: url(assets/img/stars.jpg);">
                        <div class="modal-body text-center">
                            <img src="assets/img/sent.png" alt="" width="50" height="46">
                            <h3 style="color: white;">Are you sure you want to delete this?</h3>
                            <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                            <a  class="btn btn-danger" href="Manage Events.php?del=<?php echo htmlentities($row->eid);?>">Delete</a>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>      
                <?php $cnt++;
            ?>  
                    <?php endforeach; ?>                </tbody>
                                </table>
                                <?php
        echo '<ul class="pagination">';
    for ($i = 1; $i <= $recordsPerPage ; $i++) {
        $activeClass = ($i === $currentPage) ? 'active' : '';
        echo '<li class="page-item ' . $activeClass . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
    }
    echo '</ul>';?>
                            </div>
                        </div>
                    </div>
                </div>

                <?php else: ?>
                <?php if (!empty($results)): ?>
                    
                        

                <?php foreach ($results as $row): ?>

                    <tr>
                                            <td><?php echo htmlentities($cnt);?></td>
                                            <td><?php echo htmlentities($row->event_name);?></td>
                                            <td><?php echo htmlentities($row->cat_name);?></td>

                                            <td><?php echo htmlentities($row->event_start_date."----".$row->event_end_date);?></td>
                                            <td><?php echo htmlentities($row->price);?></td>

                                            <td class="text-right">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="edit-event.php?sid=<?php echo htmlentities($row->eid);?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_department"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                          
                                        </tr>
                                        
                                        <div id="delete_department" class="modal fade delete-modal" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content" style="background: url(assets/img/stars.jpg);">
                        <div class="modal-body text-center">
                            <img src="assets/img/sent.png" alt="" width="50" height="46">
                            <h3 style="color: white;">Are you sure you want to delete this?</h3>
                            <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                            <a  class="btn btn-danger" href="Manage Events.php?del=<?php echo htmlentities($row->eid);?>">Delete</a>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>      
                <?php $cnt++;
            ?>  
                    <?php endforeach; ?>   

                    <div class="."></div>  
                    <?php else: 
                    ?>  
                 <tr>
    <td colspan="6" class="text-center">
        <div class="no-results">No Results Found</div>
    </td>
</tr>


                    <?php endif; ?>
        <?php endif; ?>    
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
        </div>
        <div class="sidebar-overlay" data-reff=""></div>
        <script src="assets/js/jquery-3.2.1.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.dataTables.min.js"></script>
        <script src="assets/js/dataTables.bootstrap4.min.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/app.js"></script>
    </body>
    <?php
        }
    ?>

    <!-- departments23:21-->
    </html>