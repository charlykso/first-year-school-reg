<?php 
	include_once('dFunctions.php');
	$reg_id = $_SESSION['id'];
?>
<!-- header-starts -->
<div class="sticky-header header-section ">
			<div class="header-left">
				<!--toggle button start-->
				<button id="showLeftPush"><i class="fa fa-bars"></i></button>
				<!--toggle button end-->
				<!--logo -->
				<div class="logo">
					<a href="index.html">
						<h1>STUDENTS</h1>
						<span>Registration</span>
					</a>
				</div>
				<!--//logo-->
				<!--search-box-->
				<div class="search-box">
					<form class="input">
						<input class="sb-search-input input__field--madoka" placeholder="Search..." type="search" id="input-31" />
						<label class="input__label" for="input-31">
							<svg class="graphic" width="100%" height="100%" viewBox="0 0 404 77" preserveAspectRatio="none">
								<path d="m0,0l404,0l0,77l-404,0l0,-77z"/>
							</svg>
						</label>
					</form>
				</div><!--//end-search-box-->
				<div class="clearfix"> </div>
			</div>
			<div class="header-right">
				<div class="profile_details_left"><!--notifications of menu start -->
					<ul class="nofitications-dropdown">
						<li class="dropdown head-dpdn">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-envelope">
							<?php
								$sql = "SELECT * FROM notification WHERE `reg_id` = '$reg_id' AND `is_read` = 0 ORDER BY `time_sent` DESC";
								$query = mysqli_query($conn, $sql);
									if ($query) {
										$count = mysqli_num_rows($query);
										if ($count > 0) {
											?>
							</i><span class="badge"><?php echo $count; ?></span></a>
							<ul class="dropdown-menu">
								<li>
									<div class="notification_header">
										<h3>You have <?php echo $count; ?> new messages</h3>
									</div>
								</li>
											<?php
											while ($row = mysqli_fetch_assoc($query)) {
												$sender = $row['sender'];
												$_SESSION['sender'] = $sender;
												?>
								<li>
									<a href="std_view_msg.php?id=<?php echo $row['id'];?>"  style="<?php 
									if ($row['is_read'] == 0) {
										echo 'font-weight:bold';
									}
									 ?>">
									<!-- <div class="user_img"><?//php getUserName($sender); ?></div> -->
									<div class="notification_desc">
										<p><?php echo $row['topic']; ?></p>
										<p><span><small><i><?php echo date('F,j, Y, gia', strtotime($row['time_sent'])); ?></i></small></span></p>
										</div>
									<div class="clearfix"></div>	
									</a>
								</li>
								<?php
											}
								?>
								<li>
									<div class="notification_bottom">
										<a href="std_view_msg.php">See all messages</a>
									</div> 
								</li>
							</ul>
						</li>
								
								<?php
										}else {
								?>
											</i><span class="badge">0</span></a>
											<ul class="dropdown-menu">
												<li>
													<div class="notification_header">
														<h3>You have 0 new messages</h3>
													</div>
												</li>
												<li>
													<a href="">
														<div class="notification_desc">
															<p>No message yet</p>
														</div>
														<div class="clearfix"></div>	
													</a>
												</li>
												<li>
													<div class="notification_bottom">
														<a href="std_view_msg.php">See all messages</a>
													</div> 
												</li>
											</ul>
										</li>
											
								<?php
										}
									}
								?>
						
					</ul>
					<div class="clearfix"> </div>
				</div>
				<!--notification menu end -->
				<div class="profile_details">
					<ul>
						<li class="dropdown profile_details_drop">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<div class="profile_img">	
									<span class="prfil-img"><img style="border-radius: 50%;" src="../ict/<?php echo $_SESSION['profile_pic'] ?>" alt="" width="60px" height="50px"> </span> 
									<div class="user-name">
										<p><?php echo strtoupper($_SESSION['first_name']); ?></p>
										<span><?php echo $_SESSION['last_name'];?></span>
									</div>
									<i class="fa fa-angle-down lnr"></i>
									<i class="fa fa-angle-up lnr"></i>
									<div class="clearfix"></div>	
								</div>	
							</a>
							<ul class="dropdown-menu drp-mnu">
								<li> <a href="#"><i class="fa fa-cog"></i>Settings</a></li> 
								<li> <a href="#"><i class="fa fa-user"></i>Profile</a></li> 
								<li> <a href="../logout.php"><i class="fa fa-sign-out"></i>Logout</a></li>
							</ul>
						</li>
					</ul>
				</div>
				<div class="clearfix"> </div>				
			</div>
			<div class="clearfix"> </div>	
		</div>
		<!-- //header-ends -->