<?php
    include('inc/head.php');
    include('inc/dFunctions.php');
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
							<h4>Upload GST payment teller:</h4>
						</div>
						<div class="form-body">
							<form> 
                                <div class="form-group"> 
                                    <label for="exampleInputFile"></label> 
									<input type="file" id="exampleInputFile" required="required" name="gst_fee_img"
									<?php
                                    $track = "gst_fee_des".$_SESSION['id'];
                                    checkFee($track);
									checkAccepted($track); ?>> 
                                    <p class="help-block"></p>
                                </div> 
                                <div class="form-group"> 
                                    <label for="exampleInputEmail1">Fee Description</label> 
									<input type="text" name="gst_fee_des" class="form-control" id="exampleInputEmail1" placeholder="Description" required="required"
									<?php
                                    $track = "gst_fee_des".$_SESSION['id'];
                                    checkFee($track);
									checkAccepted($track); ?>>
									<input type="hidden" name="gst_fee_track" value="gst_fee_des<?php echo $_SESSION['id']; ?>">
                                </div> <br>
                                
								<button type="submit" name="gst_submit" class="btn btn-default"
								<?php
                                    $track = "gst_fee_des".$_SESSION['id'];
                                    checkFee($track);
									checkAccepted($track);?>>Submit</button> 
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