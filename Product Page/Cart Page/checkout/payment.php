<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 400px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    color: #333;
}

form {
    margin-top: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
    color: #555;
}

input[type="text"],
textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

button {
    width: 100%;
    padding: 10px;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #45a049;
}
    
    </style>
</head>
<body>
    <div class="container">
        <h1>Payment Details</h1>
        <form action="process_payment.php" method="post">
            <label for="card-number">Card Number:</label>
            <input type="text" id="card-number" name="card-number" required>
            
            <label for="expiry">Expiration Date:</label>
            <input type="text" id="expiry" name="expiry" placeholder="MM/YYYY" required>
            
            <label for="cvv">CVV:</label>
            <input type="text" id="cvv" name="cvv" required>
            
            <label for="name">Name on Card:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="billing-address">Billing Address:</label>
            <textarea id="billing-address" name="billing-address" required></textarea>
            
            <button type="submit">Pay Now</button>
        </form>
    </div>
</body>
</html>
