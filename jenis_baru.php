<?php
if( empty( $_SESSION['iduser'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if( isset( $_REQUEST['submit'] )){
		//simpan jenis pembayaran baru
		$th_pelajaran = $_REQUEST['tapel'];
		$jenis = $_REQUEST['jenis'];
		$tingkat = $_REQUEST['tingkat'];
		$jumlah = $_REQUEST['jumlah'];
		
		$sql = mysqli_query($connect, "INSERT INTO jenis_bayar VALUES('$th_pelajaran','$jenis','$tingkat','$jumlah')");
		
		if($sql > 0){
			header('Location: ./admin.php?hlm=master&sub=jenis');
			die();
		} else {
			echo 'Error! Cek kembali query';
		}
	} else {
		//form jenis pembayaran
?>
<h2>Jenis Pembayaran</h2>
<hr>
<form method="post" action="admin.php?hlm=master&sub=jenis&aksi=baru" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="tapel" class="col-sm-2 control-label">Tahun Pelajaran</label>
		<div class="col-sm-2">
			<input type="text" class="form-control" id="tapel" name="tapel" placeholder="mmmm/nnnn" required autofocus>
		</div>
	</div>
	<div class="form-group">
		<label for="jenis" class="col-sm-2 control-label">Jenis Pembayaran</label>
		<div class="col-sm-2">
			<select name="jenis" id="jenis" class="form-control">
				<option value="SPP">SPP</option>
				<option value="PTS">PTS</option>
				<option value="PAS">PAS</option>
				<option value="Kegiatan">Kegiatan</option>
				<option value="Kurban">Kurban</option>
				<option value="Zakat">Zakat</option>
				<option value="Outing">Outing</option>
				<option value="Manasik">Manasik</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="tingkat" class="col-sm-2 control-label">Tingkat</label>
		<div class="col-sm-2">
			<select name="tingkat" id="tingkat" class="form-control">
				<option value="I">Kelas I</option>
				<option value="II">Kelas II</option>
				<option value="III">Kelas III</option>
				<option value="IV">Kelas IV</option>
				<option value="V">Kelas V</option>
				<option value="VI">Kelas VI</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="jumlah" class="col-sm-2 control-label">Jumlah Nominal</label>
		<div class="col-sm-3">
			<div class="input-group">
			<span class="input-group-addon">Rp.</span>
			<input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Nominal pembayaran" required>
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" name="submit" class="btn btn-default">Simpan</button>
			<a href="./admin.php?hlm=master&sub=jenis" class="btn btn-link">Batal</a>
		</div>
	</div>
</form>
<?php
	}
}
?>