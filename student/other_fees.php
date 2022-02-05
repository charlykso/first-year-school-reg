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
						
						<div class="form-body">
							<form method="POST" action="uploads.php" enctype="multipart/form-data"> 
                                <div class="form-title">
                                    <h4>Upload your ID card payment remita printout:</h4>
                                </div>
                                <div class="form-group"> 
                                    <label for="exampleInputFile"></label> 
                                    <input type="file" id="exampleInputFile" name="idCard_img" required="required"> 
                                    <p class="help-block"></p>
                                </div> 
                                <div class="form-group"> 
                                    <label for="exampleInputEmail1">Fee Description</label> 
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Description" required="required">
                                    <input type="hidden" name="idCard_fee_track" value="idCard_fee_des<?php echo $_SESSION['id']; ?>">
                                </div>
                                <button type="submit" name="idCard_submit" class="btn btn-default"
                                <?php
									$track = "idCard_fee_des".$_SESSION['id'];
                                    checkFee($track);
									checkAccepted($track); ?>>Submit</button>
                            </form>
                            <br>
                            <form method="POST" action="uploads.php" enctype="multipart/form-data">
                                
                                <div class="form-title">
                                    <h4>Upload your SUG fee teller :</h4>
                                </div>
                                <div class="form-group"> 
                                    <label for="exampleInputFile"></label> 
                                    <input type="file" id="exampleInputFile" name="sug_fee_img" required="required"> 
                                    <p class="help-block"></p>
                                </div> 
                                <div class="form-group"> 
                                    <label for="exampleInputEmail1">Fee Description</label> 
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Description" required="required">
                                    <input type="hidden" name="sug_fee_track" value="sug_fee_des<?php echo $_SESSION['id']; ?>">
                                </div>
                                <button type="submit" name="sug_fee_submit" class="btn btn-default"
                                <?php
									$track = "sug_fee_des".$_SESSION['id'];
                                    checkFee($track);
									checkAccepted($track); ?>>Submit</button>
                            </form>
                                <br>
                            <form method="POST" action="uploads.php" enctype="multipart/form-data">
                                <div class="form-title">
                                    <h4>Upload your AE-FUNAI T-shirt remita printout :</h4>
                                </div>
                                <div class="form-group"> 
                                    <label for="exampleInputFile"></label> 
                                    <input type="file" id="exampleInputFile" name="tShirt_fee_img" required="required"> 
                                    <p class="help-block"></p>
                                </div> 
                                <div class="form-group"> 
                                    <label for="exampleInputEmail1">Fee Description</label> 
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Description" required="required">
                                    <input type="hidden" name="tShirt_fee_track" value="tShirt_fee_des<?php echo $_SESSION['id']; ?>">
                                </div>
                                <button type="submit" name="tShirt_submit" class="btn btn-default"
                                <?php
									$track = "tShirt_fee_des".$_SESSION['id'];
                                    checkFee($track);
									checkAccepted($track);?>>Submit</button>
                            </form>
                            <br>
                            <form method="POST" action="uploads.php" enctype="multipart/form-data">
                            
                                <div class="form-title">
                                    <h4>Upload your AE-FUNAI notebook payment teller :</h4>
                                </div>
                                <div class="form-group"> 
                                    <label for="exampleInputFile"></label> 
                                    <input type="file" id="exampleInputFile" name="noteB_fee_img" required="required"> 
                                    <p class="help-block"></p>
                                </div> 
                                <div class="form-group"> 
                                    <label for="exampleInputEmail1">Fee Description</label> 
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Description" required="required">
                                    <input type="hidden" name="noteB_fee_track" value="noteB_fee_des<?php echo $_SESSION['id']; ?>">
                                </div> 
                                <button type="submit" name="noteB_submit" class="btn btn-default"
                                <?php
									$track = "noteB_fee_des".$_SESSION['id'];
                                    checkFee($track);
									checkAccepted($track); ?>>Submit</button>
                            </form>
                                <br>
                            <form method="POST" action="uploads.php" enctype="multipart/form-data">
                                <div class="form-title">
                                    <h4>Upload your AE-FUNAI Dev/security payment teller :</h4>
                                </div>
                                <div class="form-group"> 
                                    <label for="exampleInputFile"></label> 
                                    <input type="file" id="exampleInputFile" name="sec_fee_img" required="required"> 
                                    <p class="help-block"></p>
                                </div> 
                                <div class="form-group"> 
                                    <label for="exampleInputEmail1">Fee Description</label> 
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Description" required="required">
                                    <input type="hidden" name="sec_fee_track" value="sec_fee_des<?php echo $_SESSION['id']; ?>">
                                </div> <br>
                                
                                <button type="submit" name="sec_submit" class="btn btn-default"
                                <?php
									$track = "sec_fee_des".$_SESSION['id'];
                                    checkFee($track);
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