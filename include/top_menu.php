<?php 

if($_SESSION['type'] == "sale"){
	top_saler();
}else if($_SESSION['type'] == "admin"){
	top_admin();
}if($_SESSION['type'] == "crm"){
	top_crm();
}if($_SESSION['type'] == "manager"){
	top_manager();
}

function top_saler(){
	echo "<a href='index.php?modules=saler&file=contact'>Contact</a> &nbsp; | &nbsp;
	<a href='index.php?modules=saler&file=request'>Request</a> &nbsp; | &nbsp;
	<a href='index.php?modules=document&file=download_document'>Document</a> &nbsp; | &nbsp; ";
}

function top_admin(){
	echo "<a href='index.php?modules=document&file=download_document'>Document</a> &nbsp; | &nbsp; ";
}

function top_manager(){
	echo "<a href='index.php?modules=document&file=download_document'>Document</a> &nbsp; | &nbsp; ";
}

function top_crm(){
	echo "<a href='index.php?modules=document&file=download_document'>Document</a> &nbsp; | &nbsp; ";
}

?>