<?php
if (isset($_POST['id']) && $_POST['id']) {
    include 'koneksi.php';
    $id = $_POST['id'];
    $lok = $_POST['lokasi'];
    $keterangan = $_POST['ket'];

    // cek nilai variable
    if (empty($id)) {
        header('location: ../UpdateLokasi.php?error=' .base64_encode('id tidak boleh kosong'));
    }

    if (empty($lok)) {
        header('location: ../UpdateLokasi.php?error=' .base64_encode('Nama lokasi harus diisi'));   
    }
    // SQL Insert
			$query="UPDATE masterlokasi SET  `lokasi`='$lok', `keterangan`='$keterangan' WHERE lok_ID='$id' ";
		    $snc = $db1->prepare($query);
		    $snc->execute();
		    $res1 = $snc->get_result();
    // jika gagal
			if ($res1->num_rows > 0){
        		echo "<script>alert('".$db1->error."'); window.location.href = '../UpdateLokasi.php';</script>";
    			} else {
        			echo "<script>alert('Insert Data Berhasil'); window.location.href = '../TableLokasi.php';</script>";
    				}
			}
?>