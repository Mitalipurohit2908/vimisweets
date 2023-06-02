<?php 

    include('../config/constants.php');
//remove the session error
error_reporting(E_ALL ^ E_NOTICE);
if (!isset($_SESSION)) {
    session_start();
}

 if(isset($_GET['id']))
 {
    $id = $_GET['id'];
    $sql = "DELETE FROM tbl_contact WHERE cid=$id";
    $res = mysqli_query($conn, $sql);

    if($res==true)
    {
        $_SESSION['delete'] = "<div class='success'>Feedback Deleted Successfully.</div>";
        header('location:'.$SITEURL.'admin/manage-feedback.php');
    }
    else
    {
        $_SESSION['delete'] = "<div class='error'>Failed to Delete Feedback. Try Again Later.</div>";
        header('location:'.$SITEURL.'admin/manage-feedback.php');
    }
}
