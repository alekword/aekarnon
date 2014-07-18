<!doctype html>
<html>
<head>
<meta charset="utf-8"/>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,800' rel='stylesheet' type='text/css'>
<link href="css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
body {
	color: #5e6d81;
	background: #eaedf1;
}
input[type="text"], input[type="password"] {
	font-family: 'Open Sans', sans-serif;
	font-size: 18px;
	padding: 16px 0 16px 10px;
	background: #fff;
	border: 0;
	box-shadow: none;
	width: 77%;
	outline: none;
}
input[type="submit"] {
	font-family: 'Open Sans', sans-serif;
	font-size: 20px;
	margin: 10px 0 0 0;
	padding: 16px 0;
	width: 100%;
	color: #fff;
	background: #ff3333;
	border: 0;
	border-radius: 4px;
}
input[type="submit"]:hover {
	background: #ff4433;
}
input[type="text"]::-webkit-input-placeholder, input[type="password"]::-webkit-input-placeholder {
	color: #dbe1e8;
}
input[type="text"]:-moz-placeholder, input[type="password"]:-moz-placeholder {
	color: #dbe1e8;
}
input[type="text"]::-moz-placeholder, input[type="password"]::-moz-placeholder {
	color: #dbe1e8;
}

.login {
	width: 300px;
	margin: 100px auto;
}
.input-prepend {
	width: 100%;
	margin: 0 0 10px 0;
}
.input-prepend .add-on {
	color: #5e6d81;
	font-size: 18px;
	font-weight: bold;
	width: 20%;
	padding: 16px 0;
	background: #9ea7b3;
	border: 0;
}
</style>
</head>
<body>
<div class="login">
	<form method="POST" action="check_login.php" id="myForm">
	<h2 align="center"><span class="add-on"><img src="images/login.png" width="80px" height="50px"/></span>Login</h2>
	<div class="input-prepend">
		<span class="add-on"><img src="images/user.png" /></span>
		<input class="" type="text" placeholder="Username" name="username" id="username">
	</div>
	<div class="input-prepend">
		<span class="add-on"><img src="images/lock.png" /></span>
		<input class="" type="password" placeholder="Password" name="password" id="password">
	</div>
	<div class="controls">
		<input type="submit" value="log in" id="submit"/>
	</div>
	<p><div id="ack" style="color: red; font-size: 18px;"></div></p>
	</form>
</div>

<script language="javascript" src="js/jquery-1.10.2.js"></script>
<script language="javascript" src="js/login.js"></script>
</body>
</html>