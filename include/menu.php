<?php
if($_SESSION['type'] == "sale"){
	saler();
}else if($_SESSION['type'] == "admin"){
	admin();
}if($_SESSION['type'] == "crm"){
	crm();
}if($_SESSION['type'] == "manager"){
	manager();
}


function saler(){
	echo "
		<ul class='nav' id='main-menu'>
			<li class='text-center'><img src='assets/img/find_user.png' class='user-image img-responsive'/></li>			
			<li><a class='menu'  href='index.php' id='home'><span class='glyphicon glyphicon-home'></span>&nbsp Home</a></li>
			<li><a class='menu'  href='index.php?modules=saler&file=lead' id='lead'><span class='glyphicon glyphicon-user'></span>&nbsp  Lead</a></li>
			<li><a class='menu' href='index.php?modules=saler&file=showing'><span class='glyphicon glyphicon-road'></span>&nbsp  Showing</a></li>
			<li><a class='menu'  href='index.php?modules=saler&file=offering'><span class='glyphicon glyphicon-share'></span>&nbsp  Offering</a></li>	
			<li><a class='menu' href='index.php?modules=saler&file=closing'><span class='glyphicon glyphicon-ok-circle'></span>&nbsp Closing</a></li>
			<li><a class='menu'  href=''><span class='glyphicon glyphicon-print'></span>&nbsp Report</a></li>					               	
			<li><a class='menu'  href='index.php?modules=user&file=edit_form_profile'><span class='glyphicon glyphicon-pencil'></span>&nbsp Edit Profile </a></li>				               	
		</ul> ";
}

function admin(){
	echo "
			<ul class='nav' id='main-menu'>
			<li class='text-center'><img src='assets/img/find_user.png' class='user-image img-responsive'/></li>
			<li><a href='index.php'><span class='glyphicon glyphicon-home'></span>&nbsp Home</a></li>
			<li><a  href='index.php?modules=admin&file=manage_user'><span class='glyphicon glyphicon-user'></span>&nbsp Manage User</a></li>
			<li><a  href='index.php?modules=admin&file=manage_document'><span class='glyphicon glyphicon-list-alt'></span>&nbsp Manage Document</a></li>
			<li><a  href='index.php?modules=admin&file=manage_deadline'><span class='glyphicon glyphicon-bookmark'></span>&nbsp Manage Deadline</a></li>
			<li><a  href=''><span class='glyphicon glyphicon-print'></span>&nbsp Report</a></li>					               	
			<li><a  href='index.php?modules=user&file=edit_form_profile'><span class='glyphicon glyphicon-pencil'></span>&nbsp Edit Profile </a></li>
			</ul>";
}

function crm(){
		echo "
			<ul class='nav' id='main-menu'>
			<li class='text-center'><img src='assets/img/find_user.png' class='user-image img-responsive'/></li>
			<li><a  href='index.php'><span class='glyphicon glyphicon-home'></span>&nbsp Home</a></li>
			<li><a  href='index.php?modules=crm&file=manage_crm'><span class='glyphicon glyphicon-user'></span>&nbsp CRM</a></li>
			<li><a  href=''><span class='glyphicon glyphicon-print'></span>&nbsp Report</a></li>					
			<li><a  href='index.php?modules=user&file=edit_form_profile'><span class='glyphicon glyphicon-pencil'></span>&nbsp Edit Profile </a></li>
			</ul>";
}

function manager(){
		echo "
			<ul class='nav' id='main-menu'>
			<li class='text-center'><img src='assets/img/find_user.png' class='user-image img-responsive'/></li>
			<li><a  href='index.php'><span class='glyphicon glyphicon-home'></span>&nbsp Home</a></li>
			<li><a  href='index.php?modules=manager&file=manage_project'><span class='glyphicon glyphicon-cog'></span>&nbsp Manage Project</a></li>				               	
			<li><a  href='index.php?modules=manager&file=manage_room'><span class='glyphicon glyphicon-lock'></span>&nbsp Manage Room </a></li>
			<li><a  href='index.php?modules=manager&file=manage_listing'><span class='glyphicon glyphicon-list-alt'></span>&nbsp Manage Listing </a></li>
			<li><a  href='#'><span class='glyphicon glyphicon-print'></span>&nbsp Report <span class='fa arrow'></span></a>
				<ul class='nav nav-second-level'>
	                            <li>
	                                <a href='index.php?modules=report&file=report_year'>รายงานยอดขายรายปี</a>
	                            </li>
	                            <li>
	                                <a href='index.php?modules=report&file=report_month'>รายงานยอดขายรายเดือน</a>
	                            </li>
	                            <li>
	                                <a href='index.php?modules=report&file=report_person'>รายงานยอดขายรายบุคคล</a>
	                            </li>
				</li>
				</ul>	
			<li><a  href='index.php?modules=user&file=edit_form_profile'><span class='glyphicon glyphicon-pencil'></span>&nbsp Edit Profile </a></li>
			</ul>";

}



?>
