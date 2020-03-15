<?php
if( empty( $_SESSION['iduser'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if( isset( $_REQUEST['submit'] )){
		$kelas = $_REQUEST['kelas'];
		$wali_kelas = $_REQUEST['wali_kelas'];
		
		$sql = mysqli_query($connect, "UPDATE kelas SET wali_kelas='$wali_kelas' WHERE kelas='$kelas'");
		if($sql > 0){
			header('Location: ./admin.php?hlm=master&sub=kelas');
			die();
		} else {
			echo "ERROR! Periksa penulisan query.";
			echo "Error querying database : .$sql";
		}
		
	} else {
		$kelas = $_REQUEST['kelas'];
		$sql = mysqli_query($connect, "SELECT * FROM kelas WHERE kelas='$kelas'");
		list($kelas, $wali_kelas) = mysqli_fetch_array($sql);
?>
<!--
form pertama untuk tahapan menambahkan kelas baru, yaitu:
1. ketikkan nama kelas
2. ketikkan tahun pelajaran, misalnya: 2014/2015 atau 2014-2015
3. pilih prodi yg bersangkutan dg kelas
4. klik tombol [LANJUT]
//-->
<h2>Edit Kelas</h2><hr>
<form method="post" action="admin.php?hlm=master&sub=kelas&aksi=edit" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="kelas" class="col-sm-2 control-label">Kelas</label>
		<div class="col-sm-2">
			<input type="text" class="form-control" id="kelas" name="kelas" value="<?php echo $kelas; ?>" readonly>
		</div>
	</div>
	<div class="form-group">
		<label for="prodi" class="col-sm-2 control-label">Wali Kelas</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="wali_kelas" name="wali_kelas" value="<?php echo $wali_kelas; ?>">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" name="submit" class="btn btn-default">Save</button>
			<a href="./admin.php?hlm=master&sub=kelas" class="btn btn-link">Batal</a>
		</div>
	</div>
</form>
<?php
	}
}
?>