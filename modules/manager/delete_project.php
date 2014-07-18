<?php
	
	$project_id = $_GET['project_id'];
	$sql = "DELETE FROM project WHERE project_id = '$project_id'";
	mysql_query($sql);

	/***** DELETE Images IN Table project_images *****/
	$delete_images = "DELETE FROM project_image WHERE project_id = '$project_id'";
	mysql_query($delete_images);
	/************************************************/

	echo "<script>window.location = 'index.php?modules=manager&file=manage_project'</script>";

?>