<?php
try{
	$koneksi=new PDO('mysql:host=localhost;dbname=ibt','root','suru');	
}catch(PDOException $e){
	echo "Koneksi Database gagal ".$e->getMessage();
	exit;
}
date_default_timezone_set('Asia/Makassar');
// echo date("Y-m-d H:i:s");
?>
