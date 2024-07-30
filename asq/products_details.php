<?php
include 'connect.php';
include 'function/common_function.php';
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
    include 'header.php';

    ?>










    <div class="container p-0">
        <div class="row">

            <div class="container">
                <div class="row">
                
              
                </div>
            </div>


            <?php
            //  calling function //
            // getproducts();
            get_view_products();

            get_unique_products();
            ?>



        </div>


    </div>


    </div>





    <?php
    include 'footer.php';
    ?>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>