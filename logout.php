<?php

// Include constants.php to define SITEURL
require_once('config/constants.php');

// Destroy session
session_destroy();

// Redirect to the login page or homepage
header('location:'.SITEURL.'login.php');
exit();
?>

