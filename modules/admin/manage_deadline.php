 <div class="panel panel-default">
                        <div class="panel-heading">
							<span class="glyphicon glyphicon-bookmark"></span> manage deadline
                        </div>
                        <div class="panel-body">
								<table class="table table-striped table-bordered table-hover" id="dataTables-example">
									<thead>
                                        <tr>
                                            <th style="text-align: center;">ชื่อ</th>
                                            <th style="text-align: center;">จำนวนวัน</th>	
                                            <th style="text-align: center;">แก้ไข</th>									
                                        </tr>
                                    </thead>
									 <tbody>
										<?php
											$sql = "SELECT * FROM deadline";
											$result = mysql_query($sql);
											$i = 0;
											while(list($deadline_id,$deadline_name,$deadline_day) = mysql_fetch_row($result)){
												if($i%2 == 0){
													echo "<tr class='odd gradeX'>";
												}else{
													echo "<tr class='even gradeC'>";
												}												
													echo "<td>$deadline_name</td>";	
													echo "<td style='text-align: center;'>$deadline_day</td>";																						
													echo "<td class='center' style='text-align:center;'><a href='index.php?modules=admin&file=edit_deadline_form&deadline_id=$deadline_id'> <span class='glyphicon glyphicon-pencil'></span></a></td>";													
												echo "</tr>";
												
												$i++;
											}

										?>				
                                        
									</tbody>
								</table>
						</div>
</div>