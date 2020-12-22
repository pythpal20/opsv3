<?php
if (isset($_POST['id']) && $_POST['id']) {
    include 'koneksi.php';
    $id = $_POST['id'];
    $JnsKen = $_POST['JnsKen'];

    // cek nilai variable
    if (empty($id)) {
        header('location: ./FormAddJenis.php?error=' .base64_encode('id tidak boleh kosong'));
    }

    if (empty($JnsKen)) {
        header('location: ./FormAddJenis.php?error=' .base64_encode('Jenis harus diisi'));   
    }

    // SQL Insert
			$query="UPDATE masterjeniskendaraan SET JenisKendaraan='$JnsKen' WHERE jenis_ID='$id'";
		    $snc = $db1->prepare($query);
		    $snc->execute();
		    $res1 = $snc->get_result();
    // jika gagal
			if ($res1->num_rows > 0){
        		echo "<script>alert('".$db1->error."'); window.location.href = './UpdateJenis.php';</script>";
    			} else {
        			echo "<script>alert('Update Data Berhasil'); window.location.href = '../TableJeKen.php';</script>";
    				}
			}
?>