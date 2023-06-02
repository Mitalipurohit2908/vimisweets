<?php include('partials/amenu.php'); ?>


<!-- Main Content Section Starts -->
<div class="main-content">
    <div class="container-fluid">
        <h1 class="text-center">Manage Feedback</h1>

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

        ?>
        <br><br>

        <!-- <a href="add-user.php" class="btn-primary">Add User</a> -->

        <br /><br />

        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Comment</th>
                <th>Actions</th>
            </tr>


            <?php
            $sql = "SELECT * FROM tbl_contact";
            $res = mysqli_query($conn, $sql);

            if ($res == TRUE) {
                $count = mysqli_num_rows($res);
                $sn = 1;
                if ($count > 0) {
                    while ($rows = mysqli_fetch_assoc($res)) {
                        $id = $rows['cid'];
                        $name = $rows['name'];
                        $phone = $rows['phone'];
                        $email = $rows['email'];
                        $comment = $rows['comment'];
            ?>

                        <tr>
                            <td><?php echo $sn++; ?>. </td>
                            <td><?php echo $name; ?></td>
                            <td><?php echo $phone; ?></td>
                            <td><?php echo $email; ?></td>
                            <td><?php echo $comment; ?></td>
                            <td>
                                <a href="<?php echo $SITEURL; ?>admin/update-feedback.php?id=<?php echo $id; ?>" class="btn-secondary">Update Feedback</a>
                                <a href="<?php echo $SITEURL; ?>admin/delete-feedback.php?id=<?php echo $id; ?>" class="btn-danger">Delete Feedback</a>
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