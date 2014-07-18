<?php
	if($_POST['wishes_recieve']){
		$wishes_recieve = $_POST['wishes_recieve'].",".$_POST['text_recieve'];
	}else{
		$wishes_recieve = "-";
	}
	$birthdate = $_POST['day']."-".$_POST['month']."-".$_POST['year'];
	
	$noti = "SELECT deadline_day FROM deadline WHERE deadline_name = 'Lead'";
	list($notification) = mysql_fetch_row(mysql_query($noti));
	
	$sql = "INSERT INTO lead VALUES('','$_POST[fname]','$_POST[lname]','$_POST[sex]','$_POST[lead_company]','$_POST[lead_address]','$_POST[lead_tel]','$_POST[lead_mobile]','$_POST[lead_email]',
	'$birthdate','$_POST[salary_per_month]','$_POST[installements]','$_POST[objective_property]','$_POST[type_property]','$wishes_recieve','lead','$notification','$_SESSION[users_id]')";

	mysql_query($sql);
	echo "<script>window.location = 'index.php?modules=saler&file=lead';</script>";
?>