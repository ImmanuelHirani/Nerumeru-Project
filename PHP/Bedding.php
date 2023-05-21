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

    <!-- Css Link -->
    <link rel="stylesheet" href="asset/css/Bedding/CollectionsBedding.css">
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

    <title>Bedding</title>
  </head>

  <style>

    .stock {
      background-color: #2762be;
      width: 15% !important;
      padding: 0.5px;
      border-radius: 3px;
      position: relative;
      left: 5px;
      color: white;
    }

    .rate {
      background-color: #2762be;
      border-radius: 3px;
      padding: 2px !important;
      width: 15% !important;
      color: white !important;
    }


  </style>


  <body>

 

    <!-- Nav -->
    <?php 
    include "conn.php" ;
    include "navbar.php";

    ?>
    <!-- Nav End -->

    <!-- BreedCrumb -->
    <div class="container crumb-container fw-bold" style="margin-top: 150px" data-aos="slide-right" data-aos-duration="300">
      <h1 class="fw-bold">Bedding Collections</h1>
      <nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php#Categori">Home</a></li>
          <li class="breadcrumb-item"><a href="Catalog.php#AllProduct">Product</a></li>
          <li class="breadcrumb-item active" style="color: #2762be" aria-current="page">Bedding</li>
        </ol>
      </nav>
    </div>
    <!-- BreedCrumb End -->

    <!-- card card-item Collections Bedding -->
    <div class="container mt-5" id="Bedding">
      <?php $showdata_bedding = showdata("SELECT * FROM productshortcut WHERE status_shortcut = 1 AND type_shortcut = 'Bedding'") ?>
      <div class="row">
        <?php foreach( $showdata_bedding as $shb) : ?>
        <div class="col-lg-4 col-xl-4 col-md-6 col-sm-12" data-aos="fade-up" data-aos-duration="700">
          <div class="card card-col" style="width: 100%">
            <img src="../Admin/assets/images/Img/<?=$shb["img_shortcut"] ?>" class="card card-item-img-top" alt="..." />
            <a class="btn btn-cat fw-bold mx-auto" style="margin-top: 20px; margin-bottom: 20px !important" href="#<?= $shb["meta_shortcut"] ?>" ><?=$shb["meta_shortcut"] ?></a>
          </div>
        </div>
        <?php endforeach; ?>
        <div class="col-lg-4 col-xl-4 col-md-6 col-sm-12" data-aos="fade-up" data-aos-duration="700">
          <div class="card card-col" style="width: 100%">
            <img src="asset/img/CustomBed.png" class="card card-item-img-top" alt="..." />
            <a class="btn btn-cat fw-bold mx-auto" target="_blank" style="margin-top: 20px; margin-bottom: 20px !important" href="https://wa.link/ua5djs"> Custom Bed</a>
          </div>
        </div>
      </div>
    </div>
    <!-- card card-item Collections Bedding End -->

    <!-- neru One -->
 
    <?php $bedding = showdata("SELECT * FROM product WHERE type_product = 'bedding' AND type_item ='Neru One' AND status_item = 1 ");?>
    <div class="container" id="Neru One" style="margin-top: 100px">
      <div class="all-head" data-aos="fade-right" data-aos-duration="300">
        <h1>Neru One</h1>
        <img src="asset/img/Kotak.png" alt="" />
      </div>
      <div class="row mt-5" id="Stick">
        <?php foreach($bedding as $bed) : ?>
       
        <div  class="col-lg-4 col-xl-4 col-md-6 col-sm-12" data-aos="fade-right" data-aos-duration="300">
        <form action="Detailproductbedding.php" method="POST">
          <div class="card card-item" style="width: 100%">
            <img src="../Admin/assets/images/img/<?= $bed["img_item"] ?>" class="card card-item-img-top" alt="..." />
            <div class="card-body">
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star"></i>
              <label class="label-stock rate text-center" for="Stockinfo">4.00</label>
              <h5 class="mt-2"><?= $bed["name_item"] ?></h5>
              <p class="card-text">
                Stock
                <label class="label-stock stock text-center" for="Stockinfo"><?= $bed["stock_item"] ?></label>
              </p>
              <div class="cart-button">
                <p class="mt-2">Rp.<?= $bed["price_item"] ?></p>
                <a href="Detailproductbedding.php?id_item=<?= $bed["id_product"] ?>"  class="btn btn-cart">See Detail</a>
              </div>
            </div>
          </div>
        </form>
        </div>
        <?php endforeach;?>
      </div>
    </div>
    <!-- neru One End -->

    <!-- neru Two -->
    <div class="container"  id="Neru Two" style="margin-top: 100px">
      <div class="all-head" data-aos="fade-right" data-aos-duration="300" style="text-align: end">
        <h1  >Neru Two</h1>
        <img src="asset/img/Kotak.png" alt="" />
      </div>
      <div class="row mt-5" >
      <?php $bedding = showdata("SELECT * FROM product WHERE type_product = 'bedding' AND type_item ='Neru Two' AND status_item = 1 ");?>
      <?php foreach($bedding as $bed) : ?>
        <div class="col-lg-4 col-xl-4 col-md-6 col-sm-12" data-aos="fade-right" data-aos-duration="300">
        <form action="Detailproductbedding.php" method="POST">
          <div class="card card-item" style="width: 100%">
            <img src="../Admin/assets/images/img/<?= $bed["img_item"] ?>" class="card card-item-img-top" alt="..." />
            <div class="card-body">
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star"></i>
              <label class="label-stock rate text-center" for="Stockinfo">4.00</label>
              <h5 class="mt-2"><?= $bed["name_item"] ?></h5>
              <p class="card-text">
                Stock
                <label class="label-stock stock text-center" for="Stockinfo"><?= $bed["stock_item"] ?></label>
              </p>
              <div class="cart-button">
                <p class="mt-2">Rp.<?= $bed["price_item"] ?></p>
                <a href="Detailproductbedding.php?id_item=<?= $bed["id_product"] ?>"  class="btn btn-cart">See Detail</a>
              </div>
            </div>
          </div>
          </form>
        </div>
        <?php endforeach;?>
      </div>
    </div>
    <!-- neru Two End -->

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
    <?php include "footer.php" ?>
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
</html>
