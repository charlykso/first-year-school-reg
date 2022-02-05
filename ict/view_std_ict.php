
<link rel="stylesheet" href="css/modal.css">
<?php
	include('inc/head.php');
	include('inc/myFunctions.php');
?>
<title>View</title>
<?php
    $fee_id = $_SESSION['fee_id'];
    // echo 
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
				<div class="forms">
					<h3 class="title1"></h3>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						
						<div class="form-body">
                                <div class="form-title">
                                <?php
                                    $id = $_SESSION['reg_id'];
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
                                ?>
                                    <h4><?php echo $first_name." ".$last_name ?>:</h4>
                                </div>
                                <br><br>
                                <div class="table-responsive">
									<table class="table table-bordered " id="view_fee_table">
										<thead>
											<tr>
												<th>S/N</th>
												<th>FEE IMAGE</th>
												<th>FEE DESCRIPTION</th>
												<th>UPLOAD TIME</th>
												<th>ACTION</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$i = 1;
												$department = "Computer Sci/Infor";
												$sql = "SELECT * FROM fees WHERE fee_track LIKE '%ict_fee%' AND id = '$fee_id'";
												$query = mysqli_query($conn, $sql);
												if ($query) {
													$num = mysqli_num_rows($query);
													if ($num) {
														while ($row = mysqli_fetch_assoc($query)) {
															$id = $row['reg_id'];
															echo "
																<tr style='text-align:center;'>
                                                                    <td>".$i."</td>";
                                                            ?>

                                                                    
																	<td>
                                                                    <img id='feeImg' data-toggle='modal' data-target='#myModal<?php echo $row['id']; ?>' alt='ICTFee<?php echo $id; ?>'  class="img img-thumbnail img-responsive" src="<?php echo $row['scanned_image']; ?>" width="200px" height="200px">
                                                                    </td>
											<!-- Image Modal -->
									<div class="modal fade" id="myModal<?php echo $row['id']; ?>" role="dialog">
										<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title"><?php echo $row['description']; ?></h4>
											</div>
											<div class="modal-body">
											<p><?php //echo $row['description']; ?></p>
											<img id='feeImg' alt='ICTFee<?php echo $row['id']; ?>'  class="img img-responsive" src="<?php echo $row['scanned_image']; ?>" width="" height="">
											</div>
											<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											</div>
										</div>
										</div>
									</div>
                                                            <?php
															echo "<td>".$row['description']."</td>
																	<td>".$row['upload_time']."</td>
																	<td>";
															?>
																		<form action="post_std_ict.php" method="post" enctype="multipart/form-data">
																			<input type='hidden' value="<?php echo $row['id']; ?>" name="fee_id">
																			<input type='hidden' value="<?php echo $row['reg_id']; ?>" name="reg_id">
																			<span class="fa fa-check"></span>
																			<input type="submit" name="submit_acpt" class="btn btn-success" value="Acpt">
																		</form>
																		<form action="post_std_ict.php" method="post" enctype="multipart/form-data">
																			<input type='hidden' value="<?php echo $row['id']; ?>" name="fee_id">
																			<input type='hidden' value="<?php echo $row['reg_id']; ?>" name="reg_id">
																			<span class="fa fa-trash-o"></span>
																			<input type="submit" name="submit_del" class="btn btn-danger" value="Delt">
																		</form>
																		
																			<input type='hidden' value="<?php echo $row['id']; ?>" name="fee_id">
																			<input type='hidden' value="<?php echo $row['reg_id']; ?>" name="reg_id">
																			<span class="fa fa-envelope"></span>
																			<input type="button"  class="btn btn-info" value="Msg" data-toggle="modal" data-target="#dModal<?php echo $row['id']; ?>">
																		
																	</td>
																</tr>
																<!-- Modal -->
																<div id="dModal<?php echo $row['id']; ?>" class=" modal fade"	role="dialog" aria-hidden="true">

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
																					<input type='hidden' value="<?php echo $row['reg_id']; ?>" name="reg_id">
																					<input type='hidden' value="<?php echo $row['id']; ?>" name="fee_id">

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
        <!-- The Modal -->
        <!-- <div id="myModal" class="modal"> -->

            <!-- The close button  -->
            <!-- <span class="close" data-dismiss="modal">&times;</span> -->

            <!-- Modal Content (The Image)  -->
            <!-- <img alt="" class="modal-content" id="img01"> -->

            <!-- Modal caption (Image text) -->
            <!-- <div id="caption"></div> -->

        <!-- </div> -->
        <!-- End of the Modal  -->
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
			$('#view_fee_table').DataTable();
		});
    </script>
    <script >
        //get the modal
        // var modal = document.getElementById("myModal");

        // //get the image and insert it inside the modal - use its "alt" text as a caption
        // var img = document.getElementById("feeImg");
        // var modalImg = document.getElementById("img01");
        // var captionText = document.getElementById("caption");
        // img.onclick = function(){
        //     modal.style.display = "block";
        //     modalImg.src = this.src;
        //     captionText.innerHTML = this.alt;
        // }

        // //get the <span> element that closes the modal
        // var span = document.getElementsByClassName("close")[0];

        // //when the user clicks on <span> (x), close the modal
        // span.onclick = function(){
        //     modal.style.display = "none";
        // }
    </script>
</body>
</html>