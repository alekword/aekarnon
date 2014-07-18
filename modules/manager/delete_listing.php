<?php
	$listing_id = $_GET['listing_id'];
	list($listing_status) = mysql_fetch_row(mysql_query("SELECT listing_status FROM listing WHERE listing_id = '$listing_id'"));

	if($listing_status == 0){
		echo "<script>alert('ไม่สามารถลบ listing นี้ได้'); window.location = 'index.php?modules=manager&file=manage_listing';</script>";
	}else{
		$sql = "DELETE FROM listing WHERE listing_id = '$listing_id'";
		mysql_query($sql);
		echo "<script>window.location = 'index.php?modules=manager&file=manage_listing';</script>";
	}

?>