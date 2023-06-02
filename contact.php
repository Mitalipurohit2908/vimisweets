<?php
include "config/constants.php";

//hide warning of header
ob_start();
error_reporting(E_ALL ^ E_NOTICE);

$page = 'contact';
include('partials-front/menu.php');
?>


<?php
if (isset($_POST['submit'])) {

    $name = test_data($_POST['name']);
    $phone = test_data($_POST['phone']);
    $email = test_data($_POST['email']);
    $comment = test_data($_POST['comment']);

    $query = "insert into tbl_contact (name,phone,email,comment) values ('$name', '$phone', '$email', '$comment')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Your entry has been submitted successfully!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                </div>';
    } else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> We are facing some technical issue and your entry ws not submitted successfully! We regret the inconvinience caused!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                </div>';
    }
}

function test_data($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>


<hr>
<!-- section start for contact -->
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="s-head">
                    <h1>Contact</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row con-f">
            <div class="col-md-4 col-lg-4 col-sm-12">
                <div class="contact-d">
                    <h4>Call Us</h4>
                    <p><a href="tel:+919876543210"><i class="fa-solid fa-phone"></i>+919876543210</a></p>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12">
                <div class="contact-d">
                    <h4>Mail Us</h4>
                    <p><a href="mailto:vimisweets12@gmail.com"><i class="fa-solid fa-envelope"></i> vimisweets12@gmail.com</a>
                    </p>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12">
                <div class="contact-d">
                    <h4>Address</h4>
                    <p><a href="#"><i class="fas fa-location-dot"></i>6/9 Sethi Nagar Ujjain Madhya Pradesh 456010</a></p>
                </div>
            </div>
        </div>
    </div>

    <div class="container fm-con mb-4">
        <div class="row ">
            <div class="col-md-6 col-lg-6 col-sm-12">
                <div class="contact-form p-5">
                    <h2 class="text-center">Feedback Now</h2>
                    <form action="" method="post">
                        <div class="form-group">
                            <label class="control-label" for="name">Name:</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="Phone">Phone:</label>
                            <input type="number" class="form-control" id="phone" placeholder="Enter Phone Number" name="phone" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="email">Email:</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="comment">Comment:</label>
                            <textarea class="form-control" rows="5" id="comment" name="comment" required></textarea>
                        </div>
                        <div class="form-group mb-2 mt-2">
                            <button type="submit" class="btn btn-primary w-25" name="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- section end for contact -->

<?php include('partials-front/footer.php'); ?>