<?php
  include 'config/koneksi.php';
  session_start(); 
  if (!isset($_SESSION['username'])){
        header("Location: login.php");
    }

  $id = $_SESSION['id'];
  $query = "SELECT * FROM user WHERE user_ID='$id'"; 
  $snc1 = $db1->prepare($query); 
  $snc1->execute();
  $res1 = $snc1->get_result();
  $data = $res1->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/snc.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Data KIR | PT. SENECA IND
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
  <link href="assets/css/fullcalendar.css" rel="stylesheet"/>
  <link href="assets/css/material-dashboard.css" rel="stylesheet" type="text/css">
  <link href="assets/js/core/bootstrap-material-design.min.js" rel="stylesheet" type="text/css">
</head>
<body>
  
  <!-- bagian key untuk pencarian -->
  <?php 
    $s_Lok="";
    $s_keyword="";
    if (isset($_POST['search'])) {
      $s_Lok = $_POST['s_Lok'];
      $s_keyword = $_POST['s_keyword'];
    }
  ?>
  <!-- body -->
<div class="wrapper">
  <div class="sidebar" data-color="azure" data-background-color="white" data-image="assets/img/sidebar-1.jpg">
    <div class="logo">
      <a href="dashboard.php" class="simple-text logo-normal">Aplikasi Kendaraan</a>
    </div>
    <div class="sidebar-wrapper">
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link" href="dashboard.php">
            <i class="material-icons">home</i>
            <p>Dashboard</p>
          </a>
        </li>
        <?php if($data['level'] == 'admin') : ?>
        <li class="nav-item dropdown show">
          <a class="nav-link nav-linkdropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="material-icons">dns</i>
            <p>Master Data</p>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="TableUser.php">
              <i class="material-icons">people</i>
              <p>Data Pengguna</p>
            </a>
            <a class="dropdown-item" href="TableLokasi.php">
              <i class="material-icons">map</i>
              <p>Data Lokasi</p>
            </a>
            <a class="dropdown-item" href="TableJeKen.php">
              <i class="material-icons">emoji_transportation</i>
              <p>Data Jenis Kendaraan</p>
            </a>
            <a class="dropdown-item" href="TableKendaraan.php">
              <i class="material-icons">drive_eta</i>
              <p>Data Kendaraan</p>
            </a>
            <a class="dropdown-item" href="TableBpkb.php">
              <i class="material-icons">credit_card</i>
              <p>Data BPKB</p>
            </a>
            <a class="dropdown-item" href="TableStnk.php">
              <i class="material-icons">credit_card</i>
              <p>Data STNK</p>
            </a>
            <a class="dropdown-item" href="TableKir.php">
              <i class="material-icons">credit_card</i>
              <p>Data KIR</p>
            </a>
          </div>
        </li>
        <?php endif ?>
        <?php if($data['level'] == 'user') : ?>
        <li class="nav-item dropdown show">
          <a class="nav-link nav-linkdropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="material-icons">dns</i>
            <p>Master Data</p>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="TableLokasi.php">
              <i class="material-icons">map</i>
              <p>Data Lokasi</p>
            </a>
            <a class="dropdown-item" href="TableJeKen.php">
              <i class="material-icons">emoji_transportation</i>
              <p>Data Jenis Kendaraan</p>
            </a>
            <a class="dropdown-item" href="TableKendaraan.php">
              <i class="material-icons">drive_eta</i>
              <p>Data Kendaraan</p>
            </a>
            <a class="dropdown-item" href="TableBpkb.php">
              <i class="material-icons">credit_card</i>
              <p>Data BPKB</p>
            </a>
            <a class="dropdown-item" href="TableStnk.php">
              <i class="material-icons">credit_card</i>
              <p>Data STNK</p>
            </a>
            <a class="dropdown-item" href="TableKir.php">
              <i class="material-icons">credit_card</i>
              <p>Data KIR</p>
            </a>
          </div>
        </li>
        <?php endif ?>
        <!-- batas create -->
        <?php if($data['akses_update'] == 'ya') : ?>
        <li class="nav-item dropdown">
          <a class="nav-link nav-linkdropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="material-icons">receipt</i>
            <p>Perpanjangan SKB</p>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="UTablePajak.php">
              <i class="material-icons">payments</i>
              <p>Update Pajak</p>
            </a>
            <a class="dropdown-item" href="UTableStnk.php">
              <i class="material-icons">style</i>
              <p>Update STNK</p>
            </a>
            <a class="dropdown-item" href="UTableKir.php">
              <i class="material-icons">rv_hookup</i>
              <p>Update KIR</p>
            </a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="UTableKendaraan.php">
            <i class="material-icons">drive_eta</i>
            <p>Update Kendaraan</p>
          </a>
        </li>
        <?php endif ?>
        <!-- batas update -->
        <?php if($data['akses_delete'] == 'ya') : ?>
        <li class="nav-item dropdown">
          <a class="nav-link nav-linkdropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="material-icons">delete</i>
            <p>Hapus Data</p>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="DTableKendaraan.php">
              <i class="material-icons">rv_hookup</i>
              <p>Data Kendaraan</p>
            </a>
            <a class="dropdown-item" href="DTableLokasi.php">
              <i class="material-icons">rv_hookup</i>
              <p>Data Lokasi</p>
            </a>
            <?php if($data['level']=='admin') : ?>
            <a class="dropdown-item" href="DTableUser.php">
              <i class="material-icons">rv_hookup</i>
              <p>Data Pengguna</p>
            </a>
            <?php endif ?>
          </div>
        </li>
        <?php endif ?>
        <!-- batas delete -->
        <li class="nav-item ">
          <a class="nav-link" href="logout.php">
            <i class="material-icons">login</i>
            <p>Keluar</p>
          </a>
        </li>
      </ul>
    </div>
  </div>
  <div class="main-panel">
    <!-- Navbar nya disini ya -->
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
      <div class="container-fluid">
        <div class="navbar-wrapper">
          <a class="navbar-brand" href="javascript:;">Wellcome <?php echo $data['nama'];?></a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon icon-bar"></span>
          <span class="navbar-toggler-icon icon-bar"></span>
          <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">
          <ul class="navbar-nav">
            <li class="nav-item ">
              <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="material-icons">person</i>
                <p class="d-lg-none d-md-block">
                  <?php echo $_SESSION['username']; ?>
                </p>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                <a class="dropdown-item" href="#"><?php echo $_SESSION['username']; ?></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../logout.php">Log out</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!--Konten dimulai dari sini, sisanya Copas aja -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-info">
                <h4 class="card-title ">Tabel Data KIR</h4>
                <p class="card-category">List KIR</p>
              </div>
              <div class="card-body">
                <form method="post" action="">
                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <div class="input-group">
                        <select name="s_Lok" id="s_Lok" class="form-control" placeholder="Filter Lokasi">
                          <option value="">Semua Lokasi</option>
                          <option value="biro jasa">Biro Jasa</option>
                          <option value="proyek">Proyek</option>
                          <option value="pusat">Pusat</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="input-group">
                        <input type="search" aria-label="Search" name="s_keyword" id="s_keyword" value="<?php echo $s_keyword; ?>" class="form-control" placeholder="Search...">
                        <button type="submit" id="search" name="search" class="btn btn-info">
                          Tampilkan
                          <div class="ripple-container"></div>
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead class=" text-primary text-center">
                      <th>No</th>
                      <th>Kode Alat</th>
                      <th>No Polisi</th>
                      <th>Jenis Kendaraan</th>
                      <th>Merk</th>
                      <th>No. Mesin Kir</th>
                      <th>Tanggal KIR</th>
                      <th>Posisi KIR</th>
                      <th>Action</th>
                    </thead>
                    <tbody>
                      <?php    //ini mah PHP, kita pake object
                        $batas = 10; //ini mah buat set halaman, data ditampilin 10 per page
                        $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                        $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;

                        $previous = $halaman - 1;
                        $next = $halaman + 1;

                        $search_Lokasi = '%'. $s_Lok .'%';
                        $search_keyword = '%'. $s_keyword .'%'; //ini tuh biar bisa pake pencarian bossque
                        $query="SELECT * FROM masterkir mkr
                          JOIN masterkendaraan mk ON mkr.KodeAlat=mk.KodeAlat
                          JOIN masterjeniskendaraan mjk ON mk.jenis_ID=mjk.jenis_ID
                        WHERE mkr.KirPosisi LIKE ? AND (mk.KodeAlat LIKE ? OR mk.NoPol LIKE ? OR mk.merk LIKE ? OR mjk.JenisKendaraan LIKE ? OR mkr.NoMsnKir LIKE ?) ORDER BY mk.KodeAlat ASC";
                        $snc = $db1->prepare($query);
                        $snc->bind_param('ssssss', $search_Lokasi, $search_keyword, $search_keyword, $search_keyword, $search_keyword, $search_keyword);
                        $snc->execute();
                        $res1 = $snc->get_result();
                        while ($row = $res1->fetch_assoc()) {
                          $data[]=$row;
                        }

                        $jumlah_data = count($data);
                        $total_halaman = ceil($jumlah_data / $batas); //ini tuh itungan kayak waktu SD ngitunng hari

                        $query1="SELECT * FROM masterkir mkr
                          JOIN masterkendaraan mk ON mkr.KodeAlat=mk.KodeAlat
                          JOIN masterjeniskendaraan mjk ON mk.jenis_ID=mjk.jenis_ID
                        WHERE mkr.KirPosisi LIKE ? AND (mk.KodeAlat LIKE ? OR mk.NoPol LIKE ? OR mk.merk LIKE ? OR mjk.JenisKendaraan LIKE ? OR mkr.NoMsnKir LIKE ?) ORDER BY mk.KodeAlat
                        LIMIT $halaman_awal, $batas";
                        $snc = $db1->prepare($query1);
                        $snc->bind_param('ssssss', $search_Lokasi, $search_keyword, $search_keyword, $search_keyword, $search_keyword, $search_keyword);
                        $snc->execute();
                        $nomor = $halaman_awal+1;
                        $res1 = $snc->get_result();
                        if ($res1->num_rows > 0) {
                          while ($row = $res1->fetch_assoc()) {
                            $id = $row['KodeAlat'];
                            $nopol = $row['NoPol'];
                            $JeKen = $row['JenisKendaraan'];
                            $merk = $row['merk'];
                            $NoMsnKir = $row['NoMsnKir'];
                            $TglKir = $row['tgl_kir'];
                            $PosKir = $row['KirPosisi'];
                      ?>
                      <tr>
                        <td><?php echo $nomor++; ?></td>
                        <td><?php echo $id;?> </td>
                        <td><?php echo $nopol;?> </td>
                        <td><?php echo $JeKen;?> </td>
                        <td><?php echo $merk;?> </td>
                        <td><?php echo $NoMsnKir; ?></td>
                        <td><?php echo $TglKir; ?></td>
                        <td><?php echo $PosKir; ?></td>
                        <td class="text-center">
                          <?php if($data['akses_update'] == 'ya') : ?>
                          <a title="Ubah" rel="tooltip" href="UpdateKir.php?id=<?php echo $row['KodeAlat']; ?>"><i class="material-icons">create</i></a> | <?php endif ?>
                          <?php if($data['akses_delete'] == 'ya') : ?>
                          <a title="Hapus" rel="tooltip" href="DeleteKir.php?id=<?php echo $row['KodeAlat']; ?>"><i class="material-icons">remove_circle</i></a> <?php endif ?>
                        </td>
                      </tr>
                      <?php } } else { ?>
                      <tr>
                        <td colspan='9'>Tidak ada data ditemukan</td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                  <?php if($data['akses_create'] == "ya") : ?>
                  <a class="btn btn-info" href="FormAddKir.php">+ Tambah Data KIR</a>
                  <?php endif; ?>
                  <nav aria-label="...">
                    <ul class="pagination justify-content-center">
                      <li class="page-item">
                        <a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a>
                      </li>
                      <?php 
                        for($x=1;$x<=$total_halaman;$x++){
                      ?> 
                      <li class="page-item active"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                      <?php
                    }
                      ?>   
                      <li class="page-item">
                        <a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
                      </li>
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
        /* notifikasi jika terjadi error */
        if (isset($_GET['error'])) : ?>
        <div class="alert alert-warning alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <strong>Warning!</strong> <?=base64_decode($_GET['error']);?>
        </div>
        <?php endif;?>
        <footer class="footer">
          <div class="container-fluid">
            <nav class="float-left">
            <!-- tambahan footer 
            jika di perlukan
            -->
            </nav>
            <div class="copyright float-right">
              &copy;
              <script>
                document.write(new Date().getFullYear())
              </script>, PT. SENECA INDONESIA <i class="material-icons">copyright</i> by
              <a href="#" target="_blank">IT Staff</a> Team.
            </div>
          </div>
        </footer>
      </div>
    </div>
  </div>
  <!-- Load Javascript yang panjang amat -->
<script src="assets/js/core/jquery.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap-material-design.min.js"></script>
<script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<script src="assets/js/plugins/moment.min.js"></script>
<script src="assets/js/plugins/sweetalert2.js"></script>
<script src="assets/js/plugins/jquery.validate.min.js"></script>
<script src="assets/js/plugins/jquery.bootstrap-wizard.js"></script>
<script src="assets/js/plugins/bootstrap-selectpicker.js"></script>
<script src="assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
<script src="assets/js/plugins/jquery.dataTables.min.js"></script>
<script src="assets/js/plugins/bootstrap-tagsinput.js"></script>
<script src="assets/js/plugins/jasny-bootstrap.min.js"></script>
<script src="assets/js/plugins/fullcalendar.min.js"></script>
<script src="assets/js/plugins/jquery-jvectormap.js"></script>
<script src="assets/js/plugins/nouislider.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
<script src="assets/js/plugins/arrive.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<script src="assets/js/plugins/chartist.min.js"></script>
<script src="assets/js/plugins/bootstrap-notify.js"></script>
<script src="assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
<script src="assets/demo/demo.js"></script>
<script src="assets/js/moment.min.js"></script>
<script>
  $(document).ready(function() {
    $().ready(function() {
      $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('open');
          }

        }

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
</script>
</body>
</html>