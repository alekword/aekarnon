<?php 
	$user_pic = $_FILES['users_pic']['name'];
	$user_temp = $_FILES['users_pic']['tmp_name'];
	
	if($user_pic){
		copy($user_temp,"images/profile/$user_pic");
		$update_pic = ", users_pic = '$user_pic'";
	}
	
	$sql = "UPDATE users SET users_fname = '$_POST[users_fname]',
	users_lname = '$_POST[users_lname]',
	users_sex = '$_POST[users_sex]',
	users_tel = '$_POST[users_tel]',
	users_mobile = '$_POST[users_mobile]',
	users_email = '$_POST[users_email]' $update_pic WHERE users_id = '$_SESSION[users_id]'";
	
	$result = mysql_query($sql);
	echo "<script>window.location = 'index.php';</script>";
?>