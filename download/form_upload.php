<html>
<head>
	<title>Form Upload</title>
	<?php include "header.php"; ?>
</head>
<body>
	<div class="container">
		<div class="col-sm-4 pull-left"></div>
		<div class="col-sm-5">
			<div class="panel panel-danger">
				<div class="panel-heading">
					<h4><label class="glyphicon glyphicon-upload"></label> Upload File</h4>
				</div>
				<div class="panel-body">
					<form enctype="multipart/form-data" method="POST" action="hasil_upload.php" onsubmit="return validateForm()">
					<div class="input-group">
						<span class="input-group-addon">
							<label class="glyphicon glyphicon-user"></label>
						</span>
						<input class="form-control" type="text" placeholder="Your Name" name="nama_pengupload" required><br>
					</div><br/>
					<div class="input-group">
						<span class="input-group-addon">
							<label class="glyphicon glyphicon-pencil"></label>
						</span>
						<textarea name="deskripsi" class="fomr-control" placeholder="Description File" required></textarea>
					</div><br/>
						<input type="file" name="fupload" class="form-control" required><br/>
						<button type="submit" name="upload" value="Upload" class="btn btn-danger btn-sm">
							<label class="glyphicon glyphicon-upload"></label> Upload
						</button>
						<button type="reset" name="reset" value="Reset" class="btn btn-warning btn-sm">
							<label class="glyphicon glyphicon-refresh"></label> Reset
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>
