<?php

include '../connect.php';
// include '../function/cart_function.php';



if (isset($_POST['user_login'])) {
    $user_name = $_POST['user_name'];
    $user_password = $_POST['user_password'];

    $login_sql = "SELECT * FROM user_table WHERE username='$user_name'";
    $log_query = mysqli_query($con, $login_sql);

    // num of rows //
    $row_count = mysqli_num_rows($log_query);

    // assoc //
    $row_data = mysqli_fetch_assoc($log_query);
    $ip_adress = getIPAddress();



    // ip count sql //


    // $ip_sql = "SELECT * FROM cart_details WHERE ip_adress='$ip_adress'";
    // $ip_query = mysqli_query($con, $ip_sql);

    // // num of rows //
    // $ip_count = mysqli_num_rows($ip_query);


    if ($row_count > 0) {
        if (password_verify($user_password, $row_data['user_password'])) {
            echo " <script> alert ('login succussfull') </script>  ";
        //     if ($row_count == 1 and $ip_count == 0) {
        //         echo " <script> alert ('login succussfull') </script>  ";
        //         echo " <script> window.open ('profile.php','_self') </script>  ";
        //     }else{
        //         echo " <script> alert ('login succussfull') </script>  ";
        //         echo " <script> window.open ('payment.php','_self') </script>  ";
        //     }
        // } else {
        //     echo " <script> alert ('invalid credentials') </script>  ";
        // }
    } else {
        echo " <script> alert ('invalid credentials') </script>  ";
    }
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
        <h1 class="text-center">Log in</h1>
        <form action="" method="post">
            <div class="row  d-flex align-item-center justify-content-center">
                <div class="col-md-6">

                    <div class="form-ouline  py-2">
                        <label for="" class="form-label">Name</label>
                        <input type="text" class="form-control" placeholder="Please enter your name" name="user_name" required="required" />
                    </div>


                    <div class="form-ouline  py-2">
                        <label for="" class="form-label">Password</label>
                        <input type="password" class="form-control" placeholder="Enter your password" name="user_password" required="required" />
                    </div>


                    <div class="mt-2 pt-2 ">
                        <input type="submit" value="Login" class="bg-info border-0 py-2 px-3" name="user_login">
                        <p class="mt-2 small fw-bold pt-1">Don't have an account? <a href="../user_area/user_registration.php" class="text-danger"> Register</a></p>
                    </div>


                </div>

            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>