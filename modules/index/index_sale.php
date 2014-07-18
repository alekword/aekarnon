<div class='panel panel-danger'>
    <div class='panel-heading'>
        <h3><font color='red'>การแจ้งเตือน </font></h3>
    </div>
    <div class='panel-body'>
	        <div class='table-responsive'>
	            <div class='panel panel-danger'>
		            <div class='panel-heading'>
						<h4 class='panel-title'>
							<a data-toggle='collapse' data-parent='#accordion' href='#leads'>#Lead.</a>
						</h4>
					</div>
					<div id='leads' class='panel-collapse in' style='height: auto;'>
						<div class='panel-body'>
								<?php
									$lead = "SELECT lead_id,lead_fname,lead_lname,lead_tel,lead_mobile,lead_email,lead_notification,lead_status FROM lead WHERE lead_notification <= '7' AND lead_notification != '0' AND user_id = '$_SESSION[users_id]' AND lead_status = 'lead'";
									$result = mysql_query($lead);
									$num = mysql_num_rows($result);
									echo "<table class='table'>";
										if($num != 0){
	                                        echo "<thead>
					                            <tr>
					                                <th>#</th>
					                                <th style='text-align:center;'>ชื่อ - นามสกุล</th>
					                                <th style='text-align:center;'>เบอร์โทรศัทพ์</th>
					                                <th style='text-align:center;'>อีเมล์</th>
					                                <th style='text-align:center;'>จำนวนวันก่อนหมดอายุ</th>
					                            </tr>
                                    		</thead>";
                                    		$i = 1;
											while(list($ld_id,$lead_fname,$lead_lname,$lead_tel,$lead_mobile,$lead_email,$lead_noti,$lead_status) = mysql_fetch_row($result)){
												echo "<tbody>";
													if($lead_noti == 7){echo "<tr class='success'>";}
													elseif($lead_noti < 7 AND $lead_noti > 5){echo "<tr class='info'>";}
													elseif($lead_noti < 5 AND $lead_noti > 3){echo "<tr class='warning'>";}
													elseif($lead_noti < 3){echo "<tr class='danger'>";}
													echo "
                                            				<td>$i</td>
                                           					<td style='text-align:center;'>$lead_fname $lead_lname</td>
                                            				<td style='text-align:center;'>$lead_tel , $lead_mobile</td>
                                            				<td style='text-align:center;'>$lead_email</td>
                                            				<td style='text-align:center;'><font color='red'><b>$lead_noti วัน</b></font></td>
                                        				</tr>";
                            					echo "</tbody>";  
                            					$i++;
											}
										}else{
											echo "<b>ไม่มีการแจ้งเตือน<b>";
										}
									echo "</table>";
								?>
						</div>
					</div>
				</div>


				<!-- END LEAD -->


				<div class='panel panel-danger'>
		            <div class='panel-heading'>
						<h4 class='panel-title'>
							<a data-toggle='collapse' data-parent='#accordion' href='#Showing'>#Showing.</a>
						</h4>
					</div>
					<div id='Showing' class='panel-collapse in' style='height: auto;'>
						<div class='panel-body'>
							<table class="table">
										<?php
	                                           		$showing = "SELECT showing_noti,lead_fname,lead_lname,lead_tel,lead_mobile,lead_email FROM showing INNER JOIN lead ON lead.lead_id = showing.lead_id  WHERE lead.user_id = '$_SESSION[users_id]' AND showing.showing_noti <= '7' AND showing.showing_noti != '0' AND showing_status != 'offering' ORDER BY showing.showing_noti ASC";
	                                           		$result = mysql_query($showing);
	                                           		$num = mysql_num_rows($result);
	                                           		if($num != 0){
	                                           			echo "<thead>
					                                        <tr>
					                                            <th>#</th>
					                                			<th style='text-align:center;'>ชื่อ - นามสกุล</th>
					                                			<th style='text-align:center;'>เบอร์โทรศัทพ์</th>
					                                			<th style='text-align:center;'>อีเมล์</th>
					                                			<th style='text-align:center;'>จำนวนวันก่อนหมดอายุ</th>
					                                        </tr>
                                    					</thead>";
                                    					$i = 1;
                                    					while(list($showing_noti,$lead_fname,$lead_lname,$lead_tel,$lead_mobile,$lead_email) = mysql_fetch_row($result)){
                            								echo "<tbody>";
																	if($showing_noti <= 7 AND $showing_noti > 5){echo "<tr class='info'>";}
																	elseif($showing_noti <= 5 AND $showing_noti > 3){echo "<tr class='warning'>";}
																	elseif($showing_noti <= 3){echo "<tr class='danger'>";}
																	echo "
				                                            				<td>$i</td>
				                                           					<td style='text-align:center;'>$lead_fname $lead_lname</td>
				                                            				<td style='text-align:center;'>$lead_tel , $lead_mobile</td>
				                                            				<td style='text-align:center;'>$lead_email</td>
				                                            				<td style='text-align:center;'><font color='red'><b>$showing_noti วัน</b></font></td>
				                                        				</tr>";
			                            					echo "</tbody>";  
                            								$i++;                     
	                                           			}   
	                                           		}else{
	                                           			echo "<b>ไม่มีการแจ้งเตือน <b>";
	                                           		}
	                            ?>
	                         </table>
						</div>
					</div>
				</div>


				<!-- END SHOWING -->



				<div class='panel panel-danger'>
		            <div class='panel-heading'>
						<h4 class='panel-title'>
							<a data-toggle='collapse' data-parent='#accordion' href='#Offering'>#Offering.</a>
						</h4>
					</div>
					<div id='Offering' class='panel-collapse in' style='height: auto;'>
						<div class='panel-body'>
								<table class="table">
										<?php
											$offering = "SELECT offering_noti,lead_fname,lead_lname,lead_tel,lead_mobile,lead_email FROM offering INNER JOIN showing ON offering.showing_id = showing.showing_id INNER JOIN lead ON lead.lead_id = showing.lead_id WHERE offering_noti <= '7' AND offering_noti != '0'  AND offering_status = 'offering' AND lead.user_id = '$_SESSION[users_id]' ORDER BY offering_noti ASC";
											$result = mysql_query($offering);
											$num = mysql_num_rows($result);
											if($num != 0){
	                                           			echo "<thead>
					                                        <tr>
					                                            <th>#</th>
					                                			<th style='text-align:center;'>ชื่อ - นามสกุล</th>
					                                			<th style='text-align:center;'>เบอร์โทรศัทพ์</th>
					                                			<th style='text-align:center;'>อีเมล์</th>
					                                			<th style='text-align:center;'>จำนวนวันก่อนหมดอายุ</th>
					                                        </tr>
                                    					</thead>";
                                    					$i = 1;
                                    					while(list($offering_noti,$lead_fname,$lead_lname,$lead_tel,$lead_mobile,$lead_email) = mysql_fetch_row($result)){
                            								echo "<tbody>";
																	if($offering_noti <= 7 AND $offering_noti > 5){echo "<tr class='info'>";}
																	elseif($offering_noti <= 5 AND $offering_noti > 3){echo "<tr class='warning'>";}
																	elseif($offering_noti <= 3){echo "<tr class='danger'>";}
																	echo "
				                                            				<td>$i</td>
				                                           					<td style='text-align:center;'>$lead_fname $lead_lname</td>
				                                            				<td style='text-align:center;'>$lead_tel , $lead_mobile</td>
				                                            				<td style='text-align:center;'>$lead_email</td>
				                                            				<td style='text-align:center;'><font color='red'><b>$offering_noti วัน</b></font></td>
				                                        				</tr>";
			                            					echo "</tbody>";  
                            								$i++;                     
	                                           			}   
	                                           		}else{
	                                           			echo "<b>ไม่มีการแจ้งเตือน <b>";
	                                           		}
										?>
								</table>
						</div>
					</div>
				</div>


				<!-- END Offering -->



				<div class='panel panel-danger'>
		            <div class='panel-heading'>
						<h4 class='panel-title'>
							<a data-toggle='collapse' data-parent='#accordion' href='#Closing'>#Closing.</a>
						</h4>
					</div>
					<div id='Closing' class='panel-collapse in' style='height: auto;'>
						<div class='panel-body'>
								<table class="table">
										<?php
											$closing = "SELECT closing_noti,lead_fname,lead_lname,lead_tel,lead_mobile,lead_email FROM closing INNER JOIN lead ON lead.lead_id = closing.lead_id  WHERE lead.user_id = '$_SESSION[users_id]' AND closing.closing_noti <= '7' AND closing.closing_noti != '0' ORDER BY closing.closing_noti ASC";
											$result = mysql_query($closing);
											$num = mysql_num_rows($result);
											if($num != 0){
	                                           			echo "<thead>
					                                        <tr>
					                                            <th>#</th>
					                                			<th style='text-align:center;'>ชื่อ - นามสกุล</th>
					                                			<th style='text-align:center;'>เบอร์โทรศัทพ์</th>
					                                			<th style='text-align:center;'>อีเมล์</th>
					                                			<th style='text-align:center;'>จำนวนวันก่อนหมดอายุ</th>
					                                        </tr>
                                    					</thead>";
                                    					$i = 1;
                                    					while(list($closing_noti,$lead_fname,$lead_lname,$lead_tel,$lead_mobile,$lead_email) = mysql_fetch_row($result)){
                            								echo "<tbody>";
																	if($closing_noti <= 7 AND $closing_noti > 5){echo "<tr class='info'>";}
																	elseif($closing_noti <= 5 AND $closing_noti > 3){echo "<tr class='warning'>";}
																	elseif($closing_noti <= 3){echo "<tr class='danger'>";}
																	echo "
				                                            				<td>$i</td>
				                                           					<td style='text-align:center;'>$lead_fname $lead_lname</td>
				                                            				<td style='text-align:center;'>$lead_tel , $lead_mobile</td>
				                                            				<td style='text-align:center;'>$lead_email</td>
				                                            				<td style='text-align:center;'><font color='red'><b>$closing_noti วัน</b></font></td>
				                                        				</tr>";
			                            					echo "</tbody>";  
                            								$i++;                     
	                                           			}   
	                                           		}else{
	                                           			echo "<b>ไม่มีการแจ้งเตือน <b>";
	                                           		}
										?>
							</table>
						</div>
					</div>
				</div>



				<!-- END Closing -->



				<div class='panel panel-danger'>
		            <div class='panel-heading'>
						<h4 class='panel-title'>
							<a data-toggle='collapse' data-parent='#accordion' href='#Request'>#Request.</a>
						</h4>
					</div>
					<div id='Request' class='panel-collapse in' style='height: auto;'>
						<div class='panel-body'>
								<table class="table table-striped table-bordered table-hover">
										<?php
											$sql = "SELECT request_id,start_price,end_price FROM request WHERE users_id = '$_SESSION[users_id]'";
											$result = mysql_query($sql);
											while(list($request_id,$start_price,$end_price) = mysql_fetch_row($result)){
												$listing = "SELECT project.project_name,listing_name,listing_price,listing_promotion FROM listing INNER JOIN room ON room.room_id = listing.room_id INNER JOIN project ON room.project_id = project.project_id WHERE listing_price BETWEEN '$start_price' AND '$end_price' AND listing_status = 'available'";
												$results = mysql_query($listing);
												$num = mysql_num_rows($results);
												if($num != 0){
													 echo "<thead>
												                <tr>
												                    <th>Request No.</th>
												                    <th>Request Price</th>
												                    <th style='text-align:center;'>โครงการ</th>
												                    <th style='text-align:center;'>ห้อง</th>
												                    <th style='text-align:center;'>ราคา</th>
												                    <th style='text-align:center;'>โปรโมชั่น</th>
												                    <th style='text-align:center;'>ลบ Request</th>
												                </tr>
							                            </thead>";
							                        $i = 1;
													while(list($project_name,$listing_name,$listing_price,$listing_promotion) = mysql_fetch_row($results)){

														echo "<tbody>";
															echo "<tr>
																	<td>R-$request_id</td>
																	<td>$start_price - $end_price</td>
																	<td>$project_name</td>
																	<td>$listing_name</td>
																	<td  style='text-align:center;'><font color='green'><b>"; echo number_format($listing_price,2,".",","); echo "</b></font></td>
																	<td>$listing_promotion</td>
																	<td style='text-align:center;'><a onclick=\"return confirm('Request No. R-$request_id จะถูกลบทั้งหมด')\" href='index.php?modules=saler&file=delete_request&request_id=$request_id'><span class='glyphicon glyphicon-remove'></span></a></td>
																</tr>";
														echo "</tbody>";
														$i++;
													}
												}else{
													echo "ยังไม่มีราคาที่ request";
												}
											}
										?>
							</table>
						</div>
					</div>
				</div>

				<!-- END Request -->

			</div>
	</div>
</div>

