<?php
	$sql = "UPDATE closing SET closing_price = '$_POST[closing_price]',
	closing_promotion = '$_POST[closing_promotion]' WHERE closing_id = '$_POST[closing_id]'";
	echo $sql;
	mysql_query($sql);
	echo "<script>window.location = 'index.php?modules=saler&file=closing';</script>";
?>