<?php
function update_lead(){
	/**** Counting In System ****/
	$update_lead = "UPDATE lead SET lead_notification = lead_notification-1 WHERE lead_notification != '0' AND lead_status = 'lead'";
	mysql_query($update_lead);

	/**** Change Status To CRM if Notification equal 0 ****/
	$crm_lead = "UPDATE lead SET lead_statud = 'crm' WHERE lead_status != 'crm' AND lead_notification = '0'";
	mysql_query($crm_lead);



}

function update_showing(){
	/**** Counting In System ****/
	$update_showing = "UPDATE showing SET showing_noti = showing_noti-1 WHERE showing_noti != '0' AND showing_status = 'showing'";
	mysql_query($update_showing);

	/**** Change Status To CRM if Notification equal 0 ****/
	$crm_showing = "UPDATE showing SET showing_status = 'crm' WHERE showing_status = 'showing' AND showing_noti = '0' ";
	mysql_query($crm_showing);
}

function update_offering(){
	/**** Counting In System ****/
	$update_offering = "UPDATE offering SET offering_noti = offering_noti-1 WHERE offering_noti != '0' AND offering_status ='offering'";
	mysql_query($update_offering);

	/**** Change Status To CRM if Notification equal 0 ****/
	$crm_offering = "UPDATE offering SET offering_status = 'crm' WHERE offering_status = 'offering' AND offering_noti = '0'";
	mysql_query($crm_offering);
}

function update_closing(){
	/**** Counting In System ****/
	$update_closing = "UPDATE closing SET closing_noti = closing_noti-1 WHERE closing_noti != '0'";
	mysql_query($update_closing);

	/**** Change Status To CRM if Notification equal 0 ****/
	//$crm_closing = "UPDATE closing SET closing_noti = 'crm' WHERE closing_noti = '0'";
	//mysql_query($crm_closing);
}
?>