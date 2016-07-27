<?php
// Baca lokasi file sementar dan nama file dari form (fupload)
$lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_file   = $_FILES['fupload']['name'];

// Tentukan folder untuk menyimpan file
$folder = "files/$nama_file";

// tanggal sekarang
$tgl_upload = date("Ymd");

// Apabila file berhasil di upload
if (move_uploaded_file($lokasi_file,"$folder")){
  echo " <script language='JavaScript'>
        alert('Upload File $nama_file Successfully');
        document.location = 'index.php';
    </script>";
  
  // Masukkan informasi file ke database
  include "connect.php";

  $query = "INSERT INTO upload (nama_file, nama_pengupload, deskripsi, tgl_upload)
            VALUES('$nama_file', '$_POST[nama_pengupload]','$_POST[deskripsi]', '$tgl_upload')";
            
  mysqli_query($konek, $query);
}else{
  echo "<script language='JavaScript'>
  		alert('this file to large size from 1 MB')
  		document.location = 'form_upload.php';
  		</script>";
}
?>
