<?php
if($_SESSION['type'] == "sale"){
	index_sale();
}else if($_SESSION['type'] == "admin"){
	index_admin();
}if($_SESSION['type'] == "crm"){
	index_crm();
}if($_SESSION['type'] == "manager"){
	index_manager();
}


function index_admin(){
	echo "<h3><font color=''><b>ยินดีต้อนรับ Administrator</b></font></h3>";
}

function index_manager(){
	echo "<h3><font color=''><b>ยินดีต้อนรับ Manager</b></font></h3>";
}

function index_sale(){
	include("index_sale.php");
}

function index_crm(){
	echo "<h3><font color=''><b>ยินดีต้อนรับ Customer Relation Management</b></font></h3>";
}


?>