<?php

require 'connect.php';
require 'fungsi.php';
if (isset($_POST['submit'])) {
    $id = bersih_input($_POST['id']);
    $password = bersih_input($_POST['password']);
    $hash = sha1($password);
//    //user untuk testing
//    $hash = $password;
    $cek_admin = $mysqli->query("SELECT user FROM admin WHERE user = '$id' AND password = '$hash'");

    if (($cek_admin->num_rows == 1)) {
        session_start();
        $_SESSION['user_login'] = $id;
        header("location:home.php");
    } else {
        header("location:index.php");
    }
}
$mysqli->close();
