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
    $sql = "DELETE FROM tbl_user WHERE cid=$id";
    $res = mysqli_query($conn, $sql);

    if($res==true)
    {
        $_SESSION['delete'] = "<div class='success'>User Deleted Successfully.</div>";
        header('location:'.$SITEURL.'admin/manage-user.php');
    }
    else
    {
        $_SESSION['delete'] = "<div class='error'>Failed to Delete User. Try Again Later.</div>";
        header('location:'.$SITEURL.'admin/manage-user.php');
    }
}

?>