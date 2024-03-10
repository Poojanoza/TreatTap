<?php

session_start();
$userId = $_SESSION['user_id'];

ini_set('display_errors', 'Off');
$payment_type = null;

if (isset($_POST['submit'])) {
    $payment_type = $_POST['payment_mode'];
    $total_amount = $_POST['total_amount'];
    echo "<br>payment mode          " . $payment_type;
} else {
    echo "not selected payment method please select";
}

// const value = $payment_type ;

$final_value = $payment_type;

$final_total_value = $total_amount;

echo "final value is ". $final_value;

if ($final_value == "online") {
    // header('Location: process_payment.php ');
    // exit();

   
    if ($userId === null) {
        echo "Please Login ";
    }
    include 'C:\xampp\htdocs\TreatTap\Connection\Connection.php';

    $order_date = date("Y-m-d");


    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Payment Page</title>
        <link rel="stylesheet" href="styles.css">
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f2f2f2;
                margin: 0;
                padding: 0;
            }

            .container {
                max-width: 400px;
                margin: 50px auto;
                padding: 20px;
                background-color: #fff;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            h1 {
                text-align: center;
                color: #333;
            }

            form {
                margin-top: 20px;
            }

            label {
                display: block;
                margin-bottom: 5px;
                color: #555;
            }

            input[type="text"],
            textarea {
                width: 100%;
                padding: 10px;
                margin-bottom: 20px;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
            }

            button {
                width: 100%;
                padding: 10px;
                background-color: #4CAF50;
                color: #fff;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 16px;
                transition: background-color 0.3s;
            }

            button:hover {
                background-color: #45a049;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <h1>Payment Details</h1>
            <?php

            // $sql = "SELECT product_name,user_id, quantity, total_price, user_info.username AS username, cart.product_id AS product_id FROM cart INNER JOIN user_info ON cart.user_id=user_info.id ";

            // $result = $conn->query($sql);

            // if ($result->num_rows > 0) {
        
            //     $cart_i = $row['user_id'];
            //     $user_i = $row['id'];
            //     while ($row = $result->fetch_assoc()) {
            //         if ($row['user_id'] === $userId) {
        
            //             // Access and display the product ID and username
            //             $username = $row["username"];
            //             $productName = $row["product_name"];
            //             $product_id = $row["product_id"];
            //             $g = $row["quantity"];
            //             // $product
        
            //             echo "helloo" . $cart_i;
            //             echo $user_i;
            //             echo "Product ID: $product_id";
            //             echo "<br>";
            //             echo "Product Name: $productName";
            //             echo "quntatiy: " . $g;
            //             echo "<br>";
        
            //         }
            //     }
            //     echo "Username: $username";
        
            // } else {
            //     echo "No products in cart";
            // }
        
            //     ?>


            <form action="process_payment.php" method="post">
                <label for="card-number">Card Number:</label>
                <input type="text" id="card-number" name="card-number" >

                <label for="expiry">Expiration Date:</label>
                <input type="text" id="expiry" name="expiry" placeholder="MM/YYYY" >

                <label for="cvv">CVV:</label>
                <input type="text" id="cvv" name="cvv" >

                <label for="name">Name on Card:</label>
                <input type="text" id="name" name="name" >
                <input type="hidden" name="payment_type" value="<?php echo $payment_type ?> " >
                <input type="hidden" name="total_amount" value="<?php echo $final_total_value ?> " >

                <button type="submit" name="pay_now">Pay Now</button>

            </form>


            <?php

             }else if ($final_value == "offline") {
    // echo "Order on the way";
    echo "<br>total amount: " . $total_amount;


    if ($userId === null) {
        echo "Please Login ";
    }
    include 'C:\xampp\htdocs\TreatTap\Connection\Connection.php';

    $order_date = date("Y-m-d");

    if ($userId === null) {

        header('Location: ..\SignIn\SignIn.php');
        exit();

    } else {

        // Entry in order_info ,payment_info,product_order_info 
        
        date_default_timezone_set('Asia/Kolkata');
        $currentDateTime = date('H:i:s');
        $order_id = null;

        $sql1 = "SELECT  username FROM user_info WHERE id = '$userId'";
        $result1 = $conn->query($sql1);
        if ($result1->num_rows > 0) {
            // echo "hellloo";
            // }else{
            $sql_delete_cart = "DELETE FROM cart WHERE user_id = '$userId'";
            if ($conn->query($sql_delete_cart) === TRUE) {
                echo "Products removed from cart successfully";
            } else {
                echo "Error removing products from cart: " . $conn->error;
            }
                $time_store = $currentDateTime;
            $user_info = $result1->fetch_assoc();
            $order_table = "INSERT INTO order_info (user_id, user_name,order_date,order_time,total_amount,payment_method) 
            VALUES (
                '$userId',
                '" . $user_info['username'] . "',
                ' $order_date',
                '$time_store',
                '$total_amount',
                '$payment_type'
            )";
            // echo "SQL Query: " . $order_table; // Print out the SQL query for debugging
            if ($conn->query($order_table) === TRUE) {
                echo "New record created successfully";
                $order_id = mysqli_insert_id($conn);
            } else {
                echo "Error: " . $order_table . "<br>" . $conn->error;
            }

        }
// ---------------------------SECOUND TABLE DATA INSERT ---------------------------------

$sql = "SELECT product_name, user_id, quantity, total_price, user_info.username AS username, cart.product_id AS product_id 
        FROM cart 
        INNER JOIN user_info ON cart.user_id=user_info.id 
        WHERE cart.user_id = '$userId'"; // Filter by user ID




$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $productName = $row["product_name"];
        $quantity = $row["quantity"];
        $totalPrice = $row["total_price"];

        // Insert data into product_order_info table
        $product_order = "INSERT INTO product_order_info (order_id,order_date,order_time,user_id, product_name, product_quntatiy, product_total_price)
                          VALUES ('$order_id','$order_date','$time_store','$userId', '$productName', '$quantity', '$totalPrice')";

        if ($conn->query($product_order) === TRUE) {
            echo "Product order info inserted successfully.<br>";
        } else {
            echo "Error inserting product order info: " . $conn->error . "<br>";
        }
    }
} else {
    echo "No products in cart.<br>";
}        
// date_default_timezone_set('Asia/Kolkata');
// $currentDateTime = date('H:i:s');
// echo $currentDateTime;

        ?>
                    <h1>Your Order is On the Way</h1>
                    <h1></h1>


                    <a href="../../../index.php">Go Back</a>



                <?php
    }
    ?>


            <?php
} ?>

    </div>


    <?php ?>
</body>

</html>