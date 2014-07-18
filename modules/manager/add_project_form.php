<script type="text/javascript" src="nicEdit.js"></script>
<script type="text/javascript">
	bkLib.onDomLoaded(function() { 
		new nicEditor({buttonList : ['fontSize','fontFamily','bold','italic','underline','strikeThrough','subscript','superscript','html',]}).panelInstance('area');
		new nicEditor({buttonList : ['fontSize','fontFamily','bold','italic','underline','strikeThrough','subscript','superscript','html',]}).panelInstance('area2');
		new nicEditor({buttonList : ['fontSize','fontFamily','bold','italic','underline','strikeThrough','subscript','superscript','html',]}).panelInstance('area3');
		new nicEditor({buttonList : ['fontSize','fontFamily','bold','italic','underline','strikeThrough','subscript','superscript','html',]}).panelInstance('area4');
	});
</script>


<div class="panel panel-default">
                        <div class="panel-heading">
							<span class="glyphicon glyphicon-plus"></span> add project
                        </div>
                        <div class="panel-body">
							<form role="form" id="add_project" action="index.php?modules=manager&file=add_project" method="POST" enctype="multipart/form-data">				
							
								<h4>ข้อมูลโครงการ</h4>
								<table>
										<tr><td align="right"><b>โลโก้โครงการ :</b></td><td><input type="file" name="project_logo"  style="margin: 5px; width: 300px;"></td></tr>
										<tr><td align="right"><b>ชื่อโครงการ :</b></td><td><input type="text" name="project_name" id="project_name" style="margin: 5px; width: 300px;"></td></tr>
										<tr><td align="right"><b>เจ้าของโครงการ :</b></td><td><input type="text" name="project_owner" id="project_owner" style="margin: 5px; width: 300px;"></td></tr>
										<tr><td align="right"><b>สถานที่ตั้ง :</b></td><td><input type="text" name="project_place" style="margin: 5px; width: 300px;"></td></tr>
										<tr><td align="right"><b>พื้นที่โครงการ :</b></td><td><input type="text" name="project_area" style="margin: 5px; width: 300px;"></td></tr>
										<tr><td align="right"><b>ลักษณะโครงการ :</b></td><td><input type="text" name="project_nature" style="margin: 5px; width: 300px;"></td></tr>
										<tr><td align="right"><b>พื้นที่จอดรถส่วนกลาง :</b></td><td><input type="text" name="project_areaparking" style="margin: 5px; width: 300px;"></td></tr>
										<tr><td align="right"><b>จำนวนยูนิต :</b></td><td><p style="margin: 5px;"><textarea cols="35" name="project_unit" rows="7" id="area" style="width: 300px;"></textarea></p></td></tr>
										<tr><td align="right"><b>สิ่งอำนวยความสะดวก :</b></td><td><p style="margin: 5px;"><textarea cols="35" name="project_facilitate" rows="7" id="area2" style="width: 300px;"></textarea></p></td></tr>
										<tr><td align="right"><b>ระบบรักษาความปลอดภัย :</b></td><td><p style="margin: 5px;"><textarea cols="35" name="project_safty" rows="7" id="area3" style="width: 300px;"></textarea></p></td></tr>										
										<tr><td align="right"><b>ประเภทห้อง :</b></td><td><p style="margin: 5px;"><textarea cols="35" rows="7" name="project_typeroom" id="area4" style="width: 300px;"></textarea></p></td></tr>
										
								</table>
								
								<hr>

								<h4>ค่าใช้จ่ายที่ผู้ซื้อจะต้องชำระ ณ วันโอนกรรมสิทธิ์</h4>
								<table>
										<tr><td align="right"><b>ค่าใช้จ่ายส่วนกลาง :</b></td><td><input type="text" name="project_centralcharges" style="margin: 5px; width: 300px;"></td></tr>
										<tr><td align="right"><b>เงินกองทุน :</b></td><td><input type="text" name="project_coffers" style="margin: 5px; width: 300px;"></td></tr>
										<tr><td align="right"><b>ค่าติดตั้งและมัดจำมิเตอร์ไฟฟ้า :</b></td><td><input type="text" name="project_installmonitor" style="margin: 5px; width: 300px;"></td></tr>
										<tr><td align="right"><b>ค่าไฟฟ้า :</b></td><td><input type="text" name="project_electricity" style="margin: 5px; width: 300px;"></td></tr>
										<tr><td align="right"><b>ค่าน้ำประปา : </b></td><td><input type="text" name="project_tabwater" style="margin: 5px; width: 300px;"></td></tr>
								</table>
								<hr>


								<hr>

								<h4>รูปภาพโครงการ </h4>
								<table>
										<tr><td align="right"><b>รุปภาพโครงการ :</b></td><td><input type="file" multiple name="project_images[]" style="margin: 5px; width: 300px;"> <font color="red">*สามารถอัพโหลดได้หลายไฟล์</font></td></tr>
								</table>
								<hr>
								<button type="submit" id="add_project" class="btn btn-primary btn-success"><span class="glyphicon glyphicon-upload"></span> บันทึก </button> &nbsp;
								<button type="reset" class="btn btn-primary btn-danger"><span class="glyphicon glyphicon-trash"></span>  รีเซท </button>
							</form>
						</div>
</div>