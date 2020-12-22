<?php
if (isset($_POST['id']) && $_POST['id']) {
    include 'config/koneksi.php';
    $id = $_POST['id'];
    $nopol = $_POST['NoPol'];
    $JnsKen = $_POST['JnsKen'];
    $merk = $_POST['merk'];
    $locat = $_POST['locat'];
    $kon = $_POST['kondisi'];
    $ket = $_POST['keterangan'];

    // cek nilai variable
    if (empty($id)) {
        header('location: ./FormAddKendaraan.php?error=' .base64_encode('id tidak boleh kosong'));
    }

    if (empty($nopol)) {
        header('location: ./FormAddKendaraan.php?error=' .base64_encode('No Polisi tidak boleh kosong'));
    }

    if (empty($JnsKen)) {
        header('location: ./FormAddKendaraan.php?error=' .base64_encode('Jenis harus diisi'));   
    }

    if (empty($merk)) {
        header('location: ./FormAddKendaraan.php?error=' .base64_encode('Merk tidak boleh kosong'));
    }

    if (empty($locat)) {
        header('location: ./FormAddKendaraan.php?error=' .base64_encode('Lokasi harus ada'));
    }

    if (empty($kon)) {
        header('location: ./FormAddKendaraan.php?error=' .base64_encode('Kondisi Harus diisi'));
    }

    // SQL Insert
			$query="INSERT INTO masterkendaraan (`KodeAlat`, `NoPol`, `jenis_ID`, `merk`, `lok_ID`, `kondisi`, `ktr`) VALUES ('$id','$nopol', '$JnsKen','$merk', '$locat', '$kon', '$ket')";
		    $snc = $db1->prepare($query); 
		    $snc->execute();
		    $res1 = $snc->get_result();
    // jika gagal
            // KodeAlat  NoPol       jenis_ID   merk      lok_ID     kondisi  ktr   
			if ($res1->num_rows > 0){
        		echo "<script>alert('".$db1->error."'); window.location.href = './FormAddKendaraan.php';</script>";
    			} else {
        			echo "<script>alert('Insert Data Berhasil'); window.location.href = './TableKendaraan.php';</script>";
    				}
			}
?>