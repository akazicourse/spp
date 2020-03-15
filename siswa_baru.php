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

		
		$sql = mysqli_query($connect, "INSERT INTO siswa (nis, nama, kelas, orang_tua, no_telp) VALUES('$nis','$nama','$kelas','$orang_tua','$no_telp')");
		
		if($sql > 0){
			header('Location: ./admin.php?hlm=master&sub=siswa');
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
			echo "Error querying database : .$sql";
		}
	} else {
?>
<h2>Tambah Siswa</h2>
<hr>
<form method="post" action="admin.php?hlm=master&sub=siswa&aksi=baru" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="nis" class="col-sm-2 control-label">NIS</label>
		<div class="col-sm-2">
			<input type="text" class="form-control" id="nis" name="nis" placeholder="Nomor Induk Siswa" required autofocus>
		</div>
	</div>
	<div class="form-group">
		<label for="nama" class="col-sm-2 control-label">Nama siswa</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required>
		</div>
	</div>
	<div class="form-group">
		<label for="kelas" class="col-sm-2 control-label">Kelas</label>
		<div class="col-sm-4">
			<select name="kelas" class="form-control">
			<?php
				$query_kelas = mysqli_query($connect, "SELECT * FROM kelas");
				while(list($kelas)=mysqli_fetch_array($query_kelas)){
					echo '<option value="'.$kelas.'">'.$kelas.'</option>';
				}
			?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="nama" class="col-sm-2 control-label">Orang Tua</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="orang_tua" name="orang_tua" placeholder="Nama Orang Tua/Wali" required>
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