<?php
	include('inc/head.php');
	include('inc/myFunctions.php');
?>
<title>Message Student</title>
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
					<h3 class="title1">Student List</h3>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						
						<div class="form-body">
                                <div class="form-title">
                                    <h4>:</h4>
                                </div>
                                <br><br>
                                <div class="table-responsive">
									<table class="table table-bordered table-hover" id="ict_table">
										<thead>
											<tr>
												<th>S/N</th>
												<th>NAME</th>
												<th>DEPARTMENT</th>
												<th>REG NO</th>
												<th>ACTION</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$i = 1;
												// $department = "Computer Sci/Infor";
												$sql = "SELECT * FROM registration WHERE is_student = 1";
												$query = mysqli_query($conn, $sql);
												if ($query) {
													$num = mysqli_num_rows($query);
													if ($num) {
														while ($row = mysqli_fetch_assoc($query)) {
															$id = $row['id'];
                                                            $first_name = $row['first_name'];
															$last_name = $row['last_name'];
                                                            $department = $row['department'];
															

															$sql2 = "SELECT * FROM matric_no WHERE reg_id= '$id'";
															$query2 = mysqli_query($conn, $sql2);
															if ($query2) {
                                                                $num2 = mysqli_num_rows($query2);
                                                                if ($num2 > 0) {
                                                                    while ($row2 = mysqli_fetch_assoc($query2)) {
                                                                        $reg_no = $row2['reg_no'];
                                                                        
                                                                    }
                                                                   
                                                                }else {
                                                                    $reg_no = " ";
                                                                }
                                                                
																
															}else {
                                                                $reg_no = "error 102";
                                                            }

															echo "
																<tr>
																	<td>".$i."</td>
																	<td>".$first_name. " ".$last_name ."</td>
																	<td>".$department."</td>
																	<td>".$reg_no."</td>
																	<td>";
															?>
																		<input type='hidden' value="<?php echo $id; ?>" name="fee_id">
                                                                        <input type='hidden' value="<?php echo $row2['reg_no']; ?>" name="reg_no">
                                                                        
                                                                        <button class="btn btn-info" data-toggle="modal" data-target="#dModal<?php echo $id; ?>"><span class="fa fa-envelope"></span> Msg</button>
                                                                        
																	</td>
																</tr>
                                                                <!-- Modal -->
																<div id="dModal<?php echo $id; ?>" class=" modal fade"	role="dialog" aria-hidden="true">

                                                                    <div class="modal-dialog">

                                                                        <!-- Modal content -->
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                                                                                <h4 class="modal-title">Send Message to <?php getUserName($id); ?></h4>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form action="post_std_ict.php" method="post" class="form">
                                                                                    <div class="form-group">
                                                                                        <input type="text" class="form-control" name="topic" placeholder="Topic">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <textarea name="message" class="form-control" placeholder="Message"></textarea>
                                                                                    </div>
                                                                                    <input type='hidden' value="<?php echo $id; ?>" name="reg_id">
                                                                                    <input type='hidden' value="<?php echo $reg_no; ?>" name="reg_no">

                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                                        <input type="submit" name="submit_msg" class="btn btn-primary" value="Send">
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
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