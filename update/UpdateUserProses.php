<?php
if (isset($_POST['id']) && $_POST['id']) {
    include 'koneksi.php';
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $jbtn = $_POST['jbtn'];
    $username = $_POST['username'];
	$password = $_POST['password'];
    $level = $_POST['lvl'];
    $crt = $_POST['crt'];
    $upd = $_POST['upd'];
    $dlt = $_POST['dlt'];

    // cek nilai variable
    if (empty($id)) {
        header('location: ../UpdateUser.php?error=' .base64_encode('Gagal update! id tidak boleh kosong'));
    }

    if (empty($nama)) {
        header('location: ../UpdateUser.php?error=' .base64_encode('Gagal update! Nama tidak boleh kosong'));   
    }

    if (empty($jbtn)) {
        header('location: ../UpdateUser.php?error=' .base64_encode('Gagal update! Jabatan Harus diisi'));   
    }
    if (empty($username)) {
        header('location: ../UpdateUser.php?error=' .base64_encode('Gagal update! No Mesin Harus diisi'));   
    }
	if (empty($password)) {
        header('location: ../UpdateUser.php?error=' .base64_encode('Gagal update! Password Harus diisi'));   
    }

    // SQL Insert
			$query="UPDATE user SET `nama`='$nama', `jabatan`='$jbtn', `username`='$username', `password`=md5('$password'), `level`='$level', `akses_create`='$crt',`akses_update`='$upd',`akses_delete`='$dlt' WHERE user_ID='$id' ";
		    $snc = $db1->prepare($query);
		    $snc->execute();
		    $res1 = $snc->get_result();
    // jika gagal
			if ($res1->num_rows > 0){
        		echo "<script>alert('".$db1->error."'); window.location.href = '../TableUser.php';</script>";
    			} else {
        			echo "<script>alert('Insert Data Berhasil'); window.location.href = '../TableUser.php';</script>";
    				}
			}
?>