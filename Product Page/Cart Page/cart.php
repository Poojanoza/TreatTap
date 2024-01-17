<?php 
include 'C:\xampp\htdocs\TreapTap\Connection\Connection.php';

$sql = "SELECT * FROM cart ";
$result= $conn->query($sql);
$row_count = mysqli_num_rows($result);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cart.css">
    <title>Shopping Cart</title>
    <style>
        #Quantity{
            width: 40px;
        }
        input{
            width: 40px;
        }
    </style>
</head>
<body>

<header>
    <a href="http://localhost/TreapTap/Product%20Page/Product.php">Back</a>
        Your Cart
    </header>







    <?php 
    if($result->num_rows>0){
    
        while($row= $result->fetch_assoc()){
    ?>

    <div class="cart-container">
        <div class="cart-item">
            <img src="http://localhost/TreapTap/Admin/Images/<?php echo $row["product_image"];?>">
            <div class="cart-item-details">
                <div class="cart-item-title">
                    <?php echo $row["product_name"];?>
                </div>

                <div class="cart-item-title" id="productprice" >
                    Price: <?php echo $row["product_price"];?></div>
                
                <div class="cart-item-title">
                    <button class="decrease" onclick="dec(<?php echo $row['product_id']; ?>)">-</button>
                    <div class="quantity" id="NumberOfProduct<?php echo $row['product_id']; ?>"><?php echo $row['quantity']; ?></div>
                    <button class="increase" onclick="inc(<?php echo $row['product_id']; ?>)">+</button>
                    <span id="total">10.00</span>

                </div>
                </div>
            </div>
            <a href="cart.php" class="remove" id="removeButton<?php echo $row['product_id']; ?>" onclick="removeItem(<?php echo $row['product_id']; ?>)">Remove</a>
        </div>
    </div>

        <?php 
        }
    }else{
        echo " not found product";
    }
        ?>

        <br><br>
       <center>
        <a href="Checkout Page/checkout.php">Proceed to Checkout</a> 
        </center>
    </div>

    <script>

        
function inc(product_id){
    var see_value = document.getElementById('NumberOfProduct'+product_id);
    var current_value =parseInt(see_value.textContent);

    var new_value=current_value+1;

    see_value.textContent=new_value;

    updateQuantity(product_id);
    Multi(product_id);
}

function dec(product_id){
    var see_value = document.getElementById('NumberOfProduct'+product_id);
    var current_value =parseInt(see_value.textContent);

    if(current_value > 1){
        var new_value=current_value-1;
        see_value.textContent=new_value;
        updateQuantity(product_id);
        Multi(product_id);
    }
    
}

function Multi(product_id){

    var quantity =parseInt(document.getElementById('NumberOfProduct'+product_id.value));
    var price =parseInt(document.getElementById('productprice'));

    var total =quantity*price;
    document.getElementById('total').innerText = total.toFixed(2);



    see_value.innerText =total_value;
    // multi_product_price(product_id);
}

// function multi_product_price(product_id){

// }

function updateQuantity(productId) {
    var quantityElement = document.getElementById('NumberOfProduct' + productId);

    var currentQuantity = parseInt(quantityElement.textContent);
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            
            console.log(xhr.responseText);
        }
    };

    xhr.open('POST', 'update_quantity.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send('product_id=' + productId + '&new_quantity=' + currentQuantity);

}

function removeItem(productId) {
        
        event.preventDefault();

        var confirmation = confirm('Are you sure you want to remove this item?');

        if (confirmation) {
            
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Handle the response if needed
                    console.log(xhr.responseText);
                }
                window.location.reload();
            };

            xhr.open('POST', 'remove_item.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.send('product_id=' + productId);

        }
    }

    </script>
</body>
</html>
