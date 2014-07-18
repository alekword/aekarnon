<?php
	$lead_id = $_GET['lead_id'];
	$showing_id = $_GET['showing_id'];

	$sql = "DELETE FROM showing WHERE showing_id = '$showing_id'";
	$result = mysql_query($sql);

	echo "<script>window.location = 'index.php?modules=saler&file=showing';</script>";
?>