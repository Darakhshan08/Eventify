<?php
session_start();
if (isset($_SESSION["adminID"])) {
    header('Location: admin/index-2.php');
    exit;
}

include("admin/includes/connect.php");// Assuming you have a config.php file with database connection settings

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['btnLogin'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (empty($email)) {
            $_ErrorMessage = "<div class='alert alert-danger'>Error: Please Enter Email</div>";
        } elseif (empty($password)) {
            $_ErrorMessage = "<div class='alert alert-danger'>Error: Please Enter Password</div>";
        }

        if (!isset($_ErrorMessage)) {
            try {
                $stmt = $conn->prepare("SELECT * FROM admin WHERE a_email = :email AND password = :password");
                $passwordEncrypt = md5($password);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $passwordEncrypt);
                $stmt->execute();
                $admin = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($admin) {
                    $_SESSION["adminID"] = $admin["a_id "];
                    $_SESSION["adminFullName"] = $admin["a_fullname"];
                    $_SESSION["adminEmail"] = $admin["a_email"];
                    header('Location: admin/index-2.php');
                    exit;
                } else {
                    $_ErrorMessage = "<div class='alert alert-danger'>Invalid Email/ Password!</div>";
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }
}
?>

<!-- Your HTML and UI code here, using PDO for database interactions -->

<!-- Jquery js and other scripts -->

</body>
</html>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="admin/assets/css/style_login.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="admin/assets/Images/frontImg.jpg" alt="">
        <div class="text">
          <span class="text-1">Every new friend is a <br> new adventure</span>
          <span class="text-2">Let's get connected</span>
        </div>
      </div>
      <div class="back">
        <img class="backImg" src="images/backImg.jpg" alt="">
        <div class="text">
          <span class="text-1">Complete miles of journey <br> with one step</span>
          <span class="text-2">Let's get started</span>
        </div>
      </div>
    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">Login</div>
            <?php if (isset($_ErrorMessage)) {
															echo $_ErrorMessage;
														} ?>
          <form action="#" method="POST">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" name="email"  placeholder="Enter your email ">
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Enter your password">
              </div>
              <div class="text"><a href="#">Forgot password?</a></div>
              <div class="button input-box">
                <input type="submit" name="btnLogin" value="Submit">
              </div>
              <div class="text sign-up-text">Don't have an account? <label for="flip">Sigup now</label></div>
            </div>
         </form>
      </div>
        <!-- <div class="signup-form">
          <div class="title">Signup</div>
        <form action="#">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Enter your name" required>
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" placeholder="Enter your email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Enter your password" required>
              </div>
              <div class="button input-box">
                <input type="submit" value="Sumbit">
              </div>
              <div class="text sign-up-text">Already have an account? <label for="flip">Login now</label></div>
            </div>
      </form>  -->
    </div>
    </div>
    </div>
  </div>
</body>
</html>
