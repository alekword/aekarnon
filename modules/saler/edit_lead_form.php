<div class="panel panel-default">
                        <div class="panel-heading">
							<span class="glyphicon glyphicon-pencil"></span> edit contact
                        </div>
                        <div class="panel-body">
							<?php 
								$sql = "SELECT * FROM lead WHERE lead_id = '$_GET[lead_id]'";
								$result = mysql_query($sql);
								list($lead_id,$lead_fname,$lead_lname,$lead_sex,$lead_company,$lead_address,$lead_tel,$lead_mobile,$lead_email,$lead_birthdate,$salary_per_month,$installements,$objective_property,$type_property,$wishes_recieve,$lead_status,$user_id) = mysql_fetch_row($result);
								$bd = explode("-",$lead_birthdate);
								$wr = explode(",",$wishes_recieve);
							?>
							<form role="form" id="add_lead" action="index.php?modules=saler&file=edit_lead" method="POST">				
							<input type="hidden" name="lead_id" value="<?php echo $lead_id;?>"/>
							<table>
								<tr><td align="right"><b>ชื่อ &nbsp;</td><td><input  value="<?php echo $lead_fname;?>" type="text" name="fname" id="fname" style="margin: 5px;"> &nbsp; 
								<b>นามสกุล</b> &nbsp;<input  value="<?php echo $lead_lname;?>" type="text" name="lname" id="lname" style="margin: 5px;"></span></tr>
								<tr><td align="right"><b>เพศ &nbsp;</td><td>
									<select name="sex" style="margin: 5px; width: 100px;">
										<option value="ชาย" <?php if($lead_sex == "ชาย"){echo "selected='selected'";}?>>ชาย</option>
										<option value="หญิง" <?php if($lead_sex == "หญิง"){echo "selected='selected'";}?>>หญิง</option>
									</select>
								</td></tr>
								<tr><td align="right"><b>ชื่อองค์กร / บริษัท </b>&nbsp;</td><td><input value="<?php echo $lead_company;?>" type="text" name="lead_company" style="margin: 5px;"></td></tr>
								<tr><td align="right"><b>ที่อยู่ </b>&nbsp;</td><td><textarea name="lead_address" cols="30" rows="5" style="margin: 5px;"><?php echo $lead_address;?></textarea></td></tr>
								<tr><td align="right"><b>เบอร์โทรศัทพ์ </b>&nbsp;</td><td><input type="text" name="lead_tel" style="margin: 5px;" value="<?php echo $lead_tel;?>"></td></tr>
								<tr><td align="right"><b>มือถือ</b>&nbsp;</td><td><input type="text" name="lead_mobile" style="margin: 5px;" value="<?php echo $lead_mobile;?>"></td></tr>
								<tr><td align="right"><b>อีเมล์</b>&nbsp;</td><td><input type="text" name="lead_email" style="margin: 5px;" value="<?php echo $lead_email;?>"></td></tr>
								<tr><td align="right"><b>วัน/เดือน/ปีเกิด</b>&nbsp;</td><td>
									<select name="day" id="day" style="margin: 5px; width: 100px;"><option value="" >วันที่</option>
										<?php  for($i = 1; $i <= 31; $i++){
											if($bd[0] == $i){
												echo "<option value='$i' selected='selected'>$i</option>"; 
											}else{
												echo "<option value='$i'>$i</option>"; 
											}

										}
										?>
									</select>
									<select name="month" id="month"  style="margin: 5px; width: 100px;">
										<option value="">เดือน</option>
										<?php
											$month = array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฏาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
											for($i = 0; $i < count($month); $i++){
												if($bd[1] == $month[$i]){
													echo "<option value='$month[$i]' selected='selected'>$month[$i]</option>";
												}else{
													echo "<option value='$month[$i]'>$month[$i]</option>";
												}
												
											}
										?>
									</select>
									<select name="year" id="year" style="margin: 5px; width: 100px;">
									<option value="">ปีเกิด</option>
										<?php 
											$year = date("Y");
											$year += 543;
											for($i = 2500; $i <= ($year-10); $i++){
												if($bd[2] == $i){
													echo "<option value='$i' selected='selected'>$i</option>";
												}else{
													echo "<option value='$i'>$i</option>";
												}											
											}
										?>
									</select>
								</td></tr>
							</table>
								<hr>
							<table>
								<tr><td align="right"><b>รายได้ต่อเดือน</b>&nbsp;</td><td><input type="radio" name="salary_per_month" value="ต่ำกว่า 15,000 บาท" style="margin: 5px;" <?php if($salary_per_month == "ต่ำกว่า 15,000 บาท"){echo "checked='checked'";} ?>>ต่ำกว่า 15,000 บาท &nbsp;
								<input type="radio" name="salary_per_month" value="15,001 - 30,000 บาท" style="margin: 5px;" <?php if($salary_per_month == "15,001 - 30,000 บาท"){echo "checked='checked'";} ?>>15,001 - 30,000 บาท &nbsp;
								<input type="radio" name="salary_per_month" value="30,000 - 45,000 บาท" style="margin: 5px;" <?php if($salary_per_month == "30,000 - 45,000 บาท"){echo "checked='checked'";} ?>>30,000 - 45,000 บาท &nbsp;
								</td></tr>								
								<tr><td></td><td>
								<input type="radio" name="salary_per_month" value="45,001 - 60,000 บาท" style="margin: 5px;" <?php if($salary_per_month == "45,001 - 60,000 บาท"){echo "checked='checked'";} ?>>45,001 - 60,000 บาท &nbsp;
								<input type="radio" name="salary_per_month" value="60,001 - 75,000 บาท" style="margin: 5px;" <?php if($salary_per_month == "60,001 - 75,000 บาท"){echo "checked='checked'";} ?>>60,001 - 75,000 บาท &nbsp;
								<input type="radio" name="salary_per_month" value="75,001 ขึ้นไป" style="margin: 5px;" <?php if($salary_per_month == "75,001 ขึ้นไป"){echo "checked='checked'";} ?>>75,001 ขึ้นไป &nbsp;		 					
								</td></tr>
							</table>
								<hr>
							<table>
								<tr><td align="right"><b>งบในการผ่อน</b>&nbsp;</td><td><input type="radio" name="installements" value="ต่ำกว่า 5,000 บาท" style="margin: 5px;" <?php if($installements == "ต่ำกว่า 5,000 บาท"){echo "checked='checked'";} ?>>ต่ำกว่า 5,000 บาท &nbsp;
								<input type="radio" name="installements" value="5,001 - 10,000 บาท" style="margin: 5px;" <?php if($installements == "5,001 - 10,000 บาท"){echo "checked='checked'";} ?>>5,001 - 10,000 บาท &nbsp;
								<input type="radio" name="installements" value="10,001 - 15,000 บาท" style="margin: 5px;" <?php if($installements == "10,001 - 15,000 บาท"){echo "checked='checked'";} ?>>10,001 - 15,000 บาท &nbsp;							
								</td></tr>
								
								<tr><td></td><td>
								<input type="radio" name="installements" value="15,001 - 20,000 บาท" style="margin: 5px;" <?php if($installements == "15,001 - 20,000 บาท"){echo "checked='checked'";} ?>>15,001 - 20,000 บาท &nbsp;
								<input type="radio" name="installements" value="20,001 - 25,000 บาท" style="margin: 5px;" <?php if($installements == "20,001 - 25,000 บาท"){echo "checked='checked'";} ?>>20,001 - 25,000 บาท &nbsp;
								<input type="radio" name="installements" value="25,001 บาทขึ้นไป" style="margin: 5px;" <?php if($installements == "25,001 บาทขึ้นไป"){echo "checked='checked'";} ?>>25,001 บาทขึ้นไป &nbsp;
								</td></tr>
							</table>
								<hr>
							<table>
								<tr><td align="right"><b>วัตถุประสงค์ในการซื้ออสังหา ฯ</b>&nbsp;</td><td><input type="radio" name="objective_property" value="อยู่อาศัย" style="margin: 5px;" <?php if($objective_property == "อยู่อาศัย"){echo "checked='checked'";} ?>> อยู่อาศัย &nbsp;
								<input type="radio" name="objective_property" value="ลงทุน" style="margin: 5px;" <?php if($objective_property == "ลงทุน"){echo "checked='checked'";} ?>> ลงทุน &nbsp;
								<input type="radio" name="objective_property" value="อยู่อาศัยและลงทุน" style="margin: 5px;" <?php if($objective_property == "อยู่อาศัยและลงทุน"){echo "checked='checked'";} ?>>อยู่อาศัยและลงทุน &nbsp;
								</td></tr>
							</table>
								<hr>
							<table>
								<tr><td align="right"><b>ประเภทของอสังหาที่สนใจ </b>&nbsp;</td><td><input type="radio" name="type_property" style="margin: 5px;" value="ที่ดิน" <?php if($type_property == "ที่ดิน"){echo "checked='checked'";} ?>> ที่ดิน &nbsp;
								<input type="radio" name="type_property" style="margin: 5px;" value="บ้าน" <?php if($type_property == "บ้าน"){echo "checked='checked'";} ?>> บ้าน &nbsp;
								<input type="radio" name="type_property" style="margin: 5px;" value="อาคารพาณิชย์" <?php if($type_property == "อาคารพาณิชย์"){echo "checked='checked'";} ?>> อาคารพาณิชย์ &nbsp;
								<input type="radio" name="type_property" style="margin: 5px;" value="คอนโด" <?php if($type_property == "คอนโด"){echo "checked='checked'";} ?>> คอนโด &nbsp;
								<input type="radio" name="type_property" style="margin: 5px;" value="ทาวน์โฮม" <?php if($type_property == "ทาวน์โฮม"){echo "checked='checked'";} ?>> ทาวน์โฮม &nbsp;
							</table>
								<hr>
							<table>
								</td></tr>
								<tr><td align="right"><b>ความประสงค์จะรับข้อมูล </b>&nbsp;</td><td><input type="radio" name="wishes_recieve" style="margin: 5px;" value="ต้องการรับข่าวสารจากเอกอานนท์" <?php if($wr[0] == "ต้องการรับข่าวสารจากเอกอานนท์"){echo "checked='checked'"; }?>> ต้องการรับข่าวสารจากเอกอานนท์ &nbsp;
								</td></tr>
								
								<tr><td></td><td>
									ช่วงเวลาที่สะดวกในการติดต่อ &nbsp; <input type="text" name="text_recieve" style="margin: 5px;" value="<?php echo $wr[1];?>"> 
								</td></tr>
							</table>
							<hr>
							<button type="submit" id="add_lead" class="btn btn-primary btn-default"><span class="glyphicon glyphicon-pencil"></span> แก้ไข </button> &nbsp;
						</form>
						</div>
</div>