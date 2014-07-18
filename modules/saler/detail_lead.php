<div class="panel panel-default">
                        <div class="panel-heading">
							<span class="glyphicon glyphicon-glyphicon glyphicon-file"></span> contact detail
                        </div>
                        <div class="panel-body">
							<?php 
								$sql = "SELECT * FROM lead WHERE lead_id = '$_GET[lead_id]'";
								$result = mysql_query($sql);
								list($lead_id,$lead_fname,$lead_lname,$lead_sex,$lead_company,$lead_address,$lead_tel,$lead_mobile,$lead_email,$lead_birthdate,$salary_per_month,$installements,$objective_property,$type_property,$wishes_recieve,$lead_status,$user_id) = mysql_fetch_row($result);
								$wr = explode(",",$wishes_recieve);
							
							?>
							
							<p><b>ชื่อ-นามสกุล : </b><?php echo $lead_fname." ".$lead_lname;?></p>
							<p><b>เพศ : </b><?php echo $lead_sex;?></p>
							<p><b>ชื่อองค์กร / บริษัท : </b><?php echo $lead_company;?></p>
							<p><b>ที่อยู่ : </b><?php echo $lead_address;?></p>
							<p><b>เบอร์โทรศัพท์ : </b><?php echo $lead_tel;?></p>
							<p><b>มือถือ : </b><?php echo $lead_mobile;?></p>
							<p><b>อีเมล์ : </b><?php echo $lead_email;?></p>
							<p><b>วันเกิด : </b><?php echo $lead_birthdate;?></p>
							<p><b>รายได้ต่อเดือน : </b><?php echo $salary_per_month;?></p>
							<p><b>งบในการผ่อน (บาท / เดือน) : </b><?php echo $installements;?></p>
							<p><b>วัตถุประสงค์ในการซื้ออสังหา ฯ : </b><?php echo $objective_property;?></p>
							<p><b>ประเภทของอสังหาที่สนใจ : </b><?php echo $type_property;?></p>
							<p><b>ความประสงค์จะรับข้อมูล : </b><?php echo $wr[0]." ช่วงเวลาที่สะดวกในการติดต่อ ". $wr[1];?></p>
						
						</div>
</div>