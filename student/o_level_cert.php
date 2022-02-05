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
                                    <h4>Upload your WAEC result:</h4>
                                </div>
                                <div class="form-group"> 
                                    <label for="exampleInputFile"></label> 
                                    <input type="file" name="waec_img" id="exampleInputFile" required="required"> 
                                    <p class="help-block"></p>
                                </div> 
                                <div class="form-group"> 
                                    <label for="exampleInputEmail1">Document Description</label> 
                                    <input type="text" class="form-control" name="waec_des" id="exampleInputEmail1" placeholder="Description" required="required">
                                    <input type="hidden" name="waec_track" value="waec_des<?php echo $_SESSION['id']; ?>">
                                </div>
                                <button type="submit" name="waec_submit" class="btn btn-default " 
                                <?php
                                    $track = "waec_des".$_SESSION['id'];
                                    checkAcademicCred($track);
                                    checkAccepted($track);
                                     ?>>Submit</button>
                            </form>
                                <br>
                            <form method="POST" action="uploads.php" enctype="multipart/form-data">
                                <div class="form-title">
                                    <h4>Upload your NECO result :</h4>
                                </div>
                                <div class="form-group"> 
                                    <label for="exampleInputFile"></label> 
                                    <input type="file" name="neco_img" id="exampleInputFile" required="required"> 
                                    <p class="help-block"></p>
                                </div> 
                                <div class="form-group"> 
                                    <label for="exampleInputEmail1">Document Description</label> 
                                    <input type="text" class="form-control" name="neco_des" id="exampleInputEmail1" placeholder="Description" required="required">
                                    <input type="hidden" name="neco_track" value="neco_des<?php echo $_SESSION['id']; ?>">
                                </div>
                                <button type="submit" name="neco_submit" class="btn btn-default "
                                <?php
                                    $track = "neco_des".$_SESSION['id'];
                                    checkAcademicCred($track);
                                    checkAccepted($track); ?>>Submit</button>
                            </form>
                                <br>
                            <form method="POST" action="uploads.php" enctype="multipart/form-data">
                                <div class="form-title">
                                    <h4>Upload anyother o-level result :</h4>
                                </div>
                                <div class="form-group"> 
                                    <label for="exampleInputFile"></label> 
                                    <input type="file" name="o_level_img" id="exampleInputFile" required="required"> 
                                    <p class="help-block"></p>
                                </div> 
                                <div class="form-group"> 
                                    <label for="exampleInputEmail1">Document Description</label> 
                                    <input type="text" class="form-control" name="o_level_des" id="exampleInputEmail1" placeholder="Description" required="required">
                                    <input type="hidden" name="o_level_track" value="o_level_des<?php echo $_SESSION['id']; ?>">
                                </div> <br>
                                
                                <button type="submit" name="o_level_submit" class="btn btn-default "
                                <?php
                                    $track = "o_level_des".$_SESSION['id'];
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