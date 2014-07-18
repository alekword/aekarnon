<div class="panel panel-default">
                        <div class="panel-heading">
							<span class="glyphicon glyphicon-list"></span> room detail
							<?php 
								$room_id = $_GET['room_id'];
								$sql = "SELECT room_name,room_floor,room_size,room_number,room_balcony,room_kitchen,project.project_name FROM room INNER JOIN project ON project.project_id = room.project_id WHERE room_id = '$room_id'";
								list($room_name,$room_floor,$room_size,$room_number,$room_balcony,$room_kitchen,$project_name) = mysql_fetch_row(mysql_query($sql));
							?>

                        </div>
                        <div class="panel-body">
                        	<h4><?php echo $room_name." "."(โครกงาร ".$project_name.")"; ?></h4>
                        	<div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <tbody>
                                        <tr>
                                            <td style='text-align: right;'><b>ชั้นของห้อง</b></td>
                                            <td><?php echo $room_floor; ?></td>
                                        </tr>
                                        <tr>
                                            <td style='text-align: right;'><b>ขนาด</b></td>
                                            <td><?php echo $room_size; ?></td>
                                        </tr>
                                        <tr>
                                            <td style='text-align: right;'><b>จำนวนห้อง</b></td>
                                            <td><?php echo $room_number; ?></td>
                                        </tr> 
                                        <tr>
                                            <td style='text-align: right;'><b>การหันระเบียง</b></td>
                                            <td><?php echo $room_balcony; ?></td>
                                        </tr>                                                                        
                                    </tbody>
                                </table>

                            <hr>
                            <h4>รายละเอียดการตกแต่งห้อง</h4>
                                <table class="table table-striped table-bordered table-hover">
                                    <tbody>
                                        <tr>
                                            <td style='text-align: right;'><b>ห้องครัว</b></td>
                                            <td><?php echo $room_kitchen; ?></td>
                                        </tr>
                                        <?php
                                            $detail = "SELECT detail_name,detail_detail FROM room_detail WHERE room_id = '$room_id'";
                                            $result = mysql_query($detail);
                                            while(list($detail_name,$detail_detail) = mysql_fetch_row($result)){
                                                echo " <tr>
                                                        <td style='text-align: right;'><b>$detail_name</b></td>
                                                        <td>$detail_detail</td>
                                                    </tr>";
                                            }
                                        ?>                                                                       
                                    </tbody>
                                </table>

                            <hr>
                            <h4>ภาพห้อง</h4>
                            <div class="row" align="center"> 
                                <?php
                                    $sql = "SELECT image_id,image_name FROM room_image WHERE room_id = '$room_id'";
                                    $result = mysql_query($sql);
                                    
                                    while(list($image_id,$image_name) = mysql_fetch_row($result)){
                                        echo "<table style='display:inline-block; width: 230px; margin: 5px;'>";
                                        echo "<tr><td><div >
                                            <a href='#'  class='thumbnail'><img src='images/room/$image_name' style='width: 220px; height: 220px;'></a>
                                            </div></td></tr>";
                                        echo "</table>";
                                    }
                                    

                                ?>                                  
                            </div>
                        </div>
</div>