<?php
session_start();
$userId = $_SESSION['user_id'];

// if ($final_value == "online") {

if ($userId === null) {
    echo "Please Login ";
}
include 'C:\xampp\htdocs\TreatTap\Connection\Connection.php';

$order_date = date("Y-m-d");

if (isset($_POST['pay_now'])) {

    $current_type = $_POST['payment_type'];
    $total_amount = $_POST['total_amount'];
    echo "current". $current_type;
    // if ($current_type == "online") {
        echo "heelll";    
        if ($userId === null) {

            header('Location: ..\SignIn\SignIn.php');
            exit();

        } else {

            // Entry in order_info-100% ,payment_info,product_order_info 
            date_default_timezone_set('Asia/Kolkata');
            $currentDateTime = date('H:i:s');
            $order_id = null;
    
            $sql1 = "SELECT  username FROM user_info WHERE id = '$userId'";
            $result1 = $conn->query($sql1);
            if ($result1->num_rows > 0) {
                // echo "hellloo";
                // }else{
           
                    $time_store = $currentDateTime;
                $user_info = $result1->fetch_assoc();
                $order_table = "INSERT INTO order_info (user_id, user_name,order_date,order_time,total_amount,payment_method) 
                VALUES (
                    '$userId',
                    '".$user_info['username']."',
                    ' $order_date',
                    '$time_store',
                    '$total_amount',
                    '$current_type'
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
            $product_id = $row["product_id"];
    
            // Insert data into product_order_info table
            $product_order = "INSERT INTO product_order_info (order_id,order_date,order_time,user_id,product_id,product_name, product_quntatiy, product_total_price)
                              VALUES ('$order_id','$order_date','$time_store','$userId','$product_id','$productName', '$quantity', '$totalPrice')";
    
            if ($conn->query($product_order) === TRUE) {
                echo "Product order info inserted successfully.<br>";
            } else {
                echo "Error inserting product order info: " . $conn->error . "<br>";
            }
        }
        $sql_delete_cart = "DELETE FROM cart WHERE user_id = '$userId'";
        if ($conn->query($sql_delete_cart) === TRUE) {
            echo "Products removed from cart successfully";
        } else {
            echo "Error removing products from cart: " . $conn->error;
        }
        header('Location: ConfirmOrder.php');
        exit();

    } else {
        echo "No products in cart.<br>";
    }    
   
}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin: 0 auto;
            padding-top: 10%;
        }

        .innercontainer {
            display: flex;
            margin: 0 auto;
            flex-direction: column;
            align-items: center;
            background-color: aqua;
            padding: 10%;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="innercontainer">
            <div>
                <h1>
                    Your Order <?php echo $current_type?>  is Successfully Confirmed.
                    Thank you
                </h1>
            </div>
            <div>
                <button> <a href="../../../index.html">Back</a> </button>
            </div>
        </div>
    </div>


</body>

</html>