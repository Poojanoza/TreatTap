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

$username = $_POST["new_username"];
$email= $_POST["new_email"];
$address = $_POST["new_address"];
$password = $_POST["new_password"];


$Id= $_GET['ID'];



mysqli_query($conn,"UPDATE `user_info` SET username='$username',
            address='$address',email='$email',password='$password' WHERE id=$Id");

header("location:users.php");


 

?>