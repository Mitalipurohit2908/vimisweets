<?php
include('config/constants.php');
//remove the session error
error_reporting(E_ALL ^ E_NOTICE);
if (!isset($_SESSION)) {
    session_start();
} 

// $login = false;
$showerr = false;
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "select * from tbl_user where username = '$username' and password = '$password'";
    $result = mysqli_query($conn, $query);

    $row = mysqli_fetch_array($result);

    $count = mysqli_num_rows($result);

    if ($count > 0) {
        // session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header('location:' . $SITEURL);
    } else {
        // echo "<script> alert('Incorrect username and password'); </script> ";
        $showerr = "Incorrect username and password!";
    }
}
?>

<?php
include('partials-front/menu.php');
?>

<hr>
<br>
<?php

if ($showerr) {
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Error!</strong> ' . $showerr . '
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>

<div class="container f-user">
    <div class="f-h-user text-center">
        <h1>Login Now</h1>
    </div>

    <div class="user-form">
        <form action="" method="post">
            <div class="form-group">
                <label class="control-label" for="username">Username :</label>
                <input type="text" class="form-control" id="username" placeholder="Enter Username" name="username" required>
            </div>
            <div class="form-group">
                <label class="control-label" for="password">Password :</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
            </div>
            <div class="form-group mb-2 mt-2">
                <button type="submit" class="btn btn-primary w-25" name="login">Login</button>
            </div>

            <div class="form-group">
                <label>or</label> <br>
                <label><a href="<?php $SITEURL ?>user-signup.php">Don't have an account? Signup.</a></label>
            </div>
        </form>
    </div>
</div>

<hr>
<?php
include('partials-front/footer.php');
?>