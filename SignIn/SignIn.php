<?php 
session_start();

if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connection.php';
    $email = $_POST['email'];
    $password = $_POST['password'];
    // $username= $_POST['username'];


    if($email == 'admin@gmail.com' && $password == 'Admin123'){
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
    <title>Document</title>
    <link rel="stylesheet" href="SignIn_style.css">
</head>
<body>
    <div class="main_container">

        <div class="heading_container">
            <div class="company_name">
                TreatTap
            </div>
            
            <div class="back_button">
                <a href="../Index.php">Back</a>
            </div>
        </div>

        <div class="heading_title" >
            Sign in
        </div>

        <!-- <div class="two_container"> -->

            <!-- <div class="first_container">
                <img src="img/images.jpg" alt="">
            </div> -->
            <?php if(isset($error)): ?>
            <?php echo $error; ?>
        <?php endif; ?>
        <div class="form_container" >
            <form action="SignIn.php" method="post">
            <label for="">Email ID</label>
            <input type="email" placeholder="Enter Your Email"id="email" name="email"><br><br>
            <label for="">Password:</label>
            <div class="password_input">
            <input type="password" placeholder="Enter Your Password" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password must contain at least one digit, one uppercase letter, one lowercase letter, and be at least 8 characters long" required>
            <button type="button" id="showPassword">Show</button>
            </div>
            <br><br><input type="submit" value="Sign In" class="submit_button"> 
            <br>
            <center>
            <a href="/TreatTap/SignUp/SignUp.php">New User?</a></center>
            <a href="../ForgetPassword/ForgetPassword.php">Forget Password?</a></center>
            </form>
        </div>
    <!-- </div> -->

    </div>

    <script>
        var showPasswordButton = document.getElementById("showPassword");
        var passwordInput = document.getElementById("password");
    
        showPasswordButton.addEventListener("click", function() {
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                showPasswordButton.textContent = "Hide";
            } else {
                passwordInput.type = "password";
                showPasswordButton.textContent = "Show";
            }
        });
    </script>
    
</body>
</html>