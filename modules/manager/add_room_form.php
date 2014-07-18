<script type="text/javascript" src="nicEdit.js"></script>
<script type="text/javascript">
	bkLib.onDomLoaded(function() { 
		nicEditors.allTextAreas({buttonList : ['fontSize','fontFamily','bold','italic','underline','strikeThrough','subscript','superscript','html']})
	});
</script>
<?php
	/*** First Load ***/
	if(!$_POST['add_rooms']){
		$_SESSION['add'] = "";
		$_SESSION['name'] = array();
		$_SESSION['detail'] = array();
	}
		

?>
<div class="panel panel-default">
                        <div class="panel-heading">
							<span class="glyphicon glyphicon-plus"></span> add room
                        </div>
                        <div class="panel-body">
							<form role="form" id="add_room" action="index.php?modules=manager&file=add_room_form" method="POST" enctype="multipart/form-data">				
							
								<h4>ข้อมูลห้อง</h4>
								<table>
										<tr><td align="right"><b>โครงการ :</b></td><td><select name="project_id" id="project_id" style="margin: 5px; width: 300px;">
											<option value="0">กรุณาเลือกโครงการ</option>
											<?php 
									            $project = "SELECT project_id,project_name FROM project";
									            $result = mysql_query($project);
									            while(list($project_id,$project_name) = mysql_fetch_row($result)){
									             echo "<option value='$project_id'"; if($_POST['project_id'] == "$project_id"){echo "selected='selected'";} echo">$project_name</option>";
									            }
									                                        
									        ?>
										</select></td></tr>
										<tr><td align="right"><b>ชื่อห้อง :</b></td><td><input type="text" name="room_name" id="room_name" style="margin: 5px; width: 300px;" value="<?php echo $_POST['room_name']; ?>"></td></tr>
										<tr><td align="right"><b>ชั้นของห้อง :</b></td><td><input type="text" name="room_floor" style="margin: 5px; width: 300px;" value="<?php echo $_POST['room_floor']; ?>"></td></tr>
										<tr><td align="right"><b>ขนาดของห้อง :</b></td><td><input type="text" name="room_size" style="margin: 5px; width: 300px;" value="<?php echo $_POST['room_size']; ?>"></td></tr>
										<tr><td align="right"><b>จำนวนห้อง :</b></td><td><input type="text" name="room_number" style="margin: 5px; width: 300px;" value="<?php echo $_POST['room_number']; ?>"></td></tr>
										<tr><td align="right"><b>การหันระเบียง :</b></td><td><input type="text" name="room_balcomy" style="margin: 5px; width: 300px;" value="<?php echo $_POST['room_balcomy']; ?>"></td></tr>
										
								</table>
								
								<hr>

								<h4>รายละเอียดการตกแต่งห้อง</h4>
								<table id="tabletext">
										<tr><td align="right"><b>ห้องครัว :</b></td><td><p style="margin: 5px;"><textarea cols="35" name="room_kitchen" rows="7" style="width: 300px;"><?php echo $_POST['room_kitchen']; ?></textarea></p></td></tr>
										<?php
											if($_POST['add_rooms']){
												$_SESSION['name'] = $_POST['room_names'];
												$_SESSION['detail'] =  $_POST['room_detail'];
												$_SESSION['add'] += $_POST['add_rooms'];
												for($i = 0; $i < $_SESSION['add']; $i++){
													echo "<tr><td align='right'><b><input type='text' style='width: 120px;' name='room_names[]' placeholder='ชื่อห้อง' value='";echo $_SESSION['name'][$i]; echo "'></b></td><td><p style='margin: 5px;'><textarea cols='35' name='room_detail[]' rows='7' style='width: 300px;'>"; echo $_SESSION['detail'][$i]; echo "</textarea></p></td></tr>";
												}
											}


										?>
								</table>
								<br>
								<button type="submit" name="add_rooms" value="1" class="btn btn-primary btn-info"><span class="glyphicon glyphicon-plus"></span> เพิ่มห้อง </button>
								<hr>

								<h4>รูปภาพ</h4>
								<table id="tabletext">
										<tr><td align="right"><b>รูปภาพ :</b></td><td><input type="file" name="room_image[]" multiple style="margin: 5px; width: 300px;" ><font color="red">*สามารถเลือกได้หลายไฟล์</font></td></tr>
								</table>
								<br>
								<hr>
								<button type="submit" id="add_room" name="add_room" value="add" class="btn btn-primary btn-success"><span class="glyphicon glyphicon-upload"></span> บันทึก </button> &nbsp;
								<button type="reset" class="btn btn-primary btn-danger"><span class="glyphicon glyphicon-trash"></span>  รีเซท </button>
							</form>
						</div>
</div>

<?php
	if($_POST['add_room']){
		if($_POST['project_id'] == "0"){
			echo "<script>alert('กรุณาเลือกโครงการ'); document.getElementById('project_id').focus();</script>";
		}else if($_POST['room_name'] == ""){
			echo "<script>alert('กรุณากรอกชื่อห้อง'); document.getElementById('room_name').focus();</script>";
		}else{

			/**** INSERT INTO Table room ****/
			$project_id = $_POST['project_id'];
			$sql = "INSERT INTO room VALUES ('','$_POST[room_name]','$_POST[room_floor]','$_POST[room_size]','$_POST[room_number]','$_POST[room_balcomy]','$_POST[room_kitchen]','$project_id')";
			mysql_query($sql);
			/*******************************/


			/**** INSERT INTO Table room_detail ****/
			list($max) = mysql_fetch_row(mysql_query("SELECT MAX(room_id) FROM room"));
			$room_name = $_POST['room_names'];
			$room_detail = $_POST['room_detail'];
			$insert_roomdetail = "INSERT INTO room_detail VALUES ('','$room_name[0]','$room_detail[0]','$max')";
			for($i = 1; $i < count($room_name); $i++){
				$insert_roomdetail .= ", ('','$room_name[$i]','$room_detail[$i]','$max')";
			}
			mysql_query($insert_roomdetail);
			/***************************************/


			/**** INSERT Image INTO Table room_images ****/
			$room_image = $_FILES['room_image']['name'];
			$room_temp = $_FILES['room_image']['tmp_name'];
			if(count($room_image) > 0){
				$insert_image = "INSERT INTO room_image VALUES ('$max','','$room_image[0]')";
				copy($room_temp[0],"images/room/$room_image[0]");
				for($i = 1; $i < count($room_image); $i++){
					$insert_image .= ", ('$max','','$room_image[$i]')";
					copy($room_temp[$i],"images/room/$room_image[$i]");
				}
				mysql_query($insert_image);
			}			
			/*********************************************/

			echo "<script>window.location = 'index.php?modules=manager&file=manage_room';</script>";
		}

	}
?>