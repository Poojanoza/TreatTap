<?php 
include 'C:\xampp\htdocs\TreatTap\Connection\Connection.php';

$address = $_POST["new_address"];
$pincode= $_POST['new_pincode'];
$city = $_POST['new_city'];
$mobile_no= $_POST['new_mobile_no'];

$Id= $_GET['ID'];



mysqli_query($conn,"UPDATE `user_info` SET 
            address='$address',pincode='$pincode',city='$city',mobile_no='$mobile_no' WHERE id=$Id");

header("location: Profile.php");


 

?>