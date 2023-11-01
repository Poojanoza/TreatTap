<?php 
$servername ="localhost";
$username = "root";
$password = "";
$database = "userdata";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) { 
    die("". $conn->connect_error);
}else{
    echo "connection succesfully";}

    // if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $address = $_POST['address'];
    $number = $_POST['mobile'];
    $email = $_POST['email'];
    $password = $_POST['password'];

//   echo "Name :".$name."<br>Mobile Number".$number."<br>Email Id"."<br>Password".$password."<br>Confirm password";

    $sql = "INSERT INTO userdatas (name,mobileno,address,email,password) VALUES('$name','$address','$number','$email','$password')";

    $countdata = "SELECT name,mobileno,address,email,password FROM userdatas";
    $result = $conn->query($countdata);
  if(mysqli_query($conn, $sql)){
    echo "<script>alert('new added')</script>";
    }
else{
    echo "Not Added in database";
}

    // }
    
  

?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link rel="stylesheet" href="users.css">
</head>
<body>
    <h3> <a href="Admin.php">Back</a> </h3>
    <header class="admin-header">
        <h1>User Management</h1>
        <a href="logout.php">Logout</a>
    </header>

    <nav class="admin-nav">
        <!-- Navigation links here -->
    </nav>

    <main class="admin-content">
        <h2>User List</h2>
        <table class="user-table">
            <thead>
                <tr>
                <th>User Name</th>    
                    <th>Email</th>
                    <th>Password</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>

            <?php 
                for($i = 0; $i < $result->num_rows; $i++){
                    $row=mysqli_fetch_array($result);
                
                echo"<tbody>
                <tr>
                    <td>". $row['name'] ."</td>
                    <td>". $row['email'] ."</td>
                    <td>". $row['password'] ."</td>


                    <td>"?> <button id="Edit_button" style="background-color: red;">Edit</button>
                    <?php echo"</td>
                    <td>"?><button id="delete_button" >Delete</button><?php echo"</td></td>

                </tr>
            </tbody>";
            }
            
            ?>
        </table>
    </main>
</body>
</html>

<?php 




?>