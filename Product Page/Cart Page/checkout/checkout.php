<?php
include 'C:\xampp\htdocs\TreatTap\Connection\Connection.php';
session_start();
$userId = $_SESSION['user_id'];
$sql = "SELECT * FROM user_info WHERE id=$userId ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$sql2 = "SELECT * FROM cart WHERE  user_id= '$userId' ";
$result2 = $conn->query($sql2);
$row_count = mysqli_num_rows($result2);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout Page</title>
  <style>
    * {
      font-family: 'Times New Roman', Times, serif;
    }

    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f8f9fa;
    }

    .container {
      max-width: 600px;
      margin: 50px auto;
      padding: 30px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      animation: fadeIn 1s ease;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
      }

      to {
        opacity: 1;
      }
    }

    #change_address_button {
      padding: 10px 20px;
      justify-content: center;
      background-color: green;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: transform 0.2s, background-color 0.2s;
    }

    #change_address_button:hover {
      transform: scale(1.05);
      background-color: #0056b3;
    }

    #address_div {
      background-color: grey;
      padding: 20px;
    }
  </style>
</head>

<body>
  <div class="container">
    <center>
      <h2>Checkout</h2>
    </center>
    <form action="#" method="post" id="checkout-form">

      <div id="address_div">
        <h3>Shipping Info
          <button id="change_address_button"> <a href="change_address.php"> Change The Address</a></button>
        </h3>
        <h5>Order Date:
          <?php echo date("l jS \of F Y ") . "<br>"; ?>
        </h5>
        <h5>Customer Name:
          <?php echo $row['username'] ?>
        </h5>
        <h5>Address:
          <?php echo $row['address'] ?>
        </h5>
        <h5>Email Id:
          <?php echo $row['email'] ?>
        </h5>
        <h5>Mobile Number:
          <?php echo $row['mobile_no'] ?>
        </h5>
        <h5>state:
          <?php echo $row['state'] ?>
        </h5>
        <h5>Pincode:
          <?php echo $row['pincode'] ?>
        </h5>
      </div>

      <div id="product_info">

        <table>
          <thead>
            <tr>
              <th>Product Image</th>
              <th>Name</th>
              <th>Quantity</th>
              <th>Price</th>
              <th>Total Price</th>
            </tr>
          </thead>
          <tbody>
          <?php
        if ($result2->num_rows > 0) {
            while ($row = $result2->fetch_assoc()) {
              $total_price = $row["product_price"] * $row["quantity"];
        
        ?>
          <thead>

        <th>
      <img src="http://localhost/TreatTap/Admin/Images/<?php echo $row["product_image"]; ?>" alt="<?php echo $row["product_name"]; ?>" width="80px" >
      </th>
      <th><?php echo $row["product_name"]; ?></th>
      <th> <?php echo $row["quantity"];?> </th>
      <th> <?php echo $row["product_price"] ?> </th>
      <th> <?php echo $row["total_price"] ?> </th>

            </thead>





<?php } }?>
          </tbody>
        </table>

      </div>


      <a href="payment.php">Process For Payment</a>
    </form>
  </div>

</body>

</html>