<?php
session_start();
error_reporting(0);
include('connect.php');
//Process for Sign
if(isset($_POST['signin']))
{
//Getting Post Values
$uname=$_POST['username'];
$password=md5($_POST['password']);
// Quer for signing matching username and password with db details
$sql ="SELECT user_id,is_active FROM tbl_user WHERE user_email=:uname and user_password=:password";
//preparing the query
$query= $conn -> prepare($sql);
//Binding the values
$query-> bindParam(':uname', $uname, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
//Execute the query
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
 foreach ($results as $result) {
    $status=$result->is_active;
    $uid=$result->user_id;
  } 
if($status==0)
{
echo "<script>alert('Your account is Inactive. Please contact admin');</script>";
} else{
    $_SESSION['usrid']=$uid;
echo "<script type='text/javascript'> document.location = 'My_account.php'; </script>";
} }
else{
  echo "<script>alert('Invalid Details');</script>";

}

}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="signup.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventify</title>
    <link href="images/cop.jpeg" rel="shortcut icon">
    <style>
      body{
        background:url(images/background/bg.jpg);
        background-size: cover;
 
      }
      </style>

   </head>
<body>
  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="images/img3.jpg" alt="">
      </div>
    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">Login</div>
          <form action="#" method="POST">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="email" placeholder="Enter your email" name="username" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Enter your password" name="password"  required>
              </div>
              <div class="text"><a href="#">Forgot password?</a></div>
              <div class="button input-box">
                <input type="submit" value="Submit" name="signin">
              </div>
              <div class="text sign-up-text">Don't have an account? <a href="signup.php"><label>Signup Now</label></div></a>
            </div>
        </form>
      </div>
      
    </div>
    </div>
    </div>
  </div>
</body>
</html>
