<?php 

session_start();
ini_set('display_errors','Off');

$userId = $_SESSION['user_id'];

if($userId === null){
    echo "Please Login ";
}


include 'C:\xampp\htdocs\TreatTap\Connection\Connection.php';


$sql = "SELECT * FROM product_info ";
$result= $conn->query($sql);
$row_count = mysqli_num_rows($result);

if(isset($_POST['add_to_cart'])){

    if($userId === null){

        header('Location: ..\SignIn\SignIn.php');
    exit();

    }else{   

    $product_id = $_POST['product_id'];

    $cart_check_sql=  "SELECT * from cart where  product_id = '$product_id' AND user_id = '$userId'";
    $cart_check_result = $conn->query($cart_check_sql);
    
    if($cart_check_result->num_rows>0){
        echo "product already in cart";
    }else{
        $product_info_sql= "SELECT *  FROM product_info WHERE ID= '$product_id' ";
        $product_info_result= $conn->query($product_info_sql);
        
        
        if($product_info_result->num_rows>0){
            $product_info= $product_info_result->fetch_assoc();
            $insert_cart_sql = "INSERT INTO cart (user_id,product_id,product_name,product_image,product_price,quantity)      
                 VALUES (
                    '$userId',
                    '$product_id',
                    '". $product_info['product_name'] ."',
                    '". $product_info['image_url'] ."',
                    '". $product_info['price'] ."',
                        1
                    )"  ;

                  if($conn->query($insert_cart_sql)===TRUE){
                    echo " product added succesfully in cart";
                  }  else{
                    echo "error adding product add to cart". $conn->error;
                  }
        }else{
            echo "Product Not Found in database";
        }
    }   
} 

}




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
        <a href="../Index.php">Back</a>
        <h1>Product Page</h1>
        <div class="cart-icon">
            <a href="Product.php">
        <img src="Images/shopping-cart.png" alt="Shopping Cart"></a>
        <span class="cart-count">0</span>
        <a href="Cart Page\cart.php">Cart</a>
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
                   <form action="" method="post" >
                   <input type="hidden" name="product_id" value="<?php echo $row["Id"]; ?>">
                    <input type="submit" value="Add to cart" name="add_to_cart" >
                   </form>
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
