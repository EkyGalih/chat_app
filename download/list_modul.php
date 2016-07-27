<?php
include "connect.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>List Modul IBTeam & NetCOm</title>
	<?php include "header.php"; ?>
</head>
<body>
	<div class="container">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">
			<div class="panel panel-danger">
				<div class="panel-heading">
					<h4>List Modul IBTeam & NetCom</h4>
				</div>
				<div class="panel-body">
					<table class="table table-bordered table-hover table-striped no-footer">
						<thead>
							<tr bgcolor="black">
								<td align="center">No.</td>
								<td align="center">File Name</td>
								<td align="center">Description file</td>
								<td align="center">By</td>
								<td align="center">Date Upload</td>
								<td align="center">Action</td>
							</tr>
						</thead>
						<?php
						$query = "SELECT * FROM upload ORDER BY id_upload DESC";
						$hasil = mysqli_query($konek, $query);
						$no = 1;
						while ($r = mysqli_fetch_array($hasil)){
							?>
							<tbody>
							<td align="center"><?php echo $no ?></td>
							<td align="center"><?php echo $r[nama_file] ?></td>
							<td align="center"><?php echo $r[deskripsi] ?></td>
							<td align="center"><?php echo $r[nama_pengupload] ?></td>
							<td align="center"><?php echo $r[tgl_upload] ?></td>
							<td align="center">
								<a class="btn btn-danger btn-sm" href="delete_modul.php?id_upload=<?php echo "$r[id_upload]" ?>"onclick="return confirm('Data ini akan dihapus?\n\nApakah Anda yakin?');">
						<i class = 'glyphicon glyphicon-trash'></i> </a>
							</td>
							</tbody>
							<?php
							$no++;
						}
						?>
					</table>
				</div>
			</div>
		</div>
	</div>
</body>
</html>