<?php
session_start();

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Treat-Tap</title>
    <link rel="stylesheet" href="index files/index_style.css">
</head>

<body>
    <div class="main_container">

        <div class="heading_container">
            <div class="h1_container">
                TreatTap
            </div>

            <div class="h2_container">
                <div class="h2_in1_container">
                    <a href="Index.php">Home</a>
                    <a href="Product Page/Product.php">Products</a>
                    <a href="Product Page/Cart Page/cart.php">Cart <img src="index files/Icons/shopping_cart_FILL0_wght400_GRAD0_opsz24.svg" alt=""> </a>
                    <a href="Profile Page/Profile.php"> <img class="svg_image"
                            src="index files/Icons/account_circle_FILL0_wght400_GRAD0_opsz24.svg" alt="" width="30px">
                        <?php
                        if (isset($_SESSION['username'])) {
                            echo $_SESSION['username'];
                        } else {
                            echo "Gusset";
                        }
                        ?>

                    </a>
                    <?php
                    if (!isset($_SESSION['username'])) {
                        ?>
                        <a href="SignIn/SignIn.php">Sign In</a>
                        <a href="SignUp/SignUp.php">Sign Up</a>
                       

                    <?php } else { ?>
                    <a href="OrderHistory/OrderHistory.php">Ordered <img src="index files/Icons/local_shipping_FILL0_wght400_GRAD0_opsz24.svg" alt=""> </a>

                        <a href="index files/log_out.php">Log Out</a>
                    <?php } ?>
                </div>
                <div class="h2_in2_container">

                </div>

            </div>

        </div>
        <video autoplay muted loop>

<source src="index files/TreatTap Intro - Made with Clipchamp (1).mp4" type="video/mp4" ><h1>history</h1>

</video>
        <div class="s_container">


       

             <div class="text_container">
                <div class="text_container_in_one">
                    New <br>
                    Rose Sweet
                </div>
                <div class="text_container_in_secound">
                    Craving something special? Indulge in the irresistible sweetness
                    of New Rose Sweets.Every bite is a symphony of flavor,
                    crafted with love for your pure enjoyment.
                    <br>
                    <a class="button_buy" href="Product Page/Product.php">Try Now</a>
                    <!-- <button  >Buy Now</button>  -->
                </div>
            </div>
            <div class="image_container">
                <img src="index files/Images/OIG4-removebg-preview (1).png" class="image_size" alt="">
            </div> 
        </div>

        <div class="t_container">
            Our Products
        </div>
        <div class="fourth_container">
            <!-- <div>
                Welcome to Sweet House
            </div> -->
            <div class="products">
                <div class="product_box">
                    <div class="product_img_box">
                        <img src="index files/Images/s1.jpg" class="product_image" alt="">
                    </div>
                    <div class="product_cart_button">
                        <!-- <a href="http://">Add To Cart</a> -->
                    </div>
                    <div class="product_text_area">
                        <div class="star_rating">
                            <img src="index files/Icons/Rating Group.svg" alt="">
                        </div>
                        <div class="product_name">
                            Sweet
                        </div>
                        <div class="product_price">
                            $299.00
                        </div>
                    </div>

                </div>

                <div class="product_box">
                    <div class="product_img_box">
                        <img src="index files/Images/s2.jpg" class="product_image" alt="">
                    </div>
                    <div class="product_cart_button">
                        <!-- <a href="http://">Add To Cart</a> -->
                    </div>
                    <div class="product_text_area">
                        <div class="star_rating">
                            <img src="index files/Icons/Rating Group.svg" alt="">
                        </div>
                        <div class="product_name">
                            Sweet
                        </div>
                        <div class="product_price">
                            $299.00
                        </div>
                    </div>

                </div>

                <div class="product_box">
                    <div class="product_img_box">
                        <img src="index files/Images/s1.jpg" class="product_image" alt="">
                    </div>
                    <div class="product_cart_button">
                        <!-- <a href="http://">Add To Cart</a> -->
                    </div>
                    <div class="product_text_area">
                        <div class="star_rating">
                            <img src="index files/Icons/Rating Group.svg" alt="">
                        </div>
                        <div class="product_name">
                            Sweet
                        </div>
                        <div class="product_price">
                            $299.00
                        </div>
                    </div>

                </div>

            </div>

            <div class="show_more">
                <a href="Product Page/Product.php"> Show More <img
                        src="index files/Icons/arrow_right_alt_FILL0_wght400_GRAD0_opsz24.svg" alt=""> </a>
            </div>


        </div>

        <div class="t_container">
            Customer Review
        </div>
        <div class="fifth_container">
            <div class="customer_img">
                <img src="index files/Images2/istockphoto-1213634738-612x612.jpg" alt="" width="200px">
            </div>
            <div class="customer_review">
                <div class="review_heading">
                    Happy Customer
                </div>
                <div class="review_text">
                    At TreatTap Sweet Store, the joy is as sweet as the treats themselves! From the moment you enter,
                    you're greeted with warm smiles and a tempting display of confections. With every bite, you'll taste
                    the passion and dedication that make TreatTap a haven for happy customers."





                </div>
            </div>
        </div>
        <div class="six_container" >
            <div class="sf_container" >
                        <h3>Connect With Us</h3>
                        <div class="icons" >
                        <img src="index files/Icons/facebook.svg" alt="" width="20px" >
                        <img src="index files/Icons/instagram.svg" alt=""width="20px">
                        <img src="index files/Icons/twitter.svg" alt=""width="20px">
                        <img src="index files/Icons/linkedin.svg" alt=""width="20px"></div>
            </div>
            <div class="ss_container" >
                        <h3>Contact Us</h3>
            </div>
        </div>

    </div>

</body>

</html>