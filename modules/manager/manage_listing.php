<p><a href="index.php?modules=manager&file=create_listing_form" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-plus"></span> create listing</a></p>
<hr>
<div class="panel panel-default">
                        <div class="panel-heading">
							<span class="glyphicon glyphicon-list-alt"></span> manage listing
                        </div>
                        <div class="panel-body">
  							<table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">โครงการ</th>
                                            <th style="text-align: center;">ห้อง</th>  
                                            <th style="text-align: center;">ราคา</th> 
                                            <th style="text-align: center;">โปรโมชั่น</th>                                           
                                            <th style="text-align: center;">สถานะ</th>
                                            <th style="text-align: center;">แก้ไข</th>
                                            <th style="text-align: center;">ลบ</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql = "SELECT listing_id,listing_name,listing_price,listing_promotion,listing_status,project.project_name FROM listing INNER JOIN room ON room.room_id = listing.room_id INNER JOIN project ON project.project_id = room.project_id ORDER BY listing.listing_id DESC";
                                            $result = mysql_query($sql);
                                            $i = 0;
                                            while(list($listing_id,$listing_name,$listing_price,$listing_promotion,$listing_status,$project_name) = mysql_fetch_row($result)){
                                                if($i%2 == 0){
                                                    echo "<tr class='odd gradeX'>";
                                                }else{
                                                    echo "<tr class='even gradeC'>";
                                                }                                               
                                                    echo "<td>$project_name</td>";
                                                    echo "<td>$listing_name</td>";
                                                    echo "<td>$listing_price</td>";
                                                    echo "<td>$listing_promotion</td>";                                                   
                                                    if($listing_status == "available"){
                                                        echo "<td><font color='green'>$listing_status</font></td>";
                                                    }else if($listing_status == "offering"){
                                                        echo "<td><font color='orange'>$listing_status</font></td>";
                                                    }else if($listing_status == "closing"){
                                                        echo "<td><font color='blue'>$listing_status</font></td>";
                                                    }

                                                    echo "<td class='center' style='text-align: center;'><a href='index.php?modules=manager&file=edit_listing_form&listing_id=$listing_id'> <span class='glyphicon glyphicon-pencil'></span></a></td>";                                                    
                                                    echo "<td class='center' style='text-align: center;'><a href='index.php?modules=manager&file=delete_listing&listing_id=$listing_id' onclick=\"return confirm('ยืนยันการลบ');\"> <span class='glyphicon glyphicon-remove'></span></a></td>";
                                                    
                                                echo "</tr>";
                                                
                                                $i++;
                                            }

                                        ?>  
                                    </tbody>
                            </table>
                        </div>
</div>