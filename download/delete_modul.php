<?php
require 'connect.php';
$del = "DELETE FROM upload where id_upload=$_GET[id_upload]";
$delete = mysqli_query($konek, $del);
?>
<script>
    alert("Delete Modul Successfully")
    document.location = 'list_modul.php'
</script>