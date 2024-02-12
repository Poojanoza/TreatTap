<?php
session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TreatTap</title>
    <link rel="stylesheet" href="index files/index.css">
    <!-- <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script> -->
    <style>
        * {
            font-family: 'Times New Roman', Times, serif;
        }

        body {
            background-color: #FFFFFF;
            width: 100%;
            height: auto;
            font-family: 'Times New Roman', Times, serif;
            font-size: 22px;
        }

        #container {
            display: grid;
            row-gap: 5px;
        }

        #discount {
            background-color: black;
            color: #F5E6E0;
        }

        #header {
            background-color: #F5E6E0;
            column-gap: 10px;
            display: flex;
            align-items: center;
            justify-content: space-around;
            padding-right: 100px;
            padding-left: 100px;
        }

        #TreatTapLogo {
            width: 100px;
            height: 100px;
            border: 1px solid black;
            border-radius: 60%;
            transition: border-radius 0.3s ease;
        }

        #TreatTapLogo:hover {
            border: 2px solid black;
            ;
            border-radius: 40%;
        }

        #header_links {
            text-decoration: none;
        }

        a {
            text-decoration: none;
            color: black;
        }

        .a_links {
            text-decoration: none;
            color: black;
            padding-right: 90px;
            font-size: 25px;
            transition: font-size 0.3s ease;
        }

        .a_links:hover {
            font-size: 20px;
            font-weight: bold;
        }

        #cart_button {
            background-color: white;
            display: flex;
            justify-content: center;
            border: solid 2px black;
            border-radius: 20px;
            width: 100px;
            padding-top: 20px;
            padding-bottom: 20px;
            width: 120px;
            border: 2px solid transparent;
            /* Initial border */
            transition: border-color 1.3s ease;
        }

        #cart_button:hover {
            background-color: #C1E7C2;
            font-size: 20px;
            font-weight: bold;
            border-width: 5px;
            border-color: white;
            /* New border color on hover */
        }

        #sign_button {
            /* padding: 20px; */
            display: flex;
            column-gap: 20px;
        }

        #button_sign_in {
            background-color: white;
            border: solid 2px black;
            border-radius: 20px;
            width: 100px;
            height: 50px;
            display: flex;
            justify-content: center;
            /* Center horizontally */
            align-items: center;
            /* Center vertically */
            width: 100px;
            border: 2px solid transparent;
            /* Initial border */
            transition: border-color 1.3s ease;
        }

        #button_sign_in:hover {
            background-color: #C1E7C2;
            font-size: 20px;
            font-weight: bold;
            border-width: 5px;
            border-color: white;
            /* New border color on hover */
        }
        #profile{
            background-color: white;
            border: solid 2px black;
            padding-right: 20px;
            border-radius: 20px;
            width: 100px;
            height: 50px;
            display: flex;
            justify-content: center;
            /* Center horizontally */
            align-items: center;
            /* Center vertically */
            width: auto;
            /* column-gap: 2px; */
            border: 2px solid transparent;
            /* Initial border */
            transition: border-color 1.3s ease;
        }
        #profile:hover{
            background-color: #C1E7C2;
            /* font-size: 20px; */
            /* font-weight: bold; */
            border-width: 5px;
            border-color: white;
        }
    </style>
</head>

<body>
    <div id="container">
        <div id="discount">
            <marquee behavior="scroll" direction="">Welcome to TreatTap Get First Delivery Free</marquee>
        </div>
        <!-- Header -->
        <div id="header">
            <div id="logo">
                <a href="Index.html">
                    <img src="index files/Images/TreatTap_Logo-removebg-preview.png" alt="" id="TreatTapLogo">
                </a>
            </div>
            <div id="header_links">
                <a href="#" class="a_links" target="_blank" rel="noopener noreferrer">Home</a>
                <a class="a_links" href="Product Page/Product.php">Products</a>
                <a href="#" class="a_links" target="_blank" rel="noopener noreferrer">About</a>
                <a href="#" class="a_links" target="_blank" rel="noopener noreferrer">Contact</a>
            </div>
            <div id="button_cart">
                <button id="cart_button">
                    <a href="Product Page/Cart Page/cart.php">
                        <img src="index files/Images/cart-icon-28356.png" alt="" width="25px" height="25px">
                    </a>
                </button>
            </div>
            <div id="sign_button">
            <button id="profile">
                    <a href="Profile Page/Profile.php"> <img
                            src="index files/Images/—Pngtree—avatar icon profile icon member_5247852.png" alt=""
                            width="70px"> </a>
                    <?php
                    if (isset($_SESSION['username'])) { 
                        echo $_SESSION['username']; 
                    }else{
                        echo "Gusset";
                    }
                    ?>
                </button>
                <?php 
                if(!isset($_SESSION['username'])){
                ?>
                <button id="button_sign_in">
                    <a href=".\SignUp\SignUp.php">Sign Up</a>
                </button>
                <button id="button_sign_in">
                    <a href=".\SignIn\SignIn.php">Sign In</a>
                </button>
                
                <?php } else{ ?>

                <button id="button_sign_in" >
                    <a href="index files/log_out.php">Log Out</a>
                </button>
                    <?php }?>
            </div>
            <div>

            </div>
        </div>


    </div>

</body>

</html>