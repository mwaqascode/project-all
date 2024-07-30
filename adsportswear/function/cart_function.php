<?php


// get ip adress function 

function getIPAddress()
{
    //whether ip is from the share internet  
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //whether ip is from the remote address  
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
// $ip = getIPAddress();
// echo 'User Real IP Address - ' . $ip;


// get cart function 

function cart()
{
    if (isset($_GET['add_to_cart'])) {
        global $con;
        $ip = getIPAddress();
        $get_card_id = $_GET['add_to_cart'];

        $select_query = "SELECT * FROM `cart_details` WHERE ip_adress='$ip' and card_id=$get_card_id ";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows > 0) {
            echo " <script> alert ('This item already present inside cart') </script>  ";
            echo " <script> window.open ('index.php','_self') </script>  ";
        } else {
            $insert_query = "INSERT INTO `cart_details` (card_id,ip_adress,quantity) VALUES ($get_card_id,'$ip',0)";
            $result_query = mysqli_query($con, $insert_query);
            echo " <script> alert ('Item is added to cart') </script>  ";
            echo " <script> window.open ('index.php','_self') </script>  ";
        }
    }
}



// get count cart item number function //

function get_count_item()
{
    if (isset($_GET['add_to_cart'])) {

        global $con;
        $ip = getIPAddress();
        $select_query = "SELECT * FROM `cart_details` WHERE ip_adress='$ip'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
    } else {
        global $con;
        $ip = getIPAddress();
        $select_query = "SELECT * FROM `cart_details` WHERE ip_adress='$ip'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
    }

    echo $count_cart_items;
}





// total price function //

function total_cart_price()
{
    global $con;
    $ip = getIPAddress();
    $total_price = 0;
    $cart_query = "SELECT * FROM `cart_details`  WHERE ip_adress='$ip'";
    $result = mysqli_query($con, $cart_query);
    while ($row = mysqli_fetch_array($result)) {
        $card_id = $row['card_id'];
        $products_query = "SELECT * FROM `card`  WHERE card_id='$card_id'";
        $products_result = mysqli_query($con, $products_query);
        while ($row_products_price = mysqli_fetch_array($products_result)) {
            $products_price = array($row_products_price['product_price']);
            $producs_values = array_sum($products_price);
            $total_price += $producs_values;
        }
    }
    echo $total_price;
}
