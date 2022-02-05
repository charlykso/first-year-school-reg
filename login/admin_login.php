<?php
	
	include("../ict/inc/dbconnection.php");
	session_start();
	// if (!(isset($_SESSION['id']))) {
	// 	header('location: ../login/student_login.php');
	// }
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-theme18.css">
</head>
<body>
    <div class="form-body without-side">
        <div class="website-logo">
            <a href="index.html">
                <div class="logo">
                    <img class="logo-size" src="images/logo-light.svg" alt="">
                </div>
            </a>
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <img src="images/graphic3.svg" alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Login to account</h3>
                        <p>Access to the most powerfull tool in the entire design and web industry.</p>
                        <form method="POST" action="login_process.php">
                            <input class="form-control" type="text" name="username" placeholder="Username" required>
                            <input class="form-control" type="password" name="password" placeholder="Password" required>
                            <div class="form-button">
                                <button id="submit" type="submit" name="ad_submit" class="ibtn">Login</button> <a href="forget18.html">Forget password?</a>
                            </div>
                        </form>
                        <div class="other-links">
                            <div class="text">Or login with</div>
                            <a href="#"><i class="fab fa-facebook-f"></i>Facebook</a><a href="#"><i class="fab fa-google"></i>Google</a><a href="#"><i class="fab fa-linkedin-in"></i>Linkedin</a>
                        </div>
                        <div class="page-links">
                            <!-- <a href="register18.html">Register new account</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<script src="../student/js/sweetalert.min.js"></script>
</body>

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

	}else {
		# code...
	}
   ?>

   <script>

   </script>

</html>