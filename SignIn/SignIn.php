<?php 

if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connection.php';
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * from user_info where email='$email' and password= '$password'";

    $result = mysqli_query($conn, $sql);
    
    if($result){
        $num=mysqli_num_rows($result);
        if($num> 0){
        echo "Your Data is matched";
        }else{
            echo "Invaild data";
        }
    }
    
    
    
    
    
}



?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="SignIn.css">
</head>
<body>
    <div class="signin-container">
        <h1>Sign In</h1>
        <form action="SignIn.php" method="post" >
            <div class="input-container">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" >
            </div>
            <div class="input-container">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" >
            </div>
            <button type="submit">Sign In</button>
        </form>
    </div>
</body>
</html>
