<div class="panel panel-default">
                        <div class="panel-heading">
							<span class="glyphicon glyphicon-glyphicon glyphicon-pencil"></span> edit profile
                        </div>
                        <div class="panel-body">
							<form  role="form" action="index.php?modules=user&file=edit_profile" method="POST" enctype="multipart/form-data">
								<?php 
									$sql = "SELECT * FROM users WHERE users_id = '$_SESSION[users_id]'";
									$result = mysql_query($sql);
									list($users_id,$username,$password,$users_fname,$users_lname,$users_sex,$users_tel,$users_mobile,$users_email,$users_pic,$users_type) = mysql_fetch_row($result);
								?>
								<table>
									<tr><td align="right"><b>รูปภาพ : </b></td>
									<td><input type="file" name="users_pic" style="margin: 5px;"/></td></tr>
									<tr><td align="right"><b>ชื่อ :</b></td><td><input type="text" name="users_fname" value="<?php echo $users_fname;?>" style="margin: 5px;"/></td></tr>
									<tr><td align="right"><b>นามสกุล :</b></td><td><input type="text" name="users_lname" value="<?php echo $users_lname;?>" style="margin: 5px;"/></td></tr>
									<tr><td align="right"><b>เพศ : </b></td><td><select name="users_sex"  style="margin: 5px; width: 80px;">
										<option value="ชาย" <?php if($users_sex == "ชาย"){echo "selected='selected'";}?>>ชาย</option>
										<option value="หญิง" <?php if($users_sex == "หญิง"){echo "selected='selected'";}?>>หญิง</option>
									</select></td></tr>
									<tr><td align="right"><b>เบอร์โทรศัทพ์ :</b></td><td><input type="text" name="users_tel" value="<?php echo $users_tel;?>"  style="margin: 5px;"/></td></tr>
									<tr><td align="right"><b>มือถือ :</b></td><td><input type="text" name="users_mobile" value="<?php echo $users_mobile;?>" style="margin: 5px;"/></td></tr>
									<tr><td align="right"><b>อีเมล์ : </b></td><td><input type="text" name="users_email" value="<?php echo $users_email;?>" style="margin: 5px;"/></td></tr>
									
								</table>
								<hr>
								<button type="submit" id="add_lead" name="accept" value="accept" class="btn btn-primary btn-default"><span class="glyphicon glyphicon-pencil"></span> แก้ไข </button>
							</form>
						</div>
</div>