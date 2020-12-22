<?php
if (isset($_POST['id']) && $_POST['id']) {
    include 'config/koneksi.php';
    $id = $_POST['id'];
    $KodeAlat = $_POST['KodeAlat'];
    $tglStnk = $_POST['tglStnk'];
    $tglPajak = $_POST['tglPajak'];
    $posisiStnk = $_POST['posisiStnk'];
    $NoRak = $_POST['NoRak'];
    $NoMsn = $_POST['NoMsn'];

    // cek nilai variable
    if (empty($id)) {
        header('location: ./FormAddStnk.php?error=' .base64_encode('id tidak boleh kosong'));
    }

    if (empty($KodeAlat)) {
        header('location: ./FormAddStnk.php?error=' .base64_encode('No Polisi Harus Dipilih'));   
    }

    if (empty($tglStnk)) {
        header('location: ./FormAddStnk.php?error=' .base64_encode('Tanggal STNK Harus diisi'));   
    }
    if (empty($tglPajak)) {
        header('location: ./FormAddStnk.php?error=' .base64_encode('Tanggal Pajak Harus diisi'));   
    }
    if (empty($posisiStnk)) {
        header('location: ./FormAddStnk.php?error=' .base64_encode('Posisi STNK Harus dipilih'));   
    }
    if (empty($NoRak)) {
        header('location: ./FormAddStnk.php?error=' .base64_encode('No Rangka harus diisi'));   
    }
    if (empty($NoMsn)) {
        header('location: ./FormAddStnk.php?error=' .base64_encode('Mesin harus diisi'));   
    }
    // SQL Insert
            $query="INSERT INTO masterstnk (`stnk_ID`, `KodeAlat`, `MasaBerlaku`, `TglPajak`, `PosisiStnk`, `NoRangka`, `NoMesin`) VALUES ('$id', '$KodeAlat','$tglStnk', '$tglPajak','$posisiStnk', '$NoRak', '$NoMsn')";
            $snc = $db1->prepare($query);
            $snc->execute();
            $res1 = $snc->get_result();
    // jika gagal
            if ($res1->num_rows > 0){
                echo "<script>alert('".$db1->error."'); window.location.href = './FormAddStnk.php';</script>";
                } else {
                    echo "<script>alert('Insert Data Berhasil'); window.location.href = './TableStnk.php';</script>";
                    }
            }
?>