<?php
require 'connect.php';
$mysqli->query("DELETE FROM member where id=$_GET[id]");
?>
<script>
    alert("Delete Data Success!!")
    document.location = 'home.php'
</script>

<?php
mysqli_close($mysqli);
?>