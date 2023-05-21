<?php
  include 'conn.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1"
    />

    <!-- All Link -->
    <link
      rel="preconnect"
      href="https://fonts.googleapis.com"
    />
    <link
      rel="website icon"
      type="png"
      href="asset/img/Logo.png"
    />
    <link
      rel="preconnect"
      href="https://fonts.gstatic.com"
      crossorigin
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css"
    />
    <link
      rel="stylesheet"
      href="https://unpkg.com/aos@next/dist/aos.css"
    />

    <!-- Css Link -->
    <link
      rel="stylesheet"
      href="asset/css/Toys/CollectionsToys.css"
    />
    <link
      rel="stylesheet"
      href="asset/css/Global/breedcrumb.css"
    />
    <link
      rel="stylesheet"
      href="asset/css/Global/navbar.css"
    />
    <link
      rel="stylesheet"
      href="asset/css/Global/Universal.css"
    />
    <link
      rel="stylesheet"
      href="asset/css/Global/footer.css"
    />
    <link
      rel="stylesheet"
      href="asset/css/Global/floating.css"
    />
    <!-- Css Link End -->

    <!-- Floating Button -->
    <link
      rel="stylesheet"
      href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"
    />
    <script src="asset/js/modernizr.touch.js"></script>
    <link
      href="asset/css/Global/mfb.css"
      rel="stylesheet"
    />
    <!-- Floating Button End -->

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />

    <!-- Jquery Number -->


    <!-- All Link End-->

    <title>item</title>
  </head>

  <body>
    <!-- Nav -->
    <?php
      include 'navbar.php';
    ?>
    <!-- Nav End -->

    <!-- BreedCrumb -->
    <div
      class="container crumb-container fw-bold"
      style="margin-top: 150px"
      data-aos="slide-right"
      data-aos-duration="300"
    >
      <h1 class="fw-bold">item Collections</h1>
      <nav
        style="--bs-breadcrumb-divider: '>'"
        aria-label="breadcrumb"
      >
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php#Categori">Home</a></li>
          <li class="breadcrumb-item"><a href="Catalog.php#AllProduct">Product</a></li>
          <li
            class="breadcrumb-item active"
            style="color: #2762be"
            aria-current="page"
          >
            Toys
          </li>
        </ol>
      </nav>
    </div>
    <!-- BreedCrumb End -->

    <!-- card card-item Collections item -->
    <div
      class="container mt-5"
      id="item"
    >
      <div class="row">
      <?php 
        $item_shortcut = showdata("SELECT * FROM productshortcut WHERE status_shortcut = 1 AND type_shortcut = 'Toys'");
        foreach( $item_shortcut as $sc) :
      ?>
        <div
          class="col-lg-4 col-md-6 col-sm-12"
          data-aos="fade-up"
          data-aos-duration="700"
        >
          <div
            class="card card-col"
            style="width: 100%"
          >
            <img
              src="../Admin/assets/images/Img/<?=$sc["img_shortcut"] ?>"
              class="card card-item-img-top"
              alt="..."
            />

            <a
              class="btn btn-cat fw-bold mx-auto"
              style="margin-top: 10px; margin-bottom: 20px !important"
              href="#<?= $sc["meta_shortcut"] ?>"
              role="button"
              ><?=$sc["meta_shortcut"] ?></a
            >
          </div>
        </div>
        <?php endforeach ?>
      </div>
    </div>
    <!-- card card-item Collections item End -->

    <!-- neru Stick -->
    <div
      class="container"
      style="margin-top: 100px"
    >
      <div
        class="all-head"
        data-aos="fade-right"
        data-aos-duration="300"
      >
        <h1>Neru Stick</h1>
        <img
          src="asset/img/Kotak.png"
          alt=""
        />
      </div>
      <div
        class="row mt-5"
        id="Neru Stick"
      >
      <?php
        $item_nerustick = showdata("SELECT * FROM product WHERE status_item = 1 AND type_item = 'Neru Stick'");
        foreach($item_nerustick as $ns) :      
      ?>
        <div
          class="col-lg-4 col-md-6 col-sm-12"
          data-aos="fade-right"
          data-aos-duration="300"
        >
          <div
            class="card card-item my-4"
            style="width: 100%"
          >
            <img
              src="/nerumeru/admin/assets/images/Img/<?= $ns["img_item"]; ?>"
              class="card card-item-img-top"
              alt="..."
            />
            <div class="card-body">
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star"></i>
              <label
                class="label-stock text-center"
                for="Stockinfo"
                >4.00</label
              >
              <h5 class="mt-2"><?= $ns["name_item"]; ?></h5>
              <p class="card-text">
                Stock
                <label
                  class="label-stock text-center"
                  for="Stockinfo"
                  ><?= $ns["stock_item"]; ?></label
                >
              </p>
              <div class="cart-button">
                <p class="mt-2" id="price">Rp<?= $ns["price_item"]; ?></p>
                <a
                href="Detailproducttoys.php?id_item=<?= $ns["id_product"]; ?>"
                  class="btn btn-cart"
                >
                  See Detail</a
                >
              </div>
            </div>
          </div>
        </div>
        <?php endforeach ?>
      </div>
    </div>
    
    <!-- neru Stick End -->

    <!-- neru Ring -->
    <div
      class="container"
      style="margin-top: 100px"
    >
      <div
        class="all-head"
        style="text-align: end"
        data-aos="fade-right"
        data-aos-duration="300"
      >
        <h1>Neru Ring</h1>
        <img
          src="asset/img/Kotak.png"
          alt=""
        />
      </div>
      <div
        class="row mt-5"
        id="Neru Ring"
      >
      <?php
        $item_neruring = showdata("SELECT * FROM product WHERE status_item = 1 AND type_item = 'Neru Ring'");
        foreach($item_neruring as $nr) :      
      ?>
        <div
          class="col-lg-4 col-md-6 col-sm-12"
          data-aos="fade-right"
          data-aos-duration="300"
        >
          <div
            class="card card-item my-4"
            style="width: 100%"
          >
            <img
              src="/nerumeru/admin/assets/images/Img/<?= $nr["img_item"]; ?>"
              class="card card-item-img-top"
              alt="..."
            />
            <div class="card-body">
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star"></i>
              <label
                class="label-stock text-center"
                for="Stockinfo"
                >4.00</label
              >
              <h5 class="mt-2"><?= $nr["name_item"]; ?></h5>
              <p class="card-text">
                Stock
                <label
                  class="label-stock text-center"
                  for="Stockinfo"
                  ><?= $nr["stock_item"]; ?></label
                >
              </p>
              <div class="cart-button">
                <p class="mt-2">Rp<?= $nr["price_item"]; ?></p>
                <a
                href="Detailproducttoys.php?id_item=<?= $nr["id_product"]; ?>"
                  class="btn btn-cart"
                >
                  See Detail</a
                >
              </div>
            </div>
          </div>
        </div>
        <?php endforeach ?>
      </div>
    </div>
    <!-- neru Ring End -->

    <!-- neru Ball -->
    <div
      class="container"
      style="margin-top: 100px"
    >
      <div
        class="all-head"
        data-aos="fade-right"
        data-aos-duration="300"
      >
        <h1>Neru Ball</h1>
        <img
          src="asset/img/Kotak.png"
          alt=""
        />
      </div>
      <div
        class="row mt-5"
        id="Neru Ball"
      >
      <?php
        $item_neruball = showdata("SELECT * FROM product WHERE status_item = 1 AND type_item = 'Neru Ball'");
        foreach($item_neruball as $nb) :      
      ?>
        <div
          class="col-lg-4 col-md-6 col-sm-12"
          data-aos="fade-right"
          data-aos-duration="300"
        >
          <div
            class="card card-item my-4"
            style="width: 100%"
          >
            <img
              src="/nerumeru/admin/assets/images/Img/<?= $nb["img_item"]; ?>"
              class="card card-item-img-top"
              alt="..."
            />
            <div class="card-body">
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star"></i>
              <label
                class="label-stock text-center"
                for="Stockinfo"
                >4.00</label
              >
              <h5 class="mt-2"><?= $nb["name_item"]; ?></h5>
              <p class="card-text">
                Stock
                <label
                  class="label-stock text-center"
                  for="Stockinfo"
                  ><?= $nb["stock_item"]; ?></label
                >
              </p>
              <div class="cart-button">
                <p class="mt-2">Rp<?= $nb["price_item"]; ?></p>
                <a
                  href="Detailproducttoys.php?id_item=<?= $nb["id_product"]; ?>"
                  class="btn btn-cart"
                >
                  See Detail</a
                >
              </div>
            </div>
          </div>
        </div>
        <?php endforeach ?>
      </div>
    </div>
    <!-- neru Ball End -->

    <!-- Insta -->
    <div
      class="container"
      style="margin-top: 100px"
    >
      <script
        src="https://apps.elfsight.com/p/platform.js"
        defer
      ></script>
      <div class="elfsight-app-74d2d199-22bd-44a0-8d1b-865bf0233c05"></div>
    </div>
    <!-- Insta End -->

    <!-- Floating bUtton -->
    <ul
      id="menu"
      class="mfb-component--br mfb-zoomin"
      data-mfb-toggle="hover"
    >
      <li class="mfb-component__wrap">
        <a class="mfb-component__button--main">
          <i class="mfb-component__main-icon--resting ion-plus-round"></i>
          <i class="mfb-component__main-icon--active ion-close-round"></i>
        </a>
        <ul class="mfb-component__list">
          <li>
            <a
              href="https://wa.link/443hz9"
              target="_blank"
              data-mfb-label="Order via Whatsapp"
              class="mfb-component__button--child"
            >
              <i class="mfb-component__child-icon ion-social-whatsapp"></i>
              <!-- <img class="mfb-component__child-icon" src="asset/img/icons8-whatsapp-32.png" alt=""> -->
            </a>
          </li>
          <li>
            <a
              href="https://www.tokopedia.com/nerumeru"
              target="_blank"
              data-mfb-label="Tokopedia"
              class="mfb-component__button--child"
            >
              <i class="mfb-component__child-icon bi bi-bag"></i>
              <!-- <img class="mfb-component__child-icon" style="width: 51px" src="asset/img/coba-tokped.png" alt=""> -->
            </a>
          </li>
          <li>
            <a
              href="https://shopee.co.id/nerumeru.id"
              target="_blank"
              data-mfb-label="Shopee"
              class="mfb-component__button--child"
            >
              <i class="mfb-component__child-icon bi bi-shop"></i>
              <!-- <img class="mfb-component__child-icon" src="asset/img/icons8-shopee-color-32.png" alt=""> -->
            </a>
          </li>
        </ul>
      </li>
    </ul>
    <!-- Flaoting bUtton End -->

    <!-- Footer -->
    <?php
      include 'footer.php';
    ?>
    <!-- Footer End -->
  </body>
  <script
    src="https://kit.fontawesome.com/9851754e14.js"
    crossorigin="anonymous"
  ></script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script
    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin="anonymous"
  ></script>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"
  ></script>
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

  <!-- Jquery Number -->


  
</html>
