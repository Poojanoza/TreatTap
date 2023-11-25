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


$sql = "SELECT * FROM product_info ";
$result= $conn->query($sql);
$row_count = mysqli_num_rows($result);

?>










<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Product.css">
    <title>Product Page</title>
    <style>
        #searchInput {
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ddd;
    border-radius: 5px;
}
.search-container {
    text-align: center;
    margin: 20px 0;
}

#searchInput:focus {
    outline: none;
    border-color: #007BFF;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #333;
    color: #fff;
    padding: 1em 2em;
}

.cart-icon {
    position: relative;
    cursor: pointer;
    padding: 30px;
}

.cart-icon img {
    width: 30px; /* Adjust the width of the cart icon */
    height: 30px;
}

.cart-count {
    position: absolute;
    top: 0;
    right: 0;
    background-color: #007BFF;
    color: #fff;
    border-radius: 50%;
    padding: 5px 8px;
    font-size: 14px;
}
    </style>
</head>
<body>
    <header>
        <h1>Product Page</h1>
        <div class="cart-icon">
            <a href="Product.php">
        <img src="Images/shopping-cart.png" alt="Shopping Cart"></a>
        <span class="cart-count">0</span>
    </div>
    </header>

    <main>
    <div class="search-container">
            <input type="text" id="searchInput" placeholder="Search products...">
            <button onclick="searchProducts()">Search</button>
        </div>
        <section class="product-container">
            <?php 
        if($result->num_rows > 0){  
        
            while($row = $result->fetch_assoc()){
               ?>   <div class="product">
               <img src="../Admin/Images/<?php echo $row["image_url"];?>">
               <div class="product-details">
                   <h2><?php echo $row["product_name"];?></h2>
                   <p>  Price :<?php echo $row["price"];?></p>
                   <p class="price"><?php echo $row["description"];?></p>
                   <button>Add to Cart</button>
               </div>
           </div>
            <?php
            }   
        } else{
            echo "Not Found User";
        }
        
        ?>

        </section>
    </main>

    <script>
        function searchProducts() {
            var input, filter, products, product, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            products = document.getElementsByClassName("product");

            for (i = 0; i < products.length; i++) {
                product = products[i].getElementsByClassName("product-details")[0];
                txtValue = product.textContent || product.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    products[i].style.display = "";
                } else {
                    products[i].style.display = "none";
                }
            }
        }
    </script>
    <footer>
        <p>&copy; 2023 TreapTap Sweet Store E-Commerce website</p>
    </footer>
</body>
</html>
