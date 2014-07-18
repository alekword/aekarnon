 <!-- POPUP STYLE-->
<link rel="stylesheet" href="css/reveal.css">
<!-- POPUP STYLE -->
<script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="js/jquery.reveal.js"></script>

 <p><a href="index.php?modules=saler&file=add_lead_form" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-plus"></span> add lead or contact</a></p>
 <div class="panel panel-default">
                        <div class="panel-heading">
							<font color="red"><h4>Lead</h4></font>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">ชื่อ - นามสกุล</th>
                                            <th style="text-align: center;">เบอร์โทรศัทพ์</th>
                                            <th style="text-align: center;">อีเมล์</th>
                                            <th style="text-align: center;">ข้อมูลลูกค้า</th>
                                            <th style="text-align: center;">แก้ไข</th>
                                            <th style="text-align: center;">ลบ</th>
                                            <th style="text-align: center;">Showing</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
											$sql = "SELECT lead_id,lead_fname,lead_lname,lead_mobile,lead_tel,lead_email FROM lead WHERE lead_status = 'lead' AND user_id = '$_SESSION[users_id]'";
											$result = mysql_query($sql);
											$i = 0;
											while(list($lead_id,$lead_fname,$lead_lname,$lead_mobile,$lead_tel,$lead_email) = mysql_fetch_row($result)){
												if($i%2 == 0){
													echo "<tr class='odd gradeX'>";
												}else{
													echo "<tr class='even gradeC'>";
												}												
													echo "<td>$lead_fname $lead_lname</td>";
													echo "<td>$lead_mobile, $lead_tel</td>";
													echo "<td>$lead_email</td>";
														echo " <td class='center'  style='text-align: center;'><a href='#' class='big-link' data-reveal-id='$lead_id' data-animation='fade' > <span class='glyphicon glyphicon-search'></span></a></td>";
													echo "<td class='center' style='text-align: center;'><a href='index.php?modules=saler&file=edit_lead_form&lead_id=$lead_id'> <span class='glyphicon glyphicon-pencil'></span></a></td>";
													echo "<td class='center' style='text-align: center;'><a href='index.php?modules=saler&file=delete_lead&lead_id=$lead_id' onclick=\"return confirm('ยืนยันการลบ');\"> <span class='glyphicon glyphicon-remove'></span></a></td>";
													echo "<td class='center' style='text-align: center;'><a href='index.php?modules=saler&file=showing_accept&lead_id=$lead_id' class='btn btn-success btn-sm' onclick=\"return confirm('ยืนยันการ showing');\"> <span class='glyphicon glyphicon-ok-circle'></span> showing</a></td>";
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