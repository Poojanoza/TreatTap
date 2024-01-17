<?php
// remove_item.php

// Assuming you have a connection to the database established in your Connection.php file
include 'C:\xampp\htdocs\TreapTap\Connection\Connection.php';

// Check if the product_id parameter is set
if (isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];

    // Perform the logic to remove the item from the cart in your database
    $sql = "DELETE FROM cart WHERE product_id = $productId";
    
    if ($conn->query($sql) === TRUE) {
        // If the query is successful, send a success response
        echo "Item removed successfully";
    } else {
        // If there's an error in the query, send an error response
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    // If product_id parameter is not set, send an error response
    echo "Error: product_id parameter is not set";
}
?>
