<?php
	$document_id = $_GET['document_id'];
	$sql = "DELETE FROM document WHERE document_id = '$document_id'";
	mysql_query($sql);
	echo "<script>window.location = 'index.php?modules=admin&file=manage_document';</script>";
?>