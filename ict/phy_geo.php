<?php
	include('inc/head.php');
	include('inc/myFunctions.php');
?>
<title>Physics/Geophysic</title>
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
				<div class="forms">
					<h3 class="title1">Physics/Geophysics Department</h3>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						
						<div class="form-body">
                                <div class="form-title">
                                    <h4>List of those that have paid their ICT fee:</h4>
                                </div>
                                <br><br>
                                <div class="table-responsive">
									<table class="table table-bordered table-hover" id="phy_table">
										<thead>
											<tr>
												<th>S/N</th>
												<th>NAME</th>
												<th>FEE DESCRIPTION</th>
												<th>UPLOAD TIME</th>
												<th>VIEW</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$i = 1;
												$department = "Physics/Geophysics";
												$sql = "SELECT * FROM fees WHERE fee_track LIKE '%ict_fee%' AND department = '$department'";
												$query = mysqli_query($conn, $sql);
												if ($query) {
													$num = mysqli_num_rows($query);
													if ($num) {
														while ($row = mysqli_fetch_assoc($query)) {
															$id = $row['reg_id'];
															// $name = getUserName($id);
															$sql2 = "SELECT * FROM registration WHERE id = '$id'";
															$query2 = mysqli_query($conn, $sql2);
															$first_name = "";
															$last_name = "";
															if ($query2) {
																while ($row2 = mysqli_fetch_assoc($query2)) {
																	$first_name = $row2['first_name'];
																	$last_name = $row2['last_name'];
																}
															}

															echo "
																<tr>
																	<td>".$i."</td>
																	<td>".$first_name. " ".$last_name ."</td>
																	<td>".$row['description']."</td>
																	<td>".$row['upload_time']."</td>
																	<td>";
															?>
																		<form action="view_std_ict.php">
																			<input type='hidden' value="<?php echo $row['id']; ?>" name="fee_id">
																			<input type='hidden' value="<?php echo $row['reg_id']; ?>" name="reg_id">
																			<input type="submit" value="View">
																		</form>
																	</td>
																</tr>
															<?php



															$i++;
														}
														
													}
													
												}

											?>
										</tbody>
									</table>
								
								</div>
						</div>
                    </div>
				</div>
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
	<script >
		$(document).ready(function(){
			$('#phy_table').DataTable();
		});
	</script>
</body>
</html>