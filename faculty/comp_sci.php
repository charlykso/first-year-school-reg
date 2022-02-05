<?php
	include('inc/head.php');
	include('../ict/inc/myFunctions.php');
?>
<title>Comp Sci/Infor dept</title>
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
					<h3 class="title1">Computer Science/Informatics Department</h3>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						
						<div class="form-body">
                                <div class="form-title">
                                    <h4>Students List:</h4>
                                </div>
                                <br><br>
                                <div class="table-responsive">
									<table class="table table-bordered table-hover" id="ict_table">
										<thead>
											<tr>
												<th>S/N</th>
												<th>NAME</th>
												<th>REG_ID</th>
												<th>VIEW</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$i = 1;
												$department = "Computer Sci/Infor";
												
												$sql = "SELECT DISTINCT reg_id FROM fees WHERE department LIKE '%$department%'";
												$query = mysqli_query($conn, $sql);
												if ($query) {
													$num = mysqli_num_rows($query);
													if ($num) {
														while ($row = mysqli_fetch_assoc($query)) {
															$id = $row['reg_id'];
															

															echo "
																<tr>
																	<td>".$i."</td>";
																	?>
																	<td><?php getUserName($id); ?></td>
																	<?php echo "
																	<td>".$row['reg_id']."</td>
																	
																	<td>";
															?>
																		<form action="view_std.php">
																			
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
			$('#ict_table').DataTable();
		});
	</script>
</body>
</html>