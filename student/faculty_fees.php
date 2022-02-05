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
                                    <h4>Upload your school fees remita printout:</h4>
                                </div>
                                <div class="form-group"> 
                                    <label for="exampleInputFile"></label> 
                                    <input type="file" class="school_fee_img" id="exampleInputFile" name="sch_fee_img" required="required" <?php
                                    $track = "sch_fee_des".$_SESSION['id'];
                                    checkFee($track);
                                    checkAccepted($track);?>> 
                                    <p class="help-block"></p>
                                </div> 
                                <div class="form-group"> 
                                    <label for="exampleInputEmail1">Fee Description</label> 
                                    <input type="text" class="sch_fee_des form-control" name="sch_fee_des" id="exampleInputEmail1" placeholder="Description" required="required" 
                                    <?php
                                    include('../ict/inc/dbconnection.php');
                                    checkFee($track);
                                    checkAccepted($track);?>>
                                    
                                    <input type="hidden" name="sch_fee_track" value="sch_fee_des<?php echo $_SESSION['id']; ?>" >
                                </div>
                                <button type="submit" name="sch_fee_submit" class="btn btn-default" 
                                <?php
                                    
                                    include('../ict/inc/dbconnection.php');
                                    checkFee($track);
                                    checkAccepted($track);?>>Submit</button>
                            </form>
                                <br><br>
                            <form method="POST" action="uploads.php" enctype="multipart/form-data">
                                <div class="form-title">
                                    <h4>Upload your faculty fee remita printout :</h4>
                                </div>
                                <div class="form-group"> 
                                    <label for="exampleInputFile"></label> 
                                    <input type="file" id="exampleInputFile" name="fct_fee_img" required="required"
                                    <?php
                                    $track = "fct_fee_des".$_SESSION['id'];
                                    include('../ict/inc/dbconnection.php');
                                    checkFee($track);
                                    checkAccepted($track); ?>>
                                    <input type="hidden" name="fct_fee_track" value="fct_fee_des<?php echo $_SESSION['id']; ?>" > 
                                    <p class="help-block"></p>
                                </div> 
                                <div class="form-group"> 
                                    <label for="exampleInputEmail1">Fee Description</label> 
                                    <input type="text" class="form-control" name="fct_fee_des" id="exampleInputEmail1" placeholder="Description" required="required" 
                                    <?php
                                    $track = "fct_fee_des".$_SESSION['id'];
                                    checkFee($track);
									checkAccepted($track); ?>>
                                </div>
                                <button type="submit" name="fct_fee_submit" class="btn btn-default"
                                <?php
                                    $track = "fct_fee_des".$_SESSION['id'];
                                    checkFee($track);
									checkAccepted($track); ?>>Submit</button>
                            </form>
                                <br><br>
                            <form method="POST" action="uploads.php" enctype="multipart/form-data">
                                <div class="form-title">
                                    <h4>Upload your departmental fee remita printout :</h4>
                                </div>
                                <div class="form-group"> 
                                    <label for="exampleInputFile"></label> 
                                    <input type="file" id="exampleInputFile" name="dept_fee_img" required="required"
                                    <?php
                                    $track = "dept_fee_des".$_SESSION['id'];
                                    checkFee($track);
									checkAccepted($track);?>> 
                                    <p class="help-block"></p>
                                </div> 
                                <div class="form-group"> 
                                    <label for="exampleInputEmail1">Fee Description</label> 
                                    <input type="text" class="form-control" name="dept_fee_des" id="exampleInputEmail1" placeholder="Description" required="required"
                                    <?php
                                    $track = "dept_fee_des".$_SESSION['id'];
                                    checkFee($track);
									checkAccepted($track); ?>>
                                    <input type="hidden" name="dept_fee_track" value="dept_fee_des<?php echo $_SESSION['id']; ?>" >
                                </div> <br>
                                
                                <button type="submit" name="dept_fee_submit" class="btn btn-default"
                                <?php
                                    $track = "dept_fee_des".$_SESSION['id'];
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
    
    <script>
        $(document).ready(function(){
            $('#sch_fees_submit').click(function() {
               
            })
        })
    </script>
</body>
</html>