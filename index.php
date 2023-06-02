    <?php
    //clear session start notice......
    error_reporting(E_ALL ^ E_NOTICE);
    if (!isset($_SESSION)) {
        session_start();
    }

    $page = 'home';
    include('partials-front/menu.php');
    ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">

            <form action="<?php echo $SITEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Sweets.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <?php
    if (isset($_SESSION['order'])) {
        echo $_SESSION['order'];
        unset($_SESSION['order']);
    }
    ?>

    <?php include('partials-front/slides.php'); ?>

    <!-- section start for services -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="s-head">
                        <h1>Services</h1>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 col-lg-4 col-sm-12">
                    <div class="c-card-s">
                        <div class="icon-box">
                            <h3><i class="fa-solid fa-cookie-bite fa-3x m-2"></i></h3>
                        </div>
                        <div class="icon-content">
                            <h4>Clean and Hygenic</h4>
                            <p>We Are Provide clean surface and provide hygenic food</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12">
                    <div class="c-card-s">
                        <div class="icon-box">
                            <h3><i class="fas fa-truck fa-3x m-1"></i></h3>
                        </div>
                        <div class="icon-content">
                            <h4>Deliver Safe and Secure</h4>
                            <p>We Are Deliver sweets in same day and provide full safe and secure environment</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12">
                    <div class="c-card-s">
                        <div class="icon-box">
                            <h3><i class="fas fa-utensils fa-3x m-2"></i></h3>
                        </div>
                        <div class="icon-content">
                            <h4>Working Hour's</h4>
                            <p>Working with Monday to Saturday - 11am to 8pm and close for sunday</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section end for services -->



    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container s-head">
            <h1 class="text-center">Explore Sweets</h1>

            <?php
            $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 3";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);

            if ($count > 0) {
                //CAtegories Available
                while ($row = mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
            ?>

                    <a href="<?php echo $SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                        <div class="box-3 float-container">
                            <?php
                            //Check whether Image is available or not
                            if ($image_name == "") {
                                //Display MEssage
                                echo "<div class='error'>Image not Available</div>";
                            } else {
                                //Image Available
                            ?>
                                <img src="<?php echo $SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">
                            <?php
                            }
                            ?>

                            <h3 class="text-center"><?php echo $title; ?></h3>
                        </div>
                    </a>

            <?php
                }
            } else {
                //Categories not Available
                echo "<div class='error'>Category not Added.</div>";
            }
            ?>
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container s-head">
            <h1 class="text-center">Sweets Menu</h1>

            <?php

            $sql2 = "SELECT * FROM tbl_food WHERE active='Yes' AND featured='Yes' LIMIT 6";
            $res2 = mysqli_query($conn, $sql2);

            $count2 = mysqli_num_rows($res2);
            if ($count2 > 0) {
                //Food Available
                while ($row = mysqli_fetch_assoc($res2)) {
                    //Get all the values
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];
            ?>

                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <?php
                            //Check whether image available or not
                            if ($image_name == "") {
                                //Image not Available
                                echo "<div class='error'>Image not available.</div>";
                            } else {
                                //Image Available
                            ?>
                                <img src="<?php echo $SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                            <?php
                            }
                            ?>

                        </div>

                        <div class="food-menu-desc">
                            <h4><?php echo $title; ?></h4>
                            <p class="food-price">&#8377; <?php echo $price; ?> &#8725; KG </p>
                            <p class="food-detail">
                                <?php echo $description; ?>
                            </p>
                            <br>

                            <a href="<?php echo $SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                        </div>
                    </div>

            <?php
                }
            } else {
                //Food Not Available 
                echo "<div class='error'>Food not available.</div>";
            }

            ?>
            <div class="clearfix"></div>
        </div>

        <p class="text-center">
            <a href="foods.php">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->



    <!-- Testimonial section starts here -->
    <section class="testimonial">
        <div class="container s-head">
            <h1 class="text-center">Our Satisfied Customers</h1>
            <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active" aria-current="true" aria-label="First slide"></li>
                    <li data-bs-target="#carouselId" data-bs-slide-to="1" aria-label="Second slide"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <?php

                    $sql3 = "SELECT * FROM tbl_contact LIMIT 10";
                    $res3 = mysqli_query($conn, $sql3);

                    $count3 = mysqli_num_rows($res3);
                    if ($count3 > 0) {
                        //Food Available
                        while ($row = mysqli_fetch_assoc($res3)) {
                            //Get all the values
                            $id = $row['cid'];
                            $name = $row['name'];
                            $comment = $row['comment'];
                    ?>
                            <div class="carousel-item <?php if ($row['cid'] == 6) {
                                                            echo "active";
                                                        } ?> ">
                                <div class="testim-box">

                                    <h4 class="text-center"><?php echo $name; ?></h4>
                                    <p class="text-center"><i class="fa-solid fa-quote-left fa-3x"></i> <?php echo $comment; ?> <i class="fa-solid fa-quote-right fa-3x"></i></p>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        //Food Not Available 
                        echo "<div class='error'>Testimoniol not available.</div>";
                    }

                    ?>
                    <div class="clearfix"></div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
    <!-- Testimonial section ends here -->


    <?php include('partials-front/footer.php'); ?>



    <!-- <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active" aria-current="true" aria-label="First slide"></li>
            <li data-bs-target="#carouselId" data-bs-slide-to="1" aria-label="Second slide"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <img src="holder.js/900x500/auto/#777:#555/text:First slide" class="w-100 d-block" alt="First slide">
            </div>
            <div class="carousel-item">
                <img src="holder.js/900x500/auto/#666:#444/text:Second slide" class="w-100 d-block" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img src="holder.js/900x500/auto/#666:#444/text:Third slide" class="w-100 d-block" alt="Third slide">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div> -->