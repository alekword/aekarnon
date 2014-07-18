<?php
	$document_id = $_POST['document_id'];	
	$document_name = $_POST['document_name'];
	$document_filename = $_FILES['document_filename']['name'];
	$document_temp = $_FILES['document_filename']['tmp_name'];

	if($document_filename){
		$update_file = ", document_filename = '$document_filename'";
		copy($document_temp,"document/$document_filename");
	}

	$update = "UPDATE document SET document_name = '$document_name' $update_file WHERE document_id = '$document_id'";
	mysql_query($update);

	echo "<script>window.location = 'index.php?modules=admin&file=manage_document';</script>";
?>