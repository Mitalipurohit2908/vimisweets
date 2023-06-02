<?php include('config/constants.php');

//clear session start notice......
error_reporting(E_ALL ^ E_NOTICE);
if (!isset($_SESSION)) {
    session_start();
} 

// session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $loggedin = true;
} else {
    $loggedin = false;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ViMi Sweets</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-grid.min.css" />
    <link rel="stylesheet" href="css/all.min.css" />
    <style>
        /* Make the image fully responsive */
        .carousel-inner img {
            width: 100%;
            height: 500px;
        }
    </style>
    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">

    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/all.min.js"></script>
</head>

<body>



    <header>
        <!-- header of page -->
        <div class="container-fluid ic-head">
            <div class="row">
                <div class="col-md-3 col-lg-3 col-sm-12">
                    <div class="tool-icon">
                        <a href="#"><i class="fa-brands fa-square-facebook mr-5"></i></a>
                        <a href="#"><i class="fa-brands fa-square-instagram"></i></a>
                        <a href="#"><i class="fa-brands fa-square-youtube"></i></a>
                        <a href="#"><i class="fa-brands fa-square-twitter"></i></a>
                    </div>
                </div>
                <div class="col-md-3 col-lg-3 col-sm-12">
                    <div class="con">
                        <p>
                            <a href="mailto:vimisweets12@gmail.com"><i class="fa-solid fa-envelope"></i> vimisweets12@gmail.com</a>
                        </p>
                    </div>
                </div>
                <div class="col-md-3 col-lg-3 col-sm-12">
                    <div class="con">
                        <p>
                            <a href="tel:+919876543210"><i class="fa-solid fa-phone"></i>+919876543210</a>
                        </p>
                    </div>
                </div>
                <div class="col-md-3 col-lg-3 col-sm-12 b-adm">
                    <a href="<?php echo $SITEURL ?>admin" class="btn btn-primary p-1" role="button"><i class="fa-solid fa-lock"></i> Admin</a>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container-fluid">
            <div class="logo">
                <a href="<?php echo $SITEURL; ?>" title="Logo">
                    <img src="images/vimi-logo.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a class="<?php if ($page == 'home') {
                                        echo 'active';
                                    } ?>" href="<?php echo $SITEURL; ?>">Home</a>
                    </li>
                    <li>
                        <a class="<?php if ($page == 'service') {
                                        echo 'active';
                                    } ?>" href="<?php echo $SITEURL; ?>service.php">Service</a>
                    </li>
                    <li>
                        <a class="<?php if ($page == 'categories') {
                                        echo 'active';
                                    } ?>" href="<?php echo $SITEURL; ?>categories.php">Categories</a>
                    </li>
                    <li>
                        <a class="<?php if ($page == 'foods') {
                                        echo 'active';
                                    } ?>" href="<?php echo $SITEURL; ?>foods.php">Foods</a>
                    </li>
                    <li>
                        <a class="<?php if ($page == 'contact') {
                                        echo 'active';
                                    } ?>" href="<?php echo $SITEURL; ?>contact.php">Contact</a>
                    </li>
                </ul>

                <div class="log-info text-right mt-2">
                    <?php
                    if (!$loggedin) {
                        echo '<a href="' . $SITEURL . 'user-signup.php" class="btn btn-primary p-1 ml-4 mb-2" role="button"><i class="fa-solid fa-user"></i> Signup</a>
                        <a href="' . $SITEURL . 'user-login.php" class="btn btn-primary p-1 ml-4 mb-2" role="button"><i class="fa-solid fa-right-to-bracket"></i> Login</a>';
                    }

                    if ($loggedin) {
                    ?>
                        <ul>
                            <li>
                                <h5><?php echo $_SESSION['username']; ?></h5>
                            </li>
                        </ul>
                    <?php
                        echo '<a href="' . $SITEURL . 'user-logout.php" class="btn btn-primary p-1 ml-4 mb-2" role="button"><i class="fa-solid fa-right-to-bracket"></i> Logout</a>';
                    }
                    ?>
                </div>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->