<!-- POPUP STYLE-->
<link rel="stylesheet" href="css/reveal.css">
<!-- POPUP STYLE -->
<script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="js/jquery.reveal.js"></script>

 <div class="panel panel-default">
                        <div class="panel-heading">
							<font color="red"><h4>Showing</h4></font>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">ชื่อ - นามสกุล</th>
                                            <th style="text-align: center;">โครงการ</th>
                                            <th style="text-align: center;">ห้อง</th>
                                            <th style="text-align: center;">ระดับความสนใจ</th>
                                            <th style="text-align: center;">ข้อมูลลูกค้า</th>                                            
                                            <th style="text-align: center;">แก้ไข</th>
                                            <th style="text-align: center;">ลบ</th>
                                            <th style="text-align: center;">Add Showing</th>
                                            <th style="text-align: center;">Offering</th>
                                        </tr>

                                    </thead>
                                    <tbody>
										<?php
											$sql = "SELECT showing.lead_id, showing.listing_id,listing_name, showing_id,showing_rating,lead_fname,lead_lname,listing.room_id,room.project_id,project_name FROM showing INNER JOIN lead ON (showing.lead_id = lead.lead_id) INNER JOIN listing ON (showing.listing_id = listing.listing_id) INNER JOIN room ON (listing.room_id = room.room_id) INNER JOIN project ON (room.project_id = project.project_id) WHERE showing.lead_id IN (SELECT lead.lead_id FROM lead WHERE lead.user_id = '$_SESSION[users_id]') AND showing_status = 'showing'";
											$result = mysql_query($sql);
											$i = 0;
											while(list($lead_id,$listing_id,$listing_name,$showing_id,$showing_rating,$lead_fname,$lead_lname,$room_id,$project_id,$project_name) = mysql_fetch_row($result)){
												if($i%2 == 0){
													echo "<tr class='odd gradeX'>";
												}else{
													echo "<tr class='even gradeC'>";
												}												
													echo "<td>$lead_fname $lead_lname</td>";
													echo "<td>$project_name</td>";
													echo "<td>$listing_name</td>";
													echo "<td>$showing_rating</td>";
													echo " <td class='center'  style='text-align: center;'><a href='#' class='big-link' data-reveal-id='$lead_id' data-animation='fade' > <span class='glyphicon glyphicon-search'></span></a></td>";
													echo "<td class='center'  style='text-align: center;'><a href='index.php?modules=saler&file=edit_showing&lead_id=$lead_id&showing_id=$showing_id'> <span class='glyphicon glyphicon-pencil'></span></a></td>";
													echo "<td class='center'  style='text-align: center;'><a href='index.php?modules=saler&file=delete_showing&lead_id=$lead_id&showing_id=$showing_id' onclick=\"return confirm('ยืนยันการลบ');\"> <span class='glyphicon glyphicon-remove'></span></a></td>";
													echo "<td class='center'  style='text-align: center;'><a href='index.php?modules=saler&file=showing_accept&lead_id=$lead_id' class='btn btn-success btn-sm' onclick=\"return confirm('ยืนยันการ showing');\"> <span class='glyphicon glyphicon-plus'></span> add showing</a></td>";
													echo "<td class='center' style='text-align: center;'><a href='index.php?modules=saler&file=offering_accept&showing_id=$showing_id&listing_id=$listing_id&lead_id=$lead_id' class='btn btn-success btn-sm' onclick=\"return confirm('ยืนยันการ offering');\"> <span class='glyphicon glyphicon-ok-circle'></span> offering</a></td>";
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
	$result = mysql_query($sql);
	while(list($lead_id) = mysql_fetch_row($result)){
	echo "<div id='$lead_id' class='reveal-modal'>";
		$lead = "SELECT * FROM lead WHERE lead_id = '$lead_id'";
		$result_lead = mysql_query($lead);
		list($ld_id,$lead_fname,$lead_lname,$lead_sex,$lead_company,$lead_address,$lead_tel,$lead_mobile,$lead_email,$lead_birthdate,$salary_per_month,$installements,$objective_property,$type_property,$wishes_recieve,$lead_status,$user_id) = mysql_fetch_row($result_lead);
		$wr = explode(",",$wishes_recieve);							
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


