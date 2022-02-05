<?php

	include('inc/head.php');
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
					<h3 class="title1">Payments</h3>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>Upload Internet services payment teller:</h4>
						</div>
						<div class="form-body">
							<form method="POST" action="uploads.php" enctype="multipart/form-data"> 
                                <div class="form-group"> 
                                    <label for="exampleInputFile"></label> 
									<input type="file" id="exampleInputFile" required="required" name="ict_fee_img"
									<?php
									$track = "ict_fee_des".$_SESSION['id'];
									checkFee($track);
									checkAccepted($track);
                                     ?>>
                                    <p class="help-block"></p>
                                </div> 
                                <div class="form-group"> 
                                    <label for="exampleInputEmail1">Fee Description</label> 
									<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Description" required="required" name="ict_fee_des"
									<?php
									$track = "ict_fee_des".$_SESSION['id'];
									checkFee($track);
									checkAccepted($track);
                                     ?>>
									<input type="hidden" name="ict_fee_track" value="ict_fee_des<?php echo $_SESSION['id']; ?>">
                                </div> <br>
                                
								<button type="submit" name="ict_fee_submit" class="btn btn-default"
								<?php
									$track = "ict_fee_des".$_SESSION['id'];
									checkFee($track);
									checkAccepted($track);
                                    ?>>Submit</button> 
                            </form> 
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
</body>
</html>