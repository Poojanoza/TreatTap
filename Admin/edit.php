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

$Id= $_GET['ID'];


$sql = "SELECT * FROM user_info WHERE id=$Id";
$result= $conn->query($sql);
$row = $result->fetch_assoc() ;


?>





















<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information Form</title>
    <style>
        container {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<container>
    <form action="update.php? ID= <?php echo $row["id"] ?>" method="post" >
        <label for="username">User Name:</label>
        <input type="text" id="username" name="new_username" value=" <?php echo $row["username"]; ?>">

        <label for="email">Email:</label>
        <input type="email" id="email" name="new_email"  value=" <?php echo $row["email"]; ?> " >

        <label for="address">Address:</label>
        <input type="text" id="address" name="new_address" value=" <?php echo $row["address"]; ?>" >

        <label for="password">Password:</label>
        <input type="text" id="password" name="new_password" value=" <?php echo $row["password"]; ?>">

        <button type="submit">Save</button>
    </form>
    </container>



   
</body>
</html>
