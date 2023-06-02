<?php 

    //Include constants.php file here
    include('../config/constants.php');
//remove the session error
error_reporting(E_ALL ^ E_NOTICE);
if (!isset($_SESSION)) {
    session_start();
} 
    $id = $_GET['id'];

    $sql = "DELETE FROM tbl_admin WHERE id=$id";

    $res = mysqli_query($conn, $sql);

    if($res==true)
    {
        $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully.</div>";
        header('location:'.$SITEURL.'admin/manage-admin.php');
    }
    else
    {
        $_SESSION['delete'] = "<div class='error'>Failed to Delete Admin. Try Again Later.</div>";
        header('location:'.$SITEURL.'admin/manage-admin.php');
    }

?>