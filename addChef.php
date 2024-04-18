<?php

include("function.php");
$listChef = readChef();

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
    <!-- ======= Form Add Section ======= -->
    <section id="add-menu" class="about">

      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <br>
          <p>Tambah<span> Chef </span>Baru</p>
        </div>
        <div class="gradient-custom-1 h-100">
          <div class="mask d-flex align-items-center h-100">
            <div class="container">
              <form action="#" method="POST" id="form-add" enctype="multipart/form-data">
                <input type="hidden" name="id_chef" id="id_chef">
                <div class="mb-3">
                  <label for="nama_chef" class="form-label">Nama Chef</label>
                  <input type="text" class="form-control" id="nama_chef" name="nama_chef" required>
                </div>
                <div class="mb-3">
                  <label for="no_telp_chef" class="form-label">No Telp Chef</label>
                  <input type="text" class="form-control" id="no_telp_chef" name="no_telp_chef" required>
                </div>
                <div class="mb-3">
        <label for="alamat" class="form-label" id="main-label">Alamat</label>


        <div class="form-group row" id="alamat-group">
          <label for="alamat_jln" class="col-sm-2 col-form-label">Jalan</label>
          <div class="col-sm-10">
            <input class="form-control" name="alamat_jln">
          </div>
        </div>


        <div class="form-group row" id="alamat-group">
          <label for="alamat_provinsi" class="col-sm-2 col-form-label">Provinsi</label>
          <div class="col-sm-10">
            <select class="form-select" id="provinsi" name="provinsi"></select>
          </div>
        </div>


        <div id="result"></div>
        <div class="form-group row" id="alamat-group">
          <label for="alamat_kota" class="col-sm-2 col-form-label" id="lbl_kabupaten">Kota/kabupaten</label>
          <div class="col-sm-10">
            <select class="form-select" id="kabupaten" name="kabupaten"></select>
          </div>
        </div>


        <div class="form-group row" id="alamat-group">
          <label for="alamat_jln" class="col-sm-2 col-form-label" id="lbl_kecamatan">Kecamatan</label>
          <div class="col-sm-10">
            <input class="form-control" name="kecamatan" id="kecamatan">
          </div>
        </div>


        <div class="form-group row" id="alamat-group">
          <label for="alamat_jln" class="col-sm-2 col-form-label" id="lbl_kelurahan">Kelurahan</label>
          <div class="col-sm-10">
            <input class="form-control" name="kelurahan" id="kelurahan">
          </div>
        </div>


      </div>
                <div class="mb-3">
                  <label for="jenis_kelamin_chef">Jenis Kelamin</label>
                  <select class="form-select" aria-label="Category" id="jenis_kelamin_chef" name="jenis_kelamin_chef"
                    required>
                    <option value="L">Laki-Laki</option>
                    <option value="P">Perempuan</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="foto_chef" class="form-label">Foto Chef</label>
                  <input class="form-control" type="file" id="foto_chef" name="foto_chef" required>
                </div>
                <a href="admin.php"><button type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal">Cancel</button></a>
                <button type="submit" class="btn btn-info text-white" name="add-chef" id="add-chef"
                  form="form-add">Tambahkan Chef</button>
              </form>

            </div>
          </div>
        </div>
      </div>
      </div>
    </section><!-- End Form Add Section -->

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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			// hilangkan label dan tag select yang belum dibutuhkan
			$("#lbl_kabupaten").hide();
			$("#kabupaten").hide();
			$("#kecamatan").hide();
			$("#lbl_kecamatan").hide();
			$("#lbl_kelurahan").hide();
			$("#kelurahan").hide();
			
			// menambahkan option ke elemen yang memiliki id = “provinsi” dan mengosongkan element yang memiliki id = “kabupaten”.
			$("#provinsi").append('<option value="">Pilih</option>');
			$("#kabupaten").html('');

			// implementasi kode jquery
			url = 'get_provinsi.php';
			$.ajax({
				url: url,
				type: 'GET',
				dataType: 'json',
				success: function(result) {
					// apa yang akan dilakukan pada data json yang sudah digenerate
					for(var i=0;i<result.length;i++) 
						$("#provinsi").append('<option value="'+result[i].id_prov+'">'+result[i].nama+'</option>');
				}
			});
		});

		$("#provinsi").change(function() {
			$("#lbl_kabupaten").slideDown();
			$("#kabupaten").slideDown();

			// fetch id provinsi
			var id_prov = $("#provinsi").val();
			// masukkan id provinsi ke url kabupaten
			var url = 'get_kabupaten.php?id_prov='+id_prov;

			$("#kabupaten").html('');
			$.ajax({
				url: url,
				type: 'GET',
				dataType: 'json',
				success: function(result) {
					$("#kabupaten").append('<option value="">Pilih</option>');
					for (var i=0; i<result.length; i++) {
							// apa yang akan dilakukan pada data json yang sudah digenerate
						$("#kabupaten").append('<option value="'+result[i].id_kab+'">'+result[i].nama+'</option>');
					}
				}
			});
		});

		// jika nilai/value dari element yang memiliki id = “provinsi” muncul kecamatan dan kelurahan
		$("#kabupaten").change(function() {
			$("#kecamatan").slideDown();
			$("#lbl_kecamatan").slideDown();
			$("#kelurahan").slideDown();
			$("#lbl_kelurahan").slideDown();
		})
	</script>
	

</body>

</html>