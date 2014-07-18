<div class="panel panel-default">
                        <div class="panel-heading">
							<span class="glyphicon glyphicon-list"></span> project detail
							<?php 
								$project_id = $_GET['project_id'];
								$sql = "SELECT * FROM project WHERE project_id = '$project_id'";
								list($project_id,$project_installmonitor,$project_electricity,$project_tabwater,$project_name,$project_logo,$project_owner,$project_place,
                        			$project_area,$project_nature,$project_unit,$project_facilitate,$project_safty,$project_typeroom,$project_areaparking,$project_centralcharges,$project_coffers) = mysql_fetch_row(mysql_query($sql));
							?>

                        </div>
                        <div class="panel-body">
                        	<p align="center"><img src="images/project/<?php echo $project_logo; ?>" style="width: 350px; height: 300px; border: solid 1px #ccc;"></p>
                        	<h4>ข้อมูลโครงการ <?php echo $project_name; ?></h4>
                        	<div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <tbody>
                                        <tr>
                                            <td style='text-align: right;'><b>ชื่อโครงการ</b></td>
                                            <td><?php echo $project_name; ?></td>
                                        </tr>
                                        <tr>
                                            <td style='text-align: right;'><b>เจ้าของโครงการ</b></td>
                                            <td><?php echo $project_owner; ?></td>
                                        </tr>
                                        <tr>
                                            <td style='text-align: right;'><b>พื้นที่โครงการ</b></td>
                                            <td><?php echo $project_area; ?></td>
                                        </tr>
                                        <tr>
                                            <td style='text-align: right;'><b>ลักษณะโครงการ</b></td>
                                            <td><?php echo $project_nature; ?></td>
                                        </tr>
                                        <tr>
                                            <td style='text-align: right;'><b>จำนวนยูนิต</b></td>
                                            <td><?php echo $project_unit; ?></td>
                                        </tr>
                                        <tr>
                                            <td style='text-align: right;'><b>สิ่งอำนวยความสะดวก</b></td>
                                            <td><?php echo $project_facilitate; ?></td>
                                        </tr>
                                        <tr>
                                            <td style='text-align: right;'><b>ระบบรักษาความปลอดภัย</b></td>
                                            <td><?php echo $project_safty ?></td>
                                        </tr>
                                        <tr>
                                            <td style='text-align: right;'><b>พื้นที่จอดรถส่วนกลาง</b></td>
                                            <td><?php echo $project_areaparking; ?></td>
                                        </tr>
                                        <tr>
                                            <td style='text-align: right;'><b>ประเภทห้อง</b></td>
                                            <td><?php echo $project_typeroom; ?></td>
                                        </tr>                                      
                                    </tbody>
                                </table>

                                <h4>ค่าใช้จ่ายที่ผู้ซื้อจะต้องชำระ ณ วันโอนกรรมสิทธิ์</h4>
                                <table class="table table-striped table-bordered table-hover">
                                    <tbody>
                                        <tr>
                                            <td style='text-align: right;'><b>ค่าใช้จ่ายส่วนกลาง</b></td>
                                            <td><?php echo $project_centralcharges; ?></td>
                                        </tr>
                                        <tr>
                                            <td style='text-align: right;'><b>เงินกองทุน</b></td>
                                            <td><?php echo $project_coffers; ?></td>
                                        </tr>
                                        <tr>
                                            <td style='text-align: right;'><b>ค่าติดตั้งและมัดจำมิเตอร์ไฟฟ้า</b></td>
                                            <td><?php echo $project_installmonitor; ?></td>
                                        </tr>
                                        <tr>
                                            <td style='text-align: right;'><b>ค่าไฟฟ้า</b></td>
                                            <td><?php echo $project_electricity; ?></td>
                                        </tr>     
                                        <tr>
                                            <td style='text-align: right;'><b>ค่าน้ำประปา</b></td>
                                            <td><?php echo $project_tabwater; ?></td>
                                        </tr>                                  
                                    </tbody>
                                </table>
                            </div>

                            <div class="row" align="center"> 
				            	<?php
				            		$sql = "SELECT image_id,image_name FROM project_image WHERE project_id = '$project_id'";
				            		$result = mysql_query($sql);
				            		
				            		while(list($image_id,$image_name) = mysql_fetch_row($result)){
				            			echo "<table style='display:inline-block; width: 230px; margin: 5px;'>";
				            			echo "<tr><td><div >
				   							<a href='#'  class='thumbnail'><img src='images/project/$image_name' style='width: 220px; height: 220px;'></a>
				  							</div></td></tr>";
				  						echo "</table>";
									}
									

				            	?>            						
							</div>


                        </div>
</div>
