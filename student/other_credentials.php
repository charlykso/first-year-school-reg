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
					<h3 class="title1">Other credentials</h3>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-body">
							<form method="POST" action="uploads.php" enctype="multipart/form-data"> 
                                <div class="form-title">
                                    <h4>Upload your birth certificate/statutory declaration of age:</h4>
                                </div>
                                <div class="form-group"> 
                                    <label for="exampleInputFile"></label> 
                                    <input type="file" name="birth_cer_img" id="exampleInputFile" required="required"> 
                                    <p class="help-block"></p>
                                </div> 
                                <div class="form-group"> 
                                    <label for="exampleInputEmail1">Document Description</label> 
                                    <input type="text" class="form-control" name="birth_cert_des" id="exampleInputEmail1" placeholder="Description" required="required">
                                    <input type="hidden" name="birth_cert_track" value="birth_cert_des<?php echo $_SESSION['id']; ?>">
                                </div>
                                <button type="submit" name="birth_cert_submit" class="btn btn-default" 
                                <?php
                                    $track = "birth_cert_des".$_SESSION['id'];
                                    checkOtherCreds($track);
                                    checkAccepted($track);
                                     ?>>Submit</button>
                            </form>
                                <br>
                            <form method="POST" action="uploads.php" enctype="multipart/form-data">
                                <div class="form-title">
                                    <h4>Upload your local government identification letter :</h4>
                                </div>
                                <div class="form-group"> 
                                    <label for="exampleInputFile"></label> 
                                    <input type="file" name="local_gv_img" id="exampleInputFile" required="required"> 
                                    <p class="help-block"></p>
                                </div> 
                                <div class="form-group"> 
                                    <label for="exampleInputEmail1">Document Description</label> 
                                    <input type="text" class="form-control" name="local_gv_des" id="exampleInputEmail1" placeholder="Description" required="required">
                                    <input type="hidden" name="local_gv_track" value="local_gv_des<?php echo $_SESSION['id']; ?>">
                                </div>
                                <button type="submit" name="local_gv_submit" class="btn btn-default" 
                                <?php
                                    $track = "local_gov_des".$_SESSION['id'];
                                    checkOtherCreds($track);
                                    checkAccepted($track); ?>>Submit</button>
                            </form>
                                <br>
                            <form method="POST" action="uploads.php" enctype="multipart/form-data">
                                <div class="form-title">
                                    <h4>Upload letter of attestation from parents/guardian :</h4>
                                </div>
                                <div class="form-group"> 
                                    <label for="exampleInputFile"></label> 
                                    <input type="file" name="letter_img" id="exampleInputFile" required="required"> 
                                    <p class="help-block"></p>
                                </div> 
                                <div class="form-group"> 
                                    <label for="exampleInputEmail1">Document Description</label> 
                                    <input type="text" class="form-control" name="letter_des" id="exampleInputEmail1" placeholder="Description" required="required">
                                    <input type="hidden" name="letter_track" value="letter_des<?php echo $_SESSION['id']; ?>">
                                </div> <br>
                                
                                <button type="submit" name="letter_submit" class="btn btn-default"
                                <?php
                                    $track = "letter_des".$_SESSION['id'];
                                    checkOtherCreds($track);
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