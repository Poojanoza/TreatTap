<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Order</title>
    <style>
        *{
            font-family: 'Times New Roman', Times, serif;
            font-size: 18px;
            font-weight: lighter;
        }
        body{
            display: grid;
            justify-content: center;
        }
        #container{
            
            display: flex;
            justify-content: center;
            /* width: 1920px; */
        }
        ._th{
            padding: 20px;            
        }
        ._tr{
            border: 2px solid black ;
            border-radius: 20px;
            background-color: bisque;
            
        }
        #order_confirm_button{
            display: flex;
            justify-content: center;
            column-gap: 20px;
        }
        h1{
            font-size: 45px;
        }

        #confirm_button{
            background-color: gold;
            font-size: 20px;
            border: 2px solid black;
            border-radius: 1px;
            transition: border-radius 0.3s ease ;
        }

        #confirm_button:hover{
            border-radius: 100px;  
        }

        #cancel_button{
            background-color: red;
            color: white;
        }
        table{
            border: 2px solid black;
        }

        #header{
            display: flex;
            justify-content: start;
            column-gap: 200px;
        }

        #back_link{
            text-decoration: none;
            font-size: 40px;
            text-align: center;
        }
       
        
    </style>
</head>
<body>
    <center>
        <div id="header" >
        <a href="Admin.php" id="back_link" >Back</a>
    <h1>Customer Order Information</h1></div></center>
    <div id="container">
        <table>
            <tr class="_tr">
                <th class="_th">Order Id</th>
                <th class="_th">Customer Name</th>
                <th class="_th">Total Amount</th>
                <th class="_th">Payment Method</th>
                <th class="_th">See Info</th>
                <th class="_th">Confirm or not ?</th>
            </tr>
            <tr class="_tr">
                <th class="_th">2</th>
                <th class="_th">Jonny</th>
                <th class="_th">30000</th>
                <th class="_th">Online</th>
                <th class="_th"><button>See Order Info</button></th>
                <th class="_th"><div id="order_confirm_button" ><button id="confirm_button" >Confirm</button><button id="cancel_button" >Cancel</button></div></th>

            </tr>
            <tr class="_tr">
                <th class="_th">24</th>
                <th class="_th">Hotn</th>
                <th class="_th">30000</th>
                <th class="_th">Cash On Delivery</th>
                <th class="_th"><button>See Order Info</button></th>

                <th class="_th"><div id="order_confirm_button" ><button id="confirm_button">Confirm</button><button id="cancel_button" >Cancel</button></div></th>

            </tr>
        </table>
    </div>
</body>
</html>