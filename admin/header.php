<?php
include "connect.php";
ob_start();
if (!isset($_SESSION['user_session'])) {
  header('location: index.php');
}else{
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin - IBTeam NTB</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-theme.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-theme.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-responsive.css">
  <link rel="stylesheet" type="text/css" href="assets/css/docs.css"> 
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<link rel="shortcut icon" href="../forum/backtrack.jpg">
</head>
<body bgcolor="black">
	<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="home.php">Admin</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="home.php"><label class="glyphicon glyphicon-home"></label> Home</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Page 1-1</a></li>
            <li><a href="#">Page 1-2</a></li>
            <li><a href="#">Page 1-3</a></li>
          </ul>
        </li>
        <li><a href="member_list.php"><img src="assets/img/group.png" alt="group.png" width="20px" height="20px"> Member list</a></li>
        <li><a href="absent.php"><label class="glyphicon glyphicon-list-alt"></label> Absent</a></li>
        <li><a href="forum/index.php"><img src="assets/img/Chat.ico" alt="Chat.ico" width="20px" height="20px"> Account Forum</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
     <img src="forum/backtrack.jpg" class="img-rounded" height="50px" width="50px">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </div>
  </div>
</nav>
<?php
}
ob_end_flush();
?>