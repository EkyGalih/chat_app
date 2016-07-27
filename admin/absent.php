<?php
include "connect.php";
include "header.php";
?>
<div class="col-sm-12">
		<table class="table table-striped table-bordered table-hover dataTable no-footer" id="table_eky" role="grid" aria-describedby="dataTables-example_info">
			<thead>
				<tr role="row">
					<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" style="width: 10px;" aria-sort="ascending">
						No
					</th>
					<th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" style="width: 102px;" aria-sort="ascending">
						Full Name
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
						Status
					</th>
				</tr>
			</thead>
			<?php
			$sql = "SELECT * FROM absensi ORDER BY id ASC";
			$hasil = $mysqli->query($sql);
			if ($hasil == FALSE) {
				trigger_error("Syntax Mysql Error: " . $sql . "Error: " . $mysqli->error, E_USER_ERROR);
			} else {
				$no = 1;
				while ($r = $hasil->fetch_array()) {
					?>
					<tbody>
						<tr class="gradeA odd" role="row">
							<td class="sorting_1"><?php echo "$no" ?></td>
							<td class="center"><?php echo "$r[nama_lengkap]" ?></td>
							<td class="center"><?php echo "$r[nicname]" ?></td>
							<td class="center"><?php echo "$r[phone_number]" ?></td>
							<td class="center"><?php echo "$r[email]" ?></td>
							<td class="center"><?php echo "$r[status]" ?></td>
						</tr>
					</tbody>
					<?php
					$no++;
				}
			}
			?>
		</table>
<?php include "footer.php" ?>
	</div>