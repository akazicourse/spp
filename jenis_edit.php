<?php
if( empty( $_SESSION['iduser'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if( isset( $_REQUEST['submit'] )){
		//simpan perubahan jenis pembayaran
		$tapel = $_REQUEST['tapel'];
		$tingkat = $_REQUEST['tingkat'];
		$jumlah = $_REQUEST['jumlah'];
		$jenis = $_REQUEST['jenis'];
		$sql = mysqli_query($connect,"UPDATE jenis_bayar SET jumlah='$jumlah' WHERE tingkat='$tingkat' AND jenis='$jenis'");
		
		if($sql > 0){
			header('Location: ./admin.php?hlm=master&sub=jenis');
			die();
		} else {
			echo 'ada ERROR dg query';
		}
	} else {
		//form edit jenis pembayaran
		$tapel = $_REQUEST['tapel'];
		$tingkat = $_REQUEST['tingkat'];
		$jumlah = $_REQUEST['jumlah'];
		$jenis = $_REQUEST['jenis'];
		$sql = mysqli_query($connect,"SELECT * FROM jenis_bayar WHERE tingkat='$tingkat' AND th_pelajaran='$tapel' AND jumlah='$jumlah' AND jenis='$jenis'");
		list($th_pelajaran,$jenis,$tingkat,$jumlah) = mysqli_fetch_array($sql);
?>
<h2>Edit Jenis Pembayaran</h2>
<hr>
<form method="post" action="admin.php?hlm=master&sub=jenis&aksi=edit" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="tapel" class="col-sm-2 control-label">Tahun Pelajaran</label>
		<div class="col-sm-2">
			<input type="text" class="form-control" id="tapel" name="tapel" value="<?php echo $th_pelajaran; ?>" required autofocus>
		</div>
	</div>
	<div class="form-group">
		<label for="jenis" class="col-sm-2 control-label">Jenis Pembayaran</label>
		<div class="col-sm-2">
		<input type="text" class="form-control" id="jenis" name="jenis" value="<?php echo $jenis; ?>"required autofocus>
		</div>
	</div>
	<div class="form-group">
		<label for="tingkat" class="col-sm-2 control-label">Tingkat</label>
		<div class="col-sm-2">
			<select name="tingkat" id="tingkat" class="form-control">
				<option value="I"<?php echo ($tingkat=='I') ? 'selected' : ''; ?>>Kelas I</option>
				<option value="II"<?php echo ($tingkat=='II') ? 'selected' : ''; ?>>Kelas II</option>
				<option value="III"<?php echo ($tingkat=='III') ? 'selected' : ''; ?>>Kelas III</option>
				<option value="IV"<?php echo ($tingkat=='IV') ? 'selected' : ''; ?>>Kelas IV</option>
				<option value="V"<?php echo ($tingkat=='V') ? 'selected' : ''; ?>>Kelas V</option>
				<option value="VI"<?php echo ($tingkat=='VI') ? 'selected' : ''; ?>>Kelas VI</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="jumlah" class="col-sm-2 control-label">Jumlah Nominal</label>
		<div class="col-sm-3">
			<div class="input-group">
			<span class="input-group-addon">Rp.</span>
			<input type="text" class="form-control" id="jumlah" name="jumlah" value="<?php echo $jumlah; ?>" required>
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