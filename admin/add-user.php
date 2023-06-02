<?php
//hide warning of header
ob_start();
include('partials/amenu.php');
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add User</h1>

        <br><br>

        <?php
        if (isset($_SESSION['add'])) //Checking whether the SEssion is Set of Not
        {
            echo $_SESSION['add']; //Display the SEssion Message if SEt
            unset($_SESSION['add']); //Remove Session Message
        }
        ?>

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Name : </td>
                    <td>
                        <input type="text" name="name" placeholder="Enter Your Name">
                    </td>
                </tr>
                <tr>
                    <td>Gender: </td>
                    <td>
                        <!-- <input type="text" name="full_name" placeholder="Enter Your Name"> -->
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="gender" value="Male" /> Male
                        </label>
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="gender" value="Female" /> Female
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>Phone : </td>
                    <td>
                        <input type="number" name="phone" placeholder="Enter Phone Number">
                    </td>
                </tr>
                <tr>
                    <td>Email: </td>
                    <td>
                        <input type="email" name="email" placeholder="Enter Your Email">
                    </td>
                </tr>
                <tr>
                    <td>Address: </td>
                    <td>
                        <input type="text" name="address" placeholder="Enter Your Address">
                    </td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" placeholder="Your Username">
                    </td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name="password" placeholder="Your Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="add" value="Add User" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>


    </div>
</div>




<?php

if (isset($_POST['add'])) {

    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO tbl_user (name,gender,phone,email,address,username,password) values ('$name', '$gender', '$phone', '$email', '$address', '$username', '$password')";

    $res = mysqli_query($conn, $sql);

    if ($res == TRUE) {

        $_SESSION['add'] = "<div class='success'>USER Added Successfully.</div>";
        header("location:" . $SITEURL . 'admin/manage-user.php');
    } else {

        $_SESSION['add'] = "<div class='error'>Failed to Add USER.</div>";
        header("location:" . $SITEURL . 'admin/manage-user.php');
    }
}


?>

<?php include('partials/footer.php');

//hide warning of header
ob_flush();
?>