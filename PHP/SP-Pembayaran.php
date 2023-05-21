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
    <link rel="stylesheet" href="asset/css/Shippingpy/spPembayaran.css" />
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
  <?php include 'conn.php'; ?>
    <!-- Nav -->
    <?php include 'navbar.php' ?>
    <!-- Nav End -->

    
    
    <?php
    $product_ids = $_SESSION['id_product'];
    $ongkir = 50000;
    $transferfee = 4000;
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

 





    <!-- BreedCrumb -->

    <div class="container crumb-container fw-bold" style="margin-top: 150px; margin-bottom: -30px" data-aos="slide-right" data-aos-duration="300">
      <nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="Cart.html">Cart</a></li>
          <li class="breadcrumb-item"><a href="ShippingPy.html">Address</a></li>
          <li class="breadcrumb-item"><a href="shippingPaymentPengiriman.html">Delivery</a></li>
          <li class="breadcrumb-item active" aria-current="page"><a style="color: #2762be" href="Catalog.html#AllProduct">Payment</a></li>
        </ol>
      </nav>
    </div>
    <!-- BreedCrumb End -->
    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-lg-6">
          <div class="acordian-cont">
            <div class="accordion cont-1">
              <div class="accordion-item">
                <div class="accordion-collapse collapse show">
                  <div class="accordion-body">
                    <div class="subtotal mb-3 mt-3">
                      <h4 class="fw-bold">Pilih Metode pembayaran</h4>
                    </div>
                    <div class="accordion" id="accordionExample">
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                          <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">E-Payment</button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                          <div class="accordion-body goPay">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                            <img class="goopay" src="asset/img/Gopay_logo.svg.png" alt="" />
                          </div>
                        </div>
                      </div>
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Transfer Bank</button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                          <div class="accordion-body goPay">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                            <img class="goopay" src="asset/img/BCA.png" alt="" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6" style="margin-top: 2px">
          <div class="acordian-cont">
            <div class="accordion cont-1">
              <div class="accordion-item">
                <div class="accordion-collapse collapse show">
                  <div class="accordion-body">
                    <div class="subtotal">
                      <h6 class="fw-bold">Ringkasan Pembelanjaan</h6>
                    </div>
                    <div class="shipping mt-2">
                      <h6>Harga Normal Total Semua Produk</h6>
                      <h6> <?= 'Rp' . number_format($total_price, 0, ',', '.') ?></h6>
                    </div>
                    <div class="Total mb-3 mt-2">
                      <h6>Ongkos Kirim</h6>
                      <h6><?= $ongkir ?></h6>
                    </div>
                    <hr />
                    <div class="subtotal">
                      <h6>Biaya Transfer Beda Bank</h6>
                      <h6><?= $transferfee ?></h6>
                    </div>
                    <hr />
                    <div class="shipping mt-2">
                      <h6>Total Harga Order</h6>
                      <?php
                        $total_order_price = $total_price + $ongkir + $transferfee;
                      ?>
                      <h6><?= 'Rp' . number_format($total_order_price, 0, ',', '.') ?> </h6>
                    </div>
                    <div class="checkout-btn text-end mt-4">
                    <form action="#" method="post">
                        <button type="submit" class="btn btn-checkout" name="checkout">Continue To Checkout</button>
                    </form>
                </div>
                  <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['checkout']) && isset($_SESSION['id_user']) && isset($_SESSION['id_product'])) {
                      // Mengambil data dari session
                      $user_id = $_SESSION['id_user'];
                      $product_ids = $_SESSION['id_product'];
                      $delivery_note = isset($_SESSION['deliveryNote']) ? $_SESSION['deliveryNote'] : '';
                      $extra_info = isset($_SESSION['extraInformation']) ? $_SESSION['extraInformation'] : '';

                      // Mendapatkan resi_number secara random
                      $resi_number = rand(1000000000,9999999999);

                      // Memasukkan data ke dalam database
                      $query = "INSERT INTO order_manual_nerumeru (status_order, date_order, time_order, type_customers, id_customers, id_order_details, quantity, note_order, note_delivery, kartu_ucapan, resi_number, kurir_order, ongkir_order, payment_method) VALUES ('0', NOW(), NOW(), 'customer', '$user_id', '$product_ids', '{$_SESSION['quantity']}', '$extra_info', '$delivery_note', 'Happy birtday Hirro', '$resi_number', 'JNE', '50000', 'GOPAY')";

                      if(mysqli_query($conn, $query)) {
                        // Jika berhasil memasukkan data, tampilkan pesan ke pengguna
                        echo '<script>alert("Pesanan Anda sudah terkirim!");</script>';

                        // Hapus data dari session
                        unset($_SESSION['id_product']);
                        unset($_SESSION['quantity']);
                        unset($_SESSION['deliveryNote']);
                        unset($_SESSION['extraInformation']);
                        unset($_SESSION['cart_total']);

                        mysqli_close($conn);
                        header('Location: SP-Pembayaran.php');
                        exit();
                      } else {
                        // Jika gagal, tampilkan pesan error
                        echo '<script>alert("Terjadi kesalahan saat mengirim pesanan.");</script>';
                      }
                    } else {
                      // Jika data tidak lengkap, tampilkan pesan error
                      echo '<p>Terjadi kesalahan saat mengirim pesanan. Harap lengkapi data pesanan terlebih dahulu.</p>';
                    }
                ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

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
