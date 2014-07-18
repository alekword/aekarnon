<?php
	$sql = "DELETE FROM request WHERE request_id = '$_GET[request_id]'";
	mysql_query($sql);

	echo "<script>window.location = 'index.php';</script>";
?>