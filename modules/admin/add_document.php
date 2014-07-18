<?php
	$document_name = $_POST['document_name'];
	$document_filename = $_FILES['document_filename']['name'];
	$document_temp = $_FILES['document_filename']['tmp_name'];

	copy($document_temp,"document/$document_filename");

	$sql = "INSERT INTO document VALUES ('','$document_name','$document_filename')";
	mysql_query($sql);

	echo "<script>window.location = 'index.php?modules=admin&file=manage_document';</script>";

?>