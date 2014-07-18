<?php
	function dbconnect(){
		mysql_connect("localhost","cistrain_alek","worakarn");
		mysql_select_db("cistrain_alek") or die(mysql_error());	
		
		//กำหนดชุดตัวอักขระ เป็น utf-8
		mysql_query("SET character_set_results = utf8") or die(mysql_error());
		mysql_query("SET NAMES UTF8") or die(mysql_error());
	
	}

?>