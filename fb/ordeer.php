<?php
session_start();
$itemid=$_SESSION["id"]
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet"  href="admstyle.css">
    <title> Order</title>

</head>
<body>
<div class="navbar">
    <a  href="index.html"><i class="fa fa-fw fa-home"></i> Home</a>
    <a href="try.php"><i class="fa fa-fw fa-search"></i> Shop</a>
    <a href="ordeer.php"class="active"><i class="fa fa-fw fa-envelope"></i> Order</a>
    <a href="login.php" ><i class="fa fa-fw fa-login"></i> login </a>
</div>
<div class="box1" style="margin-top:10rem">
<table style="margin-top: 2rem">
    <tr>
        <td> <label >user name</label></td>
        <td><input type="text" id="uname" name="uname"></td>
    </tr>
    <tr>
        <td><label >user email</label></td>
        <td><input type="email" id="umail" name="umail" ></td>
    </tr>
    <tr>
        <td> <label> password</label></td>
        <td><input type="password" id="pas" name="pas"></td>
    </tr>
    <tr>
        <td> <label >bank number</label></td>
        <td><input type="text" id="des" name="des"></td>
    </tr>
    <tr>
        <td> <label >address</label></td>
        <td><input type="text" id="des" name="des"></td>
    </tr>

<style>
   table{
        margin-left: 1rem;
    }
</style>
</table>
    <h5 class="text-center" style="margin-left:7rem">Cart Items</h5>
    <table class="table table-bordered" id="myCart" >
        <thead>
        <th>SN</th>
        <th>product</th>
        <th>quntity</th>
        <th>price</th>
        </thead>
        <tr>
            <?php

                $sql="SELECT * FROM item";
                $con=mysqli_connect('localhost','root','','furnituire');
                $qurey=mysqli_query($con,$sql);
                while($row=mysqli_fetch_assoc($qurey)){
                        if($row['item_id']==$itemid)
                        {
                            ?>

                            <td><?php echo $itemid ?></td>
                            <td><?php echo$row['name']?></td>
                            <td><?php echo$row['quantity']?></td>
                            <td><?php echo$row['price']?></td>

                            <?php
                        }






            }
            ?>
        </tr>


    </table>

    <button style="margin-left: 9rem"><a href="level2.php" >Bill</button>
</div>

</body>
</html>

