 <p><a href="index.php?modules=admin&file=add_document_form" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-plus"></span> add document</a></p>
<div class="panel panel-default">
                        <div class="panel-heading">
							<span class="glyphicon glyphicon-list-alt"></span> manage document
                        </div>
                        <div class="panel-body">
								<table class="table table-striped table-bordered table-hover" id="dataTables-example">
									<thead>
                                        <tr>
                                            <th style="text-align: center;">ชื่อเอกสาร</th>	
                                            <th style="text-align: center;">แก้ไข</th>									
                                            <th style="text-align: center;">ลบ</th>
                                        </tr>
                                    </thead>
									 <tbody>
										<?php
											$sql = "SELECT document_id,document_name FROM document";
											$result = mysql_query($sql);
											$i = 0;
											while(list($document_id,$document_name) = mysql_fetch_row($result)){
												if($i%2 == 0){
													echo "<tr class='odd gradeX'>";
												}else{
													echo "<tr class='even gradeC'>";
												}												
													echo "<td>$document_name</td>";																							
													echo "<td class='center' style='text-align:center;'><a href='index.php?modules=admin&file=edit_document_form&document_id=$document_id'> <span class='glyphicon glyphicon-pencil'></span></a></td>";
													echo "<td class='center' style='text-align:center;'><a href='index.php?modules=admin&file=delete_document&document_id=$document_id' onclick=\"return confirm('ยืนยันการลบ');\"> <span class='glyphicon glyphicon-remove'></span></a></td>";
													
												echo "</tr>";
												
												$i++;
											}

										?>				
                                        
									</tbody>
								</table>
						</div>
</div>