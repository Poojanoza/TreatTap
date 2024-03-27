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

if($row_count <=0){
  $cart_value= false;
}else{
  $cart_value= true;
}

$total_price_all_products = 0;
if(isset($_POST['submit'])) {
  // Perform necessary actions like processing the payment
  // Redirect to a success page to prevent form resubmission
  header('Location: payment_success.php');
  exit(); // Stop further execution
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout Page</title>
  <link rel="stylesheet" href="checkout2.css">

</head>

<body>
  <div class="main_container">
    <div class="heading_container">

    <div class="h1_container" ><a href="..\cart.php">Back</a></div>
        <div class="h2_container" ><h1>Checkout</h1></div>
    </div>
    <?php 
    if(!$cart_value){
    ?>
    <h1>Sorry Not Found the Product On Cart </h1>
    <h1>Please Add Product on cart then Come have a nice shopping </h1>
    <?php 
    }else{
    ?>
    <div class="first_container">
      <div class="address_container">

        <form action="payment.php" method="post" id="checkout-form">

          <h2 id="heading" >Shipping Info
            <button id="change_address_button"> <a href="change_address.php" class="change_address_link" > Change The Address</a></button>
          </h2>
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

      <div class="product_info_container">

        <h2>ordering Products</h2>

        

      <?php
        if ($result2->num_rows > 0) {
          while ($row = $result2->fetch_assoc()) {
            $total_price = $row["product_price"] * $row["quantity"];

            ?>
                 
            <div class="products">

              <div class="product_img">

                <img src="http://localhost/TreatTap/Admin/Images/<?php echo $row["product_image"]; ?>"
                  alt="<?php echo $row["product_name"]; ?>" width="100px">

              </div>

              <div class="product_info">
                <div style="font-weight: bolder;" >
                   <?php echo $row["product_name"]; ?>
                </div>
                <div>
                Quntatiy:  <?php echo $row["quantity"]; ?>
                </div>
                <div>
                  Price: <?php echo $row["product_price"] ?>
                </div>
                <div>
                  Total Price: <?php echo $row["total_price"] ?>
                </div>

              </div>
          </div>
              <?php
              $total_price_all_products += $row["total_price"];

          }
        }




        ?> 

          
          <?php
          echo "total price: " . $total_price_all_products; ?>
        </div>
      </div>

      <br>
      <div class="payment_container">
        <h4>Which type you like Perefer to Payment ?</h4>
        <input type="radio" name="payment_mode" value="online">Online <br>
        <input type="radio" name="payment_mode" value="offline">Cash on Delivry
        <input type="hidden" name="total_amount" value="<?php
        echo $total_price_all_products; ?>">

        <br>
        <input type="submit" value="Process For Payment" name="submit">
        </form>
      </div>
    </div>
<?php 
    }
?>
</body>

</html>