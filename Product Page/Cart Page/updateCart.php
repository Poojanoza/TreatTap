<?php 
include 'C:\xampp\htdocs\TreatTap\Connection\Connection.php';
$product_id = $_POST['product_id'];
$quantity = $_POST['quantity'];
$total_price = $_POST['total_price'];

// Update the cart in the database (replace with your actual database logic)
$sql = "UPDATE cart SET quantity = $quantity,total_price =$total_price WHERE product_id = $product_id";
if ($conn->query($sql) === TRUE) {
    echo "Cart updated successfully!";
} else {
    echo "Error updating cart: " . $conn->error;
}

$conn->close();

?>