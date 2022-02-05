<?php
	include('inc/head.php');
	include('inc/myFunctions.php');
?>
<title>Generate Matric No</title>
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
					<h3 class="title1">Generate Matric No</h3>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						
						<div class="form-body">
                                <div class="form-title">
                                    <h4>:</h4>
                                </div>
                                <br><br>
                                <form class="form-horizontal" method="POST" action="get_data.php" >
                                    
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Email Address</label>
                                        <div class="col-md-8">
                                            <div class="input-group input-icon right">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-envelope-o"></i>
                                                </span>
                                                <input id="email" class="form-control1" type="email" name="email" placeholder="Email Address" required >
                                            </div>
                                        </div>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                            <button type="submit" name="get_data" class="btn btn-success form-control" >Get Data</button>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </form>
                                <form class="form-horizontal" method="POST" action="register_process.php" >
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">First Name</label>
                                        <div class="col-md-8">
                                            <div class="input-group">							
                                                <span class="input-group-addon">
                                                    <i class="fa fa-user"></i>
                                                </span>
                                                <input type="text" <?php if (isset($_SESSION['st_first_name'])) {
                                                    ?>
                                                    value="<?php echo $_SESSION['st_first_name']; ?>"
                                                    <?php
                                                } ?> class="form-control1" name="first_name" placeholder="First Name" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Last Name</label>
                                        <div class="col-md-8">
                                            <div class="input-group">							
                                                <span class="input-group-addon">
                                                    <i class="fa fa-user"></i>
                                                </span>
                                                <input type="text" <?php if (isset($_SESSION['st_last_name'])) {
                                                    ?>
                                                    value="<?php echo $_SESSION['st_last_name']; ?>"
                                                    <?php
                                                } ?> class="form-control1" name="last_name" placeholder="Last Name" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Phone</label>
                                        <div class="col-md-8">
                                            <div class="input-group">							
                                                <span class="input-group-addon">
                                                    <i class="fa fa-phone"></i>
                                                </span>
                                                <input type="text" <?php if (isset($_SESSION['st_phone_no'])) {
                                                    ?>
                                                    value="<?php echo $_SESSION['st_phone_no']; ?>"
                                                    <?php
                                                } ?> class="form-control1" name="phone_no" placeholder="Phone Number"  disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Email Address</label>
                                        <div class="col-md-8">
                                            <div class="input-group input-icon right">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-envelope-o"></i>
                                                </span>
                                                <input id="email" <?php if (isset($_SESSION['st_email'])) {
                                                    ?>
                                                    value="<?php echo $_SESSION['st_email']; ?>"
                                                    <?php
                                                } ?> class="form-control1" type="email" name="email" placeholder="Email Address" disabled>
                                            </div>
                                        </div>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Faculty</label>
                                        <div class="col-md-8">
                                            <div class="input-group input-icon right">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-building-o"></i>
                                                </span>
                                                <input id="faculty" <?php if (isset($_SESSION['st_faculty'])) {
                                                    ?>
                                                    value="<?php echo $_SESSION['st_faculty']; ?>"
                                                    <?php
                                                } ?> class="form-control1" type="text" name="faculty" placeholder="Faculty" disabled >
                                            </div>
                                        </div>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                            <button type="submit" name="submit_st" class="btn btn-success form-control" disabled><?php if (isset($_SESSION['st_reg_no'])) {
                                                    ?>
                                                    <?php echo $_SESSION['st_reg_no']; ?>
                                                    <?php
                                                } ?></button>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
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
	<script >
		$(document).ready(function(){
			$('#ict_table').DataTable();
		});
	</script>
    <?php unset($_SESSION['st_first_name'], $_SESSION['st_last_name'], $_SESSION['st_email'], $_SESSION['st_phone_no'], $_SESSION['st_faculty'], $_SESSION['st_reg_no']); ?>
</body>
</html>