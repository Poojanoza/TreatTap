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

$sql = "SELECT * FROM user_info WHERE id=$userId";
$result= $conn->query($sql);
$row = $result->fetch_assoc() ;

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
#back_button a{
  text-decoration: none;
  color: black;
}
.order_table{
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  background-color: aquamarine;
  padding: 50px;
}
td{
  padding: 20px;
  gap: 20px;
}
table{
  border: 1px solid black;
  padding: 20px;

}
</style>
</head>
<body>
  <h1 id="back_button" >
  <a href="../Index.php">Back</a></h1>
  <center>
<h1>Profile</h1></center>
<div class="container">
  <div class="profile">
    <img src="—Pngtree—avatar icon profile icon member_5247852.png" alt="Profile Picture">
    <h1> <?php echo $row['username']?> </h1>
    <p>ID: <?php echo $row['id']?></p>
    <p>Address: <?php echo $row['address']?></p>
    <p>Pincode: <?php echo $row['pincode']?></p>
    <p>Email: <?php echo $row['email']?></p>
    <p>Mobile No: <?php echo $row['mobile_no']?></p>
    <p>State: <?php echo $row['state']?></p>
    <p>City: <?php echo $row['city']?></p>
    <a href="change_address.php" class="btn">Edit Profile</a>
  </div>
</div>

<div class="order_table" >
  <h1>Ordered Products history</h1>

  <table>
    <tr>
    <td>Product Image:</td>
    <td>Product Name:</td>
    <td>Price</td>
    <td>Quntatiy</td>
    <td>Total Price</td>
    <td>order Date</td>
    <td>Payment Method</td>
    <!-- <td>Cancel Button</td> -->
    </tr>
    
    <?php
            $total_order = 0;
            $sql = "SELECT * FROM order_info";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $order_id = $row['order_id'];

                    // Fetch product order info
                    $sql_product = "SELECT * FROM product_order_info WHERE order_id = '$order_id' AND user_id='$userId'";
                    $result_product = $conn->query($sql_product);

                    // Fetch user info
                    // $user_id = $row['user_id'];
                    $sql_user = "SELECT * FROM user_info WHERE id = '$userId'";
                    $result_user = $conn->query($sql_user);
                    $row_user = $result_user->fetch_assoc();

                    if ($result_user->num_rows > 0) {
                        while ($row_product = $result_product->fetch_assoc()) { 
                          $product_id= $row_product['product_id'];

                          $product_image = "SELECT * FROM product_info WHERE id=$product_id";
                          $result_p=$conn->query($product_image);
                          $row_product_image= $result_p->fetch_assoc();
                          // echo $row_product_image['image_url'];
                          // echo $product_image_url;
            ?>
                            <tr class="_tr">
                                <!-- <td class="_th"><?php echo $row['order_id'] ?></td> -->
                                <!-- <td class="_th"><?php echo $row_user['username'] ?></td> -->

                                <td class="_th">
                                <img src="../Admin/Images/<?php echo $row_product_image['image_url']; ?>" width="120px" >
                                  </td>
                                  <td class="_th" >
                                <?php echo $row_product['product_name'] ?></td>
                                <td class="_th"><?php echo $row_product['product_total_price'] ?></td>
                                <td class="_th"><?php echo $row_product['product_quntatiy'] ?></td>

                                <td class="_th"><?php echo $row_product['product_total_price'] ?></td>
                                <td class="_th"><?php echo $row_product['order_date'] ?></td> 
                                <td class="_th"><?php echo $row['payment_method'] ?></td>
                                <!-- <td class="_th"><button class="cancel-btn" data-order-id="<?php echo $order_id; ?>">Cancel</button></td> -->
                            </tr>
            <?php
                        }
                    }
                    $total_order++;
                }
            }
            // echo "TOTAL ORDER: " . $total_order;
            ?>



  </table>
</div>
<script src="jquery-3.7.1.min.js"></script>
<script>
  $(document).ready(function() {
    // Add event listener to "Cancel" button
    $('.cancel-btn').click(function() {
        // Get the order ID from the data attribute
        var orderId = $(this).data('order-id');
        
        // Send AJAX request to delete_order.php script
        $.ajax({
            url: 'cancel_order.php',
            type: 'POST',
            data: { orderId: orderId },
            success: function(response) {
                // Reload the page or update the table as needed
                location.reload(); // Reload the page to reflect changes
            },
            error: function(xhr, status, error) {
                // Handle errors
                console.error(xhr.responseText);
            }
        });
    });
});
</script>
</body>
</html>
<?php }
}?>