<?php 
session_start();

if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connection.php';
    $email = $_POST['email'];
    $password = $_POST['password'];
    // $username= $_POST['username'];


    if($email == 'admin@gmail.com' && $password == 'admin'){
        header("Location: /TreatTap/Admin/Admin.php");
        exit();
    }else{

            $sql = "SELECT * from user_info where email='$email' and password= '$password'";

            $result = mysqli_query($conn, $sql);
            
            if($result){
                $num=mysqli_num_rows($result);
                if($num> 0){
                    $row = mysqli_fetch_assoc($result);
                echo "Your Data is matched";
                $_SESSION['username']= $row['username'];
                $_SESSION['user_id']=$row['id'];
                // echo "Welcome to ".$_SESSION['email_id'];
                header("Location: /TreatTap/Index.php");
                exit();
                
                }else{
                    echo "Invaild data";
                }
            }
            $_SESSION['email_id'] = $email;
            if(isset($_SESSION['$email_id'])){
                echo "welcome to ".$_SESSION['$email'];
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
        <?php if(isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
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
            <a href="/TreapTap/SignUp/SignUp.php">New User ?</a>
        </form>
    </div>
</body>
</html>
