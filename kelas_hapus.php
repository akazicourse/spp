<?php
if( empty( $_SESSION['iduser'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if( isset( $_REQUEST['submit'] )){
		//hapus kelas beserta seluruh siswa di dalamnya
		$kelas = $_REQUEST['kelas'];
		
		$sql = mysqli_query($connect, "DELETE FROM kelas WHERE kelas='$kelas'");
		if($sql > 0){
			header('Location: ./admin.php?hlm=master&sub=kelas');
			die();
		} else {
			echo 'Error! Cek query';
		}
	} else {
		//dialog untuk memastikan proses hapus dilakukan secara sadar
		$kelas = $_REQUEST['kelas'];

		$sql = mysqli_query($connect, "SELECT * FROM kelas WHERE kelas='$kelas'");
		list($kelas,$wali_kelas) = mysqli_fetch_array($sql);
		
		echo '<div class="alert alert-danger">Yakin akan menghapus kelas?';
		echo '<br>Kelas  : <strong>'.$kelas.'</strong>';
		echo '<br>Wali Kelas: '.$wali_kelas;
		echo '<br>';
		echo '<a href="./admin.php?hlm=master&sub=kelas&aksi=hapus&submit=ya&kelas='.$kelas.'" class="btn btn-sm btn-success">Ya, Hapus</a> ';
		echo '<a href="./admin.php?hlm=master&sub=kelas" class="btn btn-sm btn-default">Tidak</a>';
		echo '</div>';
	}
}
?>
