<?php
include("function.php");
$bahan = readBahan();
$chef = readChef();
if (isset($_GET['id_menu'])) {
  $id = ($_GET["id_menu"]);
  $result = readQuery('menu', 'id_menu', $id);
  $data = mysqli_fetch_assoc($result);
  $bahanMenu = readBahanMenu($data['id_menu']);
  if (!count($data)) {
    echo "<script>alert('Data tidak ditemukan pada database');window.location='admin.php';</script>";
  }
} else {
  echo "<script>alert('Masukkan data id.');window.location='admin.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>mamEmam</title>
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
          <li><a href="index.php">Home</a></li>
          <li><a href="admin.php#bahan">Bahan Bahan</a></li>
          <li><a href="admin.php#menu">List Menu</a></li>
          <li><a href="admin.php#chefs">Chefs</a></li>
        </ul>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <main id="main">
    <!-- ======= Form Update ======= -->
    <section id="edit-menu" class="about">

      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <br>
          <p>Edit<span> Menu </span></p>
        </div>
        <div class="gradient-custom-1 h-100">
          <div class="mask d-flex align-items-center h-100">
            <div class="container">
              <form action="#" method="POST" id="form-add" enctype="multipart/form-data">
                <input type="hidden" name="id" id="id" value="<?= $data['id_menu'] ?>">
                <div class="mb-3">
                  <img src="assets/img/<?= $data['foto_menu'] ?>" alt="" width="300" height="300">
                  <br>
                  <label for="foto_makanan" class="form-label">Abaikan Jika tidak mengganti foto</label>
                  <input class="form-control" type="file" id="foto_makanan" name="foto_makanan">
                </div>
                <div class="mb-3">
                  <label for="nama_menu" class="form-label">Nama Menu</label>
                  <input type="text" class="form-control" id="nama_menu" name="nama_menu"
                    value="<?= $data['nama_menu'] ?>" required>
                </div>
                <div class="mb-3">
                  <label for="deskripsi" class="form-label">Deskripsi</label>
                  <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                    value="<?= $data['deskripsi'] ?>" required>
                </div>
                <div class="mb-3">
                  <label for="harga_menu" class="form-label">Harga</label>
                  <input type="text" class="form-control" id="harga_menu" name="harga_menu" value="<?= $data['harga'] ?>"
                    required>
                </div>
                <div class="mb-3">
                  <label for="jenis_menu">Jenis</label>
                  <select class="form-select" aria-label="Category" id="jenis_menu" name="jenis_menu" required>
                    <option value="1">Makanan</option>
                    <option value="2">Minuman</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="chef">Chef yang memasak</label>
                  <select class="form-select" aria-label="Category" id="chef" name="chef" required>
                    <?php
                    while ($listChef = mysqli_fetch_assoc($chef)) {
                      ?>
                      <option value="<?= $listChef['id_chef'] ?>" <?php
                      if ($listChef['id_chef'] == $data['id_chef']) { ?>
                          selected <?php
                      }
                      ?>>
                        Chef <?= $listChef['nama_chef'] ?>
                      </option>
                      <?php
                    }
                    ?>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="menu">Pilih Bahan</label>
                  <div class="container">
                    <div class="row g-0">
                      <?php
                      while ($listBahan = mysqli_fetch_assoc($bahan)) {
                        ?>
                        <div class="col-md-3">
                          <input type="checkbox" name="listBahan[]" value="<?= $listBahan['id_bahan'] ?>" <?php
                          foreach ($bahanMenu as $listBahanMenu) {
                            if ($listBahanMenu['id_bahan'] == $listBahan['id_bahan']) { ?>
                                checked <?php
                            }
                          }
                          ?>>
                          <label>
                            <?= $listBahan['nama_bahan'] ?>
                          </label>
                        </div>
                        <?php
                      }
                      ?>
                    </div>
                  </div>
                </div>
                <a href="admin.php"><button type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal">Cancel</button></a>
                <button type="submit" class="btn btn-info text-white" name="edit-menu" id="edit-menu"
                  form="form-add">Update Menu</button>
              </form>

            </div>
          </div>
        </div>
      </div>
      </div>
    </section><!-- Form Update End -->

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