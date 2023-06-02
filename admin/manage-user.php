<?php include('partials/amenu.php'); ?>


<!-- Main Content Section Starts -->
<div class="main-content">
    <div class="container-fluid">
        <h1 class="text-center">Manage User</h1>

        <br />

        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add']; //Displaying Session Message
            unset($_SESSION['add']); //REmoving Session Message
        }

        if (isset($_SESSION['delete'])) {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }

        if (isset($_SESSION['update'])) {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }

        if (isset($_SESSION['user-not-found'])) {
            echo $_SESSION['user-not-found'];
            unset($_SESSION['user-not-found']);
        }

        if (isset($_SESSION['pwd-not-match'])) {
            echo $_SESSION['pwd-not-match'];
            unset($_SESSION['pwd-not-match']);
        }

        if (isset($_SESSION['change-pwd'])) {
            echo $_SESSION['change-pwd'];
            unset($_SESSION['change-pwd']);
        }

        ?>
        <br><br><br>

        <a href="add-user.php" class="btn-primary">Add User</a>

        <br /><br /><br />

        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Address</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>


            <?php
            $sql = "SELECT * FROM tbl_user";
            $res = mysqli_query($conn, $sql);

            if ($res == TRUE) {
                $count = mysqli_num_rows($res);
                $sn = 1;
                if ($count > 0) {
                    while ($rows = mysqli_fetch_assoc($res)) {
                        $id = $rows['cid'];
                        $name = $rows['name'];
                        $gender= $rows['gender'];
                        $phone = $rows['phone'];
                        $email = $rows['email'];
                        $address = $rows['address'];
                        $username = $rows['username'];
            ?>

                        <tr>
                            <td><?php echo $sn++; ?>. </td>
                            <td><?php echo $name; ?></td>
                            <td><?php echo $gender; ?></td>
                            <td><?php echo $phone; ?></td>
                            <td><?php echo $email; ?></td>
                            <td><?php echo $address; ?></td>
                            <td><?php echo $username; ?></td>
                            <td>
                                <a href="<?php echo $SITEURL; ?>admin/update-user-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
                                <a href="<?php echo $SITEURL; ?>admin/update-user.php?id=<?php echo $id; ?>" class="btn-secondary">Update User</a>
                                <a href="<?php echo $SITEURL; ?>admin/delete-user.php?id=<?php echo $id; ?>" class="btn-danger">Delete User</a>
                            </td>
                        </tr>
            <?php

                    }
                } else {
                }
            }
            ?>
        </table>

    </div>
</div>
<!-- Main Content Setion Ends -->

<?php include('partials/footer.php'); ?>