<?php
if (isset($_POST['id']) && $_POST['id']) {
    include 'koneksi.php';
    $id = $_POST['id'];
    $KodeAlat = $_POST['KodeAlat'];
    $tglStnk = $_POST['MasaBerlaku'];

    // cek nilai variable
    if (empty($id)) {
        header('location: ../PerpanjangStnk.php?error=' .base64_encode('id tidak boleh kosong'));
    }

    if (empty($KodeAlat)) {
        header('location: ../PerpanjangStnk.php?error=' .base64_encode('No Polisi Harus Dipilih'));   
    }

    if (empty($tglPajak)) {
        header('location: ../PerpanjangStnk.php?error=' .base64_encode('Tanggal Pajak Harus diisi'));   
    }
    // SQL Insert
            $query="UPDATE masterstnk SET `TglPajak`='$tglStnk' WHERE `stnk_ID`='$id' ";
            $snc = $db1->prepare($query);
            $snc->execute();
            $res1 = $snc->get_result();
    // jika gagal
            if ($res1->num_rows > 0){
                echo "<script>alert('".$db1->error."'); window.location.href = '../PerpanjangStnk.php';</script>";
                } else {
                    echo "<script>alert('Insert Data Berhasil'); window.location.href = '../UTableStnk.php';</script>";
                    }
            }
?>