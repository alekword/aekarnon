<div class="panel panel-default">
        <div class="panel-heading">
			<span class="glyphicon glyphicon-picture"></span> project image
        </div>
            <div class="panel-body">
            	<?php 
            		$room_id = $_GET['room_id'];
            		$room = "SELECT room_name,project.project_name FROM room INNER JOIN project ON project.project_id = room.project_id WHERE room_id = '$room_id'";
            		list($room_name,$project_name) = mysql_fetch_row(mysql_query($room));
            	?>
            	<h4><?php echo $room_name." "."(โครกงาร ".$project_name.")"; ?></h4>

            	<div class="row" align="center"> 
            	<?php
            		$sql = "SELECT image_id,image_name FROM room_image WHERE room_id = '$room_id'";
            		$result = mysql_query($sql);
                    $num = mysql_num_rows($result);
            		if($num > 0){
                        while(list($image_id,$image_name) = mysql_fetch_row($result)){
                            echo "<table style='display:inline-block; width: 230px; margin: 5px;'>";
                            echo "<tr><td style='padding-left: 215px;'><a href='index.php?modules=manager&file=delete_image_room&image_id=$image_id&room_id=$room_id' onclick=\"return confirm('ยืนยันการลบ')\"><span class='glyphicon glyphicon-remove'></span></a></td></tr>";
                            echo "<tr><td><div >
                                <a href='#'  class='thumbnail'><img src='images/room/$image_name' style='width: 220px; height: 220px;'></a>
                                </div></td></tr>";
                            echo "</table>";
                        }
                    }else{
                        echo "<font color='red'>ยังไม่มีรูปภาพ</font>";
                    }
            		
					

            	?>            						
				</div>
       		</div>
</div>