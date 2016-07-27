<?php include "../nav.php"; ?>
  <title>Aplikasi Download</title>
</head>
<body>
<div class="container">
    <h4 align="center" class="alert alert-danger">List Modul IBTeam & NetCom</h4>
    <br/><br/>
  <?php
  include "connect.php";

  $query = "SELECT * FROM upload ORDER BY id_upload DESC";
  $hasil = mysqli_query($konek, $query);
  while ($r = mysqli_fetch_array($hasil)){
    ?>
    <div class="col-sm-4">
    <div class="panel panel-danger">
      <div class="panel-heading">
    <hr/>
    <table border="0" cellpadding="4" cellspacing="4">
      <tbody>
        <tr>
          <td>File Name</td>
          <td>:</td>
          <td> <b><?php echo $r[nama_file];?></b></td>
        </tr>
        <tr>
          <td>By</td>
          <td>:</td>
          <td> <b><?php echo $r[nama_pengupload];?></b></td>
        </tr>
        <tr>
          <td>Description File</td>
          <td>:</td>
          <td> <i><?php echo $r[deskripsi]; ?></i></td>
        </tr>
      </tbody>
    </table>
    <br/>
    <a class="btn btn-success btn-sm" href="<?php echo 'simpan.php?file=$r[nama_file]';?>">
    <label class="glyphicon glyphicon-download-alt"></label> Download File
    </a><hr>
      </div>
    </div>
    </div>
    <?php
  }
  ?>
</div>
</body>

