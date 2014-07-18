<?php
	$project_id = $_POST['project_id'];

	$project_logo = $_FILES['project_logo']['name'];
	$logo_temp = $_FILES['project_logo']['tmp_name'];
	if($project_logo){
		$update_logo = ", project_logo = '$project_logo'";
		copy($logo_temp,"images/project/$project_logo");
	}

	$sql = "UPDATE project SET project_installmonitor = '$_POST[project_installmonitor]',
	project_electricity = '$_POST[project_electricity]',
	project_tabwater = '$_POST[project_tabwater]',
	project_name = '$_POST[project_name]',
	project_owner = '$_POST[project_owner]',
	project_place = '$_POST[project_place]',
	project_area = '$_POST[project_area]',
	project_nature = '$_POST[project_nature]',
	project_unit = '$_POST[project_unit]',
	project_facilitate = '$_POST[project_facilitate]',
	project_safty = '$_POST[project_safty]',
	project_typeroom = '$_POST[project_typeroom]',
	project_areaparking = '$_POST[project_areaparking]',
	project_centralcharges = '$_POST[project_centralcharges]',
	project_coffers = '$_POST[project_coffers]' $update_logo WHERE project_id = '$project_id'";
	mysql_query($sql);


	/**** Image Project ****/	
	$project_images = $_FILES['project_images']['name'];
	$images_temp = $_FILES['project_images']['tmp_name'];
	
	if(strlen($project_images[0]) > 1){
		$images_sql = "INSERT INTO project_image VALUES ('$project_id','','$project_images[0]')";
		for($i = 1; $i < count($project_images); $i++){
			$images_sql .= ",('$project_id','','$project_images[$i]') ";			
			copy($images_temp[$i],"images/project/$project_images[$i]");
		}
		mysql_query($images_sql);
	}
	/********************/


	echo "<script>window.location = 'index.php?modules=manager&file=manage_project'</script>";
?>