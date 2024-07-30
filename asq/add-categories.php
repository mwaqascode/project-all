<?php
include 'connect.php';

if (isset($_POST['add'])) {
    $name = $_POST['Category_name'];
    $sql = "INSERT INTO `categories`(`category_name`) VALUES ('$name')";
    $query = mysqli_query($con, $sql);
    if (!$query) {
        echo "error";
    }
    header('location:admin.php');
}
