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

$Id= $_GET['ID'];

mysqli_query($conn,"DELETE FROM `product_info` WHERE Id=$Id");

header("location:products.php");


 

?>