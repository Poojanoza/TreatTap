<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "userdata";

$conn = mysqli_connect($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("" . $conn->connect_error);
} else {
    echo "cc done";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $productDescription = $_POST['productDescription'];

    if (isset($_POST['submit'])) {
        $pname = rand(1000, 1000) . " " . $_FILES["productImage"]["name"];
        $tname = $_FILES["productImage"]["tmp_name"];
        $uploads_dir = "images/";

        move_uploaded_file($tname, $uploads_dir . '/' . $pname);

        $sql = "INSERT INTO product_info (product_name, price, description, image_url) VALUES ('$productName', '$productPrice', '$productDescription', '$pname')";

        if (mysqli_query($conn, $sql)) {
            echo "Successfully Uploaded";
            ?>
                <script>  alert("Succesfully Uploaded") </script>
            <?php 

        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Form not submitted";
    }
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
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

        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            resize: vertical;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
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

    <form enctype="multipart/form-data"  method="post" >
        <h2>Add New Product</h2>
        

        <label for="productName">Product Name:</label>
        <input type="text" id="productName" name="productName" required>

        <label for="productPrice">Product Price:</label>
        <input type="number" id="productPrice" name="productPrice" min="0" step="1" required>

        <label for="productDescription">Product Description:</label>
        <textarea id="productDescription" name="productDescription" rows="4" required></textarea>

        <label for="productImage">Product Image:</label>
        <input type="file" id="productImage" name="productImage" accept="image/*" required>

        <input type="submit" name="submit" value="Upload Image" > 

        <a href="products.php"> add Product</a>
         <a href="products.php"> Cancel</a>
    </form>

</body>
</html>
