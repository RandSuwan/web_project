<?php
session_start();
$connect=mysqli_connect('localhost','root','','furnituire');
if(isset($_POST["add_to_cart"])){
    if(isset($_SESSION['furnituire'])){
        $item_array_id=array_column($_SESSION['furnituire'],"item_id");
        if(!in_array($_GET["id"],$item_array_id)){
            $count=count($_SESSION['furnituire']);
            $item_array=array(
                'item_id' => $_GET["item_id"],
                'item_name' =>$_POST['name'],
                'price' =>$_POST["price"],
                'quantity'=>$_POST["quantity"]);
            $_SESSION["furnituire"][$count]=$item_array;

            }
        else{
            echo '<script> alert("item alresdy added")</script>';
            echo  '<script> window.location="livp1.php"</script>';
        }

    }
    else{
        $item_array =array(

            'item_id' => $_GET["item_id"],
            'item_name' =>$_POST['name'],
            'price' =>$_POST["price"],
            'quantity'=>$_POST["quantity"]);
        $_SESSION["furnituire"][0]=$item_array;
    }

}
if(isset($_GET["action"]))
{
    if($_GET["action"]=="deleted"){
        foreach ($_SESSION["furnituire"]as $keys=>$value)
        {
            if($value["item_id"]==$_GET["item_id"]){
                unset($_SESSION['furnituire'] [ $keys ]);
                echo '<script>alert("Item removed successfully")</script>';
                echo  '<script>window.location="livp1.php"</script>';
            }
        }
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--    <link rel="stylesheet"  href=".css">-->
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>cart</title>
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;1,200;1,600&display=swap');
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            scroll-behavior: smooth;
            scroll-padding-top: 2rem;
            list-style: none;
            text-decoration: none;
            font-family: 'Poppins', sans-serif;
        }
        body{
            background-color: rgba(213,247,249,0.94);
        }
        .product-detail{
            margin-bottom: 5px;
            background-color: rgba(3,6,37,0.94);
border-radius: 2rem;
            padding: 10px;

        }
        .other-detail{
            text-align: center;
            background-color: #cccccc;
            border-radius: 1rem;

        }
        .price{
            font-weight: 600;
            font-size: 20px;
            color: #dddddd;
        }
        .product-img{
            height: 200px;
            object-fit: cover;
            width: 100%;

        }
        .price-style{
            background-color: rgba(3,6,37,0.94);
        }
        .btn-style{
            margin-bottom: 10px;
        }
        @media screen and (max-width: 500px) {
            .navbar a {
                float: none;
                display: block;
            }
        }

        .navbar {
            width: 100%;
            background-color: #555;
            overflow: hidden;
            position: fixed;
            top:0;
            opacity: 0.9;
        }

        .navbar a {
            float: left;
            display: block;
            padding: 14px 16px;
            color: white;
            text-decoration: none;
            font-size: 17px;
        }

        .navbar a:hover {
            background: #ddd;
            color: black;
        }

        .active {
            background-color: #030855;
        }



        topnav {
            overflow: hidden;
            background-color: #333;
        }

        .topnav a {
            float: left;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }

        nav{
            float: right;
            width: 100%;
            padding: 40px 0;
            display: flex;
            align-items: center;
        }

        nav ul{
            margin: 0;
            padding: 0;
            list-style: none;
        }
        nav li{
            display: inline-block;
            margin-left: 70px ;
            padding-top: 25px;
        }
    </style>
</head>
<body>

<div class="navbar">
    <a  href="index.html"><i class="fa fa-fw fa-home"></i> Home</a>
    <a href="livp1.php" class="active"><i class="fa fa-fw fa-search"></i> Shop</a>
    <a href="ordeer.php"><i class="fa fa-fw fa-envelope"></i> Order</a>
    <a href="login.php"><i class="fa fa-fw fa-login"></i> login </a>
</div>
<br><br><br>
<h1 class="text-center">shopping cart</h1>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <?php
                $con=mysqli_connect('localhost','root','','furnituire');
               $sql="SELECT * FROM item";
               $qurey=mysqli_query($con,$sql);
               while($row=mysqli_fetch_assoc($qurey)){?>
                <div class="col-md-6">
                    <div class="product-detail">
                        <div class="img-thumbnail">
                            <img  class="product-img" src="<?=$row['image']?>">
                        </div>
                        <div class="other-detail">
                            <h4><?=$row['name']?></h4>
                            <div class="price-style">
                            <p class="price"> $<?=$row['price']?></p>

                                <button class="btn btn-warning btn-style" onclick="Display()">Add to Cart </button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
<!--        --><?php
//        $sql="SELECT * FORM item";
//        $result=mysqli_query($con,$sql);
//        $datas=array();
//        $datas_array=array();
//        if(!empty(mysqli_num_rows($result))){
//            while ($row=mysqli_fetch_assoc($result)){
//                $datas[]=$row;
//                $datas_array[]=$datas;
//            }
//            print_r($datas_array);
//        }
//        ?>


        <div class="col-md-6">

        <h5 class="text-center">Cart Items</h5>
            <table class="table table-bordered" id="myCart" >
                <thead>
                <th>SN</th>
                <th>product</th>
                <th>quntity</th>
                <th>price</th>

                </thead>
                <?php
                $con=mysqli_connect('localhost','root','','furnituire');
                $sql="SELECT * FROM item";
                $qurey=mysqli_query($con,$sql);
                while($row=mysqli_fetch_assoc($qurey)){

                }?>
                ?>
                <tr>
                    <td>1
                    </td>
                    <td>item1</td>
                    <td>1</td>
                    <td>$2000</td>

                </tr>

            </table>

<!---->
<!--<table class="table table-bordered" id="myCart"  style="visibility: hidden">-->
<!--    <thead>-->
<!--    <th>SN</th>-->
<!--    <th>product</th>-->
<!--    <th>price</th>-->
<!--    <th>Options</th>-->
<!--    </thead>-->
<!--    <tbody>-->
<!--    -->
<!--            --><?php
//            $index=0;
//            $i=1;
// foreach ($_SESSION['furnitire']as $keys=>$val){
//       $totalprice=$val['quantity'] * $val['price'];
//        $Total=$Total+ $totalprice; ?>
<!-- <tr>-->
<!--       <td>   --><?//=$i?><!--</td>-->
<!--       <td> --><?//=$val['name']?><!--</td>-->
<!--       <td>  --><?//=$val['quantity']?><!--</td>-->
<!--        <td>  --><?//$totalprice?><!--</td>-->
<!--        <td> <a href="actions.php?action_type=remove_item&index=-->--><?//=$keys?><!--<!--">Remove</td>-->-->
<!--    </tr>-->
<?php //}
//   ?>
    <tr>
       <td></td>
        <td></td>
        <td>Total</td>
        <td>
            <?=$Total?>
        </td>
        <td></td>

    </tr>
   </tbody>

</table>
<!-- --><?php //}?>
            <br>
           <a href="ordeer.php"  style="
   padding: 15px 40px;
    border: 0;
    outline: none;
   border-radius: 25px;
    background: #333;
    color: #fff;
  font-size: 14px;
   cursor: pointer;
   box-shadow: 0 10px 10px rgba(0,0,0,0.2);
margin-left:18rem">Order it</a>
        </div>
<!--        --><?php //}?>

    </div>

</div>


<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script> let array;
    function Display()
    {

            document.getElementById("myCart").style.visibility="visible";
    }
</script>

</body>
</html>
