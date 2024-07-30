<?php
require 'connect.php';
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
 include_once 'header.php';
  

  ?>


  <!-- slider  -->
  <!-- slider  -->
  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">

    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="photo/banner1.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="photo/banner2.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="photo/banner3.jpg" class="d-block w-100" alt="...">
      </div>
    </div>

  </div>




  <section class="mtxl">
    <div class="container sub-tittle">
      <h3 class="text-center">About Us</h3>
      <h1>Who we are</h1>

    </div>
    <div class="container">

    </div>
    <div class="container mt-4">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12 text-center ">
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
            industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
            and scrambled it to make a type specimen book. It has survived not only five centuries, but also the
            leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s
            with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
            publishing software like Aldus PageMaker including versions of Lorem Ipsum.sheets containing Lorem
            Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including
            versions of Lorem Ipsum.recently with desktop publishing software like Aldus PageMaker including
            versions of Lorem IeMaker including versions of Lorem Ipsum. sheets containing Lorem Ipsum passages,
            and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem
            Ipsum. sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
            like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>


      </div>
    </div>
  </section>


  <section class="mtxl">


    <div class="container sub-tittle">
      <h1>FEATURE <span>PRODUCTS</span></h1>
    </div>

    <div class="container p-0">
      <div class="row">
        <!-- <div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-4">
          <div class="card" style="width: 17rem;">
            <img class="card-img-top" src="photo/img 1.jpg" alt="">
            <div class="card-body text-center">
              <div class="card-tittle">Hoodie</div>
              <div class="card-number">ES:2105</div>

            </div>
          </div>

        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-4">
          <div class="card" style="width: 17rem;">
            <img class="card-img-top" src="photo/img 2.jpg" alt="">
            <div class="card-body text-center">
              <div class="card-tittle">Hoodie</div>
              <div class="card-number">ES:2105</div>

            </div>
          </div>

        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-4">
          <div class="card" style="width: 17rem;">
            <img class="card-img-top" src="photo/img 3.jpg" alt="">
            <div class="card-body text-center">
              <div class="card-tittle">Hoodie</div>
              <div class="card-number">ES:2105</div>

            </div>
          </div>

        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-4">
          <div class="card" style="width: 17rem;">
            <img class="card-img-top" src="photo/img 4.jpg" alt="">
            <div class="card-body text-center">
              <div class="card-tittle">Hoodie</div>
              <div class="card-number">ES:2105</div>

            </div>
          </div>

        </div> -->
        <?php getproducts();  ?>
        
      </div>

    </div>

    <?php
    cart();

    ?>



    

  </section>


  <?php
  include 'insta.php';

  ?>


  <?php
  include 'card.php';
  ?>





  <?php
  include 'footer.php';
  ?>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>