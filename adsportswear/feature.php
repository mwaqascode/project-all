<?php
include 'connect.php';
include 'function/common_function.php';
?>
<div class="container p-0">
    <div class="row">
        <?php

        $limit = 8; // number of products per page
        $page = $_GET['page'] ?? 1; // current page
        $offset = ($page - 1) * $limit;
        // $sql = "SELECT * FROM `card` where product_id = $product_id LIMIT $offset, $limit ";


        //  calling function //
        getproducts();
        // get_search_products();
        get_unique_products();
        // $ip = getIPAddress();
        // echo 'User Real IP Address - ' . $ip;
        cart()
        ?>


        <div class="container mt-4">
            <?php

            // calculate total number of pages
            $total_pages = ceil(mysqli_num_rows(mysqli_query($con, "SELECT * FROM `card`")) / $limit);
            // add pagination links
            echo '<nav aria-label="Page navigation example">';
            echo '<ul class="pagination justify-content-center">';

            // add previous button
            if ($page == 1) {
                echo '<li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>';
            } else {
                echo '<li class="page-item"><a class="page-link" href="?page=' . ($page - 1) . '">Previous</a></li>';
            }
            // add page numbers
            for ($i = 1; $i <= $total_pages; $i++) {
                $active = ($page == $i) ? 'active' : '';
                echo '<li class="page-item ' . $active . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
            }


            // add next button
            if ($page == $total_pages) {
                echo '<li class="page-item disabled"><a class="page-link" href="#">Next</a></li>';
            } else {
                echo '<li class="page-item"><a class="page-link" href="?page=' . ($page + 1) . '">Next</a></li>';
            }

            echo '</ul>';
            echo '</nav>';



            ?>

        </div>







        <!-- <nav aria-label="Page navigation example" id="pagination"> -->
        <!-- <ul class="pagination justify-content-center">
        <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
    </ul> -->
        <!-- </nav> -->
        <!-- <input type="hidden" value="1" name="currentpage" id="currentpage"> -->



    </div>


</div>


</div>