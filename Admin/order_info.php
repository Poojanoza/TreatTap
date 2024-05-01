<?php
include 'C:\xampp\htdocs\TreatTap\Connection\Connection.php';

?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Order</title>
    <style>
        * {
            font-family: 'Times New Roman', Times, serif;
            font-size: 18px;
            font-weight: lighter;
        }

        body {
            display: grid;
            justify-content: center;
        }

        #container {

            display: flex;
            justify-content: center;
            /* width: 1920px; */
        }

        ._th {
            padding: 20px;
        }

        ._tr {
            border: 2px solid black;
            border-radius: 20px;
            background-color: bisque;

        }

        #order_confirm_button {
            display: flex;
            justify-content: center;
            column-gap: 20px;
        }

        h1 {
            font-size: 45px;
        }

        #confirm_button {
            background-color: gold;
            font-size: 20px;
            border: 2px solid black;
            border-radius: 1px;
            transition: border-radius 0.3s ease;
        }

        #confirm_button:hover {
            border-radius: 100px;
        }

        #cancel_button {
            background-color: red;
            color: white;
        }

        table {
            border: 2px solid black;
        }

        #header {
            display: flex;
            justify-content: start;
            column-gap: 200px;
        }

        #back_link {
            text-decoration: none;
            font-size: 40px;
            text-align: center;
        }
    </style>
</head>

<body>
    <center>
        <div id="header">
            <a href="Admin.php" id="back_link">Back</a>
            <h1>Customer Order Information</h1>
        </div>
    </center>
    <div id="container">
        <table>
            <tr class="_tr">
                <th class="_th">Order Id</th>
                <th class="_th">Customer Name</th>
                <th class="_th">Product Name</th>
                <th class="_th">Address</th>
                <!-- <th class="_th">Mobile NO</th> -->
                <th class="_th">Date</th>
                <th class="_th">Quntatiy</th>
                <th class="_th">Total Amount</th>
                <th class="_th">Payment Method</th>
                <!-- <th class="_th">Confirm or not ?</th> -->
            </tr>
            <!-- <tr class="_tr"> -->
            <?php
            $total_order = 0;
            $sql = "SELECT * FROM order_info";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $order_id = $row['order_id'];

                    // Fetch product order info
                    $sql_product = "SELECT * FROM product_order_info WHERE order_id = '$order_id'";
                    $result_product = $conn->query($sql_product);

                    // Fetch user info
                    $user_id = $row['user_id'];
                    $sql_user = "SELECT * FROM user_info WHERE id = '$user_id'";
                    $result_user = $conn->query($sql_user);
                    $row_user = $result_user->fetch_assoc();

                    if ($result_product->num_rows > 0) {
                        while ($row_product = $result_product->fetch_assoc()) {
            ?>
                            <tr class="_tr">
                                <td class="_th"><?php echo $row['order_id'] ?></td>
                                <td class="_th"><?php echo $row_user['username'] ?></td>
                                <td class="_th"><?php echo $row_product['product_name'] ?></td>
                                <td class="_th"><?php echo $row_user['address'] ?></td>
                                <td class="_th"><?php echo $row_product['order_date'] ?></td> 
                                <td class="_th"><?php echo $row_product['product_quntatiy'] ?></td>
                                <td class="_th"><?php echo $row_product['product_total_price'] ?></td>
                                <td class="_th"><?php echo $row['payment_method'] ?></td>
                                <!-- <td class="_th"><button>Button</button></td> -->
                            </tr>
            <?php
                        }
                    }
                    $total_order++;
                }
            }
            // echo "TOTAL ORDER: " . $total_order;
            ?>
        </table>
    </div>
</body>

</html>