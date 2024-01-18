<?php
include 'C:\xampp\htdocs\TreapTap\Connection\Connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the product ID and new quantity from the POST data
    $productId = $_POST['product_id'];
    $newQuantity = $_POST['new_quantity'];
    $totalProductPrice = $_POST['total_product_price'];

    // Update the quantity and total price in the database
    $updateSql = "UPDATE cart SET quantity = $newQuantity, total_price = $totalProductPrice WHERE product_id = $productId";
    $updateResult = $conn->query($updateSql);

    if ($updateResult) {
        echo 'Quantity and total price updated successfully';
    } else {
        echo 'Error updating quantity and total price';
    }
} else {
    echo 'Invalid request method';
}
?>
