<?php 
include 'C:\xampp\htdocs\TreatTap\Connection\Connection.php';
session_start();

$userId = $_SESSION['user_id'];

$sql = "SELECT * FROM user_info WHERE id=$userId";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Address Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        @font-face {
    font-family: "MadimiOne";
    src: url(Fonts/Madimi_One/MadimiOne-Regular.ttf);
}

@font-face {
    font-family: "Merienda";
    src: url(Fonts/Merienda/Merienda-VariableFont_wght.ttf);
}

* {
    font-family: "Merienda";
}   

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .back-link {
            display: block;
            margin-bottom: 20px;
            text-align: center;
        }

        @media screen and (max-width: 768px) {
            .container {
                max-width: 90%;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <a href="Profile.php" class="back-link">Back</a>
    <h2>Change Address</h2>
    <form action="update_address.php? ID=<?php echo $userId ?>" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo $row['username'] ?>" disabled>
        
        <label for="new_address">Address:</label>
        <input type="text" id="new_address" name="new_address" value="<?php echo $row['address'] ?>" required>

        <label for="new_pincode">Pincode:</label>
        <input type="text" id="new_pincode" name="new_pincode" value="<?php echo $row['pincode'] ?>" required>

        <label for="new_city">City:</label>
        <input type="text" id="new_city" name="new_city" value="<?php echo $row['city'] ?>" required>

        <label for="new_mobile_no">Phone Number:</label>
        <input type="text" id="new_mobile_no" name="new_mobile_no" value="<?php echo $row['mobile_no'] ?>" required>

        <input type="submit" value="Update Address"> 
    </form>
</div>

</body>
</html>
