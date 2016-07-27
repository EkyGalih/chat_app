<!-- form quick search -->
<form name="form1" method="get" action="">
Search : <input type="text" name="q" id="q"/> <input type="submit" value="Search"/>
</form>
<!-- menampilkan hasil pencarian -->
<?php
if(isset($_GET['q']) && $_GET['q']){
	$conn = mysql_connect("localhost", "root", "suru");
	mysql_select_db("ibt");
	$q = $_GET['q'];
	$sql = "select * from list_member where id_member like '%$q%' or 
	skill like '%$q%' or group_name like '%$q%'";
	$result = mysql_query($sql);
	if(mysql_num_rows($result) > 0){
		?>
		<table>
			<tr>
				<td>No</td>
				<td>ID Member</td>
				<td>Skill</td>
				<td>Group Name</td>
			</tr>
			<?php
			while($siswa = mysql_fetch_array($result)){?>
			<tr>
				<td>No</td>
				<td><?php echo $siswa['id_member'];?></td>
				<td><?php echo $siswa['skill'];?></td>
				<td><?php echo $siswa['group_name'];?></td>
			</tr>
			<?php }?>
		</table>
		<?php
	}else{
		echo 'Data not found!';
	}
}
?>