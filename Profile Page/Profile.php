<?php 
session_start();
include 'C:\xampp\htdocs\TreatTap\Connection\Connection.php';

$userId = $_SESSION['user_id'];

if ($userId === null) {
?>

  <script>
    alert("Please Login Requreid");
  </script>
<?php
  header('Location: /TreatTap/SignIn/SignIn.php');
  exit();
} else {

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Profile</title>
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
  }

  .container {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }

  .profile {
    text-align: center;
  }

  .profile img {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    margin-bottom: 20px;
  }

  .profile h1 {
    margin: 10px 0;
  }

  .profile p {
    margin: 5px 0;
    color: #666;
  }

  .profile .btn {
    display: inline-block;
    padding: 10px 20px;
    margin-top: 10px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s;
  }

  .profile .btn:hover {
    background-color: #0056b3;
  }

  @media screen and (max-width: 600px) {
    .profile img {
      width: 100px;
      height: 100px;
    }

    .profile .btn {
      font-size: 14px;
    }
  }
</style>
</head>
<body>

<div class="container">
  <div class="profile">
    <img src="—Pngtree—avatar icon profile icon member_5247852.png" alt="Profile Picture">
    <h1>John Doe</h1>
    <p>ID: JDE1234</p>
    <p>Address: 123 Main St, Apt 2B</p>
    <p>Pincode: 10001</p>
    <p>Email: john@example.com</p>
    <p>Mobile No: +1 123-456-7890</p>
    <a href="#" class="btn">Edit Profile</a>
  </div>
</div>

</body>
</html>
<?php }?>