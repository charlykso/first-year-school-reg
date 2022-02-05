
<?php
	include('inc/head.php');
?>
<?php
	session_start();
?>
<title>Register Student</title>
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
                <div class="form-three widget-shadow">
                    <div class=" panel-body-inputin">
                        <form class="form-horizontal" method="POST" action="register_process.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="col-md-2 control-label">First Name</label>
                                <div class="col-md-8">
                                    <div class="input-group">							
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                        <input type="text" class="form-control1" name="first_name" placeholder="First Name" >
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
                                        <input type="text" class="form-control1" name="last_name" placeholder="Last Name" >
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
                                        <input type="text" class="form-control1" name="phone_no" placeholder="Phone Number" >
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
                                        <input id="email" class="form-control1" type="email" name="email" placeholder="Email Address" >
                                    </div>
                                </div>
                                <div class="clearfix">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Gender</label>
                                <div class="col-md-8">
                                    <div class="input-group input-icon right">
                                        <span class="input-group-addon">
                                            <i class="fa fa-question-circle"></i>
                                        </span>
                                        <select id="selector1" class="form-control1" name="gender" required>
                                            <option value="" selected disabled>Select gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Faculty</label>
                                <div class="col-md-8">
                                    <div class="input-group input-icon right">
                                        <span class="input-group-addon">
                                            <i class="fa fa-building-o"></i>
                                        </span>
                                        <select id="selector1" class="form-control1" name="faculty" required>
                                            <option value="" selected disabled>Select Faculty</option>
                                            <option value="Physical Science">Physical Science</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Department</label>
                                <div class="col-md-8">
                                    <div class="input-group input-icon right">
                                        <span class="input-group-addon">
                                            <i class="fa fa-archive"></i>
                                        </span>
                                        <select id="selector1" class="form-control1" name="department" required>
                                            <option value="" selected disabled>Select Department</option>
                                            <option value="Chemistry">Chemistry</option>
                                            <option value="Computer Sci/Infor">Computer Sci/Infor</option>
                                            <option value="Geology">Geology</option>
                                            <option value="Maths/Stat">Maths/Stat</option>
                                            <option value="Physics/Geophysics">Physics/Geophysics</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Username</label>
                                <div class="col-md-8">
                                    <div class="input-group">							
                                        <span class="input-group-addon">
                                            <i class="fa fa-male"></i>
                                        </span>
                                        <input type="text" class="form-control1"  name="username" placeholder="Username" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Password</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-key"></i>
                                        </span>
                                        <input type="password" class="form-control1" name="password" id="exampleInputPassword1" placeholder="Password" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Confirm Password</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-key"></i>
                                        </span>
                                        <input type="password" class="form-control1" name="confirm_password" id="exampleInputPassword1" placeholder="COnfirm Password" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Profile Pic</label>
                                <div class="col-md-8">
                                    <div class="input-group">							
                                        <span class="input-group-addon">
                                            <i class="fa fa-camera"></i>
                                        </span>
                                        <input type="file" class="form-control1" name="image" >
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <button type="submit" name="submit_st" class="btn btn-success form-control" >Register</button>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </form>
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