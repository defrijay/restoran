<?php

include('function.php');

$listMakanan = readMakanan();
$listMinuman = readMinuman();
$listChef = readChef();
$listBahan = readBahan();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>mamemam</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center" style="background-color: #00235B">
    <div class="container d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center me-auto me-lg-0">
        <img src="assets/img/logo.png" alt="">
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="#hero">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#menu">Menu</a></li>
          <li><a href="#chefs">Chefs</a></li>
        </ul>
      </nav><!-- .navbar -->

      <a class="btn-book-a-table" href="admin.php">Admin Menu</a>
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center section-bg">
    <div class="container">
      <div class="row justify-content-between gy-5">
        <div
          class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
          <h2 data-aos="fade-up">Makanan adalah <br>bentuk kenyamanan <br>paling primitif</h2>
        </div>
        <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
          <img src="assets/img/hero-img.png" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="300">
        </div>
      </div>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>About Us</h2>
          <p>Learn More <span>About Us</span></p>
        </div>

        <div class="row gy-4">
          <div class="col-lg-7 position-relative about-img" style="background-image: url(assets/img/aboutUS.jpg) ;"
            data-aos="fade-up" data-aos-delay="150">
          </div>
          <div class="col-lg-5 d-flex align-items-end" data-aos="fade-up" data-aos-delay="300">
            <div class="content ps-0 ps-lg-5">
              <p class="fst-italic">
                kalau emang dia gabisa memberikan kamu kenyamanan maka mamEmam hadir untukmu,
                karena bagi kami kepuasan kamu adalah hal yang paling penting
              </p>
              <ul>
                <li><i class="bi bi-check2-all"></i> Cita rasa yang memanjakan lidah</li>
                <li><i class="bi bi-check2-all"></i> Harga ? gak semahal skin game online mu kok</li>
                <li><i class="bi bi-check2-all"></i> Nusantara ? makanan keninian ? kita punya semua</li>
              </ul>
              <p>
                Karena pada dasarnya kekecewaan datang dari ekspektasi yang terlalu tinggi, tapi tidak bagi mamEmam
              </p>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End About Section -->

    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <p>Daftar <span>Menu</span></p>
        </div>

        <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">

          <li class="nav-item">
            <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#menu-makanan">
              <h4>Makanan</h4>
            </a>
          </li><!-- End tab nav item -->

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-minuman">
              <h4>Minuman</h4>
            </a><!-- End tab nav item -->

        </ul>

        <div class="tab-content align-item-center" data-aos="fade-up" data-aos-delay="300">

          <div class="tab-pane fade active show" id="menu-makanan">
            <div class="tab-header text-center">
              <p>Menu</p>
              <h3>Makanan</h3>
            </div>

            <div class="row gy-5">
              <?php
              foreach ($listMakanan as $makanan) {
                $listBahanMenu = readBahanMenu($makanan['id_menu']);
                ?>
                <div class="col-lg-4 menu-item">
                  <a href="assets/img/<?= $makanan['foto_menu'] ?>" class="glightbox"><img
                      src="assets/img/<?= $makanan['foto_menu'] ?>" class="menu-img img-fluid" alt=""></a>
                  <h4>
                    <?= $makanan['nama_menu'] ?>
                  </h4>
                  <h5>Made By : Chef
                    <?= $makanan['nama_chef'] ?>
                  </h5>
                  <p class="ingredients">
                    <?php
                    foreach ($listBahanMenu as $bahanMenu) {
                      echo $bahanMenu['nama_bahan'] . ", ";
                    }
                    ?>
                  </p>
                  <p class="price">
                    RP.
                    <?= number_format($makanan['harga'], 0, "", ".") ?>
                  </p>
                </div><!-- Menu Item -->
                <?php
              }
              ?>

            </div>
          </div><!-- End Menu Makanan Content -->

          <div class="tab-pane fade" id="menu-minuman">

            <div class="tab-header text-center">
              <p>Menu</p>
              <h3>Minuman</h3>
            </div>

            <div class="row gy-5">
              <?php
              foreach ($listMinuman as $minuman) { ?>
                <div class="col-lg-4 menu-item">
                  <a href="assets/img/<?= $minuman['foto_menu'] ?>" class="glightbox"><img
                      src="assets/img/<?= $minuman['foto_menu'] ?>" class="menu-img img-fluid" alt=""></a>
                  <h4>
                    <?= $minuman['nama_menu'] ?>
                  </h4>
                  <h5>Made By : Chef
                    <?= $minuman['nama_chef'] ?>
                  </h5>
                  <p class="price">
                    RP.
                    <?= number_format($minuman['harga'], 0, "", ".") ?>
                  </p>
                </div><!-- Menu Item -->
                <?php
              }
              ?>

            </div>
          </div><!-- End Minuman Menu Content -->

        </div>

      </div>
    </section><!-- End Menu Section -->

    <!-- ======= Chefs Section ======= -->
    <section id="chefs" class="chefs section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Chefs</h2>
          <p>Chef <span>Penuh</span> Cinta</p>
        </div>
        <div class="row gy-4">
          <?php
          foreach ($listChef as $chef) { ?>
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
              <div class="chef-member">
                <div class="member-img">
                  <img src="assets/img/chefs/<?= $chef['foto_chef'] ?>" class="img-fluid" alt="">
                </div>
                <div class="member-info">
                  <h4>
                    <?= $chef['nama_chef'] ?>
                  </h4>
                  <span>
                    <?= $chef['alamat_chef'] ?>
                  </span>
                </div>
              </div>
            </div><!-- End Chefs Member -->
            <?php
          }
          ?>
        </div>

      </div>
    </section><!-- End Chefs Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="container">
      <div class="row gy-3">
        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-geo-alt icon"></i>
          <div>
            <h4>Alamat</h4>
            <p>
              Gegerkalong Girang No 1313 <br>
              Bandung, Indonesia<br>
            </p>
          </div>

        </div>

        <div class="col-lg-3 col-md-6 footer-links d-flex">
          <i class="bi bi-telephone icon"></i>
          <div>
            <h4>Kontak Kami</h4>
            <p>
              <strong>Phone:</strong> 0813 1313 1313<br>
              <strong>Email:</strong> mamemam@umkm.id<br>
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 footer-links d-flex">
          <i class="bi bi-clock icon"></i>
          <div>
            <h4>Jam Buka</h4>
            <p>
              <strong>Senin - Sabtu 11.00</strong> - 22.00<br>
              Minggu kita tutup
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Follow Us</h4>
          <div class="social-links d-flex">
            <a href="https://twitter.com/PiTheciasss" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="https://www.facebook.com/rafiarsalan.rafiarsalan/" class="facebook"><i
                class="bi bi-facebook"></i></a>
            <a href="https://www.instagram.com/raparsalan/" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="https://www.linkedin.com/in/raparsalan/" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>mamEmam</span></strong>. All Rights Reserved
      </div>
      <div class="credits">Designed help with <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer><!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>