<?php 
	$room_id = $_GET['room_id'];
	$sql = "DELETE FROM room WHERE room_id = '$room_id'";
	mysql_query($sql);

	/**** DELETE Sub RoomS ****/
	$room = "DELETE FROM room_detail WHERE room_id = '$room_id'";
	mysql_query($sql);
	/**************************/

	/**** DELETE Image RoomS ****/
	$room = "DELETE FROM room_image WHERE room_id = '$room_id'";
	mysql_query($sql);
	/**************************/

	echo "<script>window.location = 'index.php?modules=manager&file=manage_room';</script>";
?>