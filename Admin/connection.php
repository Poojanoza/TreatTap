<?php 
$servername="localhost";
$username= "root";
$password= "";
$database="userdata";

$conn=mysqli_connect($servername, $username, $password, $database);

if ($conn->connect_error) { 
    die("". $conn->connect_error);
}else{
    echo "cc done";
}

?>