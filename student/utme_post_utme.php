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
					<h3 class="title1">Academic credentials</h3>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						
						<div class="form-body">
							<form method="POST" action="uploads.php" enctype="multipart/form-data">
                                <div class="form-title">
                                    <h4>Upload your UTME result printout:</h4>
                                </div>
                                <div class="form-group"> 
                                    <label for="exampleInputFile"></label> 
                                    <input type="file" name="utme_img" id="exampleInputFile" required="required"> 
                                    <p class="help-block"></p>
                                </div> 
                                <div class="form-group"> 
                                    <label for="exampleInputEmail1">Document Description</label> 
                                    <input type="text" class="form-control" name="utme_des" id="exampleInputEmail1" placeholder="Description" required="required">
									<input type="hidden" name="utme_track" value="utme_des<?php echo $_SESSION['id']; ?>">
                                </div>
								<button type="submit" name="utme_submit" class="btn btn-default"
								<?php
                                    $track = "utme_des".$_SESSION['id'];
                                    checkAcademicCred($track);
                                    checkAccepted($track); ?>>Submit</button>
							</form>
								<br>
							<form method="POST" action="uploads.php">
                                <div class="form-title">
                                    <h4>Upload your POST-UTME result printout :</h4>
                                </div>
                                <div class="form-group"> 
                                    <label for="exampleInputFile"></label> 
                                    <input type="file" name="post_utme_img" id="exampleInputFile" required="required"> 
                                    <p class="help-block"></p>
                                </div> 
                                <div class="form-group"> 
                                    <label for="exampleInputEmail1">Document Description</label> 
                                    <input type="text" class="form-control" name="post_utme_des" id="exampleInputEmail1" placeholder="Description" required="required">
									<input type="hidden" name="post_utme_track" value="post_utme_des<?php echo $_SESSION['id']; ?>">
                                </div> <br>
                                
                                <button type="submit" name="post_utme_submit" class="btn btn-default"
								<?php
                                    $track = "post_utme_des".$_SESSION['id'];
                                    checkAcademicCred($track);
                                    checkAccepted($track); ?>>Submit</button> 
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