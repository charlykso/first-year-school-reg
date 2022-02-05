
<?php
	// session_start();
	// include("../ict/inc/dbconnection.php");
	include('inc/head.php');
	include('../student/inc/dFunctions.php');
?>
<body class="cbp-spmenu-push">
	<div class="main-content">
		<!--left-fixed -navigation-->
		<?php
			include('inc/left_nav.php');
		?>
		<!--left-fixed -navigation-->
		<!-- header-starts -->
		<?php
			include('inc/top_nav.php');
		?>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
			<div class="row-one">
					<div class="col-md-4 widget">
						<div class="stats-left ">
							<h5>No of students in</h5>
							<h4>Chemistry</h4>
						</div>
						<div class="stats-right">
							<?php $department = "Chemistry"; ?>
							<label><?php getDeptCount($department); ?></label>
						</div>
						<div class="clearfix"> </div>	
					</div>
					<div class="col-md-4 widget states-mdl">
						<div class="stats-left">
							<h5>No of students in</h5>
							<h4>Comp Sc/Inf</h4>
						</div>
						<div class="stats-right">
							<?php $department = "Computer sci/Infor"; ?>
							<label> <?php getDeptCount($department); ?></label>
						</div>
						<div class="clearfix"> </div>	
					</div>
					<div class="col-md-4 widget states-last">
						<div class="stats-left">
							<h5>No of students in</h5>
							<h4>Geology</h4>
						</div>
						<div class="stats-right">
							<?php $department = "Geology"; ?>
							<label><?php getDeptCount($department); ?></label>
						</div>
						<div class="clearfix"> </div>	
					</div>
					<div class="clearfix"> </div>	
				</div><br>
				<div class="row-one">
					<div class="col-md-4 widget">
						<div class="stats-left ">
							<h5>No of students in</h5>
							<h4>Maths/Stat</h4>
						</div>
						<div class="stats-right">
							<?php $department = "Maths/Stat"; ?>
							<label> <?php getDeptCount($department); ?></label>
						</div>
						<div class="clearfix"> </div>	
					</div>
					<div class="col-md-4 widget states-mdl">
						<div class="stats-left">
							<h5>No of students in</h5>
							<h4>Phy/Geophy</h4>
						</div>
						<div class="stats-right">
							<?php $department = "Physics/Geophysics" ?>
							<label> <?php getDeptCount($department); ?></label>
						</div>
						<div class="clearfix"> </div>	
					</div>
					<div class="clearfix"> </div>	
				</div>

				<div class="row calender widget-shadow">
					<h4 class="title">Calender</h4>
					<div class="cal1">
						
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<!--footer-->
		<?php
			include('inc/footer.php');
		?>
        <!--//footer-->
	</div>
	<!-- Classie -->
	<?php
		include('inc/scripts.php');
	?>
</body>
</html>