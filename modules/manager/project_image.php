<div class="panel panel-default">
        <div class="panel-heading">
			<span class="glyphicon glyphicon-picture"></span> project image
        </div>
            <div class="panel-body">
            	<?php 
            		$project_id = $_GET['project_id'];
            		$project = "SELECT project_name FROM project WHERE project_id = '$project_id'";
            		list($project_name) = mysql_fetch_row(mysql_query($project));
            	?>
            	<p algin="left"><b><?php echo "โครงการ : ",$project_name;?></b></p>

            	<div class="row" align="center"> 
            	<?php
            		$sql = "SELECT image_id,image_name FROM project_image WHERE project_id = '$project_id'";
            		$result = mysql_query($sql);
            		
            		while(list($image_id,$image_name) = mysql_fetch_row($result)){
            			echo "<table style='display:inline-block; width: 230px; margin: 5px;'>";
            			echo "<tr><td style='padding-left: 215px;'><a href='index.php?modules=manager&file=delete_image_project&project_id=$project_id&image_id=$image_id' onclick=\"return confirm('ยืนยันการลบ')\"><span class='glyphicon glyphicon-remove'></span></a></td></tr>";
            			echo "<tr><td><div >
   							<a href='#'  class='thumbnail'><img src='images/project/$image_name' style='width: 220px; height: 220px;'></a>
  							</div></td></tr>";
  						echo "</table>";
					}
					

            	?>            						
				</div>
       		</div>
</div>