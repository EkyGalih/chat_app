<?php
include "koneksi.php";
$ambil=$koneksi->prepare("select * from online order by id desc");
$ambil->execute();
date_default_timezone_set('Asia/Jakarta');
while($list=$ambil->fetch())
{
	echo "<i class='icon-user'></i><span class='label label-info'>".$list['nick']."</span><span class='label'>".substr($list['waktu'],0,5)."</span><br>";
}
?>