<div class="panel panel-default">
                        <div class="panel-heading">
							<span class="glyphicon glyphicon-glyphicon glyphicon-plus"></span> add document
                        </div>
                        <div class="panel-body">
							<form role="form" method="POST" action="index.php?modules=admin&file=add_document" enctype="multipart/form-data">
								<table>
									<tr><td align="right"><b>ชื่อเอกสาร : </b></td><td><input type="text" name="document_name" id="document_name" style="margin : 5px;"></td></tr>
									<tr><td align="right"><b>ไฟล์ : </b></td><td><input type="file" name="document_filename" id="document_filename" style="margin : 5px;"></td></tr>
									
								</table>
								
								<hr>
								
									<button type="submit" id="add_document"  class="btn btn-primary btn-success"><span class="glyphicon glyphicon-share"></span> อัพโหลด </button>
									
							</form>
						</div>
</div>