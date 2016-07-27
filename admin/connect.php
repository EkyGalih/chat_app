<?php

$host = "localhost";
$user = "root";
$pass = "suru";
$dabs = "ibt";

$mysqli = mysqli_connect($host, $user, $pass, $dabs);
if ($mysqli->connect_error) {
	echo "Gagal terkoneksi ke database : (" . $mysqli->connect_error . ")";
}
?>