<?php
	$image_id = $_GET['image_id'];
	$project_id = $_GET['project_id'];
	$delete = "DELETE FROM project_image WHERE project_id = '$project_id' AND image_id = '$image_id'";
	mysql_query($delete);

	echo "<script>window.location = 'index.php?modules=manager&file=project_image&project_id=$project_id';</script>";
?>