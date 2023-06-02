<?php

//hide warning of header
ob_start();

include('partials/amenu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Feedback</h1>

        <br><br>

        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM tbl_contact WHERE cid='$id' ";
            $res = mysqli_query($conn, $sql);
            if ($res == true) {
                $count = mysqli_num_rows($res);
                if ($count == 1) {
                    $row = mysqli_fetch_assoc($res);

                    $name = $row['name'];
                    $phone = $row['phone'];
                    $email = $row['email'];
                    $comment = $row['comment'];
                } else {
                    header('location:' . $SITEURL . 'admin/manage-feedback.php');
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
                    <td>Comment: </td>
                    <td>
                        <textarea rows="5" id="comment" name="comment"><?= $row['comment']; ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="update" value="Update" class="btn-secondary">
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
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];

    $sql = "UPDATE tbl_contact SET name = '$name', phone = '$phone', email = '$email', comment = '$comment' WHERE cid='$id' ";
    $res = mysqli_query($conn, $sql);

    if ($res == true) {
        $_SESSION['update'] = "<div class='success'>feedback Updated Successfully.</div>";
        header('location:' . $SITEURL . 'admin/manage-feedback.php');
    } else {
        $_SESSION['update'] = "<div class='error'>Failed to Update feedback.</div>";
        header('location:' . $SITEURL . 'admin/manage-feedback.php');
    }
}

?>


<?php include('partials/footer.php');

//hide warning of header
ob_flush();

?>