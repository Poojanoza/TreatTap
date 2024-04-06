<?php 
session_start();

include 'C:\xampp\htdocs\TreatTap\Connection\Connection.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
  $email = $_POST['email'];
  // $username= $_POST['username'];


  

          $sql = "SELECT * from user_info where email='$email'";

          $result = mysqli_query($conn, $sql);
          
          if($result){
              $num=mysqli_num_rows($result);
              if($num> 0){
                  $row = mysqli_fetch_assoc($result);
              echo "Your Data is matched";
              $_SESSION['username']= $row['username'];
              $_SESSION['user_id']=$row['id'];
              // echo "Welcome to ".$_SESSION['email_id'];
              header("Location: /TreatTap/ForgetPassword/changepassword.php",$email);
              exit();
              
              }else{
                  echo "Please Enter vaild Email id";
              }
          }
          $_SESSION['email_id'] = $email;
          if(isset($_SESSION['$email_id'])){
              echo "welcome to ".$_SESSION['$email'];
          }
          
  
  
  
      
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Forget Password</title>
<style>
  /* Reset default browser styles */
  * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
  }

  a{
    text-decoration: none;
  }
  .main_container {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }

  .container {
    max-width: 400px;
    background-color: #fff;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  h2 {
    text-align: center;
    margin-bottom: 20px;
  }

  label {
    display: block;
    margin-bottom: 8px;
  }

  input[type="email"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
  }

  button {
    width: 100%;
    padding: 12px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
  }

  button:hover {
    background-color: #0056b3;
  }

  @media screen and (max-width: 600px) {
    .container {
      max-width: 90%;
    }
  }
</style>
</head>
<body>
    <h1><a href="../SignIn/SignIn.php">Back</a></h1>
    <div class="main_container" >

    
<div class="container">

  <h2>Forget Password</h2>
  <form action="ForgetPassword.php" method="post" >
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" placeholder="Enter your email" required>
    <button type="submit">Reset Password</button>
  </form>
</div>
</div>
</body>
</html>
