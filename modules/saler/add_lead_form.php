<div class="panel panel-default">
                        <div class="panel-heading">
							<span class="glyphicon glyphicon-plus"></span> add contact
                        </div>
                        <div class="panel-body">
						<form role="form" id="add_lead" action="index.php?modules=saler&file=add_lead" method="POST">				
							<table>
								<tr><td align="right"><b>ชื่อ &nbsp;</td><td><input type="text" name="fname" id="fname" style="margin: 5px;"> &nbsp; <b>นามสกุล</b> &nbsp;<input type="text" name="lname" id="lname" style="margin: 5px;"></span></tr>
								<tr><td align="right"><b>เพศ &nbsp;</td><td>
									<select name="sex" style="margin: 5px; width: 100px;">
										<option value="ชาย">ชาย</option>
										<option value="หญิง">หญิง</option>
									</select>
								</td></tr>
								<tr><td align="right"><b>ชื่อองค์กร / บริษัท </b>&nbsp;</td><td><input type="text" name="lead_company" style="margin: 5px;"></td></tr>
								<tr><td align="right"><b>ที่อยู่ </b>&nbsp;</td><td><textarea name="lead_address" cols="30" rows="5" style="margin: 5px;"></textarea></td></tr>
								<tr><td align="right"><b>เบอร์โทรศัทพ์ </b>&nbsp;</td><td><input type="text" name="lead_tel" style="margin: 5px;"></td></tr>
								<tr><td align="right"><b>มือถือ</b>&nbsp;</td><td><input type="text" name="lead_mobile" style="margin: 5px;"></td></tr>
								<tr><td align="right"><b>อีเมล์</b>&nbsp;</td><td><input type="text" name="lead_email" style="margin: 5px;"></td></tr>
								<tr><td align="right"><b>วัน/เดือน/ปีเกิด</b>&nbsp;</td><td>
									<select name="day" id="day" style="margin: 5px; width: 100px;"><option value="">วันที่</option><?php  for($i = 1; $i <= 31; $i++){ echo "<option value='$i'>$i</option>"; }?></select>
									<select name="month" id="month" style="margin: 5px; width: 100px;">
										<option value="">เดือน</option>
										<?php
											$month = array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฏาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
											for($i = 0; $i < count($month); $i++){
												echo "<option value='$month[$i]'>$month[$i]</option>";
											}
										?>
									</select>
									<select name="year" id="year" style="margin: 5px; width: 100px;">
										<option value="">ปีเกิด</option>
										<?php 
											$year = date("Y");
											$year += 543;
											for($i = 2500; $i <= ($year-10); $i++){
												echo "<option>$i</option>";
											}
										?>
									</select>
								</td></tr>
							</table>
								<hr>
							<table>
								<tr><td align="right"><b>รายได้ต่อเดือน</b>&nbsp;</td><td><input type="radio" name="salary_per_month" value="ต่ำกว่า 15,000 บาท" style="margin: 5px;" >ต่ำกว่า 15,000 บาท &nbsp;
								<input type="radio" name="salary_per_month" value="15,001 - 30,000 บาท" style="margin: 5px;">15,001 - 30,000 บาท &nbsp;
								<input type="radio" name="salary_per_month" value="30,000 - 45,000 บาท" style="margin: 5px;">30,000 - 45,000 บาท &nbsp;
								</td></tr>								
								<tr><td></td><td>
								<input type="radio" name="salary_per_month" value="45,001 - 60,000 บาท" style="margin: 5px;">45,001 - 60,000 บาท &nbsp;
								<input type="radio" name="salary_per_month" value="60,001 - 75,000 บาท" style="margin: 5px;">60,001 - 75,000 บาท &nbsp;
								<input type="radio" name="salary_per_month" value="75,001 ขึ้นไป" style="margin: 5px;">75,001 ขึ้นไป &nbsp;		 					
								</td></tr>
							</table>
								<hr>
							<table>
								<tr><td align="right"><b>งบในการผ่อน</b>&nbsp;</td><td><input type="radio" name="installements" value="ต่ำกว่า 5,000 บาท" style="margin: 5px;">ต่ำกว่า 5,000 บาท &nbsp;
								<input type="radio" name="installements" value="5,001 - 10,000 บาท" style="margin: 5px;">5,001 - 10,000 บาท &nbsp;
								<input type="radio" name="installements" value="10,001 - 15,000 บาท" style="margin: 5px;">10,001 - 15,000 บาท &nbsp;							
								</td></tr>
								
								<tr><td></td><td>
								<input type="radio" name="installements" value="15,001 - 20,000 บาท" style="margin: 5px;">15,001 - 20,000 บาท &nbsp;
								<input type="radio" name="installements" value="20,001 - 25,000 บาท" style="margin: 5px;">20,001 - 25,000 บาท &nbsp;
								<input type="radio" name="installements" value="25,001 บาทขึ้นไป" style="margin: 5px;">25,001 บาทขึ้นไป &nbsp;
								</td></tr>
							</table>
								<hr>
							<table>
								<tr><td align="right"><b>วัตถุประสงค์ในการซื้ออสังหา ฯ</b>&nbsp;</td><td><input type="radio" name="objective_property" value="อยู่อาศัย" style="margin: 5px;"> อยู่อาศัย &nbsp;
								<input type="radio" name="objective_property" value="ลงทุน" style="margin: 5px;"> ลงทุน &nbsp;
								<input type="radio" name="objective_property" value="อยู่อาศัยและลงทุน" style="margin: 5px;">อยู่อาศัยและลงทุน &nbsp;
								</td></tr>
							</table>
								<hr>
							<table>
								<tr><td align="right"><b>ประเภทของอสังหาที่สนใจ </b>&nbsp;</td><td><input type="radio" name="type_property" style="margin: 5px;" value="ที่ดิน"> ที่ดิน &nbsp;
								<input type="radio" name="type_property" style="margin: 5px;" value="บ้าน"> บ้าน &nbsp;
								<input type="radio" name="type_property" style="margin: 5px;" value="อาคารพาณิชย์"> อาคารพาณิชย์ &nbsp;
								<input type="radio" name="type_property" style="margin: 5px;" value="คอนโด"> คอนโด &nbsp;
								<input type="radio" name="type_property" style="margin: 5px;" value="ทาวน์โฮม"> ทาวน์โฮม &nbsp;
							</table>
								<hr>
							<table>
								</td></tr>
								<tr><td align="right"><b>ความประสงค์จะรับข้อมูล </b>&nbsp;</td><td><input type="radio" name="wishes_recieve" style="margin: 5px;" value="ต้องการรับข่าวสารจากเอกอานนท์"> ต้องการรับข่าวสารจากเอกอานนท์ &nbsp;
								</td></tr>
								
								<tr><td></td><td>
									ช่วงเวลาที่สะดวกในการติดต่อ &nbsp; <input type="text" name="text_recieve" style="margin: 5px;"> 
								</td></tr>
							</table>
							<hr>
							<button type="submit" id="add_lead" class="btn btn-primary btn-default"><span class="glyphicon glyphicon-upload"></span> บันทึก </button> &nbsp;
							<button type="reset" class="btn btn-primary btn-default"><span class="glyphicon glyphicon-trash"></span>  รีเซท </button>
						</form>
						
						</div>
</div>