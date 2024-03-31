<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "userdata";

$conn = mysqli_connect($servername, $username, $password, $database);

if ($conn->connect_error) {
  die("" . $conn->connect_error);
} else {
  // echo "Congulation Poojan You Succesfully Achive Your first goal";
}


$sql = "SELECT * FROM product_info ";
$result = $conn->query($sql);
$row_count = mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Product.css">
  <title>Your Product Page</title>

  <style>
    body {
      font-family: Arial, sans-serif;
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    header {
      display: flex;
      gap: 20px;
      justify-content: space-around;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }

    th,
    td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
      text-align: center;
    }

    th {
      background-color: #f2f2f2;
    }

    .btn {
      display: inline-block;
      padding: 6px 12px;
      margin: 2px;
      text-decoration: none;
      background-color: #4CAF50;
      color: white;
      border: 1px solid #4CAF50;
      border-radius: 4px;
      cursor: pointer;
    }

    .btn-edit {
      background-color: #2196F3;
      border: 1px solid #2196F3;
    }

    .btn-remove {
      background-color: #f44336;
      border: 1px solid #f44336;
    }

    .button {
      text-decoration: none;
      border: 2px solid black;
      padding: 20px;
      font-size: 24px;
      color: black;
      font-weight: 500;
      transition: font-size 0.4s ease-in-out;
    }
    .button:hover{
      background-color: wheat;
      /* font-size: 27px; */
    }
  </style>
</head>

<body>
  <header>
    <h1> <a href="Admin.php" class="button">back</a> </h1>
    <h1>Product Management</h1>
    <h1> <a href="addproduct.php" class="button"> Add Product</a> </h1>
  </header>

  <table>
    <thead>
      <tr>
        <th>Product Id</th>
        <th>Product Image</th>
        <th>Product Name</th>
        <th>Price</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>

      <?php
      if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
          ?>
          <tr>
            <td>
              <?php echo $row["Id"]; ?>
            </td>
            <td> <img src="Images/<?php echo $row["image_url"]; ?>" alt="Product 1 Image" height="100px" width="100px">
            </td>

            <td>
              <?php echo $row["product_name"]; ?>
            </td>
            <td>
              <?php echo $row["price"]; ?>
            </td>
            <td>
              <a href='edit_product.php? ID= <?php echo $row["Id"] ?> ' class="btn btn-edit">Edit</a>
              <a href='delete_product.php? ID= <?php echo $row["Id"] ?> ' class="btn btn-remove">Delete</a>
            </td>
          </tr>
          <?php
        }
      } else {
        echo "Not Found User";
      }

      ?>
    </tbody>
  </table>
  <footer>
  </footer>
</body>

</html>