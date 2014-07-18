<?php
	$deadline_id = $_POST['deadline_id'];
	$deadline_name = $_POST['deadline_name'];
	$deadline_day = $_POST['deadline_day'];

	$update = "UPDATE deadline SET deadline_name = '$deadline_name',
	deadline_day = '$deadline_day' WHERE deadline_id = '$deadline_id'";

	mysql_query($update);
	echo "<script>window.location = 'index.php?modules=admin&file=manage_deadline';</script>";
?>