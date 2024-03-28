<?php
session_start();
include 'C:\xampp\htdocs\TreatTap\Connection\Connection.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    die("User not logged in");
}

// Get the order ID from the AJAX request
if (!isset($_POST['orderId'])) {
    die("Order ID not provided");
}
$orderId = $_POST['orderId'];

// Delete the order from product_order_info table
$sqlDeleteProductOrder = "DELETE FROM product_order_info WHERE order_id = $orderId";
if (!$conn->query($sqlDeleteProductOrder)) {
    die("Error deleting product order: " . $conn->error);
}

// Delete the order from order_info table
$sqlDeleteOrder = "DELETE FROM order_info WHERE order_id = $orderId";
if (!$conn->query($sqlDeleteOrder)) {
    die("Error deleting order: " . $conn->error);
}

// Send success response
echo "Order deleted successfully";
?>