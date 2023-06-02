<?php
include "config/constants.php";
//remove the session error
error_reporting(E_ALL ^ E_NOTICE);
if (!isset($_SESSION)) {
    session_start();
} 
// session_start();

session_unset();
session_destroy();

header("location:".$SITEURL);
exit;
?>