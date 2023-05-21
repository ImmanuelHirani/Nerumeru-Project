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
    <link rel="stylesheet" href="asset/css/Global/breedcrumb.css" />
    <link rel="stylesheet" href="asset/css/Global/navbar.css" />
    <link rel="stylesheet" href="asset/css/Global/Universal.css" />
    <link rel="stylesheet" href="asset/css/Global/footer.css" />
    <link rel="stylesheet" href="asset/css/Global/floating.css" />
    <link rel="stylesheet" href="asset/css/Shippingpy/py.css" />
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

  <style>
    .subtotal h6 {
    display: block;
    margin-bottom: 5px;
  }
    .subtotal {
      display: block;
      margin-bottom: 10px;
    }

    .uniqueCode {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  </style>
  <body>
  <?php include 'conn.php'; ?>
    <!-- Nav -->
    <?php include 'navbar.php' ?>
    <!-- Nav End -->

 <?php


// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     if (isset($_POST['deliveryNote']) && isset($_POST['extraInformation'])) {
//         $_SESSION['deliveryNote'] = $_POST['deliveryNote'];
//         $_SESSION['extraInformation'] = $_POST['extraInformation'];
        
//         // Debugging: check if the data has been saved to session
//         echo '<pre>';
//         print_r($_SESSION);
//         echo '</pre>';
//     }
// }
?> 

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $_SESSION['deliveryNote'] = $_POST['deliveryNote'];
  $_SESSION['extraInformation'] = $_POST['extraInformation'];
  header('Location: shippingPaymentPengiriman.php');
  exit;
} elseif (isset($_SESSION['deliveryNote']) && isset($_SESSION['extraInformation'])) {
  // Jika data session sudah ada, tetap tampilkan pada form
  $deliveryNote = $_SESSION['deliveryNote'];
  $extraInformation = $_SESSION['extraInformation'];
} else {
  // Jika belum ada data session, inisialisasi variabel dengan nilai kosong
  $deliveryNote = '';
  $extraInformation = '';
}
?>

    <!-- BreedCrumb -->
    <?php
$product_ids = $_SESSION['id_product'];
$total_price = 0;

foreach ($product_ids as $item) {
    $id = $item['id_product'];
    $showdata_id = showdata("SELECT * FROM product WHERE id_product = $id");

    if ($showdata_id) {
        $quantity = isset($_SESSION['quantity'][$id]) ? $_SESSION['quantity'][$id] : 1; // Mengambil quantity dari session jika tersedia, jika tidak, maka quantity defaultnya adalah 1
        $subtotal = $quantity * $showdata_id[0]['price_item'];
        $total_price += $subtotal;
    }
}
?>


    <div class="container crumb-container fw-bold" style="margin-top: 150px; margin-bottom: -30px" data-aos="slide-right" data-aos-duration="300">
      <nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="Cart.html">Cart</a></li>
          <li class="breadcrumb-item active" aria-current="page"><a style="color: #2762be" href="ShippingPy.html">Address</a></li>
          <li class="breadcrumb-item"><a href="shippingPaymentPengiriman.html">Delivery</a></li>
          <li class="breadcrumb-item"><a href="SP-Pembayaran.html">Payment</a></li>
        </ol>
      </nav>
    </div>
    <!-- BreedCrumb End -->
    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-lg-6">
        <form method="POST" action="">
        <div class="mb-4">
          <label for="exampleInputUsername" class="form-label">Username</label>
          <?php
              // Check if the user is logged in
              if (isset($_SESSION['id_user'])) {
                // Get the user's username from the database
                $id_user = $_SESSION['id_user'];
                $showdata = showdata("SELECT * FROM user WHERE id_user = $id_user");

                // Check if the user's data is found in the database
                if ($showdata) {
                  $username = $showdata[0]['username_user'];
                  echo '<input type="text" class="form-control" id="exampleInputUsername" value="' . $username . '" />';
                
                } else {
                  // If the user's data is not found in the database, display error message
                  echo '<p>Error: User data not found.</p>';
                }
              } else {
                // If the user is not logged in, display the input fields for username and email
                echo '<input type="text" class="form-control" id="exampleInputUsername" value="' . (isset($_SESSION['username_user']) ? $_SESSION['username_user'] : '') . '" />';
              }
              ?>
          </div>
          <div class="mb-4">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <?php
                    // Check if the user is logged in
                    if (isset($_SESSION['id_user'])) {
                      // Get the user's email from the database
                      $id_user = $_SESSION['id_user'];
                      $showdata = showdata("SELECT * FROM user WHERE id_user = $id_user");

                      // Check if the user's data is found in the database
                      if ($showdata) {
                        $email = $showdata[0]['email_user'];
                        echo '<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="' . $email . '" />';
                      } else {
                        echo '<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="" />';
                      }
                    } else {
                      echo '<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="" />';
                    }
                    ?>
                  <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                  <label for="deliveryNote" class="form-label">Delivery Note</label>
                  <textarea class="form-control" id="deliveryNote" name="deliveryNote" placeholder="Masukan Data Alamat Lengkap Anda" rows="4"><?php echo $deliveryNote; ?></textarea>
                </div>
                <div class="mb-3">
                  <label for="extraInformation" class="form-label">Extra Information</label>
                  <textarea class="form-control" id="extraInformation" name="extraInformation" placeholder="Masukan Note untuk Pesanan" rows="4"><?php echo $extraInformation; ?></textarea>
                </div>
                </div>
                <div class="col-lg-6" style="margin-top: 30px">
                  <div class="acordian-cont">
                    <div class="accordion" id="accordionPanelsStayOpenExample">
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                          <button class="accordion-button" style="background: #2762be">
                            <h6 style="font-weight: bold; color: white">Details</h6>
                            <!-- <span><i class="bi bi-caret-down-fill" style="color: #38bdf8"></i></span> -->
                          </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                          <div class="accordion-body">
                            <div class="subtotal">
                              <h6>Product</h6> <hr>
                              <?php
                            // Check if there is any product in the cart
                            if(isset($_SESSION['id_product']) && is_array($_SESSION['id_product']) && !empty($_SESSION['id_product'])) {
                                // Loop through all product IDs in the cart
                                foreach ($_SESSION['id_product'] as $item) {
                                    // Get the product details from the database
                                    $showdata_id = showdata("SELECT * FROM product WHERE id_product = {$item['id_product']}");

                                    // Check if the product details are found in the database
                                    if ($showdata_id) {
                                        // Get the quantity of the product from the session
                                      
                                        // Display the product name and quantity
                                        echo '<h6>' . $showdata_id[0]['name_item'] .' (X' . $quantity . ')</h6>';
                                    }
                                }
                            } else {
                                echo '<h6>Cart Masih Kosong</h6>';
                            }
                            ?>
                            </div><hr>
                            <div class="Total mb-3 mt-2">
                              <h6>Subtotal</h6>
                              <h6>Rp.<?= $total_price ?></h6>
                            </div>
                            <hr />

                            <?php
                            // Generate a random unique code with a maximum length of 3 digits
                            $unique_code = rand(1,999);

                            // Check if there is any data passed to the page
                            if (isset($_GET['data'])) {
                                // Add the unique code to the data as a parameter
                                $data_with_code = $_GET['data'] . '&code=' . $unique_code;
                                // Redirect to the same page with the new data
                                header('Location: ' . $_SERVER['PHP_SELF'] . '?' . $data_with_code);
                                exit;
                            }
                            ?>
                            <div class="uniqueCode">
                              <h6>Unique Code</h6>
                              <h6>Unique code: <?= $unique_code ?></h6>
                            </div>
                            <hr />
                            <div class="Total mb-3 mt-2">
                              <h6>Total</h6>
                              <h6><?= 'Rp' . number_format($total_price, 0, ',', '.') . ',' . $unique_code ?></h6>
                            </div>
                            <div class="checkout-btn text-end mt-4">
                              <button type="submit" class="btn btn-checkout">Continue To Checkout</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </form>
            </div>

    <!-- Flaoting bUtton -->
    <ul id="menu" class="mfb-component--br mfb-zoomin" data-mfb-toggle="hover">
      <li class="mfb-component__wrap">
        <a class="mfb-component__button--main">
          <i class="mfb-component__main-icon--resting ion-plus-round"></i>
          <i class="mfb-component__main-icon--active ion-close-round"></i>
        </a>
        <ul class="mfb-component__list">
          <li>
            <a href="https://wa.link/443hz9" target="_blank" data-mfb-label="Order via Whatsapp" class="mfb-component__button--child">
              <i class="mfb-component__child-icon ion-social-whatsapp"></i>
              <!-- <img class="mfb-component__child-icon" src="asset/img/icons8-whatsapp-32.png" alt=""> -->
            </a>
          </li>
          <li>
            <a href="https://www.tokopedia.com/nerumeru" target="_blank" data-mfb-label="Tokopedia" class="mfb-component__button--child">
              <i class="mfb-component__child-icon bi bi-bag"></i>
              <!-- <img class="mfb-component__child-icon" style="width: 51px" src="asset/img/coba-tokped.png" alt=""> -->
            </a>
          </li>
          <li>
            <a href="https://shopee.co.id/nerumeru.id" target="_blank" data-mfb-label="Shopee" class="mfb-component__button--child">
              <i class="mfb-component__child-icon bi bi-shop"></i>
              <!-- <img class="mfb-component__child-icon" src="asset/img/icons8-shopee-color-32.png" alt=""> -->
            </a>
          </li>
        </ul>
      </li>
    </ul>
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
    const provinceSelect = document.getElementById('exampleInputProvince');
    const citySelect = document.getElementById('exampleInputCity');

    // Buat objek yang berisi data kota berdasarkan provinsi
    const cities = {
      Aceh: ['Banda Aceh', 'Langsa', 'Lhokseumawe', 'Meulaboh', 'Sabang'],
      Bali: ['Denpasar', 'Badung', 'Gianyar', 'Tabanan', 'Bangli'],
      // tambahkan data kota untuk setiap provinsi
    };

    // Fungsi untuk membuat opsi kota berdasarkan provinsi yang dipilih
    function populateCities() {
      const province = provinceSelect.value;
      citySelect.innerHTML = "<option value=''>Pilih Kota</option>";
      if (province && cities[province]) {
        citySelect.disabled = false;
        cities[province].forEach(function (city) {
          const option = document.createElement('option');
          option.value = city;
          option.text = city;
          citySelect.appendChild(option);
        });
      } else {
        citySelect.disabled = true;
      }
    }

    // Panggil fungsi populateCities setiap kali provinsi dipilih berubah
    provinceSelect.addEventListener('change', populateCities);
  </script>
</html>
