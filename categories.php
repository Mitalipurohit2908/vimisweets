<?php
$page = 'categories';
include('partials-front/menu.php');
?>

<hr>

<!-- CAtegories Section Starts Here -->
<section class="categories">
    <div class="container s-head">
        <h1 class="text-center">Explore Foods</h1>

        <?php


        $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);

        if ($count > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $id = $row['id'];
                $title = $row['title'];
                $image_name = $row['image_name'];
        ?>

                <a href="<?php echo $SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                    <div class="box-3 float-container">
                        <?php
                        if ($image_name == "") {
                            //Image not Available
                            echo "<div class='error'>Image not found.</div>";
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
            //CAtegories Not Available
            echo "<div class='error'>Category not found.</div>";
        }

        ?>


        <div class="clearfix"></div>
    </div>
</section>
<!-- Categories Section Ends Here -->


<?php include('partials-front/footer.php'); ?>