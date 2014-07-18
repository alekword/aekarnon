<?php 
	session_start();
	include("include/connect.php");
	$modules = $_GET['modules'];
	$file = $_GET['file'];
	
	if($_SESSION['valid_user'] != "akearnon"){
		echo "<script>window.location = 'login.php';</script>";
	}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ระบบจัดการอสังหาริมทรัพย์</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    
    <!-- DATETIME PICKER-->
   <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
   <link href="css/bootstrap.min.css" rel="stylesheet" />


 
</head>
<body>
<div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html" style="font-size: 18px;">ระบบจัดการอสังหาริมทรัพย์</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"><?php include("include/top_menu.php"); ?><?php echo $_SESSION['fullname']; echo " (".$_SESSION['type'].")";?> &nbsp; <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
            <nav class="navbar-default navbar-side" role="navigation">
				<div class="sidebar-collapse">
				   <?php
						include("include/menu.php");
				   ?>
				</div>
			</nav>  
        <!-- /. NAV SIDE  -->
		
		
        <div id="page-wrapper" >
			<div id="page-inner">
				<div class="row">
						<div class="col-md-12">					
							<?php
								if($modules){
									include("modules/$modules/$file.php");
								}else{
									include("modules/index/index.php");
								}
							?>
						</div>
					 <hr/>
				</div>
			</div>
		</div>


    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
  
	
	<script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    



    <script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
                $('#datetimepicker1').datetimepicker({
                     
                 });
                $('#datetimepicker2').datetimepicker({
                    pickTime: false
                 });

                $('a.menu').click( function() {
                    $('a.menu').removeClass("active-menu");
                    $(this).addClass("active-menu");
                });
			});
		</script>
	    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
	
	<!-- SYSTEM MY SCRIPTS -->
    <script src="js/my_script.js"></script>
    


	
   
</body>
</html>
