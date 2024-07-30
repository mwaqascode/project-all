<?php
include '../connect.php';


include '../function/cart_function.php';


if (isset($_POST['user_register'])) {
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $conf_user_password = $_POST['conf_user_password'];
    $user_adress = $_POST['user_adress'];
    $user_mobile = $_POST['user_mobile'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];
    $ip = getIPAddress();

    // exit not //

    $select_sql = "SELECT * FROM user_table WHERE username='$user_name'";
    $select_query = mysqli_query($con, $select_sql);
    $num_of_rows = mysqli_num_rows($select_query);
    if ($num_of_rows > 0) {
        echo " <script> alert ('username already exit') </script>  ";
        // echo "not";
    } else if($user_password!=$conf_user_password){
        echo " <script> alert ('password do not match') </script>  ";
        
    }
    else {
        move_uploaded_file($user_image_tmp, "./user_images/$user_image");

        $sql = "INSERT INTO user_table (username,user_email,user_password,user_image,user_ip,user_adress,user_mobile) VALUES ( '$user_name','$user_email','$hash_password','$user_image','$ip','$user_adress', '$user_mobile' )";
        $query = mysqli_query($con, $sql);
        // echo " <script> alert ('insert data') </script>  ";

    }


    // checking in item for

    $item_sql="SELECT * FROM cart_details WHERE ip_adress='$ip'";
    $cart_query=mysqli_query($con,$item_sql);
    $cart_of_row=mysqli_num_rows($cart_query);
    if($cart_of_row>0){
        $_SESSION['username']= $user_name;
        echo " <script> alert ('you have item in your cart') </script>  ";
        echo " <script> window.open ('checkout.php','_self') </script>  ";


    }else{
        echo " <script> window.open ('index.php','_self') </script>  ";

    }
}

?>


<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>

    <div class="container">
        <h1 class="text-center">Registration Form</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12">
                    <div class="row d-flex align-item-center justify-content-center ">
                        <div class="col-md-6 py-2">
                            <label for="" class="form-label">Name</label>
                            <input type="text" class="form-control" placeholder="Please enter your name" name="user_name" required="required" />
                        </div>
                    </div>
                    <div class="row d-flex align-item-center justify-content-center">
                        <div class="col-md-6 py-2">
                            <label for="" class="form-label">Email</label>
                            <input type="email" class="form-control" placeholder="Please enter your email" name="user_email" required="required" />
                        </div>
                    </div>
                    <div class="row d-flex align-item-center justify-content-center">
                        <div class="col-md-6 py-2">
                            <label for="" class="form-label">User Image</label>
                            <input type="file" class="form-control" placeholder="" name="user_image" required="required" />
                        </div>
                    </div>
                    <div class="row d-flex align-item-center justify-content-center">
                        <div class="col-md-6 py-2">
                            <label for="" class="form-label">Password</label>
                            <input type="text" class="form-control" placeholder="Enter your password" name="user_password" required="required" />
                        </div>
                    </div>
                    <div class="row d-flex align-item-center justify-content-center">
                        <div class="col-md-6 py-2">
                            <label for="" class="form-label">Confirm Password</label>
                            <input type="text" class="form-control" placeholder="Confirm password" name="conf_user_password" required="required" />
                        </div>
                    </div>
                    <div class="row d-flex align-item-center justify-content-center">
                        <div class="col-md-6 py-2">
                            <label for="" class="form-label">Adress</label>
                            <input type="text" class="form-control" placeholder="Enter your adress" name="user_adress" required="required" />
                        </div>
                    </div>
                    <div class="row d-flex align-item-center justify-content-center">
                        <div class="col-md-6 py-2">
                            <label for="" class="form-label">Mobile number</label>
                            <input type="text" class="form-control" placeholder="Enter your password" name="user_mobile" required="required" />
                        </div>
                    </div>

                    <div class="mt-2 pt-2 " style="margin-left: 336px;">
                        <input type="submit" value="Register" class="bg-info border-0 py-2 px-3" name="user_register">
                        <p class="mt-2 small fw-bold pt-1">Already have an account? <a href="user_login.php" class="text-danger"> login</a></p>
                    </div>


                </div>

            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>