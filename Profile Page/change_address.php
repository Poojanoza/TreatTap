<?php 
include 'C:\xampp\htdocs\TreatTap\Connection\Connection.php';
session_start();

$userId = $_SESSION['user_id'];


$sql = "SELECT * FROM user_info WHERE id=$userId";
$result= $conn->query($sql);
$row = $result->fetch_assoc() ;



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Address Page</title>
    <style>
        textarea{
            height: 50px;
            
        }
    </style>
</head>
<body>

<center>
<form action="update_address.php? ID= <?php echo $userId ?>" method="post" >

    <label for="">User Name: <?php echo $row['username'] ?></label>
    
    <br><br>Address: 
    <input type="text" name="new_address" value=" <?php echo $row['address']?>"> 
    <br><br>
    Pincode:
    <input type="text" name="new_pincode" value="<?php echo $row['pincode'] ?>" >
    <br><br>
    city:
    <input type="text" name="new_city" value="<?php echo $row['city'] ?>" >
    <br><br>
    Phone Number:
    <input type="text" name="new_mobile_no" value="<?php echo $row['mobile_no'] ?>" >
    <br><br>
    <input type="submit" value="Update"> 
</form>

</center>
</body>
</html>