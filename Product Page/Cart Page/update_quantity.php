<?php
include 'C:\xampp\htdocs\TreapTap\Connection\Connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the product ID and new quantity from the POST data
    $productId = $_POST['product_id'];
    $newQuantity = $_POST['new_quantity'];

    // Update the quantity in the database
    $updateSql = "UPDATE cart SET quantity = $newQuantity WHERE product_id = $productId";
    $updateResult = $conn->query($updateSql);

    if ($updateResult) {
        echo 'Quantity updated successfully';
    } else {
        echo 'Error updating quantity';
    }
} else {
    echo 'Invalid request method';
}
?>
