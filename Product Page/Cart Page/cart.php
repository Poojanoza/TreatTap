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

  $sql = "SELECT * FROM cart WHERE  user_id= '$userId' ";
  $result = $conn->query($sql);
  $row_count = mysqli_num_rows($result);

  if($row_count <=0){
    $value = false;
    // echo "0 cart products";
  }else{
    $value=true;
    // echo "cart in products";
  }
  ?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <script src="jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="carts2.css">
  </head>

  <body>
    <div class="main_container">

      <div class="heading_container">
        <div class="h1_container">
          TreatTap
        </div>

        <div class="h2_container">
          <div class="h2_in1_container">
            <a href="..\..\index.html" hidden ></a>
            <a href="..\Product.php">Back</a>
           
            

            <!-- <a href="http://"> <img class="svg_image" src="index css/Icons/account_circle_FILL0_wght400_GRAD0_opsz24.svg"
                alt="" width="30px">
            </a> -->
            <!-- <a href="http://">Log Out</a> -->

          </div>
          <div class="h2_in2_container">

          </div>

        </div>

      </div>
      <div class="t_container">
        Cart Page
      </div>

      <div class="cart-container">
        <div id="cart-message"></div>

       



          <div class="cart-container">
            <div id="cart-message"></div>


            <?php
            if ($result->num_rows > 0) {
              ?>

<table>
          <tr>
            <th></th>
            <th>Poruduct name
            </th>
            <th>Weight</th>
            <th>Price</th>
            <th>Quantity</th>
            <th> Total Price</th>
            <th>Remove</th>
          </tr>

<?php
              while ($row = $result->fetch_assoc()) {

                $product_total_price = $row['product_price'] * $row['quantity'];

                ?>
                <tr>
                  <th>
                    <div class="cart-item">
                      <img src="http://localhost/TreatTap/Admin/Images/<?php echo $row["product_image"]; ?>"
                        alt="<?php echo $row["product_name"]; ?>" width="200px" class="image_size" >
                  </th>
                  <th>
                    <span>
                      <?php echo $row["product_name"]; ?>
                    </span>
                  </th>
                  
                  <th>
                    <span class="product-price<?php echo $row['product_id']; ?>" id="pp">
                      <?php echo $row["product_price"]; ?>
                    </span>
                  </th>
                  <th>
                    <div class="quantity">
                      <button onclick="decrementQuantity(<?php echo $row['product_id']; ?>)">-</button>
                      <span id="quantity<?php echo $row['product_id']; ?>">
                        <?php echo $row['quantity']; ?>
                      </span>
                      <button onclick="incrementQuantity(<?php echo $row['product_id']; ?>)">+</button>
                    </div>
                  </th>
                  <th>
                    <div class="cart-item">
                      <!-- Existing HTML code -->
                      <span class="total-price<?php echo $row['product_id']; ?>">
                        <?php

                        $original_price = $product_total_price;
                        $update_original_price_sql = "UPDATE cart SET total_price = '$original_price' WHERE id = '{$row['id']}'";
                        if ($conn->query($update_original_price_sql) === TRUE) { // If the update query is successful
                          // echo "Original price updated successfully for product ID: " . $row['id'];
                        } else {
                          // echo "Error updating original price: " . $conn->error; // If there's an error updating the original price
                        }
                        echo $original_price;

                        ?> <!-- Display the total price for each product -->

                      </span>
                      <!-- Existing HTML code -->
                    </div>
                  </th>
                  <th>
                    <button> <a href='removeCart.php? ID= <?php echo $row["id"] ?> ' class="delete_button" >Remove <img src="delete_FILL0_wght400_GRAD0_opsz24.svg"> </a></button>
                  </th>
              </div>
              </tr>

              <!-- Add more items as needed -->
              <?php
              $total_price = $row["product_price"] * $row["quantity"];
              $total_price = $original_price;
              }

            } else {
              echo "No products found in the cart.";
            }
            ?>

        </table>
        <div id="total" hidden ></div>
        <button id="checkout-btn" onclick="checkout()" > <a id="checkoutLink" href="checkout/checkout.php" >Checkout</a> </button>

      </div>
 
      <script>

        // Sample boolean variable obtained from PHP
        var isEnabled = <?php echo json_encode($value); ?>;
        
        // Get reference to the link element
        var checkoutLink = document.getElementById('checkoutLink');

        // Disable the link if isEnabled is false
        if (!isEnabled) {
            checkoutLink.style.pointerEvents = 'none'; // Disable click events
            checkoutLink.style.color = '#999'; // Change color to indicate disabled state (optional)
            checkoutLink.onclick = function(event) {
                event.preventDefault(); // Prevent default action
            };
        }
    
        function incrementQuantity(id) {
          const quantityElement = document.getElementById(`quantity` + id);
          const totalElement = document.querySelector(`.total-price` + id);
          const currentQuantity = parseInt(quantityElement.textContent);
          const price = document.querySelector(`.product-price` + id);
          const currentprice = parseInt(price.textContent)
          quantityElement.textContent = currentQuantity + 1;
          totalElement.textContent = (currentprice * (currentQuantity + 1)).toFixed(2);
          console.log("Product Price is:  " + currentprice)
          console.log("this is incress successfully Total: " + totalElement.textContent)
          const new_curre_quntatiy = parseInt(quantityElement.textContent)
          updateTotal();
          const new_total_price = totalElement.textContent;
          console.log("heeeeee" + new_total_price)
          updateCart(id, new_curre_quntatiy, new_total_price);

        }

        function decrementQuantity(id) {
          const quantityElement = document.getElementById(`quantity` + id);
          const totalElement = document.querySelector(`.total-price` + id);
          const currentQuantity = parseInt(quantityElement.textContent);

          if (currentQuantity > 1) {
            const price = document.querySelector(`.product-price` + id);
            const currentprice = parseInt(price.textContent)
            quantityElement.textContent = currentQuantity - 1;
            const new_curre_quntatiy = parseInt(quantityElement.textContent);
            totalElement.textContent = (currentprice * (currentQuantity - 1)).toFixed(2);

            updateTotal();
            const new_total_price = totalElement.textContent;
            console.log("Total Price of Descress for UpdateCart Funcation: " + new_total_price)
            updateCart(id, new_curre_quntatiy, new_total_price);

            console.log("Product Id is:" + id + " Product Quantity: " + new_curre_quntatiy + " Product Total Price: " + new_total_price)
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

            // Check if nextElementSibling is not null before accessing its properties
            if (item.nextElementSibling) {
              const quantitySpan = item.nextElementSibling.querySelector('.quantity span');

              // Ensure quantitySpan is not null before accessing its textContent
              if (quantitySpan) {
                const quantity = parseInt(quantitySpan.textContent);
                total += price * quantity;
              } else {
                console.error("Quantity span not found for item:", item.nextElementSibling);
              }
            } else {
              console.error("Next sibling not found for item:", item);
            }
          });


          console.log("total" + total);
          document.getElementById('total').textContent = `$${total.toFixed(2)}`;
        }

        function updateCart(product_id, quantity, total_price) {
          console.log("this updateCart id: " + product_id + "quantity: " + quantity)
          $.ajax({
            type: "POST",
            url: "updateCart.php",
            data: {
              product_id: product_id,
              quantity: quantity,
              total_price: total_price,
            },
            success: function (resoponse) {
              if (response === "Cart updated successfully!") {
                $("#cart-message").text("Cart updated successfully!");
              } else {
                $("#cart-message").text("Error: " + response);
              }
            },
            error: function (error) {
              // Handle errors, if any
              console.error("Error:", error);
            }
          })
        }

      </script>
    </div>
  </body>

  </html>
<?php } ?>