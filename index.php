<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>MI Assa'adiyah Attahiriyah</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
	<style type="text/css">
		body {
			padding-top: 40px;
			padding-bottom: 40px;
			background-color: #eee;
			background-image: url(logo/background.jpg);
		}
		.front_logo{
			display: block;
			margin-left: auto;
			margin-right: auto;
			width: 50%;
		}
		.form-signin {
			max-width: 330px;
			padding: 15px;
			margin: 0 auto;
			color: #006666;
		}
		.form-signin .form-signin-heading,
		.form-signin .checkbox {
			margin-bottom: 10px;
			text-align: center;
		}
		.form-signin .checkbox {
			font-weight: normal;
		}
		.form-signin .form-control {
			position: relative;
			height: auto;
			-webkit-box-sizing: border-box;
				-moz-box-sizing: border-box;
					box-sizing: border-box;
			padding: 10px;
			font-size: 16px;
		}
		.form-signin .form-control:focus {
			z-index: 2;
		}
		.form-signin input[type="text"] {
			margin-bottom: -1px;
			border-bottom-right-radius: 0;
			border-bottom-left-radius: 0;
		}
		.form-signin input[type="password"] {
			margin-bottom: 10px;
			border-top-left-radius: 0;
			border-top-right-radius: 0;
		}
	</style>
</head>
<body>
    <div class="container">
	<?php
		include "koneksi.php";
		
		if( isset( $_REQUEST['submit'] ) ){
			$username = $_REQUEST['username'];
			$password = $_REQUEST['password'];
			
			$sql = mysqli_query($connect, "SELECT iduser,username,admin,fullname FROM user WHERE username='$username' AND password='$password'");
			
			if( mysqli_num_rows($sql) > 0 ){
				list($iduser,$username,$admin,$fullname) = mysqli_fetch_array($sql);
				
				//session_start();
				$_SESSION['iduser'] = $iduser;
				$_SESSION['username'] = $username;
				$_SESSION['admin'] = $admin;
				$_SESSION['fullname'] = $fullname;
				
				header("Location: ./admin.php");
				die();
			} else {
			
				$_SESSION['err'] = 'Silahkan periksa kembali username atau password anda!';
				header('Location: ./');
				die();
			}
		} else {
	?>
      <form class="form-signin" method="post" action="" role="form">
		<?php
			if(isset($_SESSION['err'])){
				$err = $_SESSION['err'];
				echo '<div class="alert alert-warning alert-message">'.$err.'</div>';
			}
		?>
		<img class="front_logo" src="logo/logo_mi.gif">
        <h2 class="form-signin-heading"><strong>Aplikasi Pembayaran SPP</strong></h2>
        <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Login</button>
        <p>&nbsp;</p>
      </form>
	<?php
	}
	?>
    </div> <!-- /container -->
	
	<!-- Bootstrap core JavaScript, Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	
	<script type="text/javascript">
		$(".alert-message").alert().delay(3000).slideUp('slow');
	</script>
  </body>
</html>