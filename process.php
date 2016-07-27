<?php
include "connect.php";

$nama		= $_POST['nama_lengkap'];
$nicname	= $_POST['nicname'];
$phone		= $_POST['phone_number'];
$email		= $_POST['email'];
$status		= $_POST['status'];


$query = "INSERT INTO member (nama_lengkap, nicname, phone_number, email, status) VALUES ('$nama','$nicname','$phone','$email','$status')";

if (mysqli_query($mysqli, $query)) {
	echo "<script language='JavaScript'>
        alert('Data Berhasil di masukkan');
        document.location = 'index.php';
    </script>";
} else {
	echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
}

mysqli_close($mysqli);
?>