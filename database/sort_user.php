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

  $query = "SELECT * FROM user ORDER BY ". $nama_kolom ." ". $orderby ."";
  $dewan1 = $db1->prepare($query);
  $dewan1->execute();
  $res1 = $dewan1->get_result();

  $output .= '
  <table class="table table-bordered">
      <tr>
           <th rowspan="2">No</th>
           <th rowspan="2"><a class="column_sort" id="user_ID" data-order="'.$order.'" href="#">ID</a></th>
           <th rowspan="2"><a class="column_sort" id="nama" data-order="'.$order.'" href="#">Nama</a></th>
           <th rowspan="2"><a class="column_sort" id="jabatan" data-order="'.$order.'" href="#">Jabatan</a></th>
           <th rowspan="2"><a class="column_sort" id="username" data-order="'.$order.'" href="#">usernam</a></th>
           <th rowspan="2"><a class="column_sort" id="level" data-order="'.$order.'" href="#">Level User</a></th>
           <th colspan="3" class="text-center">Akses</th>
      </tr>
      <tr>
           <th><a class="column_sort" id="akses_create" data-order="'.$order.'" href="#">Create</a></th>
           <th><a class="column_sort" id="akses_update" data-order="'.$order.'" href="#">Update</a></th>
           <th><a class="column_sort" id="akses_delete" data-order="'.$order.'" href="#">Delete</a></th>
      </tr>
  ';
  $no=1;
  while ($row = $res1->fetch_assoc()) {
      $output .= '
      <tr>
           <td>' . $no++ . '</td>
           <td>' . $row["user_ID"] . '</td>
           <td>' . $row["nama"] . '</td>
           <td>' . $row["jabatan"] . '</td>
           <td>' . $row["username"] . '</td>
           <td>' . $row["level"] . '</td>
           <td>' . $row["akses_create"] . '</td>
           <td>' . $row["akses_update"] . '</td>
           <td>' . $row["akses_delete"] . '</td>
      </tr>
      ';  
  }
  $output .= '</table>';
  echo $output;
?>