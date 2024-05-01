<?php   

session_start();

include 'C:\xampp\htdocs\TreatTap\Connection\Connection.php';

$user_id= $_SESSION['user_id'];
if($_SERVER['REQUEST_METHOD']=='POST'){
    $password = $_POST['newPassword'];
    mysqli_query($conn,"UPDATE `user_info` SET 
            password='$password' WHERE id=$user_id");

header("Location: /TreatTap/index.html");
        exit();
}
$sql = "SELECT * from user_info where id='$user_id' ";

$result = mysqli_query($conn, $sql);

if($result){
    $num=mysqli_num_rows($result);
    if($num> 0){
        $row = mysqli_fetch_assoc($result);
   
    
?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Change Password</title>
<style>
  /* Reset default browser styles */
  * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
  }

  body {
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

  input[type="password"] {
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
    <h1><a href="ForgetPassword.php">back</a></h1>
<div class="container">
  <h2>Change Password</h2>
  <form action="changepassword.php" method="post" >
    <label for="newPassword">Email id: <?php echo $row['email'];?> </label>
    <label for="newPassword">New Password:</label>
    <input type="password" id="newPassword" name="newPassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  placeholder="Enter your new password" required>
    <button type="submit">Change Password</button>
  </form>
</div>
</body>
</html>
<?php 

}
}

?>