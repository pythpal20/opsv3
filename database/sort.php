<?php
  include 'koneksi.php';
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
<!-- ========= b a t a s i n   d u l u ========= -->
<?php

  $output = '';
  $order = $_POST["order"];
  if($order == 'desc'){
      $order = 'asc';
  } else {
    $order = 'desc';
  }

  $nama_kolom = $_POST["nama_kolom"];
  $orderby = $_POST["order"];

  $query = "SELECT * FROM masterstnk ms
  JOIN masterkendaraan mk ON ms.KodeAlat=mk.KodeAlat
  JOIN masterjeniskendaraan mjk ON mk.jenis_ID=mjk.jenis_ID ORDER BY ". $nama_kolom ." ". $orderby ."";
  $dewan1 = $db1->prepare($query);
  $dewan1->execute();
  $res1 = $dewan1->get_result();

  $output .= '
  <table class="table table-bordered">
      <tr>
           <th>No</th>
           <th><a class="column_sort" id="mk.KodeAlat" data-order="'.$order.'" href="#">Kode Alat</a></th>
           <th><a class="column_sort" id="mk.NoPol" data-order="'.$order.'" href="#">No Polisi</a></th>
           <th><a class="column_sort" id="mjk.JenisKendaraan" data-order="'.$order.'" href="#">Jenis</a></th>
           <th><a class="column_sort" id="mk.merk" data-order="'.$order.'" href="#">Merk</a></th>
           <th><a class="column_sort" id="MasaBerlaku" data-order="'.$order.'" href="#">Tanggal Stnk</a></th>
           <th><a class="column_sort" id="TglPajak" data-order="'.$order.'" href="#">Tanggal Pajak</a></th>
           <th><a class="column_sort" id="PosisiStnk" data-order="'.$order.'" href="#">Posisi STNK</a></th>
           <th><a class="column_sort" id="NoRangka" data-order="'.$order.'" href="#">No Rangka</a></th>
           <th><a class="column_sort" id="NoMesin" data-order="'.$order.'" href="#">No Mesin</a></th>

      </tr>
  ';
  $no=1;
  while ($row = $res1->fetch_assoc()) {
      $output .= '
      <tr>
           <td>' . $no++ . '</td>
           <td>' . $row["KodeAlat"] . '</td>
           <td>' . $row["NoPol"] . '</td>
           <td>' . $row["JenisKendaraan"] . '</td>
           <td>' . $row["merk"] . '</td>
           <td>' . $row["MasaBerlaku"] . '</td>
           <td>' . $row["TglPajak"] . '</td>
           <td>' . $row["PosisiStnk"] . '</td>
           <td>' . $row["NoRangka"] . '</td>
           <td>' . $row["NoMesin"] . '</td>
      </tr>
      ';  
  }
  $output .= '</table>';
  echo $output;
?>