<?php
include "connect.php";

$id_member	= $_POST['id_member'];
$skill		= $_POST['skill'];
$group		= $_POST['group_name'];


$query = "INSERT INTO list_member (id_member, skill, group_name) VALUES ('$id_member','$skill','$group')";

if (mysqli_query($mysqli, $query)) {
	echo "<script language='JavaScript'>
        alert('Add data success!!');
        document.location = 'member_list.php';
    </script>";
} else {
	echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
}

mysqli_close($mysqli);
?>