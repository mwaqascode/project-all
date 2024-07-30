<?php


// include 'connect.php';


function getproducts()
{
    global $con;


    $limit = 8; // number of products per page
    $page = $_GET['page'] ?? 1; // current page
    $offset = ($page - 1) * $limit;

    if (!isset($_GET['products'])) {
        $sql = "SELECT * FROM `card`  order by rand()   LIMIT $offset, $limit";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $card_id = $row['card_id'];
                $product_id = $row['product_id'];
                $product_image = $row['product_image'];
                $product_name = $row['product_name'];
                $product_desc = $row['product_desc'];
                $product_price = $row['product_price'];
                echo '
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-4">
                <div class="card" style="width: 17rem;">
                    <img class="card-img-top" src="' . $product_image . '" alt="">
                    <div class="card-body text-center">
                        <h5 class="card-title">' . $product_name . '</h5>
                        <p class="card-text">' . $product_desc . '</p>
                        <p class="card-text">price:' . $product_price . '/-</p>

                        <a href="index.php?add_to_cart=' . $card_id . '" class="btn btn-outline-danger">Add to Cart</a>
                        <a href="products_details.php?card_id=' . $card_id . '" class="btn btn-outline-secondary">View  More</a>
                    </div>
                </div>
            </div>
            ';
            }
        } else {
            // echo 'No results found.';
        }
    }


    // end 
}


// get unique function products 

function get_unique_products()
{
    global $con;

    $limit = 8; // number of products per page
    $page = $_GET['page'] ?? 1; // current page
    $offset = ($page - 1) * $limit;


    if (isset($_GET['products'])) {

        $product_id = $_GET['products'];

        $sql = "SELECT * FROM `card` where product_id = $product_id LIMIT $offset, $limit ";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        $num_of_rows = mysqli_num_rows($result);
        if ($num_of_rows == 0) {
            echo "<h2> NO Products </h2>";
        }

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {

                $card_id = $row['card_id'];
                $product_id = $row['product_id'];
                $product_image = $row['product_image'];
                $product_name = $row['product_name'];
                $product_desc = $row['product_desc'];
                $product_price = $row['product_price'];

                echo '
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-4">
                <div class="card" style="width: 17rem;">
                    <img class="card-img-top" src="' . $product_image . '" alt="">
                    <div class="card-body text-center">
                        <h5 class="card-title">' . $product_name . '</h5>
                        <p class="card-text">' . $product_desc . '</p>
                    <p class="card-text">price:' . $product_price . '/-</p>


                        <a href="index.php?add_to_cart=' . $card_id . '" class="btn btn-outline-danger">Add to Cart</a>
                        <a href="products_details.php?card_id=' . $card_id . '" class="btn btn-outline-secondary">View  More</a>

                    </div>
                </div>
            </div>
            ';
            }
        } else {
            echo 'No results found.';
        }
    }


    // end 
}



// get serah products ///


function get_search_products()
{
    global $con;


    if (isset($_GET['serach_data_products'])) {

        $serach_data_value = $_GET['search_data'];
        $search_query = "SELECT * FROM card where product_name LIKE '%$serach_data_value%'";

        $stmt = mysqli_prepare($con, $search_query);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);


        // no stock ///
        $num_of_rows = mysqli_num_rows($result);
        if ($num_of_rows == 0) {
            echo "<h2 class='text-center'> NO Products </h2>";
        }

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {

                $card_id = $row['card_id'];
                $product_id = $row['product_id'];
                $product_image = $row['product_image'];
                $product_name = $row['product_name'];
                $product_desc = $row['product_desc'];
                $product_price = $row['product_price'];

                echo '
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-4">
                <div class="card" style="width: 17rem;">
                    <img class="card-img-top" src="' . $product_image . '" alt="">
                    <div class="card-body text-center">
                        <h5 class="card-title">' . $product_name . '</h5>
                        <p class="card-text">' . $product_desc . '</p>
                        <p class="card-text">price:' . $product_price . '/-</p>


                        <a href="index.php?add_to_cart=' . $card_id . '" class="btn btn-outline-danger">Add to Cart</a>
                        <a href="products_details.php?products=' . $product_id . '" class="btn btn-outline-secondary">View  More</a>
                    </div>
                </div>
            </div>
            ';
            }
        } else {
            echo 'No results found.';
        }
    }
    // end 
}


// view more products //
function get_view_products()
{
    global $con;



    if (isset($_GET['card_id'])) {
        if (!isset($_GET['products'])) {

            $card_id = $_GET['card_id'];

            $sql = "SELECT * FROM `card` WHERE card_id= $card_id ";
            $stmt = mysqli_prepare($con, $sql);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $card_id = $row['card_id'];
                    $product_id = $row['product_id'];
                    $product_image = $row['product_image'];
                    $product_name = $row['product_name'];
                    $product_desc = $row['product_desc'];
                    $product_price = $row['product_price'];

                    echo '
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-4">
                <div class="card" style="width: 17rem;">
                    <img class="card-img-top" src="' . $product_image . '" alt="">
                    <div class="card-body text-center">
                        <h5 class="card-title">' . $product_name . '</h5>
                        <p class="card-text">' . $product_desc . '</p>
                <p class="card-text">price:' . $product_price . '/-</p>


                       <a href="index.php?add_to_cart=' . $card_id . '" class="btn btn-outline-danger">Add to Cart</a>
                        <a href="products_details.php?card_id=' . $card_id . '" class="btn btn-outline-secondary">View  More</a>
                    </div>
                </div>
            </div>
                  <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="text-center text-danger">Related Products</h1>
                            </div>

                            <div class="col-md-4">
                               <img class="card-img-top" src="' . $product_image . '" alt="">
                            </div>
                            <div class="col-md-4">
                                <img class="card-img-top" src="' . $product_image . '" alt="">
                            </div>
                        </div>
                    </div>

            ';
                }
            } else {
                echo 'No results found.';
            }
        }
    }

    // end 
}
