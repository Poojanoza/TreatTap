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


$sql = "SELECT * FROM user_info ";
$result= $conn->query($sql);
$row_count = mysqli_num_rows($result);

?>











<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="users.css">
    <style>
        /* Header Style Start */
        header {
            background-color: #333;
            color: white;
            padding: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        header h1 {
            margin: 0;
            padding: 0;
        }

        header nav {
            margin-left: auto;
        }

        header nav a {
            color: white;
            text-decoration: none;
            margin-right: 15px;
        }


        /* Button Style Start */

        #back_button {
            color: beige;
            text-decoration: none;
        }

        k {
            margin-left: 40px;
        }


        #usercount {
            margin-right: 40px;
            background-color: black;
            padding: 20px;
            border: 2px solid white;
            border-radius: 4px;
            color: white;
            font-size: medium;
        }

        bt{
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 10px 22px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 2px 2px;
            cursor: pointer;
            border-radius: 4px;
        }

        bt:hover{
            background-color: #45a049;
        }
        a{
            color: white;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <center>

        <header>
            <h3>
                <k><a href="Admin.php" id="back_button">
                        <-Back</a> </h3> </k> <k>
                            <h1>User Management</h1>
                </k>
                <nav>
                    <h3 id="usercount">TOTAL USERS <br> <?php echo $row_count; ?> </h3>

                </nav>
        </header>





        <!-- Table start -->







        <br><br>
        <table>
            <tr>
                <th>User ID</th>
                <th>User Name</th>
                <th>Email</th>
                <th class="button-cell">Modify</th>
            </tr>
            <tr>

                <!-- start code for show user data -->
                <?php 
        if($result->num_rows > 0){  
        
            while($row = $result->fetch_assoc()){
               ?> <tr?>
                    <td> <?php echo $row["id"];?></td>
                    <td> <?php echo $row["username"];?></td>
                    <td> <?php echo $row["email"];?></td>
                    <td>
                        <bt> <a href='edit.php? ID= <?php echo $row["id"] ?> '>Edit</a></bt>
                        <bt> <a href='delete.php? ID= <?php echo $row["id"] ?> '>Delete</a></bt>
                    </td>
            </tr>
            <?php
            }   
        } else{
            echo "Not Found User";
        }
        
     
        
        ?>


            </tr>
        </table>









</body>

</html>