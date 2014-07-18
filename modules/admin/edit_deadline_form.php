<div class="panel panel-default">
                        <div class="panel-heading">
							<span class="glyphicon glyphicon-glyphicon glyphicon-pencil"></span> edit deadline
                        </div>
                        <div class="panel-body">
                        	<?php
                        		$deadline_id = $_GET['deadline_id'];
                        		$sql = "SELECT deadline_name,deadline_day FROM deadline WHERE deadline_id = '$deadline_id'";
                        		list($deadline_name,$deadline_day) = mysql_fetch_row(mysql_query($sql));
                        	?>
							<form role="form" method="POST" action="index.php?modules=admin&file=edit_deadline">
								<input type="hidden" name="deadline_id" value="<?php echo $deadline_id;?>"/>
								<table>
									<tr><td align="right"><b>ชื่อ : </b></td><td><input type="text" name="deadline_name" style="margin : 5px;" value="<?php echo $deadline_name; ?>"></td></tr>
									<tr><td align="right"><b>จำนวนวัน : </b></td><td><input type="text" name="deadline_day" style="margin : 5px;" value="<?php echo $deadline_day; ?>"></td></tr>
									
								</table>
								
								<hr>
								
									<button type="submit" id="add_document"  class="btn btn-primary btn-success"><span class="glyphicon glyphicon-pencil"></span> แก้ไข </button>
									<a href="index.php?modules=admin&file=manage_deadline" id="add_document"  class="btn btn-primary btn-danger"><span class="glyphicon glyphicon-share"></span> ยกเลิก </a>
							</form>
						</div>
</div>