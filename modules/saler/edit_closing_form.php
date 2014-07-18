<div class="panel panel-default">
                        <div class="panel-heading">
							<span class="glyphicon glyphicon-glyphicon glyphicon-pencil"></span> edit closing
                        </div>
                        <div class="panel-body">
                        	<?php 
                        		$closing_id = $_GET['closing_id'];
                        		$sql = "SELECT closing_price,closing_promotion FROM closing WHERE closing_id  = '$closing_id'";
                        		list($closing_price,$closing_promotion) = mysql_fetch_row(mysql_query($sql));
                        	?>
							<form role="form" method="POST" action="index.php?modules=saler&file=edit_closing">
								<table>
									<input type="hidden" name="closing_id" value="<?php echo $closing_id ?>">
									<tr><td align="right"><b>ราคา : </b></td><td><input type="text" name="closing_price" style="margin: 5px; width: 250px;" value="<?php echo $closing_price; ?>"></td></tr>
									<tr><td align="right"><b>โปรโมชั่น : </b></td><td><input type="text" name="closing_promotion" style="margin: 5px; width: 250px;" value="<?php echo $closing_promotion;?>"></td></tr>								
								</table>
								<hr>
								<button type="submit" value="accept" class="btn btn-primary btn-success"><span class="glyphicon glyphicon-edit"></span> แก้ไข </button>
								<a href="index.php?modules=saler&file=closing" class="btn btn-primary btn-danger"><span class="glyphicon glyphicon-remove"></span> ยกเลิก</a>
							</form>						
                        </div>	
</div>