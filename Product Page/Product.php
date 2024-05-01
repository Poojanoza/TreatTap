<?php

session_start();
ini_set('display_errors', 'Off');

$userId = $_SESSION['user_id'];

if ($userId === null) {
    echo "Please Login ";
}


include 'C:\xampp\htdocs\TreatTap\Connection\Connection.php';


$sql = "SELECT * FROM product_info ";
$result = $conn->query($sql);
$row_count = mysqli_num_rows($result);

if (isset($_POST['add_to_cart'])) {

    if ($userId === null) {

        header('Location: ..\SignIn\SignIn.php');
        exit();

    } else {

        $product_id = $_POST['product_id'];

        $cart_check_sql = "SELECT * from cart where  product_id = '$product_id' AND user_id = '$userId'";
        $cart_check_result = $conn->query($cart_check_sql);

        if ($cart_check_result->num_rows > 0) {
            echo "product already in cart";
        } else {
            $product_info_sql = "SELECT *  FROM product_info WHERE ID= '$product_id' ";
            $product_info_result = $conn->query($product_info_sql);


            if ($product_info_result->num_rows > 0) {
                $product_info = $product_info_result->fetch_assoc();
                $insert_cart_sql = "INSERT INTO cart (user_id,product_id,product_name,product_image,product_price,quantity)      
                 VALUES (
                    '$userId',
                    '$product_id',
                    '" . $product_info['product_name'] . "',
                    '" . $product_info['image_url'] . "',
                    '" . $product_info['price'] . "',
                        1
                    )";

                if ($conn->query($insert_cart_sql) === TRUE) {
                    echo " product added succesfully in cart";
                } else {
                    echo "error adding product add to cart" . $conn->error;
                }
            } else {
                echo "Product Not Found in database";
            }
        }
    }

}




?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Product_style.css">
    <title>Product Page</title>
    <style>

    </style>
</head>

<body>
    <div class="main_container">

        <div class="heading_container">
            <div class="h1_container">
                TreatTap
            </div>

            <div class="h2_container">
                <div class="h2_in1_container">
                    <a href="../index.html">Home</a>
                    <!-- <a href="http://">Products</a> -->
                    <!-- <a href="http://">About Us</a>
                    <a href="http://">Extra</a>
                    <a href="SignIn/SignIn.html">Sign In</a>
                    <a href="SignUp/SignUp.html">Sign Up</a> -->
                    <a href="Cart Page\cart.php"> <img class="svg_image"
                            src="Icons/shopping_cart_FILL0_wght400_GRAD0_opsz24.svg" alt=""> Cart</a>

                    <a href="../Profile Page/Profile.php"> <img class="svg_image"
                            src="Icons/account_circle_FILL0_wght400_GRAD0_opsz24.svg" alt="" width="30px">
                            <?php
                        if (isset($_SESSION['username'])) {
                            echo $_SESSION['username'];
                        } else {
                            echo "Gusset";
                        }
                        ?>
                        </a>
                    <!-- <a href="http://">Log Out</a> -->

                </div>
                <div class="h2_in2_container">

                </div>

            </div>

        </div>
        <div class="t_container">
            Our Products
        </div>

        <div class="search-container">
            <input type="text" id="searchInput" placeholder="Search products...">
            <button onclick="searchProducts()" id="search_button" >Search <img src="Icons/search_FILL0_wght400_GRAD0_opsz24.svg" alt=""></button>
        </div>
        <!-- <div class="t_container">
            Our Products
        </div> -->





        <div class="fourth_container">

            <div class="products">


                <?php
                if ($result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <div class="product_box">

                            <div class="product_img_box">

                                <img src="../Admin/Images/<?php echo $row["image_url"]; ?>" class="product_image">
                            </div>
                            <div class="product_cart_button">
                                <form action="" method="post">
                                    <input type="submit" value="Add to cart" name="add_to_cart" class="add_cart">
                                    <input type="hidden" name="product_id" value="<?php echo $row["Id"]; ?>">
                                </form>
                            </div>
                            <div class="product_text_area">
                                <div class="star_rating">
                                    <img src="Images/Rating Group.svg" alt="">
                                </div>
                                <div class="product_name">

                                    <?php echo $row["product_name"]; ?>
                                </div>
                                <div class="product_price">

                                    Price :
                                    <?php echo $row["price"]; ?>
                                </div>

                                <?php echo $row["description"]; ?>


                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "Not Found User";
                }

                ?>

            </div>


            <script>
                function searchProducts() {
                    var input, filter, products, product, i, txtValue;
                    input = document.getElementById("searchInput");
                    filter = input.value.toUpperCase();
                    products = document.getElementsByClassName("product_box");

                    for (i = 0; i < products.length; i++) {
                        product = products[i].getElementsByClassName("product_name")[0];
                        txtValue = product.textContent || product.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            products[i].style.display = "";
                        } else {
                            products[i].style.display = "none";
                        }
                    }
                }
            </script>

        </div>
        <footer>
    <div class="footer-content">
      <div class="footer-section">
        <h3>Follow Us</h3>
        <ul class="social-links">
          <li><a href="https://www.instagram.com/">Instagram</a></li>
          <li><a href="https://www.facebook.com/">Facebook</a></li>
          <li><a href="https://www.whatsapp.com/">WhatsApp</a></li>
          <li><a href="https://twitter.com/?lang=en">Twitter</a></li>
        </ul>
      </div>
      <div class="footer-section">
        <h3>Contact Us</h3>
        <p>Science City Road <br>Ahmedabad, India</p>
        <p>Phone: +1234567890</p>
      </div>
      <div class="footer-section">
        <h3>Quick Links</h3>
        <ul class="footer-links">
          <li><a href="Product Page/Product.php">Products</a></li>
          <li><a href="AboutUs/aboutus.php">About Us</a></li>
          <!-- <li><a href="contact.html">Contact Us</a></li> -->
          <!-- Add more links as needed -->
        </ul>
      </div>
    </div>
    <p class="copyright">&copy; 2024 TreatTap Website. All Rights Reserved.</p>
    <p class="copyright"> Made By Poojan Oza.</p>
  </footer>

</body>

</html>