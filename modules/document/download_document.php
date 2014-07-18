<?php

		$lead_id = $_GET['lead_id'];
	
?>			
 <div class="panel panel-default">
                        <div class="panel-heading">
							<font color="red"><h4>Document</h4></font>
                        </div>
                        <div class="panel-body">
                        	<?php 
                        		$sql = "SELECT * FROM document";
                        		$result = mysql_query($sql);
                        		$i = 1;
                        		while(list($document_id,$document_name,$document_filename) = mysql_fetch_row($result)){

                        			echo "<b>$i. $document_name</b> &nbsp; &nbsp; &nbsp; <a href='document/$document_filename' download>download</a><br><br>";
                        			$i++;
                        		}
                        	?>
                        </div>

</div>


