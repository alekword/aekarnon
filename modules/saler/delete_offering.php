<?php 
	$showing_id = $_GET['showing_id'];
	$listing_id = $_GET['listing_id'];
	$offering_id = $_GET['offering_id'];

	//check table offering to showing_id
	$sql = "SELECT COUNT(showing_id) FROM offering WHERE showing_id = '$showing_id'";
	list($count) = mysql_fetch_row(mysql_query($sql));

	if($count == "1"){
		echo "<script>alert('ไม่สามารถลบข้อมูลได้ คุณต้องทำการ ต่อรองราคาอย่างน้อยอีก 1 ครั้ง'); window.location = 'index.php?modules=saler&file=offering';</script>";
	}else{
		$delete_offer = "DELETE FROM offering WHERE offering_id = '$offering_id'";
		mysql_query($delete_offer);
		echo "<script>window.location = 'index.php?modules=saler&file=offering';</script>";
		
	}

	




?>