<?php
include 'connect.php';

if (isset($_POST['upload'])) {
    $product_name = $_POST['product_name'];
    $product_desc = $_POST['product_desc'];
    $product_price = $_POST['product_price'];

    $products = $_POST['products'];

    $product_image = $_FILES['product_image'];
    $image_name = $product_image['name'];
    $image_tmp = $product_image['tmp_name'];
    $image_path = "images/" . $image_name;

    if (move_uploaded_file($image_tmp, $image_path)) {
        $sql = "INSERT INTO card (product_image, product_name, product_desc,product_price, product_id) VALUES ('$image_path', '$product_name', '$product_desc',$product_price, '$products')";
        $query = mysqli_query($con, $sql);
        if ($query) {
            echo "Success";
        } else {
            echo "Not sent";
        }
    } else {
        echo "Image upload failed";
    }
}

header('location:admin.php');
