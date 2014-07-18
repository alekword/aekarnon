
<div class="panel panel-default">
                        <div class="panel-heading">
							<span class="glyphicon glyphicon-glyphicon glyphicon-file"></span> add showing
                        </div>
                        <div class="panel-body">
							<?php
								$lead_id = $_GET['lead_id'];
							?>							
							<form role="form" id="add_lead" method="POST">
								<table>
								
								<tr><td align="right"><b>โครงการ : </b></td><td><select name="project" style="margin: 5px; width: 250px;" onchange="this.form.submit()">
									<option>กรุณาเลือกชื่อโครงการที่ showing</option>
									<?php 
										$project = "SELECT project_id,project_name FROM project";
										$result = mysql_query($project);
										while(list($project_id,$project_name) = mysql_fetch_row($result)){
											echo "<option value='$project_id'"; if($_POST['project'] == "$project_id"){echo "selected='selected'";} echo">$project_name</option>";
										}
										
									?>
								</select></td></tr>
								<tr><td align="right"><b>ห้อง (listing): </b></td><td><select name="room" id="room" style="margin: 5px; width: 250px;">
									


									<?php
									/****** LISTING NAME *******/
										if($_POST['project']){
											$project = $_POST['project'];
											$room = "SELECT room_id FROM room WHERE project_id = '$project'";
											$result = mysql_query($room);
											while(list($room_id) = mysql_fetch_row($result)){
												$listing = "SELECT listing_id,listing_name FROM listing WHERE room_id = '$room_id' AND listing_status = 'available'";
												$result2 = mysql_query($listing);
												while(list($listing_id,$listing_name) = mysql_fetch_row($result2)){
													echo "<option value='$listing_id'"; if($_POST['room'] == "$listing_id"){ echo "selected='selected'";} echo ">$listing_name</option>";
												}
											}
										}
									/****** LISTING NAME *******/
									?>
								</select></td></tr>
								
								<tr> <td align="right"><b>ความพึงพอใจ :</b></td><td>
								<select name="rating" style="margin: 5px; width: 250px;">
									<option value="">ความพึงพอใจของลูกค้า</option>
									<option value="ชอบมาก" <?php if($_POST['rating'] == "ชอบมาก"){echo "selected='selected'";}?>>ชอบมาก</option>
									<option value="ชอบ" <?php if($_POST['rating'] == "ชอบ"){echo "selected='selected'";}?>>ชอบ</option>
									<option value="เฉย ๆ" <?php if($_POST['rating'] == "เฉย ๆ"){echo "selected='selected'";}?>>เฉย ๆ</option>
									<option value="ไม่ชอบ" <?php if($_POST['rating'] == "ไม่ชอบ"){echo "selected='selected'";}?>>ไม่ชอบ</option>
									<option value="ไม่ชอบมาก" <?php if($_POST['rating'] == "ไม่ชอบมาก"){echo "selected='selected'";}?>>ไม่ชอบมาก</option>
								</select>	
								</td></tr>
								<tr><td align="right"><b>วันเวลาในการ showing :</b></td><td>
	              					<div id="datetimepicker1" class="input-append date" style="margin-top: 5px;">
	    									<input name="datetime" data-format="dd/MM/yyyy hh:mm:ss" type="text" style="margin-left: 5px; height: 30px; width: 250px;" ></input>
	   										 <span class="add-on" style="height: 30px;">
	    										<i data-time-icon="glyphicon glyphicon-time" data-date-icon="glyphicon glyphicon-calendar"></i>
											 </span>
									</div>
								</td></tr>
								<tr><td align="right"><b>ความคิดเห็นเพิ่มเติม :</b></td><td><textarea name="comment" style="width: 250px; margin:5px;" rows="5" style="margin: 5px;"><?php echo $_POST['comment'];?></textarea></td></tr>
								</table>
								<hr>
								<button type="submit" id="add_lead" name="accept" value="accept" class="btn btn-primary btn-success"><span class="glyphicon glyphicon-upload"></span> บันทึก </button>
								<a href="index.php?modules=saler&file=lead" class="btn btn-primary btn-danger"><span class="glyphicon glyphicon-remove"></span> ยกเลิก</a>
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

			$deadline = "SELECT deadline_day FROM deadline WHERE deadline_name = 'Showing'";
			list($dl) = mysql_fetch_row(mysql_query($deadline));

			$sql = "INSERT INTO showing VALUES ('','$_POST[rating]','$_POST[comment]','$_POST[datetime]','$dl','$_POST[room]','$lead_id','showing')";
			$result = mysql_query($sql);			
			

			/** STATUS LEAD UPDATE **/
			$update_lead = "UPDATE lead SET lead_status = 'showing' WHERE lead_id = '$lead_id'";
			$result = mysql_query($update_lead);
			echo "<script>window.location = 'index.php?modules=saler&file=showing';</script>";
		}
	}
?>