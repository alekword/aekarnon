<div class="panel panel-default">
                        <div class="panel-heading">
							<span class="glyphicon glyphicon-glyphicon glyphicon-user"></span> manage crm
                        </div>
                        <div class="panel-body">
							 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">ชื่อ - นามสกุล</th>
                                            <th style="text-align: center;">เบอร์โทรศัทพ์</th>
                                            <th style="text-align: center;">อีเมล์</th>
                                            <th style="text-align: center;">ข้อมูลลูกค้า</th>
                                            <th style="text-align: center;">แก้ไข</th>
                                            <th style="text-align: center;">ลบ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
											$sql = "SELECT lead_id,lead_fname,lead_lname,lead_mobile,lead_tel,lead_email FROM lead WHERE lead_status = 'crm'";
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
													echo " <td class='center' align='center'><a href='index.php?modules=saler&file=detail_lead&lead_id=$lead_id'' > <span class='glyphicon glyphicon-search'></span></a></td>";
													echo "<td class='center' align='center'><a href='index.php?modules=saler&file=edit_lead_form&lead_id=$lead_id'> <span class='glyphicon glyphicon-pencil'></span></a></td>";
													echo "<td class='center' align='center'><a href='index.php?modules=saler&file=delete_lead&lead_id=$lead_id' onclick=\"return confirm('ยืนยันการลบ');\"> <span class='glyphicon glyphicon-remove'></span></a></td>";
												echo "</tr>";
												
												$i++;
											}

										?>				
                                        
									</tbody>
								 </table>
						</div>
</div>