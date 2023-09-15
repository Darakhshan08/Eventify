<?php
session_start(); 
unset($_SESSION['adminFullName']);
session_destroy(); // destroy session
header("location:login.php"); 
?>