<?php
include '../connect.php';


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="../partials../style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../partials../reponsive.css">

    <!-- font  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Chectout Page</title>
</head>

<body>
    <?php
    // include_once '../header.php';


    ?>






    <div class="row px-1">
        <div class="col-md-12">
            <div class="row">
                <?php
                if (!isset($_SESSION['username'])) {
                    include '../user_area/user_login.php';
                } else {
                    include '../payment.php';
                }


                ?>

            </div>
        </div>
    </div>


























    <?php
    // include '../footer.php';
    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>