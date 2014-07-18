<?php
		$showing_id = $_GET['showing_id'];
		$listing_id = $_GET['listing_id'];
		$lead_id = $_GET['lead_id'];
		$status = $_GET['listing_status']; //ต่อรองราคา

		//GET Price , Promotion FROM listing
		$listing = "SELECT listing_price,listing_promotion,listing_status FROM listing WHERE listing_id = '$listing_id'";
		list($listing_price,$listing_promotion,$listing_status) = mysql_fetch_row(mysql_query($listing));
		
		if($listing_status == "0" && !$status){ //check listing status equals 0
			echo "<script>alert('ห้องนี้ได้ทำการ offering แล้ว'); window.location = 'index.php?modules=saler&file=showing';</script>";		
		}
?>			
<div class="panel panel-default">
                        <div class="panel-heading">
							<span class="glyphicon glyphicon-glyphicon glyphicon-file"></span> add offering
                        </div>
                        <div class="panel-body">
											
							<form role="form" id="add_lead" method="POST">
								<table>
								<tr><td align="right"><b>ราคา : </b></td><td><input type="text" name="price" style="margin: 5px; width: 250px;" value="<?php if($_POST['price']){echo $_POST['price']; }else {echo $listing_price;} ?>"></td></tr>
								<tr><td align="right"><b>โปรโมชั่น : </b></td><td><input type="text" name="promotion" style="margin: 5px; width: 250px;" value="<?php if($_POST['promotion']){echo $_POST['promotion']; }else {echo $listing_promotion;} ?>"></td></tr>
								
								<tr><td align="right"><b>วันที่ลูกค้าได้รับ Offer :</b></td><td>
	              					<div id="datetimepicker2" class="input-append date" style="margin-top: 5px;">
	    									<input name="datetime" data-format="dd/MM/yyyy" type="text" style="margin-left: 5px; height: 30px; width: 250px;" value="<?php echo $_POST['datetime']; ?>"></input>
	   										 <span class="add-on" style="height: 30px;">
	    										<i data-time-icon="glyphicon glyphicon-time" data-date-icon="glyphicon glyphicon-calendar"></i>
											 </span>
									</div>
								</td></tr>
								</table>
								<hr>
								<button type="submit" id="add_lead" name="accept" value="accept" class="btn btn-primary btn-success"><span class="glyphicon glyphicon-upload"></span> บันทึก </button>
								<a href="index.php?modules=saler&file=showing" class="btn btn-primary btn-danger"><span class="glyphicon glyphicon-remove"></span> ยกเลิก</a>
							</form>


<?php 
	if($_POST['accept'] == "accept"){
		if($_POST['price'] == ""){
			echo "<script>alert('กรุณากรอกราคาก'); 
			</script>";		
		}else if($_POST['datetime'] == ""){
			echo "<script>alert('กรุณากรอกวันที่ลูกค้าได้รับ Offer'); 
			</script>";	
		}else{
			$deadline = "SELECT deadline_day FROM deadline WHERE deadline_name = 'Offering'";
			list($dl) = mysql_fetch_row(mysql_query($deadline));

			$sql = "INSERT INTO offering VALUES('','$_POST[price]','$_POST[promotion]','$_POST[datetime]','$dl','offering','0','$showing_id')";
			$result = mysql_query($sql);

			//UPDATE offering time			
			$update_time = "SELECT MAX(offering_id),MAX(offering_time) FROM offering WHERE showing_id = '$showing_id'";
			list($offering_id,$time) = mysql_fetch_row(mysql_query($update_time));
			$offering_time = $time + 1;
			$time_update = "UPDATE offering SET offering_time = '$offering_time' WHERE offering_id = '$offering_id'";
			$result = mysql_query($time_update);

			//UPDATE status showing to offering
			$update_status = "UPDATE showing SET showing_status = 'offering' WHERE showing_id = '$showing_id'";
			$result = mysql_query($update_status);

			//UPDATE status listing
			$listing = "UPDATE listing SET listing_status = 'offering' WHERE listing_id = '$listing_id'";
			mysql_query($listing);
			

			/** STATUS LEAD UPDATE **/
			$update_lead = "UPDATE lead SET lead_status = 'offering' WHERE lead_id = '$lead_id'";
			$result = mysql_query($update_lead);
			echo "<script>window.location = 'index.php?modules=saler&file=offering';</script>";
		}
	}
?>