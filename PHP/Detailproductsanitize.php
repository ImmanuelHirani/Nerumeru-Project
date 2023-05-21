<?php
  include 'conn.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- All Link -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="website icon" type="png" href="asset/img/Logo.png" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- All Link end -->

    <!-- Css Link -->

    <link rel="stylesheet" href="asset/css/Detail-Product/Detail.css" />
    <link rel="stylesheet" href="asset/css/Global/breedcrumb.css" />
    <link rel="stylesheet" href="asset/css/Global/navbar.css" />
    <link rel="stylesheet" href="asset/css/Global/Universal.css" />
    <link rel="stylesheet" href="asset/css/Global/footer.css" />
    <link rel="stylesheet" href="asset/css/Global/floating.css" />
    <!-- Css Link End -->

    <!-- Floating Button -->
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
    <script src="asset/js/modernizr.touch.js"></script>
    <link href="asset/css/Global/mfb.css" rel="stylesheet" />
    <!-- Floating Button End -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <!-- All Link End-->

    <title>Detail | Product</title>
  </head>
  <body>
    <!-- Nav -->
    <?php include 'navbar.php' ?>
    <!-- Nav End -->

    <!-- BreedCrumb -->

    <div class="container crumb-container fw-bold" style="margin-top: 150px; margin-bottom: -30px" data-aos="slide-right" data-aos-duration="300">
      <nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php#Categori">Home</a></li>
          <li class="breadcrumb-item"><a href="Catalog.php#AllProduct">Product</a></li>
          <li class="breadcrumb-item"><a href="Sanitize.php"> Sanitize</a></li>
          <li class="breadcrumb-item active" style="color: #2762be" aria-current="page">Detail</li>
        </ol>
      </nav>
    </div>
    <!-- BreedCrumb End -->

    <!-- card card-item Collections Toys -->
    <?php
      $id = $_GET["id_product"];
      $q = showdata("SELECT * FROM product WHERE id_product=$id")[0]; 
    ?>
    <div class="container mt-5" id="Stain&Odor">
      <div class="row">
        <div class="col-lg-6 col-sm-12 col-md-6" data-aos="fade-up" data-aos-duration="700">
          <div class="row">
            <div class="col-lg-12">
              <div class="card card-col" style="width: 100%"><img src="../Admin/assets/images/img/<?= $q["img_item"] ?>" id="Mainimg" class="card card-item-img-top" alt="..." /></div>
            </div>
            <?php
              $sanitize_details = showdata("SELECT * FROM det WHERE id_product = $id AND type_det = 'Sanitize' AND status_det = 1");
              foreach($sanitize_details as $sd) :      
            ?>
            <div class="col-3 mt-3">
              <div class="card card-col" style="width: 100%">
                <img src="../Admin/assets/images/img/<?= $sd["img_det"]?>" class="card card-item-img-top small-img" alt="..." />
              </div>
            </div>
            <?php endforeach ?>
          </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="card card-2 card-start mt-2" style="width: 100%">
            <div class="card-body">
              <h5 class="card-title fw-bold" data-aos="fade-right" data-aos-duration="1000" style="font-size: 30px"><?= $q["name_item"]?></h5>
              <h6 class="mt-3">
                (4)
                <i class="bi bi-star ms-2"></i>
                <i class="bi bi-star"></i>
                <i class="bi bi-star"></i>
                <i class="bi bi-star"></i>
                <i class="bi bi-star"></i>
              </h6>
              <h5 class="mt-3" style="color: grey">Rp<?= $q["price_item"] ?></h5>
              <h6 class="card-text mt-3">
                Stock
                <label class="label-stock text-center" for="Stockinfo"><?= $q["stock_item"] ?></label>
              </h6>
              <h6 class="mt-3 fw-bold">Max Buy Per item (2)</h6>
              <h6 class="card-text mt-3 fw-bold">
                Weight
                <label class="ms-5" for="Stockinfo"><?= $q["weight_item"] ?></label>
              </h6>

              <!-- Button trigger modal -->
              <button type="button" class="btn btn-cart-2 fw-bold mt-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop" disabled>Add To Cart</button>
              <!-- Modal -->
              <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header" style="border: none">
                      <p style="font-size: 16px !important" class="modal-title fs-5" id="staticBackdropLabel">Select The Number Of Items You Want To Buy :</p>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body mb-3">
                      <button type="button" class="btn btn-cart-3 fw-bold mt-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">(1) Add To Cart</button>
                      <button type="button" class="btn btn-cart-3 fw-bold mt-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">(2) Add To Cart</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="container acordian-cont">
            <div class="accordion mt-4" id="accordionPanelsStayOpenExample">
              <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                  <button class="accordion-button" style="background: #2762be" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                    <h6 style="font-weight: bold; color: white">PRODUCT SPECIFICATION</h6>
                    <!-- <span><i class="bi bi-caret-down-fill" style="color: #38bdf8"></i></span> -->
                  </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                  <div class="accordion-body">
                    <?= $q["details_item"] ?>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                  <button class="accordion-button collapsed" style="background: #2762be" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                    <h6 style="font-weight: bold; color: white">WARRANTY</h6>
                    <!-- <span><i class="bi bi-caret-down-fill" style="color: #38bdf8"></i></span> -->
                  </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                  <div class="accordion-body">1 Year (Foam, 20% Deflated) - 1 year warranty for inner foam if there is a 20% decrease</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- card card-item Collections Toys End -->

    <div class="container" style="margin-top: 100px">
      <div class="all-head" data-aos="fade-right" data-aos-duration="300">
        <h1 class="fw-bold">Other Product</h1>
        <img src="asset/img/Kotak.png" alt="" />
      </div>
      <div class="row mt-5">
      <?php
        $query = showdata("SELECT * FROM product WHERE id_product != $id LIMIT 8");
        foreach($query as $r) :      
      ?>
        <div class="col-lg-3 col-xl-3 col-md-6 col-sm-12" data-aos="fade-right" data-aos-duration="300">
          <div class="card card-item my-4" style="width: 100%">
            <img src="../Admin/assets/images/img/<?= $r["img_item"]?>" class="card" alt="..." />
            <div class="card-body">
              <p class="mt-2 fw-bold"><?= $r["name_item"]?></p>
              <p class="fw-bold">Rp<?= $r["price_item"]?></p>
              <div class="cart-button">
                <a href="Detailproductsanitize.php?id_product=<?= $r["id_product"]; ?>" class="btn btn-cart"> See Detail</a>
              </div>
            </div>
          </div>
        </div>
      <?php 
        endforeach 
      ?>
      </div>
    </div>

    <!-- Insta -->
    <div class="container" style="margin-top: 100px">
      <script src="https://apps.elfsight.com/p/platform.js" defer></script>
      <div class="elfsight-app-74d2d199-22bd-44a0-8d1b-865bf0233c05"></div>
    </div>
    <!-- Insta End -->

    <!-- Flaoting bUtton -->
    <?php include "Floatingbtn.php" ?>
    <!-- Flaoting bUtton End -->

    <!-- Footer -->
    <?php include 'footer.php' ?>
    <!-- Footer End -->
  </body>
  <script src="https://kit.fontawesome.com/9851754e14.js" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="asset/js/Floating.js"></script>
  <script>
    var nav = document.querySelector('nav');
    window.addEventListener('scroll', function () {
      if (window.pageYOffset > 100) {
        nav.classList.add('bg-white');
      } else {
        nav.classList.remove('bg-white', 'shadow');
      }
    });
  </script>

  <script>
    var Mainimg = document.getElementById('Mainimg');
    var smallimg = document.getElementsByClassName('small-img');

    smallimg[0].onclick = function () {
      Mainimg.src = smallimg[0].src;
    };
    smallimg[1].onclick = function () {
      Mainimg.src = smallimg[1].src;
    };
    smallimg[2].onclick = function () {
      Mainimg.src = smallimg[2].src;
    };
    smallimg[3].onclick = function () {
      Mainimg.src = smallimg[3].src;
    };
  </script>
  <script src="asset/js/Rating.js"></script>
  <script src="asset/js/cart.js"></script>
</html>
