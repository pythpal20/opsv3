<?php
    // SQL Insert
			include 'koneksi.php';
			$id = $_GET['id'];
			$query="DELETE FROM masterlokasi WHERE lok_ID='$id'";
		    $snc = $db1->prepare($query);
		    $snc->execute();
		    $res1 = $snc->get_result();
    // jika gagal
			if ($res1->num_rows > 0){
        		echo "<script>alert('".$dbl->error."'); window.location.href = '../TableLokasi.php';</script>";
    			} else {
        			echo "<script>alert('Data sudah Dihapus'); window.location.href = '../TableLokasi.php';</script>";
    				}
?>