<?php 
include 'C:\xampp\htdocs\TreatTap\Connection\Connection.php';

$Id= $_GET['ID'];

mysqli_query($conn,"DELETE FROM `cart` WHERE id = $Id");

header("location:cart.php");

?>