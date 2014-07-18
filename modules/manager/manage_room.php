<p><a href="index.php?modules=manager&file=add_room_form" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-plus"></span> add room</a></p>
<hr>
<form action="" method="POST">
    <b>เลือกโครงการ : </b><select name="project" class="form-control" style="display:inline; width: auto;" onchange="this.form.submit()">
            <option value="">เลือกโครงการ</option>
        <?php 
            $project = "SELECT project_id,project_name FROM project";
            $result = mysql_query($project);
            while(list($project_id,$project_name) = mysql_fetch_row($result)){
             echo "<option value='$project_id'"; if($_POST['project'] == "$project_id"){echo "selected='selected'";} echo">$project_name</option>";
            }
                                        
        ?>
    </select>
</form>
<div class="panel panel-default">
                        <div class="panel-heading">
							<span class="glyphicon glyphicon-lock"></span> manage room
                        </div>
                        <div class="panel-body">
  							<table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">โครงการ</th>
                                            <th style="text-align: center;">ชื่อห้อง</th>                                                                                        
                                            <th style="text-align: center;">รายละเอียดห้อง</th>
                                            <th style="text-align: center;">ภาพห้อง</th>
                                            <th style="text-align: center;">แก้ไข</th>
                                            <th style="text-align: center;">ลบ</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if($_POST['project']){
                                                $project = $_POST['project'];
                                                $room = "SELECT room_id,room_name,room_size,project_name FROM room INNER JOIN project ON project.project_id = room.project_id WHERE project.project_id = '$project'";
                                            }else{
                                                $project = $_POST['project'];
                                                $room = "SELECT room_id,room_name,room_size,project_name FROM room INNER JOIN project ON project.project_id = room.project_id";
                                            }                                            
                                            
                                            $result = mysql_query($room);
                                            $i = 0;
                                            while(list($room_id,$room_name,$room_size,$project_name) = mysql_fetch_row($result)){
                                                if($i%2 == 0){
                                                    echo "<tr class='odd gradeX'>";
                                                }else{
                                                    echo "<tr class='even gradeC'>";
                                                }                                               
                                                    echo "<td>$project_name</td>";
                                                    echo "<td>$room_name</td>";
                                                    echo " <td class='center' style='text-align: center;''><a href='index.php?modules=manager&file=detail_room&room_id=$room_id'' > <span class='glyphicon glyphicon-list'></span></a></td>";
                                                    echo " <td class='center' style='text-align: center;''><a href='index.php?modules=manager&file=room_image&room_id=$room_id'' > <span class='glyphicon glyphicon-picture'></span></a></td>";
                                                    echo "<td class='center' style='text-align: center;''><a href='index.php?modules=manager&file=edit_room_form&room_id=$room_id'> <span class='glyphicon glyphicon-pencil'></span></a></td>";
                                                    echo "<td class='center' style='text-align: center;''><a href='index.php?modules=manager&file=delete_room&room_id=$room_id' onclick=\"return confirm('ยืนยันการลบ');\"> <span class='glyphicon glyphicon-remove'></span></a></td>";
                                                    
                                                echo "</tr>";
                                                
                                                $i++;
                                            }

                                        ?>  
                                    </tbody>
                            </table>
                        </div>
</div>