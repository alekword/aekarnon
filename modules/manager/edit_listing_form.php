<?php
	if($_GET['listing_id']){
		$_SESSION['listing_id'] = $_GET['listing_id'];
	}
?>

<div class="panel panel-default">
                        <div class="panel-heading">
							<span class="glyphicon glyphicon-pencil"></span> edit listing
                        </div>
                        <div class="panel-body">
                        	<form role="form" id="create_listing" method="POST" action="index.php?modules=manager&file=edit_listing_form">
								<table>								
								<tr><td align="right"><b>โครงการ : </b></td><td><select name="project" id="project" style="margin: 5px; width: 250px;" onchange="this.form.submit()">
									<option value="empty">กรุณาเลือกโครงการ</option>
									<?php										
										$listing_id = $_GET['listing_id'];										
										$listing = "SELECT listing_price,listing_promotion,room.room_id,room.project_id FROM listing INNER JOIN room ON room.room_id = listing.room_id WHERE listing_id = '$listing_id'";
										list($listing_price,$listing_promotion,$rm_id,$pj_id) = mysql_fetch_row(mysql_query($listing));

										$project = "SELECT project_id,project_name FROM project";
										$result = mysql_query($project);

										if($listing_id){
											while(list($project_id,$project_name) = mysql_fetch_row($result)){
												echo "<option value='$project_id'"; if($pj_id == "$project_id"){echo "selected='selected'";} echo">$project_name</option>";
											}
										}else{
											while(list($project_id,$project_name) = mysql_fetch_row($result)){
												echo "<option value='$project_id'"; if($_POST['project'] == "$project_id"){echo "selected='selected'";} echo">$project_name</option>";
											}
										}
										
										
									?>
								</select></td></tr>
								<tr><td align="right"><b>ห้อง : </b></td><td><select name="room" id="room" style="margin: 5px; width: 250px;">
									<?php
										
									/****** LISTING NAME *******/
										if($_POST['project']){
											$room = "SELECT room_id,room_name FROM room WHERE project_id = '$_POST[project]'";
											$result = mysql_query($room);
											while(list($room_id,$room_name) = mysql_fetch_row($result)){
												echo "<option value='$room_id'"; if($_POST['room'] == $room_id){ echo "selected='selected'";} echo ">$room_name</option>";
											}											
										}else{
											$room = "SELECT room_id,room_name FROM room WHERE project_id = '$pj_id'";
											$result = mysql_query($room);
											while(list($room_id,$room_name) = mysql_fetch_row($result)){
												echo "<option value='$room_id'"; if($rm_id == $room_id){ echo "selected='selected'";} echo ">$room_name</option>";
											}
										}
										
									/****** LISTING NAME *******/
									?>
								</select></td></tr>
								<tr><td align="right"><b>ราคา : </b></td><td><input type="text" name="listing_price" id="listing_price" style="margin: 5px; width: 250px;" value="<?php if($listing_price){echo $listing_price;}else{echo $_POST['listing_price'];} ?>" placeholder="example 4,500,000"></td></tr>
								<tr><td align="right"><b>โปรโมชั่น : </b></td><td><input type="text" name="listing_promotion" style="margin: 5px; width: 250px;" value="<?php if($listing_promotion){echo $listing_promotion;}else{echo $_POST['listing_promotion'];}?>"></td></tr>
							<table>
								<hr>
								<button type="submit" id="create_listing" name="create_listing" value="save" class="btn btn-primary btn-success"><span class="glyphicon glyphicon-pencil"></span> แก้ไข </button> &nbsp;
								<a href="index.php?modules=manager&file=manage_listing" class="btn btn-primary btn-danger"><span class="glyphicon glyphicon-remove"></span>  ยกเลิก </a>
							</form>
                        </div>
</div>

<?php
	if($_POST['create_listing'] == "save"){
		if($_POST['project'] != "empty" && $_POST['listing_price'] != ""){
			list($listing_name) = mysql_fetch_row(mysql_query("SELECT room_name FROM room WHERE room_id = '$_POST[room]'"));
			$update = "UPDATE listing SET listing_name = '$listing_name',
			listing_price = '$_POST[listing_price]',
			listing_promotion = '$_POST[listing_promotion]',
			room_id = '$_POST[room]' WHERE listing_id = '$_SESSION[listing_id]'";
			mysql_query($update);
			echo "<script>window.location = 'index.php?modules=manager&file=manage_listing';</script>";
		}
	}
?>