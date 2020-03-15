<?php
if( empty( $_SESSION['iduser'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if( isset( $_REQUEST['submit'] )){
		$tapel = $_REQUEST['tapel'];
		$tingkat = $_REQUEST['tingkat'];
		$jenis = $_REQUEST['jenis'];
		$jumlah = $_REQUEST['jumlah'];
		
		$sql = mysqli_query($connect,"DELETE FROM jenis_bayar WHERE tingkat='$tingkat' AND jenis='$jenis'");
		if($sql > 0){
			header('Location: ./admin.php?hlm=master&sub=jenis');
			die();
		} else {
			echo 'ada ERROR dengan query';
		}
	} else {
		$tapel = $_REQUEST['tapel'];
		$tingkat = $_REQUEST['tingkat'];
		$jenis = $_REQUEST['jenis'];
		
		$sql = mysqli_query($connect,"SELECT * FROM jenis_bayar WHERE th_pelajaran='$tapel' AND  tingkat='$tingkat' AND jenis='$jenis'");
		list($th_pelajaran,$jenis,$tingkat,$jumlah) = mysqli_fetch_array($sql);
		
		echo '<div class="alert alert-danger">Yakin akan menghapus Jenis Pembayaran?';
		echo '<br> Jenis Pembayaran : '.$jenis.' ('.$th_pelajaran.')';
		echo '<br> Nominal : Rp. '.$jumlah.'<br><br>';
		echo '<a href="./admin.php?hlm=master&sub=jenis&aksi=hapus&submit=ya&tapel='.$th_pelajaran.'&tingkat='.$tingkat.'&jenis='.$jenis.'" class="btn btn-sm btn-success">Ya, Hapus</a> ';
		echo '<a href="./admin.php?hlm=master&sub=jenis" class="btn btn-sm btn-default">Tidak</a>';
		echo '</div>';
	}
}
?>