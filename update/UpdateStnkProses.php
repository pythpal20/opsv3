<?php
if (isset($_POST['id']) && $_POST['id']) {
    include 'koneksi.php';
    $id = $_POST['id'];
    $KodeAlat = $_POST['KodeAlat'];
    $tglStnk = $_POST['MasaBerlaku'];
    $tglPajak = $_POST['TglPajak'];
    $posisiStnk = $_POST['PosisiStnk'];
    $NoRak = $_POST['NoRak'];
    $NoMsn = $_POST['NoMsn'];

    // cek nilai variable
    if (empty($id)) {
        header('location: ../UpdateStnk.php?error=' .base64_encode('id tidak boleh kosong'));
    }

    if (empty($KodeAlat)) {
        header('location: ../UpdateStnk.php?error=' .base64_encode('No Polisi Harus Dipilih'));   
    }

    if (empty($tglStnk)) {
        header('location: ../UpdateStnk.php?error=' .base64_encode('Tanggal STNK Harus diisi'));   
    }
    if (empty($tglPajak)) {
        header('location: ../UpdateStnk.php?error=' .base64_encode('Tanggal Pajak Harus diisi'));   
    }
    if (empty($posisiStnk)) {
        header('location: ../UpdateStnk.php?error=' .base64_encode('Posisi STNK Harus dipilih'));   
    }
    if (empty($NoRak)) {
        header('location: ../UpdateStnk.php?error=' .base64_encode('No Rangka harus diisi'));   
    }
    if (empty($NoMsn)) {
        header('location: ../UpdateStnk.php?error=' .base64_encode('Mesin harus diisi'));   
    }
    // SQL Insert
            $query="UPDATE masterstnk SET `MasaBerlaku`='$tglStnk', `TglPajak`='$tglPajak', `PosisiStnk`='$posisiStnk', `NoRangka`='$NoRak', `NoMesin`='$NoMsn' WHERE stnk_ID='$id' ";
            $snc = $db1->prepare($query);
            $snc->execute();
            $res1 = $snc->get_result();
    // jika gagal
            if ($res1->num_rows > 0){
                echo "<script>alert('".$db1->error."'); window.location.href = '../UpdateStnk.php';</script>";
                } else {
                    echo "<script>alert('Update Data Berhasil'); window.location.href = '../TableStnk.php';</script>";
                    }
            }
?>