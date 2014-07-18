<div class="panel panel-default">
                        <div class="panel-heading">
							<span class="glyphicon glyphicon-list-alt"></span> create listing
                        </div>
                        <div class="panel-body">
                        	<form role="form" id="create_listing" method="POST" action="index.php?modules=manager&file=create_listing_form">
								<table>
								
								<tr><td align="right"><b>โครงการ : </b></td><td><select name="project" id="project" style="margin: 5px; width: 250px;" onchange="this.form.submit()">
									<option value="empty">กรุณาเลือกโครงการ</option>
									<?php 
										$project = "SELECT project_id,project_name FROM project";
										$result = mysql_query($project);
										while(list($project_id,$project_name) = mysql_fetch_row($result)){
											echo "<option value='$project_id'"; if($_POST['project'] == "$project_id"){echo "selected='selected'";} echo">$project_name</option>";
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
										}
									/****** LISTING NAME *******/
									?>
								</select></td></tr>
								<tr><td align="right"><b>ราคา : </b></td><td><input type="text" name="listing_price" id="listing_price" style="margin: 5px; width: 250px;" value="<?php echo $_POST['listing_price'];?>" placeholder="example 4500000"></td></tr>
								<tr><td align="right"><b>โปรโมชั่น : </b></td><td><input type="text" name="listing_promotion" style="margin: 5px; width: 250px;" value="<?php echo $_POST['listing_promotion'];?>"></td></tr>
							<table>
								<hr>
								<button type="submit" id="create_listing" name="create_listing" value="save" class="btn btn-primary btn-success"><span class="glyphicon glyphicon-upload"></span> บันทึก </button> &nbsp;
							<button type="reset" class="btn btn-primary btn-danger"><span class="glyphicon glyphicon-trash"></span>  รีเซท </button>
							</form>
                        </div>
</div>

<?php
	if($_POST['create_listing'] == "save"){
		if($_POST['project'] != "empty" && $_POST['listing_price'] != ""){
			list($listing_name) = mysql_fetch_row(mysql_query("SELECT room_name FROM room WHERE room_id = '$_POST[room]'"));
			$sql = "INSERT INTO listing VALUES ('','$listing_name','$_POST[listing_price]','$_POST[listing_promotion]','available','$_POST[room]')";
			mysql_query($sql);
			echo "<script>window.location = 'index.php?modules=manager&file=manage_listing';</script>";
		}
	}
?>