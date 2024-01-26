<?php 
include 'C:\xampp\htdocs\TreatTap\Connection\Connection.php';

$sql = "SELECT * FROM cart ";
$result = $conn->query($sql);
$row_count = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shopping Cart</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
    }

    header {
      background-color: #333;
      color: #fff;
      padding: 1em;
      text-align: center;
    }

    .cart-container {
      max-width: 600px;
      margin: 20px auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .cart-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px;
      border-bottom: 1px solid #ccc;
    }

    .cart-item img {
      max-width: 80px;
      max-height: 80px;
      margin-right: 10px;
    }

    .cart-item button {
      background-color: #e44d26;
      color: #fff;
      border: none;
      padding: 5px 10px;
      cursor: pointer;
    }

    .quantity {
      display: flex;
      align-items: center;
    }

    .quantity button {
      background-color: #333;
      color: #fff;
      border: none;
      padding: 5px 8px;
      cursor: pointer;
    }

    #checkout-btn {
      background-color: #4CAF50;
      color: #fff;
      border: none;
      padding: 10px 20px;
      cursor: pointer;
      margin-top: 20px;
      font-size: 16px;
      border-radius: 4px;
    }
  </style>
  <script src="jquery.js"></script>
</head>
<body>
  <header>
    <h1>Shopping Cart</h1>
  </header>
  
  <div class="cart-container">
  <div id="cart-message"></div>

    
  <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
    <div class="cart-item">
      <img src="http://localhost/TreatTap/Admin/Images/<?php echo $row["product_image"]; ?>" alt="<?php echo $row["product_name"]; ?>">
      <span><?php echo $row["product_name"]; ?></span>
      <span class="product-price<?php echo $row['product_id']; ?>" id="pp" ><?php echo $row["product_price"]; ?></span>
      <div class="quantity">
        <button onclick="decrementQuantity(<?php echo $row['product_id']; ?>)">-</button>
        <span id="quantity<?php echo $row['product_id']; ?>"><?php echo $row['quantity']; ?></span>
        <button onclick="incrementQuantity(<?php echo $row['product_id']; ?>)">+</button>
      </div>
      <span class="total-price<?php echo $row['product_id']; ?>"  ><?php 
       $row['total_price']=$row['product_price'] ;
      echo $row['total_price'] ?></span>
      <a href='removeCart.php? ID= <?php echo $row["id"] ?> '  >Remove</a>
    </div>
   
    <!-- Add more items as needed -->
    <?php
            }
        } else {
            echo "No products found in the cart.";
        }
        ?>

    <div id="total">Total: $0.00</div>
    <button id="checkout-btn" onclick="checkout()">Checkout</button>
    
  </div>

  <script>
    
    function incrementQuantity(id) {
      const quantityElement = document.getElementById(`quantity`+id);
      const totalElement = document.querySelector(`.total-price`+id);
      const currentQuantity = parseInt(quantityElement.textContent);
      const price = document.querySelector(`.product-price`+id);
      const currentprice=parseInt(price.textContent)
      quantityElement.textContent = currentQuantity + 1;
      totalElement.textContent = (currentprice* (currentQuantity + 1)).toFixed(2);
      console.log("Product Price is:  "+currentprice)
      console.log("this is incress successfully Total: "+totalElement.textContent)
      const new_curre_quntatiy = parseInt(quantityElement.textContent)
      updateTotal();
      const new_total_price =totalElement.textContent;
      console.log("heeeeee"+new_total_price)
      updateCart(id,new_curre_quntatiy,new_total_price);

    }

    function decrementQuantity(id) {
      const quantityElement = document.getElementById(`quantity`+id);
      const totalElement = document.querySelector(`.total-price`+id);
      const currentQuantity = parseInt(quantityElement.textContent);

      if (currentQuantity > 1) {
        const price = document.querySelector(`.product-price`+id);
        const currentprice=parseInt(price.textContent)
        quantityElement.textContent = currentQuantity - 1;
        const new_curre_quntatiy = parseInt(quantityElement.textContent);
      totalElement.textContent = (currentprice* (currentQuantity - 1)).toFixed(2);
        
        updateTotal();
        const new_total_price =totalElement.textContent;
        console.log("Total Price of Descress for UpdateCart Funcation: "+new_total_price)
        updateCart(id,new_curre_quntatiy,new_total_price);

        console.log("Product Id is:"+id+" Product Quantity: "+new_curre_quntatiy+" Product Total Price: "+new_total_price)
      }
    }

    function removeItem(id) {
      const item = document.querySelector(`.cart-item[data-id="${id}"]`);
      item.remove();
      updateTotal();
    }

    function updateTotal() {
        const items = document.querySelectorAll('[id^="pp"]');
        let total = 0;

        items.forEach(item => {
            const priceElement = item;
            const price = parseFloat(priceElement.textContent);
            const quantity = parseInt(item.nextElementSibling.querySelector('.quantity span').textContent); // Updated selector
            total += price * quantity;
        });

        console.log("total"+total);
        document.getElementById('total').textContent = `$${total.toFixed(2)}`;
    }

    function updateCart(product_id,quantity,total_price){
      console.log("this updateCart id: "+product_id+"quantity: "+quantity)
      $.ajax({
        type: "POST",
        url: "updateCart.php",
        data: {
          product_id:product_id,
          quantity:quantity,
          total_price:total_price,
        },
        success:function(resoponse){
          if (response === "Cart updated successfully!") {
            $("#cart-message").text("Cart updated successfully!");
            } else {
                $("#cart-message").text("Error: " + response);
            }
        },
        error: function(error) {
            // Handle errors, if any
            console.error("Error:", error);
        }
      })
    }
    // function checkout() {
    //   // Add your checkout logic here
    //   alert("Checkout clicked. Add your checkout logic here.");
    // }
  </script>

</body>
</html>
