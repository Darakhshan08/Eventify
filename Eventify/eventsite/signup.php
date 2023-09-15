<?php
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\SMTP;
 use PHPMailer\PHPMailer\Exception;
session_start();
if (isset($_SESSION['SESSION_EMAIL'])) {
    header("Location: index.php");
    die();
}

// Load Composer's autoloader
require 'vendor/autoload.php';

include('connect.php');

$msg = "";

if (isset($_POST['btnReg'])) {
    $fullname = $_POST['name'];
    $uname = $_POST['username'];
    $email = $_POST['email'];
    $pnumber = $_POST['phonenumber'];
    $gender = $_POST['gender'];
    $status = 1; 
    $password = md5($_POST['password']);
    $confirm_password = md5($_POST['confirmpassword']);
    $code = md5(rand());

    // Create a PDO instance
    try {
        $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Check if the email already exists
        $stmt = $conn->prepare("SELECT * FROM tbl_user WHERE user_email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $msg = "<div class='alert alert-danger'>$email - This email address already exists.</div>";
        } else {
            if ($password === $confirm_password) {
                // Insert user data into the database
                $stmt = $conn->prepare("INSERT INTO tbl_user (full_name, user_name, user_email, user_phoneno, user_gender, user_password, is_active, code) 
                VALUES (:fullname, :uname, :email, :pnumber, :gender, :password, :status, :code)");
                $stmt->bindParam(':fullname', $fullname);
                $stmt->bindParam(':uname', $uname);
                $stmt->bindParam(':pnumber', $pnumber);
                $stmt->bindParam(':gender', $gender);
                $stmt->bindParam(':status', $status);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $password);
                $stmt->bindParam(':code', $code);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    echo "<div style='display: none;'>";

                    // Create an instance; passing `true` enables exceptions
                    $mail = new PHPMailer(true);

                    try {
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
                        $mail->addAddress($email);

                        // Content
                        $mail->isHTML(true); // Set email format to HTML
                        $mail->Subject = 'Welcome';
                        $mail->Body = '<b>You have successfully registered on Eventify</b>';

                        $mail->send();
                        header("location:login.php");
                        echo 'Message has been sent';
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
                    echo "</div>";
                    // $msg = "<div class='alert alert-info'>We've sent a verification link to your email address.</div>";
                } else {
                    $msg = "<div class='alert alert-danger'>Something went wrong.</div>";
                }
            } else {
                $msg = "<div class='alert alert-danger'>Password and Confirm Password do not match</div>";
            }
        }
    } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="signup.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="images/cop.jpeg" rel="shortcut icon">
    <title>Eventify</title>
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
            <img src="images/event-1.jpg" alt="">
          </div>
        </div>
        <div class="forms">
            <div class="form-content">
                <div class="signup-form">
                    <div class="title">Signup</div>
                           <?php echo $msg ?>
                    <form action="#" method="post">
                        <div class="input-boxes">
                            <div class="input-box">
                                <i class="fas fa-user"></i>
                                <input type="text" placeholder="Enter your name" name="name" value="<?php if(isset($firstname)) { echo $firstname;} else { echo "";} ?>" required>
                            </div>
                            <div class="input-box">
                                <i class="fas fa-user"></i>
                                <input type="text" placeholder="Enter your Username" name="username" value="<?php if(isset($uname)) { echo $uname;} else { echo "";} ?>" required>
                            </div>
                            <div class="input-box">
                                <i class="fas fa-envelope"></i>
                                <input type="email" placeholder="Enter your email" name="email" value="<?php if(isset($email)) { echo $email;} else { echo "";} ?>" required>
                            </div>
                            <div class="input-box">
                                <i class="fas fa-phone"></i>
                                <input type="tel" name="phonenumber" pattern="[0-9]{11}" title="11 numeric characters only" placeholder="Enter your Contact NO" maxlength="11" value="<?php if(isset($pnumber)) { echo $pnumber;} else { echo "";} ?>" required>
                            </div>
                            <div class="input-box">
                                <i class="fas fa-user"></i>
                                <label for="gender"></label>
                                <select id="gender" name="gender" required>
                                    <option value="">Select Your Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                   
                                </select>
                            </div>
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" placeholder="Enter your password" title="at least one number and one uppercase and lowercase letter, and at least 6 or more characters" name="password" required>
                            </div>
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" placeholder="Confirm password" name="confirmpassword" required>
                            </div>
                            <div class="button input-box">
                                <input type="submit" name="btnReg" value="Submit">
                            </div>
                            <div class="text sign-up-text">Already have an account? <a href="login.php"><label>Login Now</label></a></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
