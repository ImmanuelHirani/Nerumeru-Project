    <!-- Nav -->
    <nav class="navbar navbar-expand-lg fixed-top bg-light bg-transparant">
      <div class="container">
        <img src="asset/img/Logo.png" alt="" />
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
          <ul class="navbar-nav nav-kiri me-auto my-2 my-lg-0 navbar-nav-scroll">
            <li class="nav-item navR">
              <a class="nav-link active" aria-current="page" href="index.php#Categori">Home</a>
            </li>
            <li class="nav-item navR">
              <a class="nav-link mx-2" href="Catalog.php#AllProduct">Product</a>
            </li>
            <li class="nav-item navR">
              <a class="nav-link disabled" href="#">PlayGround</a>
            </li>
          </ul>
          <ul class="navbar-nav">
          <li class="nav-item nav-cart" id="cart">
            <a class="nav-link cart disabled" href="Cart.php">
                <i class="bi bi-cart2"></i>
                <?php 
                    if (isset($_SESSION['id_product'])) {
                        $count = count($_SESSION['id_product']);
                        echo "<p id='cart-count'>$count</p>";
                    } else {
                        echo "<p id='cart-count'>0</p>";
                    }
                ?>
            </a>
        </li>
            <li class="nav-item navR">
              <!-- <a class="btn nav-signup" href="Login.php" role="button">
                Login / sign-up
              </a> -->
              <?php
                    if (isset($_SESSION['user'])){
                      echo '<a class="btn nav-signup" href="Logout.php" role="button">';
                      echo    $_SESSION['user'];
                      echo '</a>';
                    } else{
                      echo '<a class="btn nav-signup" href="Login.php" role="button">
                              Login / Sign-up
                            </a>';
                    }
                ?>
            </li>
          </ul>
        </div>
      </div>
    </nav>

  


    <script>
      document.getElementById("cart-link").addEventListener("click", function(event) {
        event.preventDefault(); // Jangan mengikuti link
        readCart(); // Panggil fungsi untuk mengirim data ke halaman Cart.php
    });
    </script>
    <!-- Nav End -->









