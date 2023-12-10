<?php
session_start();
$actions_type=$_GET['actions_type'];
if($actions_type=='add_item') {
    $item_id = $_GET['item_id'];
    $item_name = $_GET['name'];
    $price= $_GET['price'];
    $quantity = $_GET['quantity'];
    $product_arr = array(
        'item_id' => $item_id,
        'name' => $item_name,
        'quantity' => $quantity,
        'price' => $price,
    );
    if (!empty($_SESSION['furnituire'])) {
        $product_ids = array_column($_SESSION['furnituire'], 'item_id');
        if (in_array($item_id, $product_ids)) {
            foreach ($_SESSION['furnituire'] as $key => $val)
            {
                if ($_SESSION['furnituire'][$key]['item_id'] == $item_id)
                {

                    $_SESSION['furnituire'][$key]['quantity'] =
                        $_SESSION['furnituire'][$key]['quantity']+ $quantity;
                }
        }
    }
        else {
        $_SESSION['furnituire'][] = $product_arr;
    }
}
    else{

        $_SESSION['furnituire'][]=$product_arr;
    }
    header("location:level2.php");
    if($actions_type=='remove_item'){
        $index=$_GET['index'];
        if(isset($_SESSION['furnituire'])){
            unset($_SESSION['furnituire'][$index]);
            header("location:level2.php");
        }
    }
}




?>

