<?php
		$showing_id = $_GET['showing_id'];
		$listing_id = $_GET['listing_id'];
		$offering_id = $_GET['offering_id'];

		/*** Name Of Listing and Prject ***/
		$project = "SELECT listing.listing_id, listing.listing_name, listing.room_id, room.project_id , project.project_name FROM listing INNER JOIN room ON room.room_id = listing.room_id INNER JOIN project ON project.project_id = room.project_id  WHERE  listing_id = '$listing_id'";
		list($listing_id, $listing_name, $room_id, $project_id ,$project_name) = mysql_fetch_row(mysql_query($project));
		/*********************************/

		/*** Name Person Purchase ***/
		$name = "SELECT showing.lead_id,lead.lead_fname,lead.lead_lname FROM showing INNER JOIN lead ON lead.lead_id = showing.lead_id WHERE showing_id = '$showing_id'";
		list($lead_id,$lead_fname,$lead_lname) = mysql_fetch_row(mysql_query($name));
		/***************************/

		/*** Priect and Promotion ***/
		$offering = "SELECT offering_price,offering_promotion FROM offering WHERE offering_id = '$offering_id'";
		list($offering_price,$offering_promotion) = mysql_fetch_row(mysql_query($offering));
		/***************************/
?>			
<div class="panel panel-default">
                        <div class="panel-heading">
							<span class="glyphicon glyphicon-glyphicon glyphicon-file"></span> add closing
                        </div>
                        <div class="panel-body">
											
							<form role="form" id="add_lead" method="POST">
								<table>

								<tr><td align="right"><b>ชื่อโครงการ : </b></td><td><input type="text" name="project_name" style="margin: 5px; width: 250px;" value="<?php echo $project_name; ?>" disabled></td></tr>
								<tr><td align="right"><b>ชื่อห้อง : </b></td><td><input type="text" name="room_name"  style="margin: 5px; width: 250px;" value="<?php echo $listing_name; ?>" disabled></td></tr>
								<tr><td align="right"><b>ชื่อผู้ซื้อ : </b></td><td><input type="text" name="name_buy" style="margin: 5px; width: 250px;" value="<?php echo $lead_fname." ".$lead_lname; ?>" disabled></td></tr>
								<tr><td align="right"><b>ราคา : </b></td><td><input type="text" name="price" style="margin: 5px; width: 250px;" value="<?php echo $offering_price; ?>"></td></tr>
								<tr><td align="right"><b>โปรโมชั่น : </b></td><td><input type="text" name="promotion" style="margin: 5px; width: 250px;" value="<?php echo $offering_promotion;?>"></td></tr>
								
								<tr><td align="right"><b>วันที่ Closing :</b></td><td>
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
								<a href="index.php?modules=saler&file=offering" class="btn btn-primary btn-danger"><span class="glyphicon glyphicon-remove"></span> ยกเลิก</a>
							</form>


<?php 
	if($_POST['accept'] == "accept"){
		if($_POST['price'] == ""){
			echo "<script>alert('กรุนากรอกราคาให้ถูกต้อง');</script>";
		}else if($_POST['datetime'] == ""){
			echo "<script>alert('กรุนาระบุวันที่ closing');</script>";
		}else{
			$month = array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน","05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
			$datetime = explode("/", $_POST['datetime']);
			
			$day = $datetime[0];
			$m = $month[$datetime[1]];
			$y = $datetime[2]+543;
			$dt = "$day/$m/$y";

			$deadline = "SELECT deadline_day FROM deadline WHERE deadline_name = 'Closing'";
			list($dl) = mysql_fetch_row(mysql_query($deadline));
			$sql = "INSERT INTO closing VALUES ('','$_POST[price]','$_POST[promotion]','มัดจำ','$dt','$dl','$lead_id','$listing_id')";
			//mysql_query($sql);

			/*** UPDATE STATUS to Closing IN offering Table ***/
			$update_offering = "UPDATE offering SET offering_status = 'closing' WHERE showing_id = '$showing_id'";
			mysql_query($update_offering);
			/***************************************************/

			/*** UPDATE STATUS to Closing IN lead Table ***/
			$update_lead = "UPDATE lead SET lead_status = 'closing' WHERE lead_id = '$lead_id'";
			mysql_query($update_lead);
			/**********************************************/

		}


			
		echo "<script>window.location = 'index.php?modules=saler&file=closing';</script>";
	}
	
?>