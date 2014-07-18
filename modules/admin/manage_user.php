 <p><a href="index.php?modules=admin&file=add_user_form" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-plus"></span> add user</a></p>
<div class="panel panel-default">
                        <div class="panel-heading">
							<span class="glyphicon glyphicon-glyphicon glyphicon-user"></span> manage user
                        </div>
                        <div class="panel-body">
								<table class="table table-striped table-bordered table-hover" id="dataTables-example">
									<thead>
                                        <tr>
                                            <th style="text-align: center;">ชื่อผู้ใช้</th>
                                            <th style="text-align: center;">เบอร์โทรศัทพ์</th>
                                            <th style="text-align: center;">อีเมล์</th>
                                            <th style="text-align: center;">ประเภทผู้ใช้</th>											
                                            <th style="text-align: center;">ลบ</th>
                                        </tr>
                                    </thead>
									 <tbody>
										<?php
											$sql = "SELECT users_id, users_fname,users_lname,users_tel,users_mobile,users_email,users_type FROM users WHERE users_type NOT IN ('admin')";
											$result = mysql_query($sql);
											$i = 0;
											while(list($users_id,$users_fname,$users_lname,$users_tel,$users_mobile,$users_email,$users_type) = mysql_fetch_row($result)){
												if($i%2 == 0){
													echo "<tr class='odd gradeX'>";
												}else{
													echo "<tr class='even gradeC'>";
												}												
													echo "<td>$users_fname $users_lname</td>";
													echo "<td>$users_tel, $users_mobile</td>";
													echo "<td>$users_email</td>";													
													echo "<td>$users_type</td>";													
													echo "<td class='center' align='center'><a href='index.php?modules=admin&file=delete_user&users_id=$users_id' onclick=\"return confirm('ยืนยันการลบ');\"> <span class='glyphicon glyphicon-remove'></span></a></td>";
													
												echo "</tr>";
												
												$i++;
											}

										?>				
                                        
									</tbody>
								</table>
						</div>
</div>