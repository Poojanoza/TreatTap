<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="Admin.css">
</head>
<body>
    <header class="admin-header">
        <h1>Welcome, Admin</h1>
        <a href="logout.php">Logout</a>
    </header>

    <?php 
    $name = $_POST['name'];
    $number = $_POST['mobile'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $c_password = $_POST['confirm_password'];

//   echo "Name :".$name."<br>Mobile Number".$number."<br>Email Id"."<br>Password".$password."<br>Confirm password";


echo "heloo";
?>

    <nav class="admin-nav">
        <ul>
            <li><a href="users.php">Users</a></li>
            <li><a href="products.html">Products</a></li>
        </ul>
    </nav>

</body>
</html>
