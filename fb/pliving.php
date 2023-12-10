<?php
session_start();
$database_name="furnituire";
$con=mysqli_connect("localhost","root",'',$database_name);
if(isset($_POST["add"])) {
    if (isset($_SESSION["cart"])) {
        $item_array_id = array_column($_SESSION["cart"], "product_id");
        if (!in_array($_GET["id"], $item_array_id)) {
            $count = count($_SESSION["cart"]);
            $item_array = array(
                'product_id' => $_GET["id"],
                'item_name' => $_POST["hidden_name"],
                'product_price' => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"],

            );

        $_SESSION["cart"][$count] = $item_array;
        echo '<script>window.location="pliving.php"</script>';
    } else {
            echo '<script>alert("Product is already Added to cart")</script>';
            echo '<script> window.location="pliving.php"</script>';
        }
    }else {
        $item_array = array(
            'product_id' => $_GET["id"],
            'item_name' => $_POST["hidden_name"],
            'product_price' => $_POST["hidden_price"],
            'item_quantity' => $_POST["quantity"],

        );
        $_SESSION["cart"][0] = $item_array;

    }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0" >
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet"  href="slivl.css">
    <title>Living Rooms</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</head>
<style>table ,th ,tr{
        text-align: center;
    }
    .title2{
        text-align: center;
        color: #dddddd;
        background-color: #333333;
        padding: 2%;
    }
    h2{
        text-align: center;
        color: #030855;
        background-color: #dddddd;
        padding: 2%;
    }
    table th{
        background-color: #dddddd;
    }</style>
<body>
<div class="box-container">
    <h2>Shopping Cart</h2>
    <?php
    $query="SELECT * FROM item order by item_id asc";
    $result=mysqli_query($con,$query);
    if(mysqli_num_rows($result)>0){
        while ($row=mysqli_fetch_array($result)){
            ?>
        <div class="col-md-3">
            <form method="post" action="pliving.php?action=add&id=<?php echo $row["id"]?>">
                <div class="product">
                    <img src="<?php echo $row["image"]?> "class="img-responsive">
                    <h5 class="text-info"><?php $row["pname"];?></h5>
                    <h5 class="text-danger"><?php $row["price"];?></h5>
                    <input type="text" name="quantity" class="form-control" value="1">
                    <input type="hidden" name="hidden-name" value="<?php echo $row["pname"];?>">
                    <input type="hidden" name="hidden-name" value="<?php echo $row["price"];?>">
                    <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success" value="Add to Cart">

                </div>
                <?php
                }


    }

    ?>
                <div style="clear: both"></div>
                <h3 class="title2">Shopping Cart Details</h3>
                <div class="table table-bordered">
                    <tr>
                        <th width="30%">Product Name</th>
                        <th width="10%">Quantity</th>
                        <th width="13%">Price Details</th>
                        <th width="10%">Total Price</th>
                        <th width="17%">Remove Item</th>
                    </tr>
                    <?php
                    if (!empty($_SESSION["cart"])){
                        $total=0;
                        foreach ($_SESSION["cart"]as $key =>$value){
                            ?>
                    <tr>
                        <td><?php echo $value["item_name"];?></td>
                        <td><?php echo $value["item_quantity"];?></td>
                        <td>$<?php echo $value["product_price"];?></td>

                        <td>$<?php echo number_format($value["item_quantity"]*$value["product_price"],2);?></td>
                        <td> <a href="pliving.php?action=delet&id=<?php echo $value["product_id"];?>"<span class="text-danger">Remove Item </span></a> </td></tr>
                    <?php
                            $total=$total+($value["item_quantity"]*$value["product_price"]);
                    } ?>
                    <tr>
                        <td colspan="3" align="right">Total</td>
                        <th align="right">$<?php echo number_format($total,2);?></th>
                        <td></td>
                        </tr>
                    <?php
                        }

                    ?>

</div>
</body>
</html>