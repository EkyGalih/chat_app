<?php include "header.php"; ?>
<h2 align="center"><label class="glyphicon glyphicon-list-alt"></label> Member List</h2>
<!-- form quick search -->
	<form class="form-group" name="form1" method="get" action="">
		<div class="input-group">
			<span class="input-group-addon">
				<label class="glyphicon glyphicon-search"></label>
			</span>
			<input style="width:200px;" class="form-control" type="text" name="search" id="search" placeholder="Search...">
		</div>
	</form>
<!-- menampilkan hasil pencarian -->
<?php
if(isset($_GET['search']) && $_GET['search']){
	$conn = mysql_connect("localhost", "root", "suru");
	mysql_select_db("ibt");
	$q = $_GET['search'];
	$sql = "select * from list_member where id_member like '%$q%' or nicname like '%$q%' or skill like '%$q%' or group_name like '%$q%'";
	$result = mysql_query($sql);
	if(mysql_num_rows($result) > 0){
		?>
		<div class="col-sm-12">
		<h5 class="label label-danger">Hasil Pencarian Member</h5>
			<table class="table table-striped table-bordered table-hover dataTable no-footer" id="table_eky" role="grid" aria-describedby="dataTables-example_info">
				<thead>
					<tr role="row">
						<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" style="width: 10px;" aria-sort="ascending">
							No
						</th>
						<th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" style="width: 102px;" aria-sort="ascending">
							Id Member
						</th>
						<th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" style="width: 102px;" aria-sort="ascending">
							Nama Lengkap
						</th>
						<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 121px;">
							Nickname
						</th>
						<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 112px;">
							Phone Number
						</th>
						<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 85px;">
							E-Mail
						</th>
						<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 60px;">
							Skill
						</th>
						<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 60px;">
							Group Name
						</th>
					</tr>
				</thead>
				<?php
				while($siswa = mysql_fetch_array($result)){?>
				<tr>
					<td>No</td>
					<td><?php echo $siswa['id_member'];?></td>
					<td><?php echo $siswa['nama_lengkap'];?></td>
					<td><?php echo $siswa['nicname'];?></td>
					<td><?php echo $siswa['phone_number'];?></td>
					<td><?php echo $siswa['email'];?></td>
					<td><?php echo $siswa['skill'];?></td>
					<td><?php echo $siswa['group_name'];?></td>
				</tr>
				<?php
			}
			?>
		</table>
		<?php
	}else{
		echo 'Data not found!';
	}
}
?>
<div class="col-sm-12">
	<table class="table table-striped table-bordered table-hover dataTable no-footer" id="table_eky" role="grid" aria-describedby="dataTables-example_info">
		<thead>
			<tr role="row">
				<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" style="width: 10px;" aria-sort="ascending">
					No
				</th>
				<th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" style="width: 102px;" aria-sort="ascending">
					Id Member
				</th>
				<th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" style="width: 102px;" aria-sort="ascending">
					Nama Lengkap
				</th>
				<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 121px;">
					Nickname
				</th>
				<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 112px;">
					Phone Number
				</th>
				<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 85px;">
					E-Mail
				</th>
				<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 60px;">
					Skill
				</th>
				<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 60px;">
					Group Name
				</th>
				<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 60px;">
					Status
				</th>
			</tr>
		</thead>
		<?php
		$sql = "SELECT * FROM member ORDER BY id ASC";
		$sql1 = "SELECT * FROM list_member ORDER BY id ASC";
		$hasil = $mysqli->query($sql);
		$hasil1 = $mysqli->query($sql1);
		if ($hasil == FALSE) {
			trigger_error("Syntax Mysql Error: " . $sql . "Error: " . $mysqli->error, E_USER_ERROR);
		} else {
			$no = 1;
			while ($r = $hasil->fetch_array()) {
				if ($hasil1 == FALSE) {
					trigger_error("Syntax Mysql Error: " . $sql . "Error: " . $mysqli->error, E_USER_ERROR);
				} else {
					while ($r1 = $hasil1->fetch_array()) {

						?>
						<tbody>
							<tr class="gradeA odd" role="row">
								<td class="sorting_1"><?php echo "$no" ?></td>
								<td class="center"><?php echo "$r1[id_member]" ?></td>
								<td class="center"><?php echo "$r[nama_lengkap]" ?></td>
								<td class="center"><?php echo "$r[nicname]" ?></td>
								<td class="center"><?php echo "$r[phone_number]" ?></td>
								<td class="center"><?php echo "$r[email]" ?></td>
								<td class="center"><?php echo "$r1[skill]" ?></td>
								<td class="center"><?php echo "$r1[group_name]" ?></td>
								<td class="center"><?php echo "$r[status]" ?></td>
							</tr>
						</tbody>
						<?php
						$no++;
					}
				}
			}
		}
		?>
	</table>
</div>
<div align="left">
	<?php 
	$query = "SELECT count(*) from member";
	$recordset = mysqli_query($mysqli, $sql);
	$nrec = mysqli_num_rows($recordset);
	echo "Total Member: <b>" . $nrec . " Member</b>";
	?>
</div><br/>
<div class="container">
	<a href="extra/pdf_member.php" role="button" class="btn btn-danger btn-sm">
		<span class="glyphicon glyphicon-download"></span> Download Pdf
	</a>
	<!-- Trigger the modal with a button -->
	<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal">
		<label class="glyphicon glyphicon-plus"></label> Add Member
	</button>

	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add Member</h4>
				</div>
				<div class="modal-body">
					<form method="POST" action="process_add_member.php" onsubmit="return validateForm()">
						<div class="input-group">
							<span class="input-group-addon">
								<label class="glyphicon glyphicon-user"></label>
							</span>
							<input type="text" name="id_member" class="form-control" placeholder="Id Member" required>
						</div><br/>
						<div class="input-group">
							<span class="input-group-addon">
								<label class="glyphicon glyphicon-qrcode"></label>
							</span>
							<input type="text" name="skill" class="form-control" placeholder="Skill" required>
						</div><br/>
						<div class="input-group">
							<span class="input-group-addon">
								<label class="glyphicon glyphicon-envelope"></label>
							</span>
							<input type="text" name="group_name" class="form-control" placeholder="Group Name" required>
						</div><br/>
						<button class="btn btn-danger" type="submit">
							<label class="glyphicon glyphicon-ok-sign"></label> Save
						</button>
						<button class="btn btn-btn" type="reset">
							<label class="glyphicon glyphicon-refresh"></label> Reset
						</button>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>

		</div>
	</div>
</div>

<?php include "footer.php"; ?>