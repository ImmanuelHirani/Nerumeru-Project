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
    <link rel="stylesheet" href="asset/css/Cart/cart.css" />
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

  <style>
  .subtotal h6 {
    display: block;
    margin-bottom: 5px;
  }
  .subtotal {
    display: block;
    margin-bottom: 10px;
  }
</style>

<?php include "conn.php" ?>

<?php

if(isset($_POST["remove"]) && isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] == 'remove') {
  $id = $_GET['id'];
  foreach ($_SESSION['id_product'] as $key => $value) { // cari index dari item berdasarkan id
    if ($value['id_product'] == $id) {
      unset($_SESSION['id_product'][$key]); // hapus item dari session
      unset($_SESSION['quantity'][$id]); // hapus juga quantity dari item
      break; // keluar dari loop setelah item ditemukan dan dihapus
    }
  }
}
?>
?>

  <body>
    <!-- Nav -->
    <?php include 'navbar.php' ?>
    <!-- Nav End -->

    
    <div class="container" style="margin-top: 150px">
      <div class="all-head mt-5" data-aos="fade-right" data-aos-duration="500">
        <h2 class="fw-bold">Your Shopping Cart</h2>
        <img src="asset/img/KotakPanjang.png" alt="" />
      </div>
      
      <div class="table-container-data row" style="margin-top: 50px">
        <div class="col-sm-12 col-lg-12 col-md-12">
                  <?php
          $cart_items = isset($_SESSION['id_product']) ? $_SESSION['id_product'] : array();

          if (!isset($_SESSION['id_product']) || empty($_SESSION['id_product'])) {
            // If cart is empty, display an empty cart table
            ?>
       
            <table class="table table-bordered text-center">
                <thead style="background-color:#2762be; color:white">
                    <tr">
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="6">Your cart is empty</td> 
                </tbody>
            </table>
            <?php
                } else {
            ?>          
              <table class="table table-bordered text-center table-responsive">
                  <thead>
                      <tr style="background-color: #2762be; color: white">
                          <th>Image</th>
                          <th>Product</th>
                          <th>Price</th>
                          <th>Quantity</th>
                          <th>Total</th>
                          <th>Remove</th>
                      </tr>
                  </thead>
                  <tbody>
                  <tr>
                  </tr>
                  <?php
                    $product_id = array_column($_SESSION['id_product'], 'id_product');
                    $total_price = 0;
                    foreach ($product_id as $id) {
                        $showdata_id = showdata("SELECT * FROM product WHERE id_product = $id");
                        if ($showdata_id) {
                            $quantity = isset($_SESSION['quantity'][$id]) ? $_SESSION['quantity'][$id] : 1; // Mengambil quantity dari session jika tersedia, jika tidak, maka quantity defaultnya adalah 1
                            $subtotal = $quantity * $showdata_id[0]['price_item'];
                            $total_price += $subtotal;
                ?>
                            <tr>
                                <td>
                                    <img src="../Admin/assets/images/img/<?= $showdata_id[0]['img_item'] ?>" style="width: 100px; height: 100px; object-fit: cover" alt="" />
                                </td>
                                <td><?= $showdata_id[0]['name_item'] ?></td>
                                <td><?= $showdata_id[0]['price_item'] ?></td>
                                <td>
                                    <div class="quantity">
                                        <form action="Cart.php?action=update&id=<?= $id ?>" method="POST">
                                            <button class="minus-btn decrement-button" type="button" name="button">-</button>
                                            <input type="text" class="text-center" style="width:30px" name="quantity" value="<?= $quantity ?>">
                                            <button class="plus-btn increment-button" type="button" name="button">+</button>
                                            <button type="submit" name="update" style="display:none"></button>
                                        </form>
                                    </div>
                                </td>
                                <td><?= $subtotal ?></td>
                                <td>
                                    <form action="Cart.php?action=remove&id=<?= $id ?>" method="POST">
                                        <button name="remove" type="submit" style="border: none; background: transparent">
                                            <i class="bi bi-trash" style="font-size: 25px"></i>
                                        </button>
                                    </form>
                                </td>

                            </tr>
                    <?php
                            }
                        }
                    ?>  
                  </tbody>
                  <tfoot>
                  <tr>
                    <td colspan="4" align="right">Total:</td>
                    <td><?= $total_price ?></td>
                    <td></td>
                  </tr>
                  </tfoot>
              </table>
          <?php
          }
          ?>
        </div>
      </div>
 
      <div class="row mt-2">
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="acordian-cont">
            <div class="accordion" id="accordionPanelsStayOpenExample">
              <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                  <button class="accordion-button" style="background: #2762be">
                    <h6 style="font-weight: bold; color: white">Coupon code</h6>
                    <!-- <span><i class="bi bi-caret-down-fill" style="color: #38bdf8"></i></span> -->
                  </button>
                </h2>

                <div class="accordion-body" style="margin-bottom: 20px">
                  <h6>Enter Your Coupon Code if u have one :</h6>
                  <div class="coupon">
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Coupon Code" />
                    <button>Apply Coupon</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="acordian-cont">
            <div class="accordion" id="accordionPanelsStayOpenExample">
              <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                  <button class="accordion-button" style="background: #2762be">
                    <h6 style="font-weight: bold; color: white">Cart Total</h6>
                    <!-- <span><i class="bi bi-caret-down-fill" style="color: #38bdf8"></i></span> -->
                  </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                  <div class="accordion-body">
                  <div class="subtotal">
                    <h6>Item Name</h6>
                    <hr>
                    <?php
                    // Check if there is any product in the cart
                    if(isset($_SESSION['id_product']) && is_array($_SESSION['id_product']) && !empty($_SESSION['id_product'])) {
                        // Loop through all product IDs in the cart
                        foreach ($_SESSION['id_product'] as $item) {
                            // Get the product details from the database
                            $showdata_id = showdata("SELECT * FROM product WHERE id_product = {$item['id_product']}");

                            // Check if the product details are found in the database
                            if ($showdata_id) {                              
                                // Display the product name and quantity
                                echo '<h6>' . $showdata_id[0]['name_item'] . ' (X' . $quantity . ')</h6>';
                            }
                        }
                    } else {
                        echo '<h6>Tidak ada Item Yuk Mulai Belanja</h6>';
                    }
                    ?>
                    </div>
                    <hr />
                    <?php
                      if (!isset($_SESSION['id_product']) || empty($_SESSION['id_product'])) {
                          echo '<h6>Cart masih Kosong</h6>';
                      } else {
                          echo '<div class="Total mb-3">
                                    <h6>Total</h6>
                                    <h6>' . 'Rp' . number_format($total_price, 0, ',', '.') . '</h6>
                                </div>
                                <div class="checkout-btn text-end mb-3 ">
                                    <a href="ShippingPy.php" class="btn btn-checkout">Procced To Check Out</a>
                                </div>';
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
  <script src="jquery-3.6.4.min.js"></script>
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










  <script src="asset/js/Rating.js"></script>
  <script src="asset/js/cart.js"></script>
</html>
