<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login - Angket Online </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="dist/css/bootstrap.min.css" media="screen">
        <link rel="stylesheet" href="dist/css/bootstrap.css" media="screen">
        <link rel="stylesheet" href="dist/css/bootstrap-theme.css" media="screen">
        <link rel="stylesheet" href="dist/css/style.css" media="screen">
    </head>
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynav">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><img alt="logo_unram" class="gambar" src="gambar/UNRAMWARNA.png"></a>
                    <a class="navbar-brand" href="index.php">ANGKET ONLINE</a>
                </div>
                <div class="collapse navbar-collapse" id="mynav">
                    <ul class="nav navbar-nav">
                        <li><a href="tentang_kami.php"><i class="glyphicon glyphicon-info-sign" ></i> Tentang Kami</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <?php
                        if (!$_SESSION['user_login']) {
                            ?>
                            <li class="active"><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                            <?php
                        } else {
                            ?>
                            <li><a href="#"><i class="glyphicon glyphicon-user" ></i> <?php echo $_SESSION['user_login']; ?></a></li>
                            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container" style="margin-top: 70px;margin-bottom: 70px;">
            <div class="row">
                <div class="col-sm-4">
                </div>
                <div class="col-sm-4">
                    <?php
                    if (!$_SESSION['user_login']) {
                        ?>
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><span class="glyphicon glyphicon-home"> LOGIN</span></h3>
                                </div>
                                <div class="panel-body">
                                    <form action="login.php" method="post">
                                        <div class='input-group'>
                                            <span class='input-group-addon'><label for='nama' class='glyphicon glyphicon-user'></label></span><input type='text' autocomplete='off' name='id' class='form-control' placeholder='Username' />
                                        </div><br />
                                        <div class='input-group'>
                                            <span class='input-group-addon'><label class='glyphicon glyphicon-lock'></label></span><input name='password' class='form-control' placeholder='password' type="password"/>
                                        </div><br />
                                        <button type="submit" name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-log-in"></i> Masuk</button>
                                    </form>
                                </div>
                            </div>
                    <?php } else { ?>
                    <h3 class='alert alert-warning'>Anda Sudah Login</h3>
                    <?php } ?>
                </div>
                <div class="col-sm-4">
                </div>
            </div>
        </div>
        <div class="navbar navbar-inverse navbar-fixed-bottom" style="text-align:center;color:white;padding-top:14px;">
            Copyright &copy; <a href="developers.php">DAP Developer Team</a> - <a href="sitemap.php">Sitemap</a>
        </div>
      <!--<script src="http://code.jquery.com/jquery.js"></script>-->
        <script src="dist/jquery-1.11.1.min.js"></script>
        <script src="dist/js/bootstrap.min.js"></script>
    </body>
</html>
<?php
$mysqli->close();
