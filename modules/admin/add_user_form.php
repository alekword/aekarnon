<div class="panel panel-default">
                        <div class="panel-heading">
							<span class="glyphicon glyphicon-glyphicon glyphicon-plus"></span> add user
                        </div>
                        <div class="panel-body">
							<form role="form" method="POST" action="index.php?modules=admin&file=add_user" id="add_user">
								<table>
									<tr><td align="right"><b>ชื่อผู้ใช้ : </b></td><td><input type="text" name="users_fname" id="users_fname" style="margin : 5px;"></td></tr>
									<tr><td align="right"><b>รหัสผ่าน : </b></td><td><input type="text" name="users_password" id="users_password" style="margin : 5px;"></td></tr>
									<tr><td align="right"><b>ประเภทผู้ใช้ : </b></td><td><select name="users_type" style="margin : 5px;">
										<option value="sale">sale</option>
										<option value="crm">crm</option>
										<option value="manager">manager</option>
										<option value="admin">admin</option>
									</select></td></tr>
								</table>
								
								<hr>
								
									<button type="submit" id="add_user"  class="btn btn-primary btn-success"><span class="glyphicon glyphicon-plus"></span> บันทึก </button>
							</form>
						</div>
</div>