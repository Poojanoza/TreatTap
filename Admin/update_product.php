<?php 
$servername="localhost";
$username= "root";
$password= "";
$database="userdata";


$conn=mysqli_connect($servername, $username, $password, $database);

if ($conn->connect_error) { 
    die("". $conn->connect_error);
}else{
    echo "Congulation Poojan You Succesfully Achive Your first goal";
}

$productName = $_POST["product_name"];
$productPrice= $_POST["product_price"];
$productDescription = $_POST["product_description"];
// $password = $_POST["new_password"];


$Id= $_GET['ID'];



mysqli_query($conn,"UPDATE `product_info` SET 
            product_name='$productName',price='$productPrice', description='$productDescription' WHERE Id=$Id");

header("location:products.php");


 

?>