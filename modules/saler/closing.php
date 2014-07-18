
<?php
/***** UPDATE STATUS on Table closing *****/
	$closing_id = $_POST['closing_id'];
	$closing_status = $_POST['closing_status'];

	if($closing_id){
		for($i = 0; $i < count($closing_id); $i++){
			$update_status = "UPDATE closing SET closing_status = '$closing_status[$i]' WHERE closing_id = '$closing_id[$i]'";
			mysql_query($update_status);		
		}
	}
/******************************************/
?>

<!-- POPUP STYLE-->
<link rel="stylesheet" href="css/reveal.css">
<!-- POPUP STYLE -->
<script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="js/jquery.reveal.js"></script>

 <div class="panel panel-default">
                        <div class="panel-heading">
							<font color="red"><h4>Closing</h4></font>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">ชื่อผู้ซื้อ</th>
                                            <th style="text-align: center;">ชื่อโครงการ</th>
                                            <th style="text-align: center;">ห้อง</th>
                                            <th style="text-align: center;">ราคา</th>
                                            <th style="text-align: center;">โปรโมชั่น</th>                                            
                                            <th style="text-align: center;">ข้อมูลลูกค้า</th>
                                            <th style="text-align: center;">แก้ไขราคา&โปรโมชั่น</th>
                                            <th style="text-align: center;">สถานนะ</th>
                                            <th style="text-align: center;">การดำเนินการ</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                    	
										<?php
											$closing = "SELECT closing.closing_id,closing.closing_price,closing.closing_promotion,closing.closing_status,lead.lead_id,lead.lead_fname,lead.lead_lname,listing.listing_id,listing.listing_name,room.project_id,project.project_name FROM closing INNER JOIN lead ON lead.lead_id = closing.lead_id INNER JOIN listing ON listing.listing_id = closing.listing_id INNER JOIN room ON room.room_id = listing.room_id INNER JOIN project ON room.project_id = project.project_id WHERE lead.user_id = '$_SESSION[users_id]'";
											$result = mysql_query($closing);
											$ld_id = array();
											while(list($closing_id,$closing_price,$closing_promotion,$closing_status,$lead_id,$lead_fname,$lead_lname,$listing_id,$listing_name,$project_id,$project_name) = mysql_fetch_row($result)){
												$ld_id[] = $lead_id;
												if($i%2 == 0){
													echo "<tr class='odd gradeX'>";
												}else{
													echo "<tr class='even gradeC'>";
												}												
													echo "<td>$lead_fname $lead_lname</td>";
													echo "<td>$project_name</td>";
													echo "<td>$listing_name</td>";
													echo "<td>"; echo number_format($closing_price,2,".",","); echo "</td>";
													echo "<td>$closing_promotion</td>";
													echo "<td style='text-align: center;'><a href='#' class='big-link' data-reveal-id='$lead_id' data-animation='fade' ><span class='glyphicon glyphicon-search'></span></a></td>";
													echo "<td style='text-align:center;'><a href='index.php?modules=saler&file=edit_closing_form&closing_id=$closing_id'><span class='glyphicon glyphicon-pencil'></span></a></td>";
													echo "<td style='text-align: center;'>
														<form method='POST'>
														<input type='hidden' name='closing_id[]' value='$closing_id'/>
														<select style='width: auto;' name='closing_status[]' onchange='this.form.submit();'>
															<option value='มัดจำ'"; if($closing_status == "มัดจำ"){ echo "selected='selected'";} echo ">มัดจำ</option>
															<option value='ทำสัญญาซื้อขาย' "; if($closing_status == "ทำสัญญาซื้อขาย"){ echo "selected='selected'";} echo ">ทำสัญญาซื้อขาย</option>
															<option value='ธนาคารประเมิน' "; if($closing_status == "ธนาคารประเมิน"){ echo "selected='selected'";} echo ">ธนาคารประเมิน</option>
															<option value='ขออนุมัติสินเชื่อจากธนาคาร' "; if($closing_status == "ขออนุมัติสินเชื่อจากธนาคาร"){ echo "selected='selected'";} echo ">ขออนุมัติสินเชื่อจากธนาคาร</option>
															<option value='ตรวจรับห้อง' "; if($closing_status == "ตรวจรับห้อง"){ echo "selected='selected'";} echo ">ตรวจรับห้อง</option>
															<option value='โอนกรรมสิทธิ์' "; if($closing_status == "โอนกรรมสิทธิ์"){ echo "selected='selected'";} echo ">โอนกรรมสิทธิ์</option>
														</select>
														</form>
													</td>";

													echo "<td></td>";
													
												echo "</tr>";
												
												$i++;
												
											}

										?>	
                                        
									</tbody>
								 </table>
								</div>
							</div>
							
</div>
   
<?php
	
	for($i = 0; $i < count($ld_id); $i++){	
		$lead = "SELECT * FROM lead WHERE lead_id = '$ld_id[$i]'";
		$result_lead = mysql_query($lead);
		list($lead_id,$lead_fname,$lead_lname,$lead_sex,$lead_company,$lead_address,$lead_tel,$lead_mobile,$lead_email,$lead_birthdate,$salary_per_month,$installements,$objective_property,$type_property,$wishes_recieve,$lead_status,$user_id) = mysql_fetch_row($result_lead);
		$wr = explode(",",$wishes_recieve);
		echo "<div id='$lead_id' class='reveal-modal'>";							
		echo "<table>
		<tr><td align='right' width='210px'><b>ชื่อ-นามสกุล : </b></td><td> &nbsp; $lead_fname &nbsp; $lead_lname</td></tr>
		<tr><td align='right'><b>เพศ : </b></td><td> &nbsp; $lead_sex</td></tr>
		<tr><td align='right'><b>ชื่อองค์กร / บริษัท : </b></td><td> &nbsp; $lead_company</td></tr>
		<tr><td align='right'><b>ที่อยู่ : </b></td><td> &nbsp; $lead_address</td></tr>
		<tr><td align='right'><b>เบอร์โทรศัพท์ : </b></td><td> &nbsp; $lead_tel</td></tr>
		<tr><td align='right'><b>มือถือ : </b></td><td> &nbsp; $lead_mobile</td></tr>
		<tr><td align='right'><b>อีเมล์ : </b></td><td> &nbsp; $lead_email</td></tr>
		<tr><td align='right'><b>วันเกิด : </b></td><td> &nbsp; $lead_birthdate</td></tr>
		<tr><td align='right'><b>รายได้ต่อเดือน : </b></td><td> &nbsp; $salary_per_month</td></tr>
		<tr><td align='right'><b>งบในการผ่อน (บาท / เดือน) : </b></td><td> &nbsp; $installements</td></tr>
		<tr><td align='right'><b>วัตถุประสงค์ในการซื้ออสังหา ฯ : </b></td><td> &nbsp; $objective_property</td></tr>
		<tr><td align='right'><b>ประเภทของอสังหาที่สนใจ : </b></td><td> &nbsp; $type_property</td></tr>
		<tr><td align='right'><b>ความประสงค์จะรับข้อมูล : </b></td><td> &nbsp; $wr[0]</td></tr>
		<tr><td align='right'><b>ช่วงเวลาที่สะดวกในการติดต่อ : </b></td><td>&nbsp; $wr[1]</td></tr></table>
		<a class='close-reveal-modal'>&#215;</a>
		</div>";
	}
?>

