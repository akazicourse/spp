<?php
if( empty( $_SESSION['iduser'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if( isset( $_REQUEST['aksi'] )){
		$aksi = $_REQUEST['aksi'];
		switch($aksi){
			case 'view':
				include 'kelas_baru.php';
				break;	
			case 'edit':
				include 'kelas_edit.php';
				break;
			case 'hapus':
				include 'kelas_hapus.php';
				break;
		}		
	} else {
		$sql = mysqli_query($connect, "SELECT * FROM kelas");
		echo '<h2>Daftar Kelas</h2><hr>';
      	echo '<div class="row">';
		echo '<div class="col-md-7"><table class="table table-bordered">';
		echo '<tr class="info"><th width="50">#</th><th>Kelas</th><th>Wali Kelas</th>';
		echo '<th width="200"><a href="./admin.php?hlm=master&sub=kelas&aksi=view" class="btn btn-default btn-xs">Tambah Data</a></th></tr>';
		
		if(mysqli_num_rows($sql) > 0 ){
			$no = 1;
			while(list($kelas, $wali_kelas) = mysqli_fetch_array($sql)){
				echo '<tr><td>'.$no.'</td>';
				echo '<td>'.$kelas.'</td>';
				echo '<td>'.$wali_kelas.'</td>';
				echo '<td><a href="./admin.php?hlm=master&sub=kelas&aksi=edit&kelas='.$kelas.'" class="btn btn-success btn-xs">Edit</a> ';
				echo '<a href="./admin.php?hlm=master&sub=kelas&aksi=hapus&kelas='.$kelas.'" class="btn btn-danger btn-xs">Hapus</a></td>';
				echo '</tr>';
				$no++;
			}
		} else {
			echo '<tr><td colspan="4"><em>Belum ada data</em></td></tr>';
		}
		
		echo '</table></div></div>';
	}
}
?>