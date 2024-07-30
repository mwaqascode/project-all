<?php
require 'connect.php';


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="partials../style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="partials../reponsive.css">

    <!-- font  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>sport wear</title>
</head>

<body>
    <?php
    include_once 'header.php';


    ?>








    <div class="container mtxl">
        <div class="row">
            <form action="" method="post">
                <table class="table table-bordered text-center">

                    <tbody>
                        <!-- php dynamic code  -->
                        <?php
                        $ip = getIPAddress();
                        $total_price = 0;
                        $cart_query = "SELECT * FROM `cart_details`  WHERE ip_adress='$ip'";
                        $result = mysqli_query($con, $cart_query);
                        $num_of_rows = mysqli_num_rows($result);
                        if ($num_of_rows > 0) {
                            echo '
                                          
     <thead>
                        <tr>
                            <th>Products Ttitle</th>
                            <th>Products Image</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Remove</th>
                            <th colspan="2">Operation</th>
                        </tr>
                    </thead>
                              
                              ';

                            while ($row = mysqli_fetch_array($result)) {
                                $card_id = $row['card_id'];
                                $products_query = "SELECT * FROM `card`  WHERE card_id='$card_id'";
                                $products_result = mysqli_query($con, $products_query);


                                while ($row_products_price = mysqli_fetch_array($products_result)) {

                                    $products_price = array($row_products_price['product_price']);
                                    $product_image = $row_products_price['product_image'];
                                    $product_name = $row_products_price['product_name'];
                                    $product_price = $row_products_price['product_price'];

                                    $producs_values = array_sum($products_price);
                                    $total_price += $producs_values;

                        ?>

                                    <tr>
                                        <td><?php echo $product_name  ?></td>
                                        <td> <img src="<?php echo  $product_image ?>" alt="" width="75px"> </td>
                                        <td> <input type="text" name="qty" class="form-input w-50"> </td>
                                        <?php
                                        $ip = getIPAddress();
                                        if (isset($_POST['update_cart'])) {
                                            $quantities = $_POST['qty'];
                                            $cart_update = "UPDATE `cart_details` SET quantity=$quantities WHERE ip_adress='$ip' ";

                                            $cart_result = mysqli_query($con, $cart_update);
                                            $total_price = $total_price * $quantities;
                                        }

                                        ?>
                                        <td> <?php echo $product_price ?> </td>
                                        <td> <input type="checkbox" name="removeitem[]" value=" <?php echo $card_id ?> "> </td>
                                        <td>
                                            <!-- <button class=" bg-info mx-3 px-3 py-2 border-0">Update</button> -->
                                            <input type="submit" value="Update Cart" name="update_cart" class="bg-info mx-3 px-3 py-2 border-0">
                                            <!-- <button class=" bg-info mx-3 px-3 py-2 border-0">Remove</button> -->
                                            <input type="submit" value="Remove Cart" name="remove_cart" class="bg-info mx-3 px-3 py-2 border-0">

                                        </td>



                                    </tr>
                        <?php
                                }
                            }
                        } else {
                            echo '
                             <h2> cart is empty  </h2>
                            
                            ';
                        }
                        ?>
                    </tbody>
                </table>






                <!-- sub totoal / -->


                <?php
                $ip = getIPAddress();
                // $total_price = 0;
                $cart_query = "SELECT * FROM `cart_details`  WHERE ip_adress='$ip'";
                $result = mysqli_query($con, $cart_query);
                $num_of_rows = mysqli_num_rows($result);
                if ($num_of_rows > 0) {
                    echo '

          <h4 class="px-3">Subtotal: <strong class="text-info">  ' . $total_price . '/-</strong> </h4>

          <input type="submit" value="Continue Shopping" name="contine" class="bg-info border-0 px-3 py-2 text-center">
    
               <button class="bg-secondary border-0 px-3 py-2"> <a href="user_area/checkout.php" class="text-light text-decoration-none">  Chectout </a> </button> 
    
              
              ';
                } else {
                    echo '
       
          <input type="submit" value="Continue Shopping" name="contine" class="bg-info border-0 px-3 py-2 text-center">

       
       ';
                }


                if (isset($_POST['contine'])) {
                    echo " <script> window.open ('index.php','_self') </script>  ";
                }


                ?>

                <div class="row">
                    <!-- <h4 class="px-3">Subtotal: <strong class="text-info"> <?php  ?> /-</strong> </h4>
                    <a href="index.php" class="mx-3"> <button class="bg-info border-0 px-3 py-2"> Continue Shopping </button> </a>
                    <a href="#"> <button class="bg-secondary border-0 px-3 py-2"> Chectout </button> </a> -->

                </div>



            </form>
            <!-- row  -->
        </div>

    </div>
    <!-- remove function php  -->


    <?php
    function remove_item_cart()
    {
        if (isset($_POST['remove_cart'])) {
            global $con;
            foreach ($_POST['removeitem'] as $remove_id) {
                echo $remove_id;
                $remove_sql = "DELETE from cart_details where card_id=$remove_id";
                $remove_query = mysqli_query($con, $remove_sql);
                if ($remove_query) {
                    echo " <script> window.open ('cart.php','_self') </script>  ";
                }
            }
        }
    }


    echo $remove_item = remove_item_cart();
    ?>




    <?php
    include 'footer.php';
    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>