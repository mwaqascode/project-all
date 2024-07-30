<?php
include 'connect.php';





?>



<!doctype html>
<html lang="en">

<head>
    <title>admin</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>


    <hr class="mt-4">





    <div class="container">

        <div class="row">
            <form action="add-categories.php" method="post">
                <div class="mb-3 col-md-6">
                    <label for="" class="form-label">Add Categories</label>
                    <input type="text" name="Category_name" id="" class="form-control" placeholder="Categories Name" aria-describedby="helpId" />
                </div>
                <button type="submit" name="add" class="btn btn-primary">Add Categories</button>
            </form>

        </div>

        <hr class="mt-4">

        <div class="row">
            <form action="add-products.php" method="post">
                <div class="mb-3 col-md-6">
                    <label for="" class="form-label">Add Products</label>
                    <input type="text" name="products_name" id="" class="form-control" placeholder="products Name" />
                </div>

                <hr class="bt-4">
                <div class="mb-3 col-md-6">
                    <label for="" class="form-label">Select Category</label>
                    <select class="form-select form-select-lg" name="category" id="">

                        <option value="">Uncategorized</option>
                        <?php $cate = mysqli_query($con, "SELECT * FROM `categories`");
                        while ($c = mysqli_fetch_array($cate)) {
                        ?>

                            <option value=" <?php echo $c['id']; ?>  "> <?php echo $c['category_name'];  ?> </option>

                        <?php  } ?>
                    </select>
                    <hr class="mb-4">
                    <br>

                    <button type="submit" name="submit" class="btn btn-primary">Add Products</button>
                </div>



            </form>

        </div>


    </div>
    <!-- products // button input -->

    <hr class="mmt-6">

    <div class="container">
        <div class="row">
            <form action="upload_image.php" method="post" enctype="multipart/form-data">
                <div class="mb-3 col-md-6">
                    <label for="" class="form-label">Select Image</label>
                    <input type="file" name="product_image" id="" class="form-control" placeholder="please select image" aria-describedby="helpId" />
                </div>
                <div class="mb-3 col-md-6">
                    <label for="" class="form-label">Product Name</label>
                    <input type="text" name="product_name" id="" class="form-control" placeholder="Enter Name" aria-describedby="helpId" />
                </div>
                <div class="mb-3 col-md-6">
                    <label for="" class="form-label">Product desc</label>
                    <input type="text" name="product_desc" id="" class="form-control" placeholder="Enter desc" aria-describedby="helpId" />
                </div>
                <div class="mb-3 col-md-6">
                    <label for="" class="form-label">Product Price</label>
                    <input type="text" name="product_price" id="" class="form-control" placeholder="Enter price" aria-describedby="helpId" />
                </div>

                <!-- products button query / -->
                <div class="mb-3 col-md-6">
                    <label for="">Select Products</label>
                    <select name="products" id="" class="form-select form-select-lg">
                        <option value="">Uncategorized</option>
                        <?php
                        $pro = mysqli_query($con, "SELECT * FROM `products`");
                        while ($cat = mysqli_fetch_array($pro)) {
                        ?>
                            <option value="<?php echo $cat['product_id']; ?>"> <?php echo $cat['products_name'] ?> </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" name="upload" class="btn btn-primary">Add Products</button>
            </form>
        </div>
    </div>






    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>