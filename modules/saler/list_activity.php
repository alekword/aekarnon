 <!-- POPUP STYLE-->
<link rel="stylesheet" href="css/reveal.css">
<!-- POPUP STYLE -->
<script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="js/jquery.reveal.js"></script>

 <div class="panel panel-default">
                        <div class="panel-heading">
							<font color="red"><h4>Activity History</h4></font>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                            	<div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#information">#Information</a>
                                        </h4>
                                    </div>
                                    <div id="information" class="panel-collapse in" style="height: auto;">
                                        <div class="panel-body">
		                                        <?php 
														$_SESSION['lead_id'] = $_GET['lead_id'];
														$lead = "SELECT * FROM lead WHERE lead_id = '$_SESSION[lead_id]'";
														list($ld_id,$lead_fname,$lead_lname,$lead_sex,$lead_company,$lead_address,$lead_tel,$lead_mobile,$lead_email,$lead_birthdate,$salary_per_month,$installements,$objective_property,$type_property,$wishes_recieve,$lead_status,$user_id) = mysql_fetch_row(mysql_query($lead));
														$wr = explode(",",$wishes_recieve);							
														echo "<table>
														<tr><td align='right' width='210px'><b>ชื่อ-นามสกุล : </b></td><td> &nbsp; $lead_fname &nbsp; $lead_lname</td>
														<td align='right'><b>เพศ : </b></td><td> &nbsp; $lead_sex</td></tr>
														<tr><td align='right'><b>ชื่อองค์กร / บริษัท : </b></td><td> &nbsp; $lead_company</td>
														<td align='right'><b>ที่อยู่ : </b></td><td> &nbsp; $lead_address</td></tr>
														<tr><td align='right'><b>เบอร์โทรศัพท์ : </b></td><td> &nbsp; $lead_tel</td>
														<td align='right'><b>มือถือ : </b></td><td> &nbsp; $lead_mobile</td></tr>
														<tr><td align='right'><b>อีเมล์ : </b></td><td> &nbsp; $lead_email</td>
														<td align='right'><b>วันเกิด : </b></td><td> &nbsp; $lead_birthdate</td></tr>
														<tr><td align='right'><b>รายได้ต่อเดือน : </b></td><td> &nbsp; $salary_per_month</td>
														<td align='right'><b>งบในการผ่อน (บาท / เดือน) : </b></td><td> &nbsp; $installements</td></tr>
														<tr><td align='right'><b>วัตถุประสงค์ในการซื้ออสังหา ฯ : </b></td><td> &nbsp; $objective_property</td>
														<td align='right'><b>ประเภทของอสังหาที่สนใจ : </b></td><td> &nbsp; $type_property</td></tr>
														<tr><td align='right'><b>ความประสงค์จะรับข้อมูล : </b></td><td> &nbsp; $wr[0] &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>
														<td align='right'><b>ช่วงเวลาที่สะดวกในการติดต่อ : </b></td><td>&nbsp; $wr[1]</td></tr></table>";

												?>

                                        </div>
                                    </div>
                                </div>
								
									
								<hr>

										<div class="panel panel-info">
	                                    <div class="panel-heading">
	                                        <h4 class="panel-title">
	                                            <a data-toggle="collapse" data-parent="#accordion" href="#activity_log">#Activity log.</a>
	                                        </h4>
	                                    </div>
	                                    <div id="activity_log" class="panel-collapse in" style="height: auto;">
	                                        <div class="panel-body">
	                                           	<a href="index.php?modules=saler&file=add_activity_form&lead_id=<?php echo$_SESSION['lead_id'];?>" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-plus"></span> add activity</a><br><br>
	                                           	<div class="table-responsive">
                               						 <table class="table table-striped table-bordered table-hover">
                               						 	
	                                           	<?php

	                                           		$activity = "SELECT activity_id,activity_name,activity_detail,activity_datetime FROM activity WHERE lead_id = '$_SESSION[lead_id]'";
	                                           		$result = mysql_query($activity);
	                                           		$num = mysql_num_rows($result);
	                                           		if($num != 0){
	                                           			echo "<thead>
					                                        <tr>
					                                            <th>#</th>
					                                            <th>กิจกรรม</th>
					                                            <th>รายละเอียด</th>
					                                            <th>วันที่และเวลา</th>
					                                        </tr>
                                    					</thead>";
                                    					$i = 1;
                                    					while(list($activity_id,$activity_name,$activity_detail,$activity_datetime) = mysql_fetch_row($result)){
                            								echo "<tbody>";
                            									echo "<tr>
                                            							<td>$i</td>
                                           								<td>$activity_name</td>
                                            							<td>$activity_detail</td>
                                            							<td>$activity_datetime</td>
                                        							  </tr>";
                            								echo "</tbody>";  
                            							$i++;                     
	                                           			}   
	                                           		}else{
	                                           			echo "<b>No activity<b>";
	                                           		}
	                                           		                                     

	                                           	?>
	                                           		</table>
                          						</div>
	                                        </div>
	                                    </div>
                             	   </div>


									<hr>

										<div class="panel panel-info">
	                                    <div class="panel-heading">
	                                        <h4 class="panel-title">
	                                            <a data-toggle="collapse" data-parent="#accordion" href="#showing_log">#Showing log.</a>
	                                        </h4>
	                                    </div>
	                                    <div id="showing_log" class="panel-collapse in" style="height: auto;">
	                                        <div class="panel-body">
	                                           	<div class="table-responsive">
                               						 <table class="table table-striped table-bordered table-hover">
                               						 	
	                                           	<?php

	                                           		$showing = "SELECT showing.lead_id, showing.listing_id,listing_name, showing_id,showing_rating,showing_comment,showing_datetime,showing_status,listing.room_id,room.project_id,project_name FROM showing INNER JOIN lead ON (showing.lead_id = lead.lead_id) INNER JOIN listing ON (showing.listing_id = listing.listing_id) INNER JOIN room ON (listing.room_id = room.room_id) INNER JOIN project ON (room.project_id = project.project_id) WHERE showing.lead_id = '$_SESSION[lead_id]' ";
	                                           		$result = mysql_query($showing);
	                                           		$num = mysql_num_rows($result);
	                                           		if($num != 0){
	                                           			echo "<thead>
					                                        <tr>
					                                            <th>#</th>
					                                            <th>โครงการ</th>
					                                            <th>ห้อง</th>
					                                            <th>ระดับความสนใจ</th>
					                                            <th>ความคิดเห็น</th>
					                                            <td>วันที่และเวลา</td>
					                                            <td>สถานะ</td>
					                                        </tr>
                                    					</thead>";
                                    					$i = 1;
                                    					while(list($lead_id,$listing_id,$listing_name,$showing_id,$showing_rating,$showing_comment,$showing_datetime,$showing_status,$room_id,$project_id,$project_name) = mysql_fetch_row($result)){
                            								echo "<tbody>";
                            									echo "<tr>
                                            							<td>$i</td>
                                           								<td>$project_name</td>
                                            							<td>$listing_name</td>
                                            							<td>$showing_rating</td>
                                            							<td>$showing_comment</td>
                                            							<td>$showing_datetime</td>
                                            							<td>$showing_status</td>
                                        							  </tr>";
                            								echo "</tboby>";  
                            								$i++;                     
	                                           			}   
	                                           		}else{
	                                           			echo "<b>No showing<b>";
	                                           		}
	                                           		                                     

	                                           	?>
	                                           		</table>
                          						</div>
	                                        </div>
	                                    </div>
                             	   </div>



                             	   <hr>

										<div class="panel panel-info">
	                                    <div class="panel-heading">
	                                        <h4 class="panel-title">
	                                            <a data-toggle="collapse" data-parent="#accordion" href="#offering_log">#Offering log.</a>
	                                        </h4>
	                                    </div>
	                                    <div id="offering_log" class="panel-collapse in" style="height: auto;">
	                                        <div class="panel-body">
	                                            <div class="table-responsive">
                               						 <table class="table table-striped table-bordered table-hover">
                               						 	
	                                           	<?php

	                                           		$offering = "SELECT offering_id,offering_price,offering_promotion,date_recieve,offering_time,offering_status,offering.showing_id,listing.listing_name, project.project_name  FROM offering INNER JOIN showing ON showing.showing_id = offering.showing_id INNER JOIN listing ON listing.listing_id = showing.listing_id INNER JOIN room ON room.room_id = listing.room_id INNER JOIN project ON project.project_id = room.project_id  WHERE showing.lead_id = '$_SESSION[lead_id]'";
	                                           		$result = mysql_query($offering);
	                                           		$num = mysql_num_rows($result);
	                                           		if($num != 0){
	                                           			echo "<thead>
					                                        <tr>
					                                            <th>#</th>
					                                            <th>โครงการ</th>
					                                            <th>ห้อง</th>
					                                            <th>ราคา</th>
					                                            <th>โปรโมชั่น</th>
					                                            <td>วันที่เสนอ</td>
					                                            <td>จำนวนการต่อรอง</td>
					                                            <td>สถานะ</td>
					                                        </tr>
                                    					</thead>";
                                    					$i = 1;
                                    					while(list($offering_id,$offering_price,$offering_promotion,$date_recieve,$offering_time,$offering_status,$showing_id,$listing_name,$project_name) = mysql_fetch_row($result)){
                            								echo "<tbody>";
                            									echo "<tr>
                                            							<td>$i</td>
                                           								<td>$project_name</td>
                                            							<td>$listing_name</td>
                                            							<td>$offering_price</td>
                                            							<td>$offering_promotion</td>
                                            							<td>$date_recieve</td>
                                            							<td>$offering_time</td>
                                            							<td>$offering_status</td>
                                        							  </tr>";
                            								echo "</tboby>";  
                            								$i++;                     
	                                           			}   
	                                           		}else{
	                                           			echo "<b>No offering<b>";
	                                           		}
	                                           		                                     

	                                           	?>
	                                           		</table>
                          						</div>
	                                        </div>
	                                    </div>
                             	   </div>



                             	   <hr>

										<div class="panel panel-info">
	                                    <div class="panel-heading">
	                                        <h4 class="panel-title">
	                                            <a data-toggle="collapse" data-parent="#accordion" href="#closing_log">#Closing log.</a>
	                                        </h4>
	                                    </div>
	                                    <div id="closing_log" class="panel-collapse in" style="height: auto;">
	                                        <div class="panel-body">
	                                           	 <div class="table-responsive">
                               						 <table class="table table-striped table-bordered table-hover">
                               						 	
	                                           	<?php

	                                           		$offering = "SELECT closing.closing_id,closing.closing_price,closing.closing_promotion,closing.closing_status,closing.closing_date,lead.lead_id,listing.listing_id,listing.listing_name,room.project_id,project.project_name FROM closing INNER JOIN lead ON lead.lead_id = closing.lead_id INNER JOIN listing ON listing.listing_id = closing.listing_id INNER JOIN room ON room.room_id = listing.room_id INNER JOIN project ON room.project_id = project.project_id WHERE closing.lead_id = '$_SESSION[lead_id]'";
	                                           		$result = mysql_query($offering);
	                                           		$num = mysql_num_rows($result);
	                                           		if($num != 0){
	                                           			echo "<thead>
					                                        <tr>
					                                            <th>#</th>
					                                            <th>โครงการ</th>
					                                            <th>ห้อง</th>
					                                            <th>ราคา</th>
					                                            <th>โปรโมชั่น</th>
					                                            <td>วันที่ปิดการขาย</td>
					                                            <td>สถานะ</td>
					                                        </tr>
                                    					</thead>";
                                    					$i = 1;
                                    					while(list($closing_id,$closing_price,$closing_promotion,$closing_status,$closing_date,$lead_id,$listing_id,$listing_name,$project_id,$project_name) = mysql_fetch_row($result)){
                            								echo "<tbody>";
                            									echo "<tr>
                                            							<td>$i</td>
                                           								<td>$project_name</td>
                                            							<td>$listing_name</td>
                                            							<td>$closing_price</td>
                                            							<td>$closing_promotion</td>
                                            							<td>$closing_date</td>
                                            							<td>$closing_status</td>
                                        							  </tr>";
                            								echo "</tboby>";  
                            								$i++;                     
	                                           			}   
	                                           		}else{
	                                           			echo "<b>No closing<b>";
	                                           		}
	                                           		                                     

	                                           	?>
	                                           		</table>
                          						</div>
	                                        </div>
	                                    </div>
                             	   </div>

							</div>
						</div>	
</div>
