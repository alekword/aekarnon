<?php 
	session_start();
	include("include/connect.php");
	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string(md5($_POST['password']));
	
	$sql = "SELECT count(*) FROM users WHERE(username = '$username' AND password = '$password')";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	
	if($row[0] > 0){		
		
		/*** Name And Picture ***/
		$sql3 = "SELECT  users_id,users_fname,users_lname,users_pic,users_type FROM users WHERE username = '$username'";
		$result = mysql_query($sql3);
		list($users_id,$users_fname,$users_lname,$users_pic,$users_type) = mysql_fetch_row($result);
		$_SESSION['users_id'] = $users_id;
		$_SESSION['pic'] = $users_pic;
		$_SESSION['fullname'] = $users_fname." ".$users_lname;
		$_SESSION['type'] = $users_type;
		$_SESSION['valid_user'] = "akearnon";
		echo "<script>window.location = 'index.php';</script>";
	}else{
		echo "*ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง";
	}
?>