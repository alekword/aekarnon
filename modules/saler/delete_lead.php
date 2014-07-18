<?php 
	$sql = "DELETE FROM lead WHERE lead_id = '$_GET[lead_id]'";
	mysql_query($sql);
	
	echo "<script>window.location = 'index.php?modules=saler&file=lead';</script>";

?>