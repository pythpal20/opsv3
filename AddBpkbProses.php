<?php
if (isset($_POST['id']) && $_POST['id']) {
    include 'config/koneksi.php';
    $id = $_POST['id'];
    $KodeAlat = $_POST['KodeAlat'];
    $nobpkb = $_POST['nobpkb'];
    $Bpkbnama = $_POST['Bpkbnama'];
    $tahun = $_POST['tahun'];
    $posisiBpkb = $_POST['posisiBpkb'];

    // cek nilai variable
    if (empty($id)) {
        header('location: ./FormAddUser.php?error=' .base64_encode('id tidak boleh kosong'));
    }

    if (empty($nobpkb)) {
        header('location: ./FormAddUser.php?error=' .base64_encode('No Bpkb tidak boleh kosong'));   
    }

    if (empty($KodeAlat)) {
        header('location: ./FormAddUser.php?error=' .base64_encode('No Polisi Harus Pilih'));   
    }
    if (empty($Bpkbnama)) {
        header('location: ./FormAddUser.php?error=' .base64_encode('nama Harus diisi'));   
    }
    if (empty($tahun)) {
        header('location: ./FormAddUser.php?error=' .base64_encode('Tahun Harus pilih'));   
    }
    if (empty($posisiBpkb)) {
        header('location: ./FormAddUser.php?error=' .base64_encode('Posisi BPKB Harus pilih'));   
    }

    // SQL Insert
            $query="INSERT INTO masterbpkb (`bpkb_ID`, `nobpkb`, `KodeAlat`, `bpkb_nama`, `bpkb_tahun`, `bpkb_posisi`) VALUES ('$id', '$nobpkb','$KodeAlat', '$Bpkbnama','$tahun', '$posisiBpkb')";
            $snc = $db1->prepare($query);
            $snc->execute();
            $res1 = $snc->get_result();
    // jika gagal
            if ($res1->num_rows > 0){
                echo "<script>alert('".$db1->error."'); window.location.href = './FormAddBpkb.php';</script>";
                } else {
                    echo "<script>alert('Insert Data Berhasil'); window.location.href = './TableBpkb.php';</script>";
                    }
            }
?>