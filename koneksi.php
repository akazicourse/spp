<?php
    $host	= "localhost";	
    $user	= "root";		
    $pass	= "";		
    $db		= "sppku";	

    $connect = mysqli_connect($host, $user, $pass, $db);
    if(!$connect){
        die("Koneksi ke Engine mySQL gagal");
    }
?>