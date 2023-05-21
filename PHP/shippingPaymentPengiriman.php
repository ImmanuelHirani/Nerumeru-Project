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
    <link rel="stylesheet" href="asset/css/Shippingpy/pengirimanShippingPayment.css" />
    <link rel="stylesheet" href="asset/css/Global/breedcrumb.css" />
    <link rel="stylesheet" href="asset/css/Global/navbar.css" />
    <link rel="stylesheet" href="asset/css/Global/Universal.css" />
    <link rel="stylesheet" href="asset/css/Global/footer.css" />
    <link rel="stylesheet" href="asset/css/Global/floating.css" />
    <!-- Css Link End -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <!-- All Link End-->

    <title>Shipping Payment Pengiriman</title>
  </head>
  <body>
  <?php include 'conn.php'; ?>
    <!-- Nav -->
    <?php include 'navbar.php' ?>
    <!-- Nav End -->

    <?php
$product_ids = $_SESSION['id_product'];
$ongkir = 50000;
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
    <div class="container crumb-container fw-bold" style="margin-top: 150px" data-aos="slide-right" data-aos-duration="300">
      <div class="row">
        <div class="col-lg-1">
          <img src="asset/img/Logo.png" alt="" />
        </div>
        <div class="col-lg-11 my-auto">
          <h2 class="fw-bold">Neru Meru</h2>
        </div>
      </div>
      <div class="row mt-4">
        <nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="Cart.html">Cart</a></li>
            <li class="breadcrumb-item"><a href="ShippingPy.html">Address</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a style="color: #2762be" href="Catalog.html#AllProduct">Delivery</a></li>
            <li class="breadcrumb-item"><a href="SP-Pembayaran.html">Payment</a></li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- BreedCrumb End -->

    <div class="container mt-4">
      <div class="row gx-5">
        <!-- Shipping -->
        <div class="col-lg-7">
          <div class="accordion mb-2" id="accordionExample">
            <div class="accordion-item">
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <h5>Pilih metode pengiriman</h5>
                  <h5>Total berat paket</h5>
                  <br />
                  <p class="text-red">Direkomendasikan untukmu!</p>

                  <div class="accordion">
                    <div class="accordion-item">
                      <div class="accordion-body">
                        <p>
                          <img src="asset/img/JNE.svg" alt="" />
                          <span style="float: right"> Rp. 50.000 </span>
                        </p>
                        <h5 class="pengiriman">Reguler (1-7 hari)</h5>
                        <p class="text-red">Termurah dan tercepat</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-5">
          <div class="accordion mb-2" id="accordionExample">
            <div class="accordion-item">
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <p>Saya sudah membaca dan menyetujui</p>
                  <a href="#" class="syarat-ketentuan">Syarat dan ketentuan</a>
                  <form class="mt-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1" class="visually-hidden">Email address</label>
                      <input type="text" class="form-control catatan-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Catatan untuk driver" />
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <div class="accordion">
            <div class="accordion-item">
              <div class="accordion-body">
                <p>Ringkasan pembelanjaan</p>
                <div class="ringkasan-pembelanjaan">
                  <p>
                  Harga Normal Total Semua Produk
                  <span> <?= 'Rp' . number_format($total_price, 0, ',', '.') ?> </span>
                </p>
                <p>
                  Ongkos kirim
                  <span> <?= $ongkir ?> </span>
                </p>
                <?php
                  $total_order_price = $total_price + $ongkir;
                ?>
                <p>
                  Total Harga Order
                  <span> <?= 'Rp' . number_format($total_order_price, 0, ',', '.') ?> </span>
                </p>
                </div>
                  <a href="SP-Pembayaran.php" class="btn btn-primary delivery-btn col-12">Continue</a>
              </div>
            </div>
          </div>
        </div>
        <!-- Shipping End -->
      </div>
    </div>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row mt-5 py-4">
          <div class="col-lg-3">
            <h5 class="fw-bold" style="width: fit-content; color: #2762be" data-aos="zoom-in-left" data-aos-duration="700">Neru Meru</h5>
            <p class="pt-3" style="text-align: justify; font-weight: 500" data-aos="zoom-in-right" data-aos-duration="700">
              Based on the love for pets, Neru Meru is here as a brand that is able to provide the best solutions for various pet needs. Innovative, precise, durable and made using the highest quality materials, every Neru Meru product is
              created for the comfort of pets and their human companions.
            </p>
          </div>
          <div class="col-lg-3">
            <div class="text-wrapper" data-aos="zoom-in-right" data-aos-duration="700">
              <h5 class="fw-bold" style="width: fit-content; color: #2762be" data-aos="zoom-in-left" data-aos-duration="700">Office Shop</h5>
              <p class="pt-3">
                Jakarta - Barat <br />
                ITC, Lantai 2 <br />
                Indonesia
              </p>
              <p>NeruMeru@gmail.com</p>
              <p>+62 - 020230890</p>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="text-wrapper" data-aos="zoom-in-right" data-aos-duration="700">
              <h5 class="fw-bold" style="width: fit-content; color: #2762be" data-aos="zoom-in-left" data-aos-duration="700">Related Links</h5>
              <p class="pt-3"><a style="text-decoration: none; color: rgb(0, 0, 0)" href="#">Home</a></p>
              <p><a style="text-decoration: none; color: rgb(10, 10, 10)" href="https://www.instagram.com/nerumeru.id/">Instagram</a></p>
              <p><a style="text-decoration: none; color: rgb(0, 0, 0)" href="">Whatsapp</a></p>
              <p><a style="text-decoration: none; color: rgb(0, 0, 0)" href="">TikTok</a></p>
              <p><a style="text-decoration: none; color: rgb(5, 5, 5)" href="">Facebook</a></p>
            </div>
          </div>
          <div class="col-lg-3">
            <h5 class="fw-bold" data-aos="zoom-in-left" data-aos-duration="700" style="width: fit-content; color: #2762be">Contact Us</h5>
            <p class="pt-3" data-aos="zoom-in-right" data-aos-duration="700"><i class="bi bi-telephone-plus-fill" style="margin-right: 20px; color: #2762be"></i>+62 - 020230890</p>
            <p data-aos="zoom-in-right" data-aos-duration="700"><i class="bi bi-envelope-fill" style="margin-right: 20px; color: #2762be"></i>NeruMeru@gmail.com</p>
          </div>
        </div>
      </div>
    </footer>
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
