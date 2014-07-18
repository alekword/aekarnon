<?php 
	$username = $_POST['users_fname'];
	$password = md5($_POST['users_password']);
	$type = $_POST['users_type'];
	
	$sql = "INSERT INTO users (username,password,users_type) VALUES ('$username','$password','$type')";
	$result = mysql_query($sql);
	echo "<script>window.location = 'index.php?modules=admin&file=manage_user';</script>";
?>