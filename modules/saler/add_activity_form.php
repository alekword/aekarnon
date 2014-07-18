<?php

		$lead_id = $_GET['lead_id'];
	
?>			
<div class="panel panel-default">
                        <div class="panel-heading">
							<span class="glyphicon glyphicon-glyphicon glyphicon-file"></span> add activity
                        </div>
                        <div class="panel-body">
											
							<form role="form" id="add_lead" method="POST">
								<table>
								<tr><td align="right"><b>ชื่อเรื่อง : </b></td><td><input type="text" name="activity_name" style="margin: 5px; width: 250px;" value="<?php echo $_POST['activity_name']; ?>"></td></tr>
								<tr><td align="right"><b>รายละเอียด : </b></td><td><textarea name="activity_detail" style="width: 250px; margin: 5px;" rows="5">
									<?php echo $_POST['activity_detail']; ?>
								</textarea></td></tr>
								
								<tr><td align="right"><b>วันที่และเวลา :</b></td><td>
	              					<div id="datetimepicker1" class="input-append date" style="margin-top: 5px;">
	    									<input name="datetime" data-format="dd/MM/yyyy hh:mm:ss" type="text" style="margin-left: 5px; height: 30px; width: 250px;" value="<?php echo $_POST['datetime']; ?>"></input>
	   										 <span class="add-on" style="height: 30px;">
	    										<i data-time-icon="glyphicon glyphicon-time" data-date-icon="glyphicon glyphicon-calendar"></i>
											 </span>
									</div>
								</td></tr>
								</table>
								<hr>
								<button type="submit" id="add_lead" name="accept" value="accept" class="btn btn-primary btn-success"><span class="glyphicon glyphicon-upload"></span> บันทึก </button>
								<a href="index.php?modules=saler&file=contact" class="btn btn-primary btn-danger"><span class="glyphicon glyphicon-remove"></span> ยกเลิก</a>
							</form>
						</div>
</div>

<?php 
	if($_POST['accept'] == "accept"){
		if($_POST['activity_name'] == ""){
			echo "<script>alert('กรุณากรอกขื่อเรื่อง');</script>";
		}else{
			$sql = "INSERT INTO activity VALUES ('','$_POST[activity_name]','$_POST[activity_detail]','$_POST[datetime]','$lead_id')";
			mysql_query($sql);

			echo "<script>window.location = 'index.php?modules=saler&file=list_activity&lead_id=$lead_id'</script>";
		}
	}
?>