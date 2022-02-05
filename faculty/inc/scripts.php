<script src="js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			

			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.js"> </script>
   <script src="dataTables/js/jquery.dataTables.min.js"></script>
   <script src="dataTables/js/dataTables.bootstrap.min.js"></script>
   <script src="js/sweetalert.min.js"></script>

   <?php
	if (isset($_SESSION['status'])) {
	?>
		<script>
			swal({
				title: "<?php echo$_SESSION['status_title']; ?>",
				text: "Successful",
				icon: "<?php echo $_SESSION['status'] ?>",
			});
			
		</script>
		
	<?php

		unset($_SESSION['status']);

	} elseif(isset($_SESSION['err'])) {
	?>
		<script>
			swal({
				title: "<?php echo $_SESSION['err_title']; ?>",
				text: "Error",
				icon: "<?php echo $_SESSION['err']; ?>",
			});
			
		</script>
	<?php

		unset($_SESSION['err']);

	}
   ?>

   <script>

   </script>