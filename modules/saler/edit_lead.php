<?php

	if($_POST['wishes_recieve']){
		$wishes_recieve = $_POST['wishes_recieve'].",".$_POST['text_recieve'];
	}else{
		$wishes_recieve = "-";
	}
	$birthdate = $_POST['day']."-".$_POST['month']."-".$_POST['year'];
	$sql = "UPDATE lead SET lead_fname = '$_POST[fname]',
		lead_lname = '$_POST[lname]',
		lead_sex = '$_POST[sex]',
		lead_company = '$_POST[lead_company]',
		lead_address = '$_POST[lead_address]',
		lead_tel = '$_POST[lead_tel]',
		lead_mobile = '$_POST[lead_mobile]',
		lead_email = '$_POST[lead_email]',
		lead_birthdate = '$birthdate',
		salary_per_month = '$_POST[salary_per_month]',
		installements = '$_POST[installements]',
		objective_property = '$_POST[objective_property]',
		type_property = '$_POST[type_property]',
		wishes_recieve = '$wishes_recieve' WHERE lead_id = '$_POST[lead_id]'";
		
	mysql_query($sql);
	echo "<script>window.location = 'index.php?modules=saler&file=lead';</script>";
?>