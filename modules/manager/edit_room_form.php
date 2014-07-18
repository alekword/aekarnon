<script type="text/javascript" src="nicEdit.js"></script>
<script type="text/javascript">
	bkLib.onDomLoaded(function() { 
		nicEditors.allTextAreas({buttonList : ['fontSize','fontFamily','bold','italic','underline','strikeThrough','subscript','superscript','html']})
	});
</script>
<div class="panel panel-default">
                        <div class="panel-heading">
							<span class="glyphicon glyphicon-plus"></span> add room
                        </div>
                        <div class="panel-body">
							<form role="form" id="add_room" action="index.php?modules=manager&file=edit_room_form&room_id=<?php echo $_GET['room_id']; ?>" method="POST" enctype="multipart/form-data">				
							
								<h4>ข้อมูลห้อง</h4>
								<table>
										<?php
											$select = "SELECT * FROM room WHERE room_id =  '$_GET[room_id]'";
											list($room_id,$room_name,$room_floor,$room_size,$room_number,$room_balcony,$room_kitchen,$pj_id) = mysql_fetch_row(mysql_query($select));

											$counts = "SELECT COUNT(detail_id) FROM room_detail WHERE room_id = '$room_id'";
											list($num) = mysql_fetch_row(mysql_query($counts));										
											/*** First Load ***/
											if(!$_POST['add_rooms']){
												$_SESSION['add'] = $num;
												$_SESSION['name'] = array();
												$_SESSION['detail'] = array();
											}
										?>
										<tr><td align="right"><b>โครงการ :</b></td><td><select name="project_id" id="project_id" style="margin: 5px; width: 300px;">
											<option value="0">กรุณาเลือกโครงการ</option>
											<?php 
									            $project = "SELECT project_id,project_name FROM project";
									            $result = mysql_query($project);
									            while(list($project_id,$project_name) = mysql_fetch_row($result)){
									             echo "<option value='$project_id'"; if($pj_id == "$project_id"){echo "selected='selected'";} echo">$project_name</option>";
									            }
									                                        
									        ?>
										</select></td></tr>
										<tr><td align="right"><b>ชื่อห้อง :</b></td><td><input type="text" name="room_name" id="room_name" style="margin: 5px; width: 300px;" value="<?php echo $room_name; ?>"></td></tr>
										<tr><td align="right"><b>ชั้นของห้อง :</b></td><td><input type="text" name="room_floor" style="margin: 5px; width: 300px;" value="<?php echo $room_floor; ?>"></td></tr>
										<tr><td align="right"><b>ขนาดของห้อง :</b></td><td><input type="text" name="room_size" style="margin: 5px; width: 300px;" value="<?php echo $room_size; ?>"></td></tr>
										<tr><td align="right"><b>จำนวนห้อง :</b></td><td><input type="text" name="room_number" style="margin: 5px; width: 300px;" value="<?php echo $room_number; ?>"></td></tr>
										<tr><td align="right"><b>การหันระเบียง :</b></td><td><input type="text" name="room_balcomy" style="margin: 5px; width: 300px;" value="<?php echo $room_balcony; ?>"></td></tr>
										
								</table>
								
								<hr>

								<h4>รายละเอียดการตกแต่งห้อง</h4>
								<table id="tabletext">
										<tr><td align="right"><b>ห้องครัว :</b></td><td><p style="margin: 5px;"><textarea cols="35" name="room_kitchen" rows="7" style="width: 400px;"><?php echo $room_kitchen; ?></textarea></p></td></tr>
										<?php

											if($_POST['add_rooms']){
												$_SESSION['name'] = $_POST['room_names'];
												$_SESSION['detail'] =  $_POST['room_detail'];
												$_SESSION['add'] += 1;
												for($i = 0; $i < $_SESSION['add']; $i++){
													echo "<tr><td align='right'><b><input type='text' style='width: 120px;' name='room_names[]' placeholder='ชื่อห้อง' value='";echo $_SESSION['name'][$i]; echo "'></b></td><td><p style='margin: 5px;'><textarea cols='35' name='room_detail[]' rows='7' style='width: 400px;'>"; echo $_SESSION['detail'][$i]; echo "</textarea></p></td></tr>";
												}
											}else if($_SESSION['add'] > 0){
												$room_detail = "SELECT detail_id,detail_name,detail_detail FROM room_detail WHERE room_id = '$room_id'";
												$result = mysql_query($room_detail);
												while(list($detail_id,$detail_name,$detail_detail) = mysql_fetch_row($result)){
													echo "<tr><td align='right'><b><input type='text' style='width: 120px;' name='room_names[]' placeholder='ชื่อห้อง' value='$detail_name'></b></td><td><p style='margin: 5px;'><textarea cols='35' name='room_detail[]' rows='7' style='width: 400px;'>"; echo $detail_detail; echo "</textarea></p></td></tr>";
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
								<button type="submit" id="add_room" name="add_room" value="add" class="btn btn-primary btn-success"><span class="glyphicon glyphicon-pencil"></span> แก้ไข </button> &nbsp;
								<a href="index.php?modules=manager&file=manage_room" class="btn btn-primary btn-danger"><span class="glyphicon glyphicon-remove"></span>  ยกเลิก </a>
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

			/**** UPDATE INTO Table room ****/
			$project_id = $_POST['project_id'];
			$sql = "UPDATE room SET room_name = '$_POST[room_name]',
			room_floor = '$_POST[room_floor]',
			room_size = '$_POST[room_size]',
			room_number = '$_POST[room_number]',
			room_balcony = '$_POST[room_balcomy]',
			room_kitchen = '$_POST[room_kitchen]',
			project_id = '$project_id' WHERE room_id = '$room_id'";		
			mysql_query($sql);
			/*******************************/


			/**** INSERT INTO Table room_detail ****/
				/**** DELETE BEFORE INSERT ****/
				$dl = "DELETE FROM room_detail WHERE room_id = '$room_id'";
				mysql_query($dl);
				/******************************/
			$room_name = $_POST['room_names'];
			$room_detail = $_POST['room_detail'];
			if(count($room_name) > 0){
				$insert_roomdetail = "INSERT INTO room_detail VALUES ('','$room_name[0]','$room_detail[0]','$room_id')";
				for($i = 1; $i < count($room_name); $i++){
					$insert_roomdetail .= ", ('','$room_name[$i]','$room_detail[$i]','$room_id')";
				}
				echo $insert_roomdetail;
			}
			mysql_query($insert_roomdetail);
			/***************************************/


			/**** INSERT Image INTO Table room_images ****/
			$room_image = $_FILES['room_image']['name'];
			$room_temp = $_FILES['room_image']['tmp_name'];
			if(strlen($room_image[0]) > 1){
				$insert_image = "INSERT INTO room_image VALUES ('$room_id','','$room_image[0]')";
				copy($room_temp[0],"images/room/$room_image[0]");
				for($i = 1; $i < count($room_image); $i++){
					$insert_image .= ", ('$room_id','','$room_image[$i]')";
					copy($room_temp[$i],"images/room/$room_image[$i]");
				}
			mysql_query($insert_image);
			}			
			/*********************************************/

			echo "<script>window.location = 'index.php?modules=manager&file=manage_room';</script>";
		}

	}
?>