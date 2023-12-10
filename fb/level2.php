
<?php
?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta http-equiv="x-ua-compatible" content="IE=edge">
<meta name ="viewport " content="width=device-width,initial-scale=1.0">
<TITLE>My Furniture </TITLE>
<!--<script type="text/javascript" src="image/ad1.jpg"></script>-->
<style>
    .table-dark {
        background: rgba(3,6,37,0.94);
        color: #dddddd;
    }
    .table-bordered{
        color: #141B96;
    }
    button{
        padding: 15px 40px;
        border: 0;
        outline: none;
        border-radius: 25px;
        background: #333;
        color: #fff;
        font-size: 14px;
        cursor: pointer;
        box-shadow: 0 10px 10px rgba(0,0,0,0.2);

    }

</style>
<body style="background: rgba(213,247,249,0.94)">

<div> <button><a style="color: #dddddd" href="index.html">Logout </a> </button></div>

<div class="container">
    <div class="jumbotron">
        <h2 style="margin-left: 30rem;">Bill</h2>
        <hr>


        <?php
        $connection = mysqli_connect('localhost','root','');
        $db=mysqli_select_db($connection,'furnituire');

        $query = "SELECT * FROM item";
        $query = "SELECT * FROM date ";
        $query = "SELECT * FROM bank ";

        $query_run = mysqli_query($connection,$query);
        ?>
        <table class="table table-bordered" style="background-color: white;">
            <thead class="table-dark">
            <tr>
                <th>Item-ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Offer-Price</th>
                <th>Type</th>
                <th>Quantity</th>
                <th>Account Number</th>
                <th>User Email</th>
                <th>Order Date</th>
                <th>Delivery Date</th>
            </tr>
            </thead>


            <?php
            if($query_run)
            {
                while($row = mysqli_fetch_array($query_run))
                {
                    ?>
                    <tbody>
                    <tr>
                        <th> <?php echo $row['item_id']; ?> </th>
                        <th> <?php echo $row['name']; ?> </th>
                        <th> <?php echo $row['price']; ?></th>
                        <th> <?php echo $row['description']; ?></th>
                        <th> <?php echo $row['offer_price']; ?></th>
                        <th> <?php echo $row['type']; ?></th>
                        <th> <?php echo $row['quantity']; ?></th>
                        <th> <?php echo $row['account-number']; ?></th>
                        <th> <?php echo $row['ue_mail']; ?></th>
                        <th> <?php echo $row['order_date']; ?></th>
                        <th> <?php echo $row['delivery_date']; ?></th>

                    </tr>
                    </tbody>

                    <?php

                }
            }
            else
            {
                echo "No Record Found";
            }

            ?>
        </table>
    </div>
</div>


</body>

</html>
