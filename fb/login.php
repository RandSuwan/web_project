<?php
echo "hi";
if(isset($_POST['but'])&&isset($_POST['uname'])&&isset($_POST['psw'])) {
    $name = $_POST['uname'];
    $pass = $_POST['psw'];
    try {
        $db = new mysqli('localhost', 'root', '', 'furnituire');

        $quryStr2 = "select * from  admin ";

        $res2 = $db->query($quryStr2);


        for ($i = 0; $i < $res2->num_rows; $i++) {
            $row = $res2->fetch_object();
            if ($row->e_mail == $name && sha1($pass) == $row->apassword) {
                header('Location:adminp.php');
            } else {
                echo "<h3 >user name or pass  are not correct</h3>";
            }
        }$db->close();
    } catch (Exception $e) {
        echo e;
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet"  href="loginn.css">
    <title>Login</title>
</head>
<body>
<div class="navbar">
    <a  href="index.html"><i class="fa fa-fw fa-home"></i> Home</a>
    <a href="try.php"><i class="fa fa-fw fa-search"></i> Shop</a>
    <a href="ordeer.php"><i class="fa fa-fw fa-envelope"></i> Order </a>
    <a href="login.php" class="active"><i class="fa fa-fw fa-login"></i> login </a>
</div>

<div class="loginbox">
    <img src="imagee/icon1.png">

    <div class="container">
        <form method="post" action="login.php">
        <label ><b>Admin e-mail</b></label>
        <input type="email" placeholder="Enter Admin e-mail" name="uname" required>

        <label ><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>
        <button type="submit" name="but">Login</button>
        </form>
    </div>
</div>

</body>
</div>


</div>




</html>