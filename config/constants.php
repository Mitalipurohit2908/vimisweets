<?php 
    //Start Session
    session_start();

    $SITEURL = "http://localhost/Vimi-sweets/";
    $LOCALHOST = "localhost";
    $DB_USERNAME = "root";
    $DB_PASSWORD = "";
    $DB_NAME = "vimi-sweets";
    //Create Constants to Store Non Repeating Values
    // define('SITEURL', 'http://localhost/Vimi-sweets/');
    // define('LOCALHOST', 'localhost');
    // define('DB_USERNAME', 'root');
    // define('DB_PASSWORD', '');
    // define('DB_NAME', 'vimi-sweets');
    
    $conn = mysqli_connect($LOCALHOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
// $db_select = mysqli_select_db($conn, DB_NAME);

// Die if connection was not successful
    if (!$conn) {
        die("Sorry We failed to Connect..." . mysqli_connect_error());
    }

?>