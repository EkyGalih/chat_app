<?php

// var_dump($_POST);
include 'connect.php';

$title 	    = $_POST['title'];
$descript 	= $_POST['descript'];
$contents	= $_POST['contents'];

//folder tempet gambar
$target_dir = "images_upload/";
//target nama file di folder
$target_file = $target_dir . basename($_FILES["images"]["name"]);
//masih keadaan oke
$uploadOk = 1;
//dapetin tipe file
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// cek apakah gambar ato gambar palsu
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["images"]["tmp_name"]);
    if($check !== false) {
        echo "file is image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "file not image.";
        $uploadOk = 0;
    }
}
// cek apakah file sudah ada
if (file_exists($target_file)) {
    echo "Sorry, file exists.";
    $uploadOk = 0;
}
// cek ukuran
if ($_FILES["images"]["size"] > 500000) {
    echo "Sorry, file to big size.";
    $uploadOk = 0;
}
// ijinkan format tertentu
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, just JPG, JPEG, PNG & GIF allowed.";
    $uploadOk = 0;
}
// cek jika upload = 0
if ($uploadOk == 0) {
    echo "Sorry, file not uploaded.";
// jika uploadOk = 1 maka upload gambar
} else {
    if (move_uploaded_file($_FILES["images"]["tmp_name"], $target_file)) {
        echo "File ". basename( $_FILES["images"]["name"]). " already uploaded.";
    } else {
        echo "Sorry, error occurred when uploading. ".basename( $_FILES["images"]["name"]);
    }
}

$query = "INSERT INTO events (title, descript, contents, images) VALUES ('$title','$descript','$contents','$target_file')";

if (mysqli_query($mysqli, $query)) {
    echo "<script language='JavaScript'>
        alert('Events successfully added');
        document.location = 'events.php';
    </script>";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
}

mysqli_close($mysqli)
?>
