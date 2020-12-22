<?php
if (isset($_POST['id']) && $_POST['id']) {
    include 'koneksi.php';
    $id = $_POST['id'];
    $KodeAlat = $_POST['KodeAlat'];
    $NoMsnKir = $_POST['NoMsnKir'];
    $tglKir = $_POST['tglKir'];

    // cek nilai variable
    if (empty($id)) {
        header('location: ../PerpanjangKir.php?error=' .base64_encode('id tidak boleh kosong'));
    }
    if (empty($tglKir)) {
        header('location: ../PerpanjangKir.php?error=' .base64_encode('Tanggal kir Harus diisi'));    
    }
    // SQL Insert
            $query="UPDATE masterkir SET `tgl_kir`='$tglKir' WHERE kir_ID='$id' ";
            $snc = $db1->prepare($query);
            $snc->execute();
            $res1 = $snc->get_result();
    // jika gagal
            if ($res1->num_rows > 0){
                echo "<script>alert('".$db1->error."'); window.location.href = '../PerpanjangKir.php';</script>";
                } else {
                    echo "<script>alert('Update Data Berhasil'); window.location.href = '../UTableKir.php';</script>";
                    }
            }
?>