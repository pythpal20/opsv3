<?php
  include 'config/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>PT. SENECA |Wellcome</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="icon" type="image/png" href="assets/img/snc.png">
<!-- Load Css -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
	<section id="hero">
	<div class="hero-container">
      <a href="index.php" class="hero-logo" data-aos="zoom-in"><img src="lib/img/hero-logo.png" alt=""></a>
      <h1 data-aos="zoom-in">Selamat Datang</h1>
      <?php
          error_reporting();
          $qry = "SELECT * 
          FROM (SELECT stnk_ID, DATEDIFF(TglPajak,CURRENT_DATE()) AS selisih FROM masterstnk)AS pajak
          WHERE selisih > 7 AND selisih < 30";
          $snc1 = $db1->prepare($qry);
          $snc1->execute();
          $res1 = $snc1->get_result();
          while ($row = $res1->fetch_assoc()) {
            $dt[]=$row;
          }
          $jumlahPajak = count($dt);
        ?>
        <!-- batasin coy -->
        <?php
          error_reporting(0);
          $query1 = " SELECT *
          FROM (SELECT DATEDIFF(MasaBerlaku,CURRENT_DATE()) AS jarak FROM masterstnk)AS stnkA
          WHERE jarak > 7 AND jarak < 30 ";
          $snc1 = $db1->prepare($query1); 
          $snc1->execute();
          $res1 = $snc1->get_result();
          while ($row = $res1->fetch_assoc()) {
            $dts[]=$row;
          }
          $jumlah_data = count($dts);
        ?>
      <h2 data-aos="fade-up">Aplikasi Surat Kendaraan PT. Seneca Indonesia</h2>
      <h7 data-aos="fade-up">
        Pajak Kendaraan bulan ini <?php echo $jumlahPajak; ?> | STNK Kendaraan bulan ini <?php echo $jumlah_data; ?></h7>
      <a data-aos="fade-up" href="login.php" class="btn-get-started scrollto">LOGIN</a>
    </div>
	</section>
	
<!-- akhir dari konten -->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/jquery-sticky/jquery.sticky.js"></script>
<script src="assets/vendor/venobox/venobox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
  <!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
</body>
</html>