<?php
if( empty( $_SESSION['iduser'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if( isset( $_REQUEST['submit'] )){
		$nis = $_REQUEST['nis'];
		$nama = $_REQUEST['nama'];
		$kelas = $_REQUEST['kelas'];
		$orang_tua = $_REQUEST['orang_tua'];
		$no_telp = $_REQUEST['no_telp'];
		
		$sql = mysqli_query($connect, "UPDATE siswa SET nama='$nama', kelas='$kelas', orang_tua='$orang_tua', no_telp='$no_telp'
		 WHERE nis='$nis'");
		
		if($sql > 0){
			header('Location: ./admin.php?hlm=master&sub=siswa');
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {
		$nis = $_REQUEST['nis'];
		$sql = mysqli_query($connect, "SELECT * FROM siswa WHERE nis='$nis'");
		list($nis,$nama,$kelas,$orang_tua,$no_telp) = mysqli_fetch_array($sql);
?>
<h2>Edit Data Siswa</h2>
<hr>
<form method="post" action="admin.php?hlm=master&sub=siswa&aksi=edit" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="nis" class="col-sm-2 control-label">NIS</label>
		<div class="col-sm-2">
			<input type="text" class="form-control" id="nis" name="nis" value="<?php echo $nis; ?>" readonly>
		</div>
	</div>
	<div class="form-group">
		<label for="nama" class="col-sm-2 control-label">Nama siswa</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>">
		</div>
	</div>
	<div class="form-group">
		<label for="kelas" class="col-sm-2 control-label">Kelas</label>
		<div class="col-sm-4">
			<select name="kelas" class="form-control">
			<?php
			$query_kelas = mysqli_query($connect, "SELECT * FROM kelas");
			while(list($kelas)=mysqli_fetch_array($query_kelas)){
				echo '<option value="'.$kelas.'"';
				echo ($kelas==$kelas) ? 'selected' : '';
				echo '>'.$kelas.'</option>';
			}
			?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="nama" class="col-sm-2 control-label">Orang Tua</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="orang_tua" name="orang_tua" value="<?php echo $orang_tua; ?>">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" name="submit" class="btn btn-default">Simpan</button>
			<a href="./admin.php?hlm=master&sub=siswa" class="btn btn-link">Batal</a>
		</div>
	</div>
</form>
<?php
	}
}
?>