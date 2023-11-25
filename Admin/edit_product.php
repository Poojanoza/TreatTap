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


$sql = "SELECT * FROM product_info WHERE Id=$Id";
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
    <form action="update_product.php? ID= <?php echo $row["Id"] ?>" method="post" >
        <label for="username">Product Id:</label>
        <input type="text" id="username" name="product_id" value=" <?php echo $row["Id"]; ?>" readonly >

        <label for="email">Product Name:</label>
        <input type="text" id="email" name="product_name"  value=" <?php echo $row["product_name"]; ?> " >

        <label for="address">Product Price</label>
        <input type="text" id="address" name="product_price" value=" <?php echo $row["price"]; ?>" >

        <label for="password">Description:</label>
        <input type="text" id="password" name="product_Description" value=" <?php echo $row["description"]; ?> ">

        <button type="submit">Save</button>
    </form>
    </container>



   
</body>
</html>
