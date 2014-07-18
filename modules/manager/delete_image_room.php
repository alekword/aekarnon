<?php
	$image_id = $_GET['image_id'];
	$room_id = $_GET['room_id'];
	$sql = "DELETE FROM room_image WHERE image_id = '$image_id'";
	mysql_query($sql);

	echo "<script>window.location = 'index.php?modules=manager&file=room_image&room_id=$room_id';</script>";
?>