<div class="panel panel-default">
                        <div class="panel-heading">
							<span class="glyphicon glyphicon-glyphicon glyphicon-pencil"></span> edit document
                        </div>
                        <div class="panel-body">
                        	<?php
                        		$document_id = $_GET['document_id'];
                        		$sql = "SELECT document_name FROM document WHERE document_id = '$document_id'";
                        		list($document_name) = mysql_fetch_row(mysql_query($sql));
                        	?>
							<form role="form" method="POST" action="index.php?modules=admin&file=edit_document" enctype="multipart/form-data">
								<input type="hidden" name="document_id" value="<?php echo $document_id;?>"/>
								<table>
									<tr><td align="right"><b>ชื่อเอกสาร : </b></td><td><input type="text" name="document_name" id="document_name" style="margin : 5px;" value="<?php echo $document_name; ?>"></td></tr>
									<tr><td align="right"><b>ไฟล์ : </b></td><td><input type="file" name="document_filename" style="margin : 5px;"></td></tr>
									
								</table>
								
								<hr>
								
									<button type="submit" id="add_document"  class="btn btn-primary btn-success"><span class="glyphicon glyphicon-pencil"></span> แก้ไข </button>
									<a href="index.php?modules=admin&file=manage_document" id="add_document"  class="btn btn-primary btn-danger"><span class="glyphicon glyphicon-share"></span> ยกเลิก </a>
							</form>
						</div>
</div>