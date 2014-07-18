<?php
	
	/**** Image Logo ****/
	$project_logo = $_FILES['project_logo']['name'];
	$logo_temp = $_FILES['project_logo']['tmp_name'];
	if($project_logo){
		copy($logo_temp,"images/project/$project_logo");
	}
	/********************/

	/**** INSERT PROJECT ****/
	$sql = "INSERT INTO project VALUES ('','$_POST[project_installmonitor]','$_POST[project_electricity]','$_POST[project_tabwater]',
		'$_POST[project_name]','$project_logo','$_POST[project_owner]','$_POST[project_place]','$_POST[project_area]','$_POST[project_nature]',
		'$_POST[project_unit]','$_POST[project_facilitate]','$_POST[project_safty]','$_POST[project_typeroom]',$_POST[project_areaparking]','$_POST[project_centralcharges]','$_POST[project_coffers]')";
	//mysql_query($sql);	
	/************************/


	/**** Image Project ****/
	$project = "SELECT MAX(project_id) FROM project";
	list($project_id) = mysql_fetch_row(mysql_query($project));

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