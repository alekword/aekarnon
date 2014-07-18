<div class='panel panel-default'>
    <div class='panel-heading'>
        <h3><font color='red'>Request </font></h3>
    </div>
    <div class='panel-body'>
    	<form method="POST">
	    	<b>ราคาเริ่มต้น :</b><input type="text" style="margin: 5px;" name="start_price" value="<?php echo $_POST['start_price'];?>" placeholder="example 350000"> &nbsp; 
	    	<b>ไม่เกิน :</b><input type="text" style="margin: 5px;" name="end_price" value="<?php echo $_POST['end_price'];?>" placeholder="example 5000000"> <br>

	    	<hr>
	    	<button type="submit" name="search" value="search" class="btn btn-primary btn-info"><span class="glyphicon glyphicon-search"></span> ค้นหา </button>
			<button type="submit" name="save" value="save" class="btn btn-primary btn-success"><span class="glyphicon glyphicon-save"></span> บันทึก </button>
		</form>
		<table class="table table-striped table-bordered table-hover">
		<?php
			if($_POST['search'] == "search"){
				if($_POST['start_price'] == ""){
					echo "<script>alert('กรุณากรอกราคาเริ่มต้น');</script>";
				}else if($_POST['end_price'] == ""){
					echo "<script>alert('กรุณากรอกราคาไม่เกิน');</script>";
				}else{
					$sql = "SELECT project.project_name,listing_name,listing_price,listing_promotion FROM listing INNER JOIN room ON room.room_id = listing.room_id INNER JOIN project ON room.project_id = project.project_id WHERE listing_price BETWEEN '$_POST[start_price]' AND '$_POST[end_price]' AND listing_status = 'available'";
					$result = mysql_query($sql);
					$num = mysql_num_rows($result);
					if($num != 0){
						 echo "<thead>
					                <tr>
					                    <th>#</th>
					                    <th style='text-align:center;'>โครงการ</th>
					                    <th style='text-align:center;'>ห้อง</th>
					                    <th style='text-align:center;'>ราคา</th>
					                    <th style='text-align:center;'>โปรโมชั่น</th>
					                </tr>
                            </thead>";
                        $i = 1;
						while(list($project_name,$listing_name,$listing_price,$listing_promotion) = mysql_fetch_row($result)){

							echo "<tbody>";
								echo "<tr>
										<td>$i</td>
										<td>$project_name</td>
										<td>$listing_name</td>
										<td  style='text-align:center;'><font color='green'><b>"; echo number_format($listing_price,2,".",","); echo "</b></font></td>
										<td>$listing_promotion</td>
									</tr>";
							echo "</tbody>";
							$i++;
						}
					}else{
						echo "<h4><font color='red'>ไม่พบราคาที่ค้นหา</font></h4>";
					}

				}
			}

			if($_POST['save'] == "save"){
				if($_POST['start_price'] == ""){
					echo "<script>alert('กรุณากรอกราคาเริ่มต้น');</script>";
				}else if($_POST['end_price'] == ""){
					echo "<script>alert('กรุณากรอกราคาไม่เกิน');</script>";
				}else{
					$sql = "INSERT INTO request VALUES ('','$_POST[start_price]','$_POST[end_price]','$_SESSION[users_id]')";
					mysql_query($sql);
					echo "<script>alert('บันทึก Request เรียบร้อย');window.location = 'index.php';</script>";
				}
			}
		?>
	</table>
    </div>
</div>