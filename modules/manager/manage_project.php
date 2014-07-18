<p><a href="index.php?modules=manager&file=add_project_form" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-plus"></span> add project</a></p>
<hr>
<div class="panel panel-default">
                        <div class="panel-heading">
							<span class="glyphicon glyphicon-cog"></span> manage project
                        </div>
                        <div class="panel-body">
  							<table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">โครงการ</th>
                                            <th style="text-align: center;">เจ้าของโครงการ</th>                                            
                                            <th style="text-align: center;">รายละเอียดโครงการ</th>
                                            <th style="text-align: center;">ภาพโครงการ</th>
                                            <th style="text-align: center;">แก้ไข</th>
                                            <th style="text-align: center;">ลบ</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql = "SELECT project_id,project_name,project_owner FROM project";
                                            $result = mysql_query($sql);
                                            $i = 0;
                                            while(list($project_id,$project_name,$project_owner) = mysql_fetch_row($result)){
                                                if($i%2 == 0){
                                                    echo "<tr class='odd gradeX'>";
                                                }else{
                                                    echo "<tr class='even gradeC'>";
                                                }                                               
                                                    echo "<td>$project_name</td>";
                                                    echo "<td>$project_owner</td>";
                                                    echo " <td class='center' style='text-align:center;'><a href='index.php?modules=manager&file=detail_project&project_id=$project_id'' > <span class='glyphicon glyphicon-list'></span></a></td>";
                                                     echo " <td class='center' style='text-align:center;'><a href='index.php?modules=manager&file=project_image&project_id=$project_id'' > <span class='glyphicon glyphicon-picture'></span></a></td>";
                                                    echo "<td class='center'  style='text-align:center;'><a href='index.php?modules=manager&file=edit_project_form&project_id=$project_id'> <span class='glyphicon glyphicon-pencil'></span></a></td>";
                                                    echo "<td class='center'  style='text-align:center;'><a href='index.php?modules=manager&file=delete_project&project_id=$project_id' onclick=\"return confirm('ยืนยันการลบ');\"> <span class='glyphicon glyphicon-remove'></span></a></td>";
                                                    
                                                echo "</tr>";
                                                
                                                $i++;
                                            }

                                        ?>  
                                    </tbody>
                            </table>
                        </div>
</div>