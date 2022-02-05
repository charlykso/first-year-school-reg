<?php

	include('inc/head.php');
    
    $msg_id = $_GET['id'];
    // $sender = $_SESSION['sender'];

    $sql = "UPDATE notification SET `is_read` = 1 WHERE `id` = '$msg_id'";
    $query = mysqli_query($conn, $sql);
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
					<h3 class="title1">MESSAGES</h3>
                    <?php
                            $sql2 = "SELECT * FROM notification WHERE reg_id = '$reg_id' AND is_read = 1 ORDER BY time_sent DESC";
                            $query2 = mysqli_query($conn, $sql2);
                            if ($query2) {
								$num = mysqli_num_rows($query2);
								if ($num > 0) {
									while ($row = mysqli_fetch_assoc($query2)) {
										$message = $row['message'];
										$topic = $row['topic'];
										$time_sent = $row['time_sent'];
										$sender = $row['sender'];
										?>
							<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
								<div class="form-title">
									<h4>Message from <?php getUserName($sender); ?></h4>
								</div>
								<div class="form-body">
									<h4>
										TOPIC: <?php echo $topic; ?>
									</h4><br>
									<p>BODY: <?php echo $message; ?></p><br>
									<h5>TIME SENT:<i> <?php echo $time_sent; ?></i></h5>
								</div>
							</div>
										<?php
									}
								}else {
									?>
									<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
										<div class="form-title">
											<h4>You have no Message </h4>
										</div>
									</div>
									<?php
								}
                                
                            }
                         ?>
					
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