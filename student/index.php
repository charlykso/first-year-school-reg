
<?php
	// session_start();
	include("../ict/inc/dbconnection.php");
	include('inc/head.php');
	if (!(isset($_SESSION['id']))) {
		header('location: ../login/student_login.php');
	}
	
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
				<div class="forms">
					
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
					<div class="form-title">
						<h4>PROGRESS</h4>
					</div>		
						<div class="form-body">
						<?php
							$sql2 = "SELECT * FROM accepted WHERE reg_id = '$reg_id' ";
							$query2 = mysqli_query($conn, $sql2);
							if ($query2) {
								$num = mysqli_num_rows($query2);
								if ($num > 0) {
									while ($row = mysqli_fetch_assoc($query2)) {
										// $message = $row['message'];
										$reg_id = $row['reg_id'];
										$track_file = $row['track_file'];
										// $sender = $row['sender'];

										switch ($track_file) {
											case 'ict_fee_des'.$reg_id:
												?>
												<h5>
													<i>Internet services payment </i>
													<i style="color: green; float:right;" class="fa fa-check-square-o" aria-hidden="true"></i>
												</h5>
												<?php
												break;
											case 'gst_fee_des'.$reg_id:
												?>
												<h5>
													<i>GST payment </i>
													<i style="color: green; float:right;" class="fa fa-check-square-o" aria-hidden="true"></i>
												</h5>
												<?php
												break;
											case 'idCard_fee_des'.$reg_id:
												?>
												<h5>
													<i>ID card payment </i>
													<i style="color: green; float:right;" class="fa fa-check-square-o" aria-hidden="true"></i>
												</h5>
												<?php
												break;
											case 'sug_fee_des'.$reg_id:
												?>
												<h5>
													<i>SUG fee </i>
													<i style="color: green; float:right;" class="fa fa-check-square-o" aria-hidden="true"></i>
												</h5>
												<?php
												break;
											case 'tShirt_fee_des'.$reg_id:
												?>
												<h5>
													<i>AE-FUNAI T-shirt payment </i>
													<i style="color: green; float:right;" class="fa fa-check-square-o" aria-hidden="true"></i>
												</h5>
												<?php
												break;
											case 'noteB_fee_des'.$reg_id:
												?>
												<h5>
													<i>AE-FUNAI notebook payment </i>
													<i style="color: green; float:right;" class="fa fa-check-square-o" aria-hidden="true"></i>
												</h5>
												<?php
												break;
											case 'sec_fee_des'.$reg_id:
												?>
												<h5>
													<i>AE-FUNAI Dev/security payment </i>
													<i style="color: green; float:right;" class="fa fa-check-square-o" aria-hidden="true"></i>
												</h5>
												<?php
												break;
											case 'sch_fee_des'.$reg_id:
												?>
												<h5>
													<i>School fees payment </i>
													<i style="color: green; float:right;" class="fa fa-check-square-o" aria-hidden="true"></i>
												</h5>
												<?php
												break;
											case 'fct_fee_des'.$reg_id:
												?>
												<h5>
													<i>Faculty fee payment </i>
													<i style="color: green; float:right;" class="fa fa-check-square-o" aria-hidden="true"></i>
												</h5>
												<?php
												break;
											case 'dept_fee_des'.$reg_id:
												?>
												<h5>
													<i>Departmental Fee payment </i>
													<i style="color: green; float:right;" class="fa fa-check-square-o" aria-hidden="true"></i>
												</h5>
												<?php
												break;
											case 'waec_des'.$reg_id:
												?>
												<h5>
													<i>WAEC result </i>
													<i style="color: green; float:right;" class="fa fa-check-square-o" aria-hidden="true"></i>
												</h5>
												<?php
												break;
											case 'neco_des'.$reg_id:
												?>
												<h5>
													<i>NECO result</i>
													<i style="color: green; float:right;" class="fa fa-check-square-o" aria-hidden="true"></i>
												</h5>
												<?php
												break;
											case 'o_level_des'.$reg_id:
												?>
												<h5>
													<i>Other o-level result </i>
													<i style="color: green; float:right;" class="fa fa-check-square-o" aria-hidden="true"></i>
												</h5>
												<?php
												break;
											case 'birth_cert_des'.$reg_id:
												?>
												<h5>
													<i>birth certificate/statutory declaration of age</i>
													<i style="color: green; float:right;" class="fa fa-check-square-o" aria-hidden="true"></i>
												</h5>
												<?php
												break;
											case 'local_gv_des'.$reg_id:
												?>
												<h5>
													<i>local government identification letter </i>
													<i style="color: green; float:right;" class="fa fa-check-square-o" aria-hidden="true"></i>
												</h5>
												<?php
												break;
											case 'letter_des'.$reg_id:
												?>
												<h5>
													<i>letter of attestation from parents/guardian </i>
													<i style="color: green; float:right;" class="fa fa-check-square-o" aria-hidden="true"></i>
												</h5>
												<?php
												break;
											case 'utme_des'.$reg_id:
												?>
												<h5>
													<i>UTME result printout </i>
													<i style="color: green;float:right;" class="fa fa-check-square-o" aria-hidden="true"></i>
												</h5>
												<?php
												break;
											case 'post_utme_des'.$reg_id:
												?>
												<h5>
													<i>POST-UTME result printout </i>
													<i style="color: green; float:right;" class="fa fa-check-square-o" aria-hidden="true"></i>
												</h5>
												<?php
												break;
											default:
												# code...
												break;
										}
										?>
							
										<?php
									}
								}else {
									?>
									
										<h4>Upload your documents to get going </h4>
									
									<?php
								}
								
							}
							?>
						</div>
					</div>
					
					
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