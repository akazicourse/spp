<!-- Halaman Muka Admin setelah Login -->

<?php
session_start();
if( empty( $_SESSION['iduser'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Aplikasi Pembayaran SPP</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

	<style type="text/css">
		body {
			min-height: 200px;
			padding-top: 70px;

		}
	@media print {
		.noprint {
			display: none;
		}
	}
	.main_header{
		color: #fdfdfc;
		padding: 20px;
		background-color:  rgba(0, 0, 0, 0.6);
	}
	.admin_panel{
		background-image: url("logo/home.jpeg");
		background-size: cover;
	}
	</style>

</head>

  <body>

    <?php include "menu.php"; ?>

  <div class="container">
	
	<?php
	if( isset($_REQUEST['hlm'] )){
		
		$hlm = $_REQUEST['hlm'];
		
		switch( $hlm ){
			case 'bayar':
				include "pembayaran.php";
				break;
			case 'laporan':
				include "laporan.php";
				break;
			case 'master':
				include "master.php";
				break;
			case 'user':
				include "profil.php";
				break;
		}
	} else {
	?>
	  <div class="main_header">
        <h2 align="center"><strong>APLIKASI PEMBAYARAN SPP MI ASSA'ADIYAH ATTAHIRIYAH</strong></h2>
        <p align="center">Selamat Datang<strong> <?php echo $_SESSION['fullname']; ?></strong></p>
		<p align="center"><strong>JALAN RAYA CIRACAS NO.7 JAKARTA TIMUR - TLP (021)8702327</strong></p>
	  </div>
	<?php
	}
	?>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript, Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(".force-logout").alert().delay(3000).slideUp('slow', function(){
			window.location = "./logout.php";
		});
      function fnCetak() {
         window.print();
      }
	</script>
  </body>

</html>
<?php
}
?>