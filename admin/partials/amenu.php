<?php
// session_start();
include('../config/constants.php');
include('login-check.php');
//remove the session error
error_reporting(E_ALL ^ E_NOTICE);
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Vimi Sweets - Admin</title>
    <link rel="stylesheet" href="../css/bootstrap.css" />
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/bootstrap-grid.min.css" />
    <link rel="stylesheet" href="../css/all.min.css" />
    <link rel="stylesheet" href="../css/admin.css">

    <script src="../js/bootstrap.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.js"></script>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/all.min.js"></script>
</head>

<body>
    <!-- Menu Section Starts -->
    <div class="menu text-center">
        <div class="wrapper">
            <ul>
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    <a href="manage-admin.php">Admin</a>
                </li>
                <li>
                    <a href="manage-user.php">User</a>
                </li>
                <li>
                    <a href="manage-category.php">Category</a>
                </li>
                <li>
                    <a href="manage-food.php">Food</a>
                </li>
                <li>
                    <a href="manage-order.php">Order</a>
                </li>
                <li>
                    <a href="manage-feedback.php">Feedback</a>
                </li>
                <li>
                    <a href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Menu Section Ends -->