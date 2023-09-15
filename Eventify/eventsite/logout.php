<?php
session_start(); 
unset($_SESSION['userfullname']);
session_destroy(); // destroy session
header("location:index.php"); 
?>