<?php
    include('inc/head.php');
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
							<form> 
                                <div class="form-title">
                                    <h4>Upload your birth certificate/statutory declaration of age:</h4>
                                </div>
                                <div class="form-group"> 
                                    <label for="exampleInputFile"></label> 
                                    <input type="file" id="exampleInputFile" required="required"> 
                                    <p class="help-block"></p>
                                </div> 
                                <div class="form-group"> 
                                    <label for="exampleInputEmail1">Document Description</label> 
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Description" required="required">
                                </div><br>
                                <div class="form-title">
                                    <h4>Upload your local government identification letter :</h4>
                                </div>
                                <div class="form-group"> 
                                    <label for="exampleInputFile"></label> 
                                    <input type="file" id="exampleInputFile" required="required"> 
                                    <p class="help-block"></p>
                                </div> 
                                <div class="form-group"> 
                                    <label for="exampleInputEmail1">Document Description</label> 
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Description" required="required">
                                </div><br>
                                <div class="form-title">
                                    <h4>Upload letter of attestation from parents/guardian :</h4>
                                </div>
                                <div class="form-group"> 
                                    <label for="exampleInputFile"></label> 
                                    <input type="file" id="exampleInputFile" required="required"> 
                                    <p class="help-block"></p>
                                </div> 
                                <div class="form-group"> 
                                    <label for="exampleInputEmail1">Document Description</label> 
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Description" required="required">
                                </div> <br>
                                
                                <button type="submit" class="btn btn-default form-control">Submit</button> 
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