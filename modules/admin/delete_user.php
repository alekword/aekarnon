<?php 
	$sql = "DELETE FROM users WHERE users_id = '$_GET[users_id]'";
	$result = mysql_query($sql);
	echo "<script>window.location = 'index.php?modules=admin&file=manage_user'</script>";
?>