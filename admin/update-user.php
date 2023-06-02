<?php

//hide warning of header
ob_start();

include('partials/amenu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update User</h1>

        <br><br>

        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM tbl_user WHERE cid='$id' ";
            $res = mysqli_query($conn, $sql);
            if ($res == true) {
                $count = mysqli_num_rows($res);
                if ($count == 1) {
                    $row = mysqli_fetch_assoc($res);

                    $name = $row['name'];
                    $gender = $row['gender'];
                    $phone = $row['phone'];
                    $email = $row['email'];
                    $address = $row['address'];
                    $username = $row['username'];
                } else {
                    header('location:' . $SITEURL . 'admin/manage-user.php');
                }
            }
        }
        ?>


        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Name : </td>
                    <td>
                        <input type="text" name="name" value="<?php echo $name; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Gender : </td>
                    <td>
                        <!-- <input type="text" name="full_name" value="<?php echo $name; ?>"> -->
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="gender" value="Male" <?php
                                                                                                    if ($row['gender'] == 'Male') {
                                                                                                        echo "checked";
                                                                                                    }
                                                                                                    ?> /> Male
                        </label>
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="gender" value="Female" <?php
                                                                                                        if ($row['gender'] == 'Female') {
                                                                                                            echo "checked";
                                                                                                        }
                                                                                                        ?> /> Female
                        </label>
                    </td>
                </tr>

                <tr>
                    <td>Phone : </td>
                    <td>
                        <input type="number" name="phone" value="<?php echo $phone; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Email : </td>
                    <td>
                        <input type="email" name="email" value="<?php echo $email; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Address: </td>
                    <td>
                        <input type="text" name="address" value="<?php echo $address; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" value="<?php echo $username; ?>">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="update" value="Update User" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>
    </div>
</div>

<?php

if (isset($_POST['update'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $username = $_POST['username'];

    $sql = "UPDATE tbl_user SET name = '$name', gender = '$gender', phone = '$phone', email = '$email', address = '$address' , username = '$username' WHERE cid='$id' ";
    $res = mysqli_query($conn, $sql);

    if ($res == true) {
        $_SESSION['update'] = "<div class='success'>User Updated Successfully.</div>";
        header('location:' . $SITEURL . 'admin/manage-user.php');
    } else {
        $_SESSION['update'] = "<div class='error'>Failed to Update user.</div>";
        header('location:' . $SITEURL . 'admin/manage-user.php');
    }
}

?>


<?php include('partials/footer.php');

//hide warning of header
ob_flush();

?>