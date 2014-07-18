
<div class="panel panel-default">
                        <div class="panel-heading">
							<span class="glyphicon glyphicon-glyphicon glyphicon-file"></span> edit showing
                        </div>
                        <div class="panel-body">
							<?php
								$lead_id = $_GET['lead_id'];
								$showing_id = $_GET['showing_id'];


							?>							
							<form role="form" id="add_lead" method="POST">
								<table>

									<?php
										$sql = "SELECT showing.lead_id, showing.listing_id,showing_rating,showing_comment,showing_datetime,listing_name, showing_id,showing_rating,lead_fname,lead_lname,listing.room_id,room.project_id,project_name FROM showing INNER JOIN lead ON (showing.lead_id = lead.lead_id) INNER JOIN listing ON (showing.listing_id = listing.listing_id) INNER JOIN room ON (listing.room_id = room.room_id) INNER JOIN project ON (room.project_id = project.project_id) WHERE showing_id ='$showing_id'";
										$result = mysql_query($sql);
										list($lead_id,$listing_id,$showing_rating,$showing_comment,$showing_datetime,$listing_name,$showing_id,$showing_rating,$lead_fname,$lead_lname,$rm_id,$pj_id,$pj_name) = mysql_fetch_row($result);
									?>
									
								<tr><td align="right"><b>โครงการ : </b></td><td><select name="project" style="margin: 5px; width: 250px;" onchange="this.form.submit()">
									<option>กรุณาเลือกชื่อโครงการที่ showing</option>
									<?php
										$project = "SELECT project_id,project_name FROM project";
										$result = mysql_query($project);

										//check post project
										if($_POST['project']){
											while(list($project_id,$project_name) = mysql_fetch_row($result)){
												echo "<option value='$project_id'"; if($_POST['project'] == "$project_id"){echo "selected='selected'";} echo">$project_name</option>";
											}
										}else{
											while(list($project_id,$project_name) = mysql_fetch_row($result)){
												echo "<option value='$project_id'"; if($project_id == "$pj_id"){echo "selected='selected'";} echo">$project_name</option>";
											}
										}

										
									?>
								</select></td></tr>
								<tr><td align="right"><b>ห้อง : </b></td><td><select name="room" id="room" style="margin: 5px; width: 250px;">
									
									<?php
											
											

											if($_POST['project']){
												$project = $_POST['project'];
												$room = "SELECT room_id FROM room WHERE project_id = '$project'";
												$result = mysql_query($room);
												while(list($room_id) = mysql_fetch_row($result)){
												$listing = "SELECT listing_id,listing_name FROM listing WHERE room_id = '$room_id'";
												$result2 = mysql_query($listing);
													while(list($listing_id,$listing_name) = mysql_fetch_row($result2)){
														echo "<option value='$listing_id'"; if($room_id == "$listing_id"){ echo "selected='selected'";} echo ">$listing_name</option>";
													}
												}
											}else{
												$project = $pj_id;
												$room = "SELECT room_id FROM room WHERE project_id = '$project'";
												$result = mysql_query($room);
												while(list($room_id) = mysql_fetch_row($result)){
												$listing = "SELECT listing_id,listing_name FROM listing WHERE room_id = '$room_id'";
												$result2 = mysql_query($listing);
													while(list($listing_id,$listing_name) = mysql_fetch_row($result2)){
														echo "<option value='$listing_id'"; if($room_id == $rm_id){ echo "selected='selected'";} echo ">$listing_name</option>";
													}
												}
											}
											
										
									?>
								</select></td></tr>
								
								<tr> <td align="right"><b>ความพึงพอใจ :</b></td><td>
								<select name="rating" style="margin: 5px; width: 250px;">
									<option value="">ความพึงพอใจของลูกค้า</option>
									<option value="ชอบมาก" <?php if($showing_rating == "ชอบมาก"){echo "selected='selected'";}?>>ชอบมาก</option>
									<option value="ชอบ" <?php if($showing_rating == "ชอบ"){echo "selected='selected'";}?>>ชอบ</option>
									<option value="เฉย ๆ" <?php if($showing_rating  == "เฉย ๆ"){echo "selected='selected'";}?>>เฉย ๆ</option>
									<option value="ไม่ชอบ" <?php if($showing_rating  == "ไม่ชอบ"){echo "selected='selected'";}?>>ไม่ชอบ</option>
									<option value="ไม่ชอบมาก" <?php if($showing_rating  == "ไม่ชอบมาก"){echo "selected='selected'";}?>>ไม่ชอบมาก</option>
								</select>	
								</td></tr>
								<tr><td align="right"><b>วันเวลาในการ showing :</b></td><td>
	              					<div id="datetimepicker1" class="input-append date" style="margin-top: 5px;">
	    									<input name="datetime" data-format="dd/MM/yyyy hh:mm:ss" type="text" value="<?php echo $showing_datetime; ?>" style="margin-left: 5px; height: 30px; width: 250px;" ></input>
	   										 <span class="add-on" style="height: 30px;">
	    										<i data-time-icon="glyphicon glyphicon-time" data-date-icon="glyphicon glyphicon-calendar"></i>
											 </span>
									</div>
								</td></tr>
								<tr><td align="right"><b>ความคิดเห็นเพิ่มเติม :</b></td><td><textarea name="comment" style="width: 250px; margin:5px;" rows="5" style="margin: 5px;"><?php echo $showing_comment; ?></textarea></td></tr>
								</table>
								<hr>
								<button type="submit" id="add_lead" name="accept" value="accept" class="btn btn-primary btn-success"><span class="glyphicon glyphicon-upload"></span> แก้ไข </button>
								<a href="index.php?modules=saler&file=showing" class="btn btn-primary btn-danger"><span class="glyphicon glyphicon-remove"></span> ยกเลิก</a>
							</form>


<?php 
	if($_POST['accept'] == "accept"){
		if($_POST['room'] == ""){
			echo "<script>alert('กรุณาเลือกห้อง'); 
			</script>";
		}else if($_POST['rating'] == ""){
			echo "<script>alert('กรุณาเลือกควมพึงพอใจ'); 
			</script>";
		}else{
			$sql = "UPDATE showing SET showing_rating = '$_POST[rating]',
			showing_comment = '$_POST[comment]',
			showing_datetime = '$_POST[datetime]',
			listing_id = '$_POST[room]' WHERE showing_id = '$showing_id'";

			$result = mysql_query($sql);
			echo "<script>window.location = 'index.php?modules=saler&file=showing';</script>";
		}
	}
?>