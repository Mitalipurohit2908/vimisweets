<?php 
    //Include constants.php for SITEURL
    include('../config/constants.php');
//remove the session error
error_reporting(E_ALL ^ E_NOTICE);
if (!isset($_SESSION)) {
    session_start();
} 
// session_start();
    //1. Destory the Session
    session_destroy(); //Unsets $_SESSION['user']

    //2. REdirect to Login Page
    header('location:'.$SITEURL.'admin/login.php');

?>