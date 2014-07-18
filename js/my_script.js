$("button#add_lead").click( function() {
				if($('#fname').val() == ""){
					alert('กรุณากรอกชื่อ');
					$('#fname').focus();
					return false;
				}else if($('#lname').val() == ""){
					alert('กรุณากรอกนามสกุล');
					$('#lname').focus();
					return false;
				}	
});

$("button#add_user").click( function() {
				/** add user **/
				if($('#users_fname').val() == ""){
					alert('กรุณากรอกชื่อผู้ใช้');
					$('#users_fname').focus();
					return false;
				}else if($('#users_password').val() == ""){
					alert('กรุณากรอกรหัสผ่าน');
					$('#users_password').focus();
					return false;
				}
});

$("button#add_document").click( function() {
				/** add document **/
				if($('#document_name').val() == ""){
					alert('กรุณากรอกชื่อเอกสาร');
					$('#document_name').focus();
					return false;
				}else if($('#document_filename').val() == ""){
					alert('กรุณาเลือกไฟล์');
					$('#document_filename').focus();
					return false;
				}
});

$("button#add_project").click( function() {
				/** add project **/
				if($('#project_name').val() == ""){
					alert('กรุณากรอกชื่อโครงการ');
					$('#project_name').focus();
					return false;
				}else if($('#project_owner').val() == ""){
					alert('กรุณากรอกชื่อเจ้าของโครงการ');
					$('#project_owner').focus();
					return false;
				}
});

$("button#add_room").click( function() {
				if($('#room_name').val() == ""){
					alert('กรุณากรอกชื่ห้อง');
					$('#room_name').focus();
					return false;
				}
});

$("button#create_listing").click( function () { 
	if($('#project').val() == "empty"){
		alert('กรุณาเลือกโครงการ');
		$("#project").focus();
		return false;
	}else if($('#listing_price').val() == ""){
		alert('กรุณากรอกราคา');
		$("#listing_price").focus();
		return false;
	}
});