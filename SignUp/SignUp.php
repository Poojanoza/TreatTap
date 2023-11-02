<?php 
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
            $success=1;
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
    <title>Sign Up</title>
    <link rel="stylesheet" href="SignUp.css">
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

        
    <div class="container">
        <form class="signup-form"  action="SignUp.php" method="post">

      
            <h2>Sign Up</h2>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="username" >
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="name" name="address" >
            </div>
            <div class="form-group">
                <label for="mobile">Mobile Number:</label>
                <input type="tel" id="mobile" name="mobile_no" >
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" >
            </div>
            <div class="form-group">
                <label for="state">state:</label>
                <input type="text" id="state" name="state" >
            </div>
            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" id="city" name="city" >
            </div>
            <div class="form-group">
                <label for="pincode">Pincode:</label>
                <input type="text" id="pincode" name="pincode" >
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" >
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" >
            </div>
            <button type="submit" name="submit_button" >Sign Up</button>
        </form>
    </div>
</body>
</html>
