<?php
if( empty( $_SESSION['iduser'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if( isset( $_REQUEST['submit'] )){
		$nis = $_REQUEST['nis'];
		$sql = mysqli_query($connect, "DELETE FROM siswa WHERE nis='$nis'");
		if($sql > 0){
			header('Location: ./admin.php?hlm=master&sub=siswa');
			die();
		} else {
			echo 'ada ERROR dengan query';
		}
	} else {
		$nis = $_REQUEST['nis'];
		$sql = mysqli_query($connect, "SELECT * FROM siswa WHERE nis='$nis'");
		list($nis,$nama,$kelas) = mysqli_fetch_array($sql);
		
		echo '<div class="alert alert-danger">Yakin akan menghapus Siswa:';
		echo '<br>Nama  : <strong>'.$nama.'</strong>';
		echo '<br>NIS   : '.$nis;
		
		$query_kelas = mysqli_query($connect, "SELECT kelas FROM kelas WHERE kelas='$kelas'");
		list($kelas) = mysqli_fetch_array($query_kelas);
		
		echo '<br>kelas : '.$kelas.'<br><br>';
		echo '<a href="./admin.php?hlm=master&sub=siswa&aksi=hapus&submit=ya&nis='.$nis.'" class="btn btn-sm btn-success">Ya, Hapus</a> ';
		echo '<a href="./admin.php?hlm=master&sub=siswa" class="btn btn-sm btn-default">Tidak</a>';
		echo '</div>';
	}
}
?>