
<?php

include 'connect.php';


if (isset($_POST['submit'])) {
    $name = $_POST['products_name'];
    $category = $_POST['category'];

    $stmt = $con->prepare("INSERT INTO `products`(`uk_category_id`, `products_name`) VALUES (?,?) on DUPLICATE KEY UPDATE products_name=value(products_name), uk_category_id= value(uk_category_id)");
    $stmt->bind_param("is", $category, $name);

    if ($stmt->execute()) {
        echo "succsess";
    }


    $stmt->close();
    $con->close();
    header('location:admin.php');
}





?>