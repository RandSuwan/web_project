
<?php
     $connection = mysqli_connect('localhost','root','');
 $db=mysqli_select_db($connection,'furnituire');
if(isset($_POST['update'])){
    $item_id=$_POST['itemid'];
    $query = "UPDATE item SET name='$_POST[iname]',price='$_POST[price]',description='$_POST[des]',offer_price='$_POST[oprice]',
    type='$_POST[type]',quantity='$_POST[qua]',image='$_POST[img]' where item_id='$_POST[itemid]'";
    $query_run = mysqli_query($connection,$query);
    if($query_run){
        echo '<script type="text/javascript">alert("Data Updated")</script>';
    }
    else{
        echo '<script type="text/javascript">alert("Data Not Updated")</script>';
    }
}
elseif (isset($_POST['delete']))
{
    $item_id=$_POST['itemid'];
    $query = "DELETE FROM item where item_id='$_POST[itemid]'";
    $query_run = mysqli_query($connection,$query);
    if($query_run){
        echo '<script type="text/javascript">alert("Data Deleted")</script>';
    }
    else{
        echo '<script type="text/javascript">alert("Data Not Deleted")</script>';
    }

}
elseif (isset($_POST['add']))
{
    $item_id=$_POST['itemid'];
    $name=$_POST['iname'];
    $price=$_POST['price'];
    $description=$_POST['des'];
    $offer_price=$_POST['oprice'];
    $type=$_POST['type'];
    $quantity=$_POST['qua'];
    $image=$_POST['img'];
    $query= "INSERT INTO `item`(`item_id`, `name`, `price`, `description`, `offer_price`, `type`, `quantity`, `image`) VALUES (' $item_id','$name','$price','  $description','$offer_price','$type','$quantity','$image')";
    $query_run = mysqli_query($connection,$query);
    if($query_run){
        echo '<script type="text/javascript">alert("Data Added")</script>';
    }
    else{
        echo '<script type="text/javascript">alert("Data Not Added")</script>';
    }

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet"  href="admstyle.css">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name ="viewport " content="width=device-width,initial-scale=1.0">
    <title>Admin</title>
</head>
<body>

<script type="text/javascript" src="image/im3.jpg"></script>
<body>
<div> <button><a href="index.html">Logout </a> </button></div>
<div class="box1">
    <h2> Item </h2>

    <form action="" method="post" >
        <table>
            <tr>
                <td> <label >Item-ID:</label></td>
                <td><input type="text" id="itemid" name="itemid"></td>
            </tr>
            <tr>
                <td><label >name:</label></td>
                <td><input type="text" id="iname" name="iname" ></td>
            </tr>
            <tr>
                <td> <label  >Price:</label></td>
                <td><input type="text" id="price" name="price"></td>
            </tr>
            <tr>
                <td> <label  >Description:</label></td>
                <td><input type="text" id="des" name="des"></td>
            </tr>
            <tr>
                <td> <label  >Offer-Price:</label></td>
                <td><input type="text" id="oprice" name="oprice"></td>
            </tr>
            <tr>
                <td> <label  >Type:</label></td>
                <td><input type="text" id="type" name="type"></td>
            </tr>
            <tr>
                <td> <label >Quantity:</label></td>
                <td><input type="text" id="qua" name="qua"></td>
            </tr>
            <tr>
                <td> <label  >Image:</label></td>

                <td><input type="text" id="img" name="img">
                </td>
            </tr>
        </table>

        <button name="update"type="submit">UPDATE  </button>
        <button name="add"type="submit">ADD  </button>
        <button name="delete"type="submit">DELETE  </button>
    </form>
    <div class="box2">
    <div class="container">
        <div class="jumbotron">
            <h2 style="margin-top: 5rem">Display User Data</h2>
            <hr>


            <?php
            $connection = mysqli_connect('localhost','root','');
            $db=mysqli_select_db($connection,'furnituire');

            $query = "SELECT * FROM user";
            $query = "SELECT * FROM person ";

            $query_run = mysqli_query($connection,$query);
            ?>
            <table class="table table-bordered" style="background-color: #dddddd; border-color: #030855;">
                <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Address</th>

                </tr>
                </thead>


                <?php
                if($query_run)
                {
                    while($row = mysqli_fetch_array($query_run))
                    {
                        ?>
                        <tbody  >
                        <tr>
                            <th> <?php echo $row['name']; ?> </th>
                            <th> <?php echo $row['e_mail']; ?> </th>
                            <th> <?php echo $row['address']; ?></th>

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
</div>
</body>
</body>

</html>
