<?php 
session_start();
error_reporting(E_ALL);
include "koneksi.php";
if(empty($_SESSION['nick']))
{
	if(isset($_COOKIE['nick']))
	{
		$_SESSION['nick']=$_COOKIE['nick'];
		header("location:".$_SERVER['PHP_SELF']);
	}
	else
	{
		belum_login();
	}
}
else
{
	sudah_login();
}
function belum_login(){
	?>
	<!doctype html>
	<html lang="en">
	<meta charset="utf-8">
	<head>
		<title> Welcome to chat room </title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
		<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
		<link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
		<link href="style_sebelum.css" rel="stylesheet">
		<script src="bootstrap/js/jQuery.js"></script>
		<script src="ajaxku.js"></script>
		<script src="bootstrap/js/bootstrap.js"></script>
	</head>
	<body>
		<!-- CONTAINER -->
		<div class="container">
			<div class="row">
				<div class="alert alert-danger">
					<img src="backtrack.jpg" class="img-circle" align="right" width="100px" height="80px">
					<h1 class="text-left text-danger"> Forum IBT NTB </h1>
					<p class="text-danger text-left">Welcome to chat room IBTeam NTB ! </p>
				</div>
			</div>
			<!-- <div class="row">
				<div class="span4 offset4">
					<img src="backtrack.jpg" class="img-circle">
				</div>
			</div> -->
		</br>
		<div class="row">
			<div class="span4 offset4">
				<button href="#modalmasuk" class="btn btn-danger btn-block btn-large" data-toggle="modal" type="button"><i class="icon-share-alt icon-white"></i> LogIn</button> 
				<button href="#modaldaftar" class="btn btn-default btn-large btn-block" data-toggle="modal" type="button"><i class="icon-user icon-white"></i> Register</button>
				<br/><br/>
				<p class="text-center text-waring" > Copyright 2016 &copy; IBTeam NTB | NetCom </p>
			</div>
		</div>
		<!-- MODAL -->
		<div id="modalmasuk" class="modal hide fade">
			<div class="modal-header">
				<h3> Login Forum</h3>
			</div>
			<div class="modal-body">
				<!-- modal form login -->
				<form class="form-horizontal" id="formmasuk" method="post" action="">
					<div class="control-group">
						<label class="control-label" for="inputEmail">Username</label>
						<div class="controls">
							<input type="text" id="nick" placeholder="Nickname" required x-moz-errormessage='Form must 5-10 character !'  pattern="[a-zA-Z]{5,10}"  >
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputPassword" >Password</label>
						<div class="controls">
							<input type="password" id="pass" placeholder="Password" required x-moz-errormessage='Form must 5-10 character !'  pattern=".{5,10}"  >
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<label class="checkbox">
								<input type="checkbox" id="cokie" value="ingataku"> Remember me !
							</label>
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<button type="submit" class="btn btn-danger" id="masuk">
								<label class="icon-ok"></label> Login
							</button>
							<button type="submit" class="btn btn-default"  data-dismiss="modal">
								<label class="icon-remove"></label> Close
							</button>
						</div>
					</div>
				</form>
				<p id="notif"></p>
			</div>
			<div class="modal-footer">
			</div>
		</div>
		<div id="modaldaftar" class="modal hide fade">
			<div class="modal-header">
				<h3> Register Account</h3>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" id="formdaftar">
					<div class="control-group">
						<label class="control-label">Username</label>
						<div class="controls">
							<input type="text" id="dnick" placeholder="Nickname"  required x-moz-errormessage='Form must 5-10 character !'  pattern="[a-zA-Z]{5,10}">
							<i>* Min 5 character</i>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" >Email</label>
						<div class="controls">
							<input type="email" id="email" placeholder="Email" required required x-moz-errormessage='Email invalid !'>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Password</label>
						<div class="controls">
							<input type="password" id="dpass" placeholder="Password" required required x-moz-errormessage='Form must 5-10 character !'  pattern=".{5,10}">
							<i>* Min 5 character</i>
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<button type="submit" class="btn btn-danger" id="daftar">
								<label class="icon-ok-sign"></label> Register
							</button>
							<button type="submit" class="btn btn-default"  data-dismiss="modal">
								<label class="icon-remove"></label> Tutup
							</button>
						</div>
					</div>
				</form>
				<p id="dnotif"></p>
			</div>
			<div class="modal-footer">
			</div>
		</div>
		<!-- END MODAL -->
	</div>
	<script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
<?php }
function sudah_login(){
	?>
	<!doctype html>
	<html lang="en">
	<head>
		<title> Room Chat IBTeam NTB </title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
		<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
		<link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
		<link href="style_sesudah.css" rel="stylesheet">
		<script src="bootstrap/js/jQuery.js"></script>
		<script src="bootstrap/js/bootstrap.js"></script>
		<script src="ajaxku.js"></script>

	</head>
	<body>
		<div class="container">
			<div class="row">
				<img src="chat.png" class="img-circle" align="left" width="2000px" height="1000px">
				<div class="span2 pull-right">
					<br/>
					<div class="btn-group">
						<button class="btn btn-warning btn-sm"><i class="icon-th-list"></i></button>
						<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalprofile">
							<i class="icon-user"></i>
						</button>
						<button class="btn dropdown-toggle" data-toggle="dropdown">
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu">
							<li>
								<a href="#" type="button" ><i class="icon-envelope"></i> Pesan </a>
							</li>
							<li>
								<a href="#" type="button" ><i class="icon-user"></i> Profile </a>
							</li>
							<li class="divider"></li>
							<li>
								<a tabindex="-1" href="logout.php" type="button" ><i class="icon-off"></i> Logout </a>
							</li>
						</ul>
					</div>
				</div>
				<div class="alert alert-danger">
					<h1> Room Chat </h1>
				</div>
				<!-- Modal -->
				<div id="modalprofile" class="modal fade" role="dialog">
					<div class="modal-dialog">

						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Profile</h4>
							</div>
							<div class="modal-body">
											
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>

					</div>
				</div>
			</div>
			<div class="row">
				<div class="span6 offset2">
					<div id="boxpesan">
					</div>
				</div>
				<div class="span2">
					<p class="label label-info">People Online <img src="online.jpg" alt="online.jpg"></p>
					<div class="boxonline">
					</div>
				</div>
			</div>
		</br>
		<div class="row">
			<div class="span6 offset2">
				<form method="post" action="" id="formpesan" class="form-inline">
					<input class="input-xlarge" name="pesan" type="text" placeholder="Write message and press Enter !" required x-moz-errormessage="write message vrohh !">
					<input type='submit' value='Send' class='btn btn-info pull-right' id='pencet'>
				</form>
				<audio controls id="suara">
					<source src="../Nge_Chat/chat.mp3" type="audio/mpeg">
						Your browser does not support the audio element.
					</audio>
				</div>
				<div class="span2">
					<a href="#" class="btn btn-info" data-toggle="popover"  id="emot" type="button" data-placement="top" title="Emoticons (klik)">
						<i class="icon-eye-open icon-white"></i> Emoticons </a>
					</div>
				</div>
			</div>
		</body>
		</html>
		<?php  
	}
