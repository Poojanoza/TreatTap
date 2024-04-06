<?php 
session_start();
$success=0;
$user=0;
if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connection.php';

    $mysqli=mysqli_init();

    $username=$_POST['username'];
    $address=$_POST['address'];
    $mobile_no=$_POST['mobile_no'];
    $email=$_POST['email'];
    $state=$_POST['state'];
    $city=$_POST['city'];
    $pincode=$_POST['pincode'];
    $password=$_POST['password'];


  
    $sql = "SELECT * FROM user_info WHERE email = '$email'";


    $result = mysqli_query($conn, $sql);
    
    if($result){
        $num=mysqli_num_rows($result);
        if($num> 0){
        // echo"Already exist";
        $user=1;

    }else{

        $sql = "INSERT INTO user_info (username,address,mobile_no,email,state,city,pincode,password) VALUES('$username','$address','$mobile_no','$email','$state','$city','$pincode','$password')";

        $result = mysqli_query($conn, $sql);
    
        if($result){    
            // echo "Successfully inserted";
            $_SESSION['username']= $username;
            $_SESSION['user_id'] = mysqli_insert_id($conn); // Get the ID of the last inserted row
            header("Location: /TreatTap/Index.php");
            // echo "Welcome to ".$_SESSION['email_id'];
            // header("Location: /TreatTap/Index.php");
            $success=1;

            exit();
        }else{
            dia(mysqli_error($conn));
        }

    }    
}

}






?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="stylesheet" href="SignUp_style.css">
</head>
<body>
<?php 
            if($user){
                echo ' <div id="popup" class="popup">
                <div class="popup-content">
                    <p>Already exits</p>
                </div>
            </div>';
            }
?>

<?php 
            if($success){
                echo ' <div id="popup" class="popup">
                <div class="popup-content">
                    <p>Successfully Sign Up</p>
                </div>
            </div>';
            }
?>
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
            Sign Up
        </div>

        <!-- <div class="two_container"> -->

            <!-- <div class="first_container">
                <img src="img/images.jpg" alt="">
            </div> -->
        
        <div class="form_container" >
            <form action="SignUp.php" method="post" onsubmit="return checkPassword()" >
            <label for="">Name:</label>
            <input type="text" placeholder="Enter Your Name" name="username" ><br><br>
            <label for="">Address</label>
            <input type="text" placeholder="Enter Your Address" name="address" ><br><br>
            <label for="">City</label>
            <input type="text" placeholder="Enter Your city" name="city" ><br><br>
            <label for="">State</label>
            <input type="text" placeholder="Enter Your State" name="state" ><br><br>
            <label for="">Pincode</label>
            <input type="text" placeholder="Enter Your pincode" name="pincode" ><br><br>
            <label for="">Mobile NO.</label>
            <input type="text" placeholder="Enter Your Mobile No" name="mobile_no" ><br><br>
            <label for="">Email ID</label>
            <input type="email" placeholder="Enter Your Email" name="email" ><br><br>
            <label for="">Password:</label>
            <div class="password_input">
            <input type="password" placeholder="Enter Your Password" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password must contain at least one digit, one uppercase letter, one lowercase letter, and be at least 8 characters long" required>
            <button type="button" id="showPassword">Show</button>
            </div><br><br>
            <label for="">Confirm Password:</label>
            <div class="password_input">
                <input type="password" placeholder="Re-Enter Your Password"  id="confirmPassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password must contain at least one digit, one uppercase letter, one lowercase letter, and be at least 8 characters long" required>
                <!-- <button type="button" id="showPassword">Show</button> -->
                </div>
            <br><br><input type="submit" value="Sign In" class="submit_button"> 
            <br>
            <a href="/TreatTap/SignIn/SignIn.php">Already your Account ?</a>

            </form>
        </div>
    <!-- </div> -->

    </div>

    <script>

function checkPassword() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirmPassword").value;

        if (password != confirmPassword) {
            alert("Passwords do not match!");
            return false;
        }
        return true;
    }

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