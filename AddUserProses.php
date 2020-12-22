<?php
if (isset($_POST['id']) && $_POST['id']) {
    include 'config/koneksi.php';
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $jbtn = $_POST['jbtn'];
    $username = $_POST['username'];
	$password = $_POST['password'];
    $crt = $_POST['crt'];
    $upd = $_POST['upd'];
    $dlt = $_POST['dlt'];

    // cek nilai variable
    if (empty($id)) {
        header('location: ./FormAddUser.php?error=' .base64_encode('id tidak boleh kosong'));
    }

    if (empty($nama)) {
        header('location: ./FormAddUser.php?error=' .base64_encode('Nama tidak boleh kosong'));   
    }

    if (empty($jbtn)) {
        header('location: ./FormAddUser.php?error=' .base64_encode('Jabatan Harus diisi'));   
    }
    if (empty($username)) {
        header('location: ./FormAddUser.php?error=' .base64_encode('No Mesin Harus diisi'));   
    }
	if (empty($password)) {
        header('location: ./FormAddUser.php?error=' .base64_encode('No Rangka Harus diisi'));   
    }

    // SQL Insert
			$query="INSERT INTO user (`user_ID`, `nama`, `jabatan`, `username`, `password`, `akses_create`,`akses_update`,`akses_delete`) VALUES ('$id', '$nama','$jbtn', '$username', md5('$password'), '$crt','$upd', '$dlt')";
		    $snc = $db1->prepare($query);
		    $snc->execute();
		    $res1 = $snc->get_result();
    // jika gagal
			if ($res1->num_rows > 0){
        		echo "<script>alert('".$db1->error."'); window.location.href = './FormAddUser.php';</script>";
    			} else {
        			echo "<script>alert('Insert Data Berhasil'); window.location.href = './TableUser.php';</script>";
    				}
			}
?>