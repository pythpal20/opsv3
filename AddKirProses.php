<?php
if (isset($_POST['id']) && $_POST['id']) {
    include 'config/koneksi.php';
    $id = $_POST['id'];
    $KodeAlat = $_POST['KodeAlat'];
    $NoMsnKir = $_POST['NoMsnKir'];
    $tglKir = $_POST['tglKir'];
    $posisiKir = $_POST['posisiKir'];

    // cek nilai variable
    if (empty($id)) {
        header('location: ./FormAddKir.php?error=' .base64_encode('id tidak boleh kosong'));
    }

    if (empty($KodeAlat)) {
        header('location: ./FormAddKir.php?error=' .base64_encode('No Polisi Harus Dipilih'));   
    }

    if (empty($NoMsnKir)) {
        header('location: ./FormAddKir.php?error=' .base64_encode('No Mesin Kir Harus diisi'));   
    }
    if (empty($tglKir)) {
        header('location: ./FormAddKir.php?error=' .base64_encode('Tanggal kir Harus diisi'));   
    }
    if (empty($posisiKir)) {
        header('location: ./FormAddKir.php?error=' .base64_encode('Posisi KIR Harus dipilih'));   
    }
    // SQL Insert
            $query="INSERT INTO masterkir (`kir_ID`, `KodeAlat`, `NoMsnKir`, `tgl_kir`, `KirPosisi`) VALUES ('$id', '$KodeAlat','$NoMsnKir', '$tglKir','$posisiKir')";
            $snc = $db1->prepare($query);
            $snc->execute();
            $res1 = $snc->get_result();
    // jika gagal
            if ($res1->num_rows > 0){
                echo "<script>alert('".$db1->error."'); window.location.href = './FormAddKir.php';</script>";
                } else {
                    echo "<script>alert('Insert Data Berhasil'); window.location.href = './TableKir.php';</script>";
                    }
            }
?>