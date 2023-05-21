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
    <link rel="stylesheet" href="asset/css/index/Card.css" />
    <link rel="stylesheet" href="asset/css/responsive/responsive.css" />
    <link rel="stylesheet" href="asset/css/Global/floating.css" />
    <link rel="stylesheet" href="asset/css/Global/navbar.css" />
    <link rel="stylesheet" href="asset/css/Global/footer.css" />
    <link rel="stylesheet" href="asset/css/index/OurJourney.css" />
    <link rel="stylesheet" href="asset/css/index/Categories.css" />
    <link rel="stylesheet" href="asset/css/index/Testimonial.css" />
    <link rel="stylesheet" href="asset/css/index/Carousel.css" />
    <link rel="stylesheet" href="asset/css/index/WhyUs.css" />
    <link rel="stylesheet" href="asset/css/index/OurCollections.css" />
    <link rel="stylesheet" href="asset/css/Global/Universal.css" />
    <!-- Css Link End -->

    <!-- Floating Button -->
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
    <script src="asset/js/modernizr.touch.js"></script>
    <link href="asset/css/Global/mfb.css" rel="stylesheet" />
    <!-- Floating Button End -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <!-- All Link End-->

    <title>Home</title>
    
  </head>
  <style>
      .ourjourney p {
 
  color: white !important;
  font-size: 17.5px !important;
}
  </style>
  <body>
  <?php include 'conn.php'; ?>

  <?php include 'navbar.php' ?>


    <!-- Courrasel Start -->
    <div class="container" style="margin-top: 150px">
      <?php $courasell = showdata("SELECT * FROM banner WHERE status_banner = 1;") ?>
      <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
          <?php foreach($courasell as $key => $csl): ?>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?= $key ?>" class="<?= $key === 0 ? 'active' : '' ?>" aria-label="Slide <?= $key + 1 ?>"></button>
          <?php endforeach; ?>
        </div>
        <div class="carousel-inner">
          <?php foreach($courasell as $key => $csl): ?>
          <div class="carousel-item <?= $key === 0 ? 'active' : '' ?>"><img src="../Admin/assets/images/img/<?= $csl["img_banner"] ?>" class="d-block w-100" alt="..."></div>
          <?php endforeach; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <i class="fa-solid fa-circle-chevron-left fa-2x"></i>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <i class="fa-solid fa-circle-chevron-right fa-2x"></i>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
    <!-- Courrasel End -->

    <!-- Why Us -->
    <div class="container why-us">
      <div class="all-head mt-5" data-aos="fade-right" data-aos-duration="500">
        <h2 class="fw-bold">WHY US?</h2>
        <img src="asset/img/Kotak.png" alt="" />
      </div>
      <div class="row mt-5 text-center">
        <?php $whyus = showdata("SELECT * FROM whyus WHERE status_whyus = 1;") ?>
        <?php foreach($whyus as $wyu) : ?>
        <div class="col-lg-3 col-sm-12 col-md-6" data-aos="zoom-in-up" data-aos-duration="500">
          <div class="card" style="width: 100%">
            <img src="../Admin/assets/images/img/<?= $wyu["icon_whyus"] ?>" class="card-img-top" alt="..." />
            <div class="card-body mt-3">
              <h5 class="card-title"><?= $wyu["title_whyus"] ?></h5>
              <p class="card-text"><?= $wyu["subtitle_whyus"] ?></p>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
    <!-- Why Us End -->

    <!-- Categories -->
    <section id="Categori">
      <div class="container mt-5">
        <div class="all-head" data-aos="fade-right" data-aos-duration="500">
          <h2 class="fw-bold">CATEGORIES</h2>
          <img src="asset/img/Kotak.png" alt="" />
        </div>
        <div class="row mt-5">
          <?php $categories = showdata("SELECT * FROM categories WHERE status_icon = 1;") ?>
          <?php foreach($categories as $ctg) : ?>
          <div class="col-lg-3 col-sm-12 col-md-6 cat-lg" data-aos="zoom-in-up" data-aos-duration="500">
            <div class="card mb-3" style="width: 100%">
              <img src="../Admin/assets/images/img/<?= $ctg["img_icon"] ?>" class="card-img-top" alt="..." />
              <div class="card-body">
                <a class="btn btn-cat fw-bold" href="<?= $ctg["categories_link"] ?>" role="button"><?= $ctg["title_icon"] ?></a>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <!-- Categories End -->

    <!-- Our Journey -->
    <section id="container-ourjourney" style="background-color: #2762be; margin-top: 70px">
      <div class="container">
        <div class="row 5 py-5 wraper-hero">
          <div class="col-lg-6 col-sm-12 col-md-6 journey-text" data-aos="fade-right" data-aos-duration="1000" style="color: white">
            <h1 class="hidden-1">Neru Meru</h1>
            <h2 class="hidden-2"><span style="color: white">寝る メル</span></h2>
          </div>
          <?php $ourjourney = showdata("SELECT * FROM ourjourney WHERE status_desc= 1;") ?>
          <?php foreach($ourjourney as $ojn) : ?>
          <div class="col-lg-6 col-sm-12 col-md-6 text-start ourjourney mb-4" data-aos="zoom-in-up" data-aos-duration="1000">
            <br />
            <p >
            <?= $ojn["desc_ourjourney"] ?>
            </p>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
    <!-- Our Journey End -->

    <!-- Our Collection -->
    <div class="container OC">
      <div class="all-head" data-aos="fade-right" data-aos-duration="500">
        <h2 class="fw-bold">OUR COLLECTIONS</h2>
        <img src="asset/img/Kotak.png" alt="" />
      </div>
      <div class="row mt-5">
        <?php $ourcollections = showdata("SELECT * FROM ourcollections WHERE status_icon= 1;") ?>
        <?php foreach($ourcollections as $ocl) : ?>
        <div class="col-lg-4 col-sm-12 col-md-6 cat-lg" data-aos="zoom-in-up" data-aos-duration="500">
          <div class="card mb-5" style="width: 100%">
            <img src="../Admin/assets/images/img/<?= $ocl["img_icon"] ?>" class="card-img-top img-card" alt="..." />
            <div class="card-body">
            </div>
          </div>
        </div>
        <?php endforeach ; ?>
      </div>
    </div>
    <!-- Our Collection End -->

    <!-- Testimonial -->
    <!-- Courrasel Start -->
<div class="container mt-5" id="Testi">
  <div class="all-head text-center" data-aos="fade-right" data-aos-duration="500">
    <h2 class="fw-bold ts-head">What Our Customers Says About Us</h2>
    <h5 class="ts-head-2">Happy Story From Our Customers</h5>
  </div>
  <div class="row">
  <?php $testimonial = showdata("SELECT * FROM testimonial WHERE status_testimonial = 1 ORDER BY id_testimonial DESC;") ?>
  <div id="carouselIndicators" class="carousel slide">
    <div class="carousel-indicators">
      <?php foreach ($testimonial as $key => $tsm) : ?>
        <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="<?= $key ?>" class="<?= $key === 0 ? 'active' : '' ?>" aria-label="Slide <?= $key + 1 ?>"></button>
      <?php endforeach; ?>
    </div>
    <div class="carousel-inner">
      <?php $count = 0; ?>
      <?php foreach ($testimonial as $key => $tsm) : ?>
        <?php if ($count % 4 === 0) : ?>
          <?php if ($count !== 0) : ?>
            </div>
          <?php endif; ?>
          <div class="carousel-item <?= $key === 0 ? 'active' : '' ?>">
            <div class="row">
        <?php endif; ?>
        <div class="col-lg-3 col-md-6 col-sm-12 py-3" data-aos="zoom-in-up" data-aos-duration="500">
          <div class="card text-center" style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25), inset 0px 4px 4px rgba(0, 0, 0, 0.25)">
            <div class="card-body mt-3">
              <p style="text-align: center; font-size: 14px !important; color: #8b7e7e">
                <?= $tsm["comment_testimonial"] ?>
              </p>
              <hr style="width: 20%" />
              <div class="card-img mt-3">
                <img src="../Admin/assets/images/Img/<?= $tsm["img_testimonial"] ?>" alt="" style="border-radius: 50%; border: 3px solid white" />
                <h6 style="color: #8b7e7e" class="mt-3"><?= $tsm["name_testimonial"] ?></h6>
              </div>
            </div>
          </div>
        </div>
        <?php $count++; ?>
        <?php if (($count % 4 === 0) && ($count !== 0) || ($key === array_key_last($testimonial))) : ?>
          </div>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselIndicators" data-bs-slide="prev">
      <i class="fa-solid fa-circle-chevron-left fa-2x" style="color: #2762be"></i>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselIndicators" data-bs-slide="next">
      <i class="fa-solid fa-circle-chevron-right fa-2x" style="color: #2762be"></i>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>
    <!-- Courrasel End -->
    <!-- Testimonial End -->

    <!-- Flaoting bUtton -->
    <?php include "Floatingbtn.php" ?>
    <!-- Flaoting bUtton End -->

    <!-- Footer -->

    <?php include 'footer.php' ?>

    <!-- Footer End -->

    <!-- Floating Buton JS -->
    <script src="asset/js/mfb.js"></script>
    <script>
      var panel = document.getElementById('panel'),
        menu = document.getElementById('menu'),
        showcode = document.getElementById('showcode'),
        selectFx = document.getElementById('selections-fx'),
        selectPos = document.getElementById('selections-pos'),
        // demo defaults
        effect = 'mfb-zoomin',
        pos = 'mfb-component--br';

      showcode.addEventListener('click', _toggleCode);
      selectFx.addEventListener('change', switchEffect);
      selectPos.addEventListener('change', switchPos);

      function _toggleCode() {
        panel.classList.toggle('viewCode');
      }

      function switchEffect(e) {
        effect = this.options[this.selectedIndex].value;
        renderMenu();
      }

      function switchPos(e) {
        pos = this.options[this.selectedIndex].value;
        renderMenu();
      }

      function renderMenu() {
        menu.style.display = 'none';
        // ?:-)
        setTimeout(function () {
          menu.style.display = 'block';
          menu.className = pos + effect;
        }, 1);
      }
    </script>
    <!-- Floating Button JS End -->
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
  <!-- JavaScript untuk mengatur perpindahan slide -->
</html>
