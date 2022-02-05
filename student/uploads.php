<?php
    include("../ict/inc/dbconnection.php");
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        //for ict
        if (isset($_POST['ict_fee_submit'])) {
            $ict_fee_des = mysqli_escape_string($conn, trim($_POST['ict_fee_des']));
            $ict_fee_track = mysqli_escape_string($conn, trim($_POST['ict_fee_track']));
            $department = $_SESSION['department'];
            $id = $_SESSION['id'];

            $allowed = array('jpg', 'jpeg', 'png');

            $fileName = $_FILES['ict_fee_img']['name'];
            $fileTmpName = $_FILES['ict_fee_img']['tmp_name'];
            $fileSize = $_FILES['ict_fee_img']['size'];
            $fileError = $_FILES['ict_fee_img']['error'];
            $fileType = $_FILES['ict_fee_img']['type'];
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $fileDir = "../feesImage/";
            // $fileNewPath = $fileDir.basename($_FILES['ict_fee_img']['name']);
            

            if (in_array($fileActualExt, $allowed)) {
                if ($fileError == 0) {
                    if ($fileSize < 1000000) {
                        $fileNewName = uniqid('', true). "." .$fileActualExt;
                        $fileNewPath = $fileDir.basename($fileNewName);
                        // $fileDestination = '../feesImage/' .$fileNewName;
                        move_uploaded_file($fileTmpName, $fileNewPath);

                        $sql = "INSERT INTO fees(description, scanned_image, reg_id, department, fee_track) VALUES('$ict_fee_des', '$fileNewPath', '$id', '$department', '$ict_fee_track')";

                        $query = mysqli_query($conn, $sql);

                        if ($query) {
                            $_SESSION['status'] = "success";
                            $_SESSION['status_title'] = "Upload Successful!...";
                            $success = base64_encode("Upload Successful...");
                            header('location: index.php?succ='.$success);
                        }else {
                            $_SESSION['err'] = "error";
                            $_SESSION['err_title'] = "Something went wrong in ict image!...";
                            // $error = base64_encode("Something went wrong!...");
                            $error = "Something went wrong!...";
                            header('location: ict_fees.php?err='.$error);
                        }
                        
                    }else {
                        $_SESSION['err'] = "error";
                        $_SESSION['err_title'] = "Image: $fileName too large!...";
                        // $error = base64_encode("Image size too large!...");
                        $error = "Image size too large!...";
                        header('location: ict_fees.php?err='.$error);
                    }
                }else {
                    $_SESSION['err'] = "error";
                    $_SESSION['err_title'] = "Image error!...";
                    // $error = base64_encode("Image error!...");
                    $error = "Image error!...";
                    header('location: ict_fees.php?err='.$error);
                }
            }else {
                $_SESSION['err'] = "error";
                $_SESSION['err_title'] = "Please upload an image!...";
                // $error = base64_encode("Please upload an image!...");
                $error = "Please upload an image!...";
                header('location: ict_fees.php?err='.$error);
            }    
            
        }//ends internet charges


        //for school fee
        if (isset($_POST['sch_fee_submit'])) {

            $sch_fee_des = mysqli_escape_string($conn, trim($_POST['sch_fee_des']));
            $sch_fee_track = mysqli_escape_string($conn, trim($_POST['sch_fee_track']));
            $department = $_SESSION['department'];
            $id = $_SESSION['id'];
            
            $allowed = array('jpg', 'jpeg', 'png');

            $fileName = $_FILES['sch_fee_img']['name'];
            $fileTmpName = $_FILES['sch_fee_img']['tmp_name'];
            $fileSize = $_FILES['sch_fee_img']['size'];
            $fileError = $_FILES['sch_fee_img']['error'];
            $fileType = $_FILES['sch_fee_img']['type'];
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $fileDir = "../feesImage/";
            // $fileNewPath = $fileDir.basename($_FILES['ict_fee_img']['name']);
            

            if (in_array($fileActualExt, $allowed)) {
                if ($fileError == 0) {
                    if ($fileSize < 1000000) {
                        $fileNewName = uniqid('', true). "." .$fileActualExt;
                        $fileNewPath = $fileDir.basename($fileNewName);
                        // $fileDestination = '../feesImage/' .$fileNewName;
                        move_uploaded_file($fileTmpName, $fileNewPath);

                        $sql = "INSERT INTO fees(description, scanned_image, reg_id, department, fee_track) VALUES('$sch_fee_des', '$fileNewPath', '$id', '$department', '$sch_fee_track')";

                        $query = mysqli_query($conn, $sql);

                        if ($query) {
                            $_SESSION['status'] = "success";
                            $_SESSION['status_title'] = "Upload Successful!...";
                            $success = base64_encode("Upload Successful...");
                            header('location: faculty_fees.php?succ='.$success);
                        }else {
                            $_SESSION['err'] = "error";
                            $_SESSION['err_title'] = "Something went wrong!...";
                            // $error = base64_encode("Something went wrong!...");
                            $error = "Something went wrong!...";
                            header('location: faculty_fees.php?err='.$error);
                        }
                        
                    }else {
                        $_SESSION['err'] = "error";
                        $_SESSION['err_title'] = "Image: $fileName too large!... ";
                        // $error = base64_encode("Image size too large!...");
                        $error = "Image size too large!...";
                        header('location: faculty_fees.php?err='.$error);
                    }
                }else {
                    $_SESSION['err'] = "error";
                    $_SESSION['err_title'] = "Image error!...";
                    // $error = base64_encode("Image error!...");
                    $error = "Image error!...";
                    header('location: faculty_fees.php?err='.$error);
                }
            }
            else {
                $_SESSION['err'] = "error";
                $_SESSION['err_title'] = "Please upload an image!...";
                // $error = base64_encode("Please upload an image!...");
                $error = "Please upload an image!...";
                header('location: faculty_fees.php?err='.$error);
            }
            
            
        }//ends school fee


         //for faculty fee
         if (isset($_POST['fct_fee_submit'])) {

            $fct_fee_des = mysqli_escape_string($conn, trim($_POST['fct_fee_des']));
            $fct_fee_track = mysqli_escape_string($conn, trim($_POST['fct_fee_track']));
            $department = $_SESSION['department'];
            $id = $_SESSION['id'];
            
            $allowed = array('jpg', 'jpeg', 'png');

            $fileName = $_FILES['fct_fee_img']['name'];
            $fileTmpName = $_FILES['fct_fee_img']['tmp_name'];
            $fileSize = $_FILES['fct_fee_img']['size'];
            $fileError = $_FILES['fct_fee_img']['error'];
            $fileType = $_FILES['fct_fee_img']['type'];
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $fileDir = "../feesImage/";
            // $fileNewPath = $fileDir.basename($_FILES['ict_fee_img']['name']);
            

            if (in_array($fileActualExt, $allowed)) {
                if ($fileError == 0) {
                    if ($fileSize < 1000000) {
                        $fileNewName = uniqid('', true). "." .$fileActualExt;
                        $fileNewPath = $fileDir.basename($fileNewName);
                        // $fileDestination = '../feesImage/' .$fileNewName;
                        move_uploaded_file($fileTmpName, $fileNewPath);

                        $sql = "INSERT INTO fees(description, scanned_image, reg_id, department, fee_track) VALUES('$fct_fee_des', '$fileNewPath', '$id', '$department', '$fct_fee_track')";

                        $query = mysqli_query($conn, $sql);

                        if ($query) {
                            $_SESSION['status'] = "success";
                            $_SESSION['status_title'] = "Upload Successful!...";
                            $success = base64_encode("Upload Successful...");
                            header('location: index.php?succ='.$success);
                        }else {
                            $_SESSION['err'] = "error";
                            $_SESSION['err_title'] = "Something went wrong!...";
                            // $error = base64_encode("Something went wrong!...");
                            $error = "Something went wrong!...";
                            header('location: faculty_fees.php?err='.$error);
                        }
                        
                    }else {
                        $_SESSION['err'] = "error";
                        $_SESSION['err_title'] = "Image: $fileName too large!... ";
                        // $error = base64_encode("Image size too large!...");
                        $error = "Image size too large!...";
                        header('location: faculty_fees.php?err='.$error);
                    }
                }else {
                    $_SESSION['err'] = "error";
                    $_SESSION['err_title'] = "Image error!...";
                    // $error = base64_encode("Image error!...");
                    $error = "Image error!...";
                    header('location: faculty_fees.php?err='.$error);
                }
            }else {
                $_SESSION['err'] = "error";
                $_SESSION['err_title'] = "Please upload an image!...";
                // $error = base64_encode("Please upload an image!...");
                $error = "Please upload an image!...";
                header('location: faculty_fees.php?err='.$error);
            }
            
            
        }//ends faculty fee


        //for departmental fee
        if (isset($_POST['dept_fee_submit'])) {

            $dept_fee_des = mysqli_escape_string($conn, trim($_POST['dept_fee_des']));
            $dept_fee_track = mysqli_escape_string($conn, trim($_POST['dept_fee_track']));
            $department = $_SESSION['department'];
            $id = $_SESSION['id'];
            
            $allowed = array('jpg', 'jpeg', 'png');

            $fileName = $_FILES['dept_fee_img']['name'];
            $fileTmpName = $_FILES['dept_fee_img']['tmp_name'];
            $fileSize = $_FILES['dept_fee_img']['size'];
            $fileError = $_FILES['dept_fee_img']['error'];
            $fileType = $_FILES['dept_fee_img']['type'];
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $fileDir = "../feesImage/";
            // $fileNewPath = $fileDir.basename($_FILES['ict_fee_img']['name']);
            

            if (in_array($fileActualExt, $allowed)) {
                if ($fileError == 0) {
                    if ($fileSize < 1000000) {
                        $fileNewName = uniqid('', true). "." .$fileActualExt;
                        $fileNewPath = $fileDir.basename($fileNewName);
                        // $fileDestination = '../feesImage/' .$fileNewName;
                        move_uploaded_file($fileTmpName, $fileNewPath);

                        $sql = "INSERT INTO fees(description, scanned_image, reg_id, department, fee_track) VALUES('$dept_fee_des', '$fileNewPath', '$id', '$department', '$dept_fee_track')";

                        $query = mysqli_query($conn, $sql);

                        if ($query) {
                            $_SESSION['status'] = "success";
                            $_SESSION['status_title'] = "Upload Successful!...";
                            $success = base64_encode("Upload Successful...");
                            header('location: index.php?succ='.$success);
                        }else {
                            $_SESSION['err'] = "error";
                            $_SESSION['err_title'] = "Something went wrong!...";
                            // $error = base64_encode("Something went wrong!...");
                            $error = "Something went wrong!...";
                            header('location: faculty_fees.php?err='.$error);
                        }
                        
                    }else {
                        $_SESSION['err'] = "error";
                        $_SESSION['err_title'] = "Image: $fileName too large!... ";
                        // $error = base64_encode("Image size too large!...");
                        $error = "Image size too large!...";
                        header('location: faculty_fees.php?err='.$error);
                    }
                }else {
                    $_SESSION['err'] = "error";
                    $_SESSION['err_title'] = "Image error!...";
                    // $error = base64_encode("Image error!...");
                    $error = "Image error!...";
                    header('location: faculty_fees.php?err='.$error);
                }
            }else {
                $_SESSION['err'] = "error";
                $_SESSION['err_title'] = "Please upload an image!...";
                // $error = base64_encode("Please upload an image!...");
                $error = "Please upload an image!...";
                header('location: faculty_fees.php?err='.$error);
            }
            
            
        }//ends departmental fee



        //for GST
        if (isset($_POST['gst_submit'])) {

            $gst_fee_des = mysqli_escape_string($conn, trim($_POST['gst_fee_des']));
            $gst_fee_track = mysqli_escape_string($conn, trim($_POST['gst_fee_track']));
            $department = $_SESSION['department'];
            $id = $_SESSION['id'];
            
            $allowed = array('jpg', 'jpeg', 'png');

            $fileName = $_FILES['gst_fee_img']['name'];
            $fileTmpName = $_FILES['gst_fee_img']['tmp_name'];
            $fileSize = $_FILES['gst_fee_img']['size'];
            $fileError = $_FILES['gst_fee_img']['error'];
            $fileType = $_FILES['gst_fee_img']['type'];
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $fileDir = "../feesImage/";
            // $fileNewPath = $fileDir.basename($_FILES['ict_fee_img']['name']);
            

            if (in_array($fileActualExt, $allowed)) {
                if ($fileError == 0) {
                    if ($fileSize < 1000000) {
                        $fileNewName = uniqid('', true). "." .$fileActualExt;
                        $fileNewPath = $fileDir.basename($fileNewName);
                        // $fileDestination = '../feesImage/' .$fileNewName;
                        move_uploaded_file($fileTmpName, $fileNewPath);

                        $sql = "INSERT INTO fees(description, scanned_image, reg_id, department, fee_track) VALUES('$gst_fee_des', '$fileNewPath', '$id', '$department', '$gst_fee_track')";

                        $query = mysqli_query($conn, $sql);

                        if ($query) {
                            $_SESSION['status'] = "success";
                            $_SESSION['status_title'] = "Upload Successful!...";
                            $success = base64_encode("Upload Successful...");
                            header('location: index.php?succ='.$success);
                        }else {
                            $_SESSION['err'] = "error";
                            $_SESSION['err_title'] = "Something went wrong!...";
                            // $error = base64_encode("Something went wrong!...");
                            $error = "Something went wrong!...";
                            header('location: gst_fees.php?err='.$error);
                        }
                        
                    }else {
                        $_SESSION['err'] = "error";
                        $_SESSION['err_title'] = "Image: $fileName too large!... ";
                        // $error = base64_encode("Image size too large!...");
                        $error = "Image size too large!...";
                        header('location: gst_fees.php?err='.$error);
                    }
                }else {
                    $_SESSION['err'] = "error";
                    $_SESSION['err_title'] = "Image error!...";
                    // $error = base64_encode("Image error!...");
                    $error = "Image error!...";
                    header('location: gst_fees.php?err='.$error);
                }
            }else {
                $_SESSION['err'] = "error";
                $_SESSION['err_title'] = "Please upload an image!...";
                // $error = base64_encode("Please upload an image!...");
                $error = "Please upload an image!...";
                header('location: gst_fees.php?err='.$error);
            }
            
            
        }//ends GST



        //for idCard
        if (isset($_POST['idCard_submit'])) {
            $idCard_fee_des = mysqli_escape_string($conn, trim($_POST['idCard_fee_des']));
            $idCard_fee_track = mysqli_escape_string($conn, trim($_POST['idCard_fee_track']));
            $department = $_SESSION['department'];
            $id = $_SESSION['id'];

            $allowed = array('jpg', 'jpeg', 'png');

            $fileName = $_FILES['idCard_img']['name'];
            $fileTmpName = $_FILES['idCard_img']['tmp_name'];
            $fileSize = $_FILES['idCard_img']['size'];
            $fileError = $_FILES['idCard_img']['error'];
            $fileType = $_FILES['idCard_img']['type'];
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $fileDir = "../feesImage/";
            // $fileNewPath = $fileDir.basename($_FILES['ict_fee_img']['name']);
            

            if (in_array($fileActualExt, $allowed)) {
                if ($fileError == 0) {
                    if ($fileSize < 1000000) {
                        $fileNewName = uniqid('', true). "." .$fileActualExt;
                        $fileNewPath = $fileDir.basename($fileNewName);
                        // $fileDestination = '../feesImage/' .$fileNewName;
                        move_uploaded_file($fileTmpName, $fileNewPath);

                        $sql = "INSERT INTO fees(description, scanned_image, reg_id, department, fee_track) VALUES('$idCard_fee_des', '$fileNewPath', '$id', '$department', '$idCard_fee_track')";

                        $query = mysqli_query($conn, $sql);

                        if ($query) {
                            $_SESSION['status'] = "success";
                            $_SESSION['status_title'] = "Upload Successful!...";
                            $success = base64_encode("Upload Successful...");
                            header('location: other_fees.php?succ='.$success);
                        }else {
                            $_SESSION['err'] = "error";
                            $_SESSION['err_title'] = "Something went wrong in ict image!...";
                            // $error = base64_encode("Something went wrong!...");
                            $error = "Something went wrong!...";
                            header('location: other_fees.php?err='.$error);
                        }
                        
                    }else {
                        $_SESSION['err'] = "error";
                        $_SESSION['err_title'] = "Image: $fileName too large!...";
                        // $error = base64_encode("Image size too large!...");
                        $error = "Image size too large!...";
                        header('location: other_fees.php?err='.$error);
                    }
                }else {
                    $_SESSION['err'] = "error";
                    $_SESSION['err_title'] = "Image error!...";
                    // $error = base64_encode("Image error!...");
                    $error = "Image error!...";
                    header('location: other_fees.php?err='.$error);
                }
            }else {
                $_SESSION['err'] = "error";
                $_SESSION['err_title'] = "Please upload an image!...";
                // $error = base64_encode("Please upload an image!...");
                $error = "Please upload an image!...";
                header('location: other_fees.php?err='.$error);
            }
            
            
        }//ends idCard


        //for sug fee
        if (isset($_POST['sug_fee_submit'])) {

            $sug_fee_des = mysqli_escape_string($conn, trim($_POST['sug_fee_des']));
            $sug_fee_track = mysqli_escape_string($conn, trim($_POST['sug_fee_track']));
            $department = $_SESSION['department'];
            $id = $_SESSION['id'];
            
            $allowed = array('jpg', 'jpeg', 'png');

            $fileName = $_FILES['sug_fee_img']['name'];
            $fileTmpName = $_FILES['sug_fee_img']['tmp_name'];
            $fileSize = $_FILES['sug_fee_img']['size'];
            $fileError = $_FILES['sug_fee_img']['error'];
            $fileType = $_FILES['sug_fee_img']['type'];
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $fileDir = "../feesImage/";
            // $fileNewPath = $fileDir.basename($_FILES['ict_fee_img']['name']);
            

            if (in_array($fileActualExt, $allowed)) {
                if ($fileError == 0) {
                    if ($fileSize < 1000000) {
                        $fileNewName = uniqid('', true). "." .$fileActualExt;
                        $fileNewPath = $fileDir.basename($fileNewName);
                        // $fileDestination = '../feesImage/' .$fileNewName;
                        move_uploaded_file($fileTmpName, $fileNewPath);

                        $sql = "INSERT INTO fees(description, scanned_image, reg_id, department, fee_track) VALUES('$sug_fee_des', '$fileNewPath', '$id', '$department', '$sug_fee_track')";

                        $query = mysqli_query($conn, $sql);

                        if ($query) {
                            $_SESSION['status'] = "success";
                            $_SESSION['status_title'] = "Upload Successful!...";
                            $success = base64_encode("Upload Successful...");
                            header('location: other_fees.php?succ='.$success);
                        }else {
                            $_SESSION['err'] = "error";
                            $_SESSION['err_title'] = "Something went wrong!...";
                            // $error = base64_encode("Something went wrong!...");
                            $error = "Something went wrong!...";
                            header('location: other_fees.php?err='.$error);
                        }
                        
                    }else {
                        $_SESSION['err'] = "error";
                        $_SESSION['err_title'] = "Image: $fileName too large!... ";
                        // $error = base64_encode("Image size too large!...");
                        $error = "Image size too large!...";
                        header('location: other_fees.php?err='.$error);
                    }
                }else {
                    $_SESSION['err'] = "error";
                    $_SESSION['err_title'] = "Image error!...";
                    // $error = base64_encode("Image error!...");
                    $error = "Image error!...";
                    header('location: other_fees.php?err='.$error);
                }
            }else {
                $_SESSION['err'] = "error";
                $_SESSION['err_title'] = "Please upload an image!...";
                // $error = base64_encode("Please upload an image!...");
                $error = "Please upload an image!...";
                header('location: other_fees.php?err='.$error);
            }
            
            
        }//ends sug fee


         //for tShirt fee
         if (isset($_POST['tShirt_submit'])) {

            $tShirt_fee_des = mysqli_escape_string($conn, trim($_POST['tShirt_fee_des']));
            $tShirt_fee_track = mysqli_escape_string($conn, trim($_POST['tShirt_fee_track']));
            $department = $_SESSION['department'];
            $id = $_SESSION['id'];
            
            $allowed = array('jpg', 'jpeg', 'png');

            $fileName = $_FILES['tShirt_fee_img']['name'];
            $fileTmpName = $_FILES['tShirt_fee_img']['tmp_name'];
            $fileSize = $_FILES['tShirt_fee_img']['size'];
            $fileError = $_FILES['tShirt_fee_img']['error'];
            $fileType = $_FILES['tShirt_fee_img']['type'];
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $fileDir = "../feesImage/";
            // $fileNewPath = $fileDir.basename($_FILES['ict_fee_img']['name']);
            

            if (in_array($fileActualExt, $allowed)) {
                if ($fileError == 0) {
                    if ($fileSize < 1000000) {
                        $fileNewName = uniqid('', true). "." .$fileActualExt;
                        $fileNewPath = $fileDir.basename($fileNewName);
                        // $fileDestination = '../feesImage/' .$fileNewName;
                        move_uploaded_file($fileTmpName, $fileNewPath);

                        $sql = "INSERT INTO fees(description, scanned_image, reg_id, department, fee_track) VALUES('$tShirt_fee_des', '$fileNewPath', '$id', '$department', '$tShirt_fee_track')";

                        $query = mysqli_query($conn, $sql);

                        if ($query) {
                            $_SESSION['status'] = "success";
                            $_SESSION['status_title'] = "Upload Successful!...";
                            $success = base64_encode("Upload Successful...");
                            header('location: other_fees.php?succ='.$success);
                        }else {
                            $_SESSION['err'] = "error";
                            $_SESSION['err_title'] = "Something went wrong!...";
                            // $error = base64_encode("Something went wrong!...");
                            $error = "Something went wrong!...";
                            header('location: other_fees.php?err='.$error);
                        }
                        
                    }else {
                        $_SESSION['err'] = "error";
                        $_SESSION['err_title'] = "Image: $fileName too large!... ";
                        // $error = base64_encode("Image size too large!...");
                        $error = "Image size too large!...";
                        header('location: other_fees.php?err='.$error);
                    }
                }else {
                    $_SESSION['err'] = "error";
                    $_SESSION['err_title'] = "Image error!...";
                    // $error = base64_encode("Image error!...");
                    $error = "Image error!...";
                    header('location: other_fees.php?err='.$error);
                }
            }else {
                $_SESSION['err'] = "error";
                $_SESSION['err_title'] = "Please upload an image!...";
                // $error = base64_encode("Please upload an image!...");
                $error = "Please upload an image!...";
                header('location: other_fees.php?err='.$error);
            }
            
            
        }//ends tShirt fee


        //for nootbook
        if (isset($_POST['nootB_submit'])) {

            $nootB_fee_des = mysqli_escape_string($conn, trim($_POST['nootB_fee_des']));
            $nootB_fee_track = mysqli_escape_string($conn, trim($_POST['nootB_fee_track']));
            $department = $_SESSION['department'];
            $id = $_SESSION['id'];
            
            $allowed = array('jpg', 'jpeg', 'png');

            $fileName = $_FILES['nootB_fee_img']['name'];
            $fileTmpName = $_FILES['nootB_fee_img']['tmp_name'];
            $fileSize = $_FILES['nootB_fee_img']['size'];
            $fileError = $_FILES['nootB_fee_img']['error'];
            $fileType = $_FILES['nootB_fee_img']['type'];
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $fileDir = "../feesImage/";
            // $fileNewPath = $fileDir.basename($_FILES['ict_fee_img']['name']);
            

            if (in_array($fileActualExt, $allowed)) {
                if ($fileError == 0) {
                    if ($fileSize < 1000000) {
                        $fileNewName = uniqid('', true). "." .$fileActualExt;
                        $fileNewPath = $fileDir.basename($fileNewName);
                        // $fileDestination = '../feesImage/' .$fileNewName;
                        move_uploaded_file($fileTmpName, $fileNewPath);

                        $sql = "INSERT INTO fees(description, scanned_image, reg_id, department, fee_track) VALUES('$nootB_fee_des', '$fileNewPath', '$id', '$department', '$nootB_fee_track')";

                        $query = mysqli_query($conn, $sql);

                        if ($query) {
                            $_SESSION['status'] = "success";
                            $_SESSION['status_title'] = "Upload Successful!...";
                            $success = base64_encode("Upload Successful...");
                            header('location: other_fees.php?succ='.$success);
                        }else {
                            $_SESSION['err'] = "error";
                            $_SESSION['err_title'] = "Something went wrong!...";
                            // $error = base64_encode("Something went wrong!...");
                            $error = "Something went wrong!...";
                            header('location: other_fees.php?err='.$error);
                        }
                        
                    }else {
                        $_SESSION['err'] = "error";
                        $_SESSION['err_title'] = "Image: $fileName too large!... ";
                        // $error = base64_encode("Image size too large!...");
                        $error = "Image size too large!...";
                        header('location: other_fees.php?err='.$error);
                    }
                }else {
                    $_SESSION['err'] = "error";
                    $_SESSION['err_title'] = "Image error!...";
                    // $error = base64_encode("Image error!...");
                    $error = "Image error!...";
                    header('location: other_fees.php?err='.$error);
                }
            }else {
                $_SESSION['err'] = "error";
                $_SESSION['err_title'] = "Please upload an image!...";
                // $error = base64_encode("Please upload an image!...");
                $error = "Please upload an image!...";
                header('location: other_fees.php?err='.$error);
            }
            
            
        }//ends nootB



        //for security fee
        if (isset($_POST['sec_submit'])) {

            $sec_fee_des = mysqli_escape_string($conn, trim($_POST['sec_fee_des']));
            $sec_fee_track = mysqli_escape_string($conn, trim($_POST['sec_fee_track']));
            $department = $_SESSION['department'];
            $id = $_SESSION['id'];
            
            $allowed = array('jpg', 'jpeg', 'png');

            $fileName = $_FILES['sec_fee_img']['name'];
            $fileTmpName = $_FILES['sec_fee_img']['tmp_name'];
            $fileSize = $_FILES['sec_fee_img']['size'];
            $fileError = $_FILES['sec_fee_img']['error'];
            $fileType = $_FILES['sec_fee_img']['type'];
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $fileDir = "../feesImage/";
            // $fileNewPath = $fileDir.basename($_FILES['ict_fee_img']['name']);
            

            if (in_array($fileActualExt, $allowed)) {
                if ($fileError == 0) {
                    if ($fileSize < 1000000) {
                        $fileNewName = uniqid('', true). "." .$fileActualExt;
                        $fileNewPath = $fileDir.basename($fileNewName);
                        // $fileDestination = '../feesImage/' .$fileNewName;
                        move_uploaded_file($fileTmpName, $fileNewPath);

                        $sql = "INSERT INTO fees(description, scanned_image, reg_id, department, fee_track) VALUES('$sec_fee_des', '$fileNewPath', '$id', '$department', '$sec_fee_track')";

                        $query = mysqli_query($conn, $sql);

                        if ($query) {
                            $_SESSION['status'] = "success";
                            $_SESSION['status_title'] = "Upload Successful!...";
                            $success = base64_encode("Upload Successful...");
                            header('location: index.php?succ='.$success);
                        }else {
                            $_SESSION['err'] = "error";
                            $_SESSION['err_title'] = "Something went wrong!...";
                            // $error = base64_encode("Something went wrong!...");
                            $error = "Something went wrong!...";
                            header('location: other_fees.php?err='.$error);
                        }
                        
                    }else {
                        $_SESSION['err'] = "error";
                        $_SESSION['err_title'] = "Image: $fileName too large!... ";
                        // $error = base64_encode("Image size too large!...");
                        $error = "Image size too large!...";
                        header('location: other_fees.php?err='.$error);
                    }
                }else {
                    $_SESSION['err'] = "error";
                    $_SESSION['err_title'] = "Image error!...";
                    // $error = base64_encode("Image error!...");
                    $error = "Image error!...";
                    header('location: other_fees.php?err='.$error);
                }
            }else {
                $_SESSION['err'] = "error";
                $_SESSION['err_title'] = "Please upload an image!...";
                // $error = base64_encode("Please upload an image!...");
                $error = "Please upload an image!...";
                header('location: other_fees.php?err='.$error);
            }
            
            
        }//ends security fee


        //for waec result upload
        if (isset($_POST['waec_submit'])) {

            $waec_des = mysqli_escape_string($conn, trim($_POST['waec_des']));
            $waec_track = mysqli_escape_string($conn, trim($_POST['waec_track']));
            $department = $_SESSION['department'];
            $id = $_SESSION['id'];
            
            $allowed = array('jpg', 'jpeg', 'png');

            $fileName = $_FILES['waec_img']['name'];
            $fileTmpName = $_FILES['waec_img']['tmp_name'];
            $fileSize = $_FILES['waec_img']['size'];
            $fileError = $_FILES['waec_img']['error'];
            $fileType = $_FILES['waec_img']['type'];
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $fileDir = "../cre_Image/";
            // $fileNewPath = $fileDir.basename($_FILES['ict_fee_img']['name']);
            

            if (in_array($fileActualExt, $allowed)) {
                if ($fileError == 0) {
                    if ($fileSize < 1000000) {
                        $fileNewName = uniqid('', true). "." .$fileActualExt;
                        $fileNewPath = $fileDir.basename($fileNewName);
                        // $fileDestination = '../feesImage/' .$fileNewName;
                        move_uploaded_file($fileTmpName, $fileNewPath);

                        $sql = "INSERT INTO academic_cred(description, scanned_image, reg_id, department, cred_track) VALUES('$waec_des', '$fileNewPath', '$id', '$department', '$waec_track')";

                        $query = mysqli_query($conn, $sql);

                        if ($query) {
                            $_SESSION['status'] = "success";
                            $_SESSION['status_title'] = "Upload Successful!...";
                            $success = base64_encode("Upload Successful...");
                            header('location: o_level_cert.php?succ='.$success);
                        }else {
                            $_SESSION['err'] = "error";
                            $_SESSION['err_title'] = "Something went wrong!...";
                            // $error = base64_encode("Something went wrong!...");
                            $error = "Something went wrong!...";
                            header('location: o_level_cert.php?err='.$error);
                        }
                        
                    }else {
                        $_SESSION['err'] = "error";
                        $_SESSION['err_title'] = "Image: $fileName too large!... ";
                        // $error = base64_encode("Image size too large!...");
                        $error = "Image size too large!...";
                        header('location: o_level_cert.php?err='.$error);
                    }
                }else {
                    $_SESSION['err'] = "error";
                    $_SESSION['err_title'] = "Image error!...";
                    // $error = base64_encode("Image error!...");
                    $error = "Image error!...";
                    header('location: o_level_cert.php?err='.$error);
                }
            }else {
                $_SESSION['err'] = "error";
                $_SESSION['err_title'] = "Please upload an image!...";
                // $error = base64_encode("Please upload an image!...");
                $error = "Please upload an image!...";
                header('location: o_level_cert.php?err='.$error);
            }
            
            
        }//ends waec result upload



        //for neco result upload
        if (isset($_POST['neco_submit'])) {

            $neco_des = mysqli_escape_string($conn, trim($_POST['neco_des']));
            $neco_track = mysqli_escape_string($conn, trim($_POST['neco_track']));
            $department = $_SESSION['department'];
            $id = $_SESSION['id'];
            
            $allowed = array('jpg', 'jpeg', 'png');

            $fileName = $_FILES['neco_img']['name'];
            $fileTmpName = $_FILES['neco_img']['tmp_name'];
            $fileSize = $_FILES['neco_img']['size'];
            $fileError = $_FILES['neco_img']['error'];
            $fileType = $_FILES['neco_img']['type'];
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $fileDir = "../cre_Image/";
            // $fileNewPath = $fileDir.basename($_FILES['ict_fee_img']['name']);
            

            if (in_array($fileActualExt, $allowed)) {
                if ($fileError == 0) {
                    if ($fileSize < 1000000) {
                        $fileNewName = uniqid('', true). "." .$fileActualExt;
                        $fileNewPath = $fileDir.basename($fileNewName);
                        // $fileDestination = '../feesImage/' .$fileNewName;
                        move_uploaded_file($fileTmpName, $fileNewPath);

                        $sql = "INSERT INTO academic_cred(description, scanned_image, reg_id, department, cred_track) VALUES('$neco_des', '$fileNewPath', '$id', '$department', '$neco_track')";

                        $query = mysqli_query($conn, $sql);

                        if ($query) {
                            $_SESSION['status'] = "success";
                            $_SESSION['status_title'] = "Upload Successful!...";
                            $success = base64_encode("Upload Successful...");
                            header('location: o_level_cert.php?succ='.$success);
                        }else {
                            $_SESSION['err'] = "error";
                            $_SESSION['err_title'] = "Something went wrong!...";
                            // $error = base64_encode("Something went wrong!...");
                            $error = "Something went wrong!...";
                            header('location: o_level_cert.php?err='.$error);
                        }
                        
                    }else {
                        $_SESSION['err'] = "error";
                        $_SESSION['err_title'] = "Image: $fileName too large!... ";
                        // $error = base64_encode("Image size too large!...");
                        $error = "Image size too large!...";
                        header('location: o_level_cert.php?err='.$error);
                    }
                }else {
                    $_SESSION['err'] = "error";
                    $_SESSION['err_title'] = "Image error!...";
                    // $error = base64_encode("Image error!...");
                    $error = "Image error!...";
                    header('location: o_level_cert.php?err='.$error);
                }
            }else {
                $_SESSION['err'] = "error";
                $_SESSION['err_title'] = "Please upload an image!...";
                // $error = base64_encode("Please upload an image!...");
                $error = "Please upload an image!...";
                header('location: o_level_cert.php?err='.$error);
            }
            
            
        }//ends neco result upload



        //for other o-level result
        if (isset($_POST['o_level_submit'])) {

            $o_level_des = mysqli_escape_string($conn, trim($_POST['o_level_des']));
            $o_level_track = mysqli_escape_string($conn, trim($_POST['o_level_track']));
            $department = $_SESSION['department'];
            $id = $_SESSION['id'];
            
            $allowed = array('jpg', 'jpeg', 'png');

            $fileName = $_FILES['o_level_img']['name'];
            $fileTmpName = $_FILES['o_level_img']['tmp_name'];
            $fileSize = $_FILES['o_level_img']['size'];
            $fileError = $_FILES['o_level_img']['error'];
            $fileType = $_FILES['o_level_img']['type'];
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $fileDir = "../cre_Image/";
            // $fileNewPath = $fileDir.basename($_FILES['ict_fee_img']['name']);
            

            if (in_array($fileActualExt, $allowed)) {
                if ($fileError == 0) {
                    if ($fileSize < 1000000) {
                        $fileNewName = uniqid('', true). "." .$fileActualExt;
                        $fileNewPath = $fileDir.basename($fileNewName);
                        // $fileDestination = '../feesImage/' .$fileNewName;
                        move_uploaded_file($fileTmpName, $fileNewPath);

                        $sql = "INSERT INTO academic_cred(description, scanned_image, reg_id, department, cred_track) VALUES('$o_level_des', '$fileNewPath', '$id', '$department', '$o_level_track')";

                        $query = mysqli_query($conn, $sql);

                        if ($query) {
                            $_SESSION['status'] = "success";
                            $_SESSION['status_title'] = "Upload Successful!...";
                            $success = base64_encode("Upload Successful...");
                            header('location: index.php?succ='.$success);
                        }else {
                            $_SESSION['err'] = "error";
                            $_SESSION['err_title'] = "Something went wrong!...";
                            // $error = base64_encode("Something went wrong!...");
                            $error = "Something went wrong!...";
                            header('location: o_level_cert.php?err='.$error);
                        }
                        
                    }else {
                        $_SESSION['err'] = "error";
                        $_SESSION['err_title'] = "Image: $fileName too large!... ";
                        // $error = base64_encode("Image size too large!...");
                        $error = "Image size too large!...";
                        header('location: o_level_cert.php?err='.$error);
                    }
                }else {
                    $_SESSION['err'] = "error";
                    $_SESSION['err_title'] = "Image error!...";
                    // $error = base64_encode("Image error!...");
                    $error = "Image error!...";
                    header('location: o_level_cert.php?err='.$error);
                }
            }else {
                $_SESSION['err'] = "error";
                $_SESSION['err_title'] = "Please upload an image!...";
                // $error = base64_encode("Please upload an image!...");
                $error = "Please upload an image!...";
                header('location: o_level_cert.php?err='.$error);
            }
            
            
        }//ends other o-level certificate


        //for utme result upload
        if (isset($_POST['utme_submit'])) {

            $utme_des = mysqli_escape_string($conn, trim($_POST['utme_des']));
            $utme_track = mysqli_escape_string($conn, trim($_POST['utme_track']));
            $department = $_SESSION['department'];
            $id = $_SESSION['id'];
            
            $allowed = array('jpg', 'jpeg', 'png');

            $fileName = $_FILES['utme_img']['name'];
            $fileTmpName = $_FILES['utme_img']['tmp_name'];
            $fileSize = $_FILES['utme_img']['size'];
            $fileError = $_FILES['utme_img']['error'];
            $fileType = $_FILES['utme_img']['type'];
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $fileDir = "../cre_Image/";
            // $fileNewPath = $fileDir.basename($_FILES['ict_fee_img']['name']);
            

            if (in_array($fileActualExt, $allowed)) {
                if ($fileError == 0) {
                    if ($fileSize < 1000000) {
                        $fileNewName = uniqid('', true). "." .$fileActualExt;
                        $fileNewPath = $fileDir.basename($fileNewName);
                        // $fileDestination = '../feesImage/' .$fileNewName;
                        move_uploaded_file($fileTmpName, $fileNewPath);

                        $sql = "INSERT INTO academic_cred(description, scanned_image, reg_id, department, cred_track) VALUES('$utme_des', '$fileNewPath', '$id', '$department', '$utme_track')";

                        $query = mysqli_query($conn, $sql);

                        if ($query) {
                            $_SESSION['status'] = "success";
                            $_SESSION['status_title'] = "Upload Successful!...";
                            $success = base64_encode("Upload Successful...");
                            header('location: utme_post_utme.php?succ='.$success);
                        }else {
                            $_SESSION['err'] = "error";
                            $_SESSION['err_title'] = "Something went wrong!...";
                            // $error = base64_encode("Something went wrong!...");
                            $error = "Something went wrong!...";
                            header('location: utme_post_utme.php?err='.$error);
                        }
                        
                    }else {
                        $_SESSION['err'] = "error";
                        $_SESSION['err_title'] = "Image: $fileName too large!... ";
                        // $error = base64_encode("Image size too large!...");
                        $error = "Image size too large!...";
                        header('location: utme_post_utme.php?err='.$error);
                    }
                }else {
                    $_SESSION['err'] = "error";
                    $_SESSION['err_title'] = "Image error!...";
                    // $error = base64_encode("Image error!...");
                    $error = "Image error!...";
                    header('location: utme_post_utme.php?err='.$error);
                }
            }else {
                $_SESSION['err'] = "error";
                $_SESSION['err_title'] = "Please upload an image!...";
                // $error = base64_encode("Please upload an image!...");
                $error = "Please upload an image!...";
                header('location: utme_post_utme.php?err='.$error);
            }
            
            
        }//ends utme result upload




        //for post utme result upload
        if (isset($_POST['post_utme_submit'])) {

            $post_utme_des = mysqli_escape_string($conn, trim($_POST['post_utme_des']));
            $post_utme_track = mysqli_escape_string($conn, trim($_POST['post_utme_track']));
            $department = $_SESSION['department'];
            $id = $_SESSION['id'];
            
            $allowed = array('jpg', 'jpeg', 'png');

            $fileName = $_FILES['post_utme_img']['name'];
            $fileTmpName = $_FILES['post_utme_img']['tmp_name'];
            $fileSize = $_FILES['post_utme_img']['size'];
            $fileError = $_FILES['post_utme_img']['error'];
            $fileType = $_FILES['post_utme_img']['type'];
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $fileDir = "../cre_Image/";
            // $fileNewPath = $fileDir.basename($_FILES['ict_fee_img']['name']);
            

            if (in_array($fileActualExt, $allowed)) {
                if ($fileError == 0) {
                    if ($fileSize < 1000000) {
                        $fileNewName = uniqid('', true). "." .$fileActualExt;
                        $fileNewPath = $fileDir.basename($fileNewName);
                        // $fileDestination = '../feesImage/' .$fileNewName;
                        move_uploaded_file($fileTmpName, $fileNewPath);

                        $sql = "INSERT INTO academic_cred(description, scanned_image, reg_id, department, cred_track) VALUES('$post_utme_des', '$fileNewPath', '$id', '$department', '$post_utme_track')";

                        $query = mysqli_query($conn, $sql);

                        if ($query) {
                            $_SESSION['status'] = "success";
                            $_SESSION['status_title'] = "Upload Successful!...";
                            $success = base64_encode("Upload Successful...");
                            header('location: index.php?succ='.$success);
                        }else {
                            $_SESSION['err'] = "error";
                            $_SESSION['err_title'] = "Something went wrong!...";
                            // $error = base64_encode("Something went wrong!...");
                            $error = "Something went wrong!...";
                            header('location: utme_post_utme.php?err='.$error);
                        }
                        
                    }else {
                        $_SESSION['err'] = "error";
                        $_SESSION['err_title'] = "Image: $fileName too large!... ";
                        // $error = base64_encode("Image size too large!...");
                        $error = "Image size too large!...";
                        header('location: utme_post_utme.php?err='.$error);
                    }
                }else {
                    $_SESSION['err'] = "error";
                    $_SESSION['err_title'] = "Image error!...";
                    // $error = base64_encode("Image error!...");
                    $error = "Image error!...";
                    header('location: utme_post_utme.php?err='.$error);
                }
            }else {
                $_SESSION['err'] = "error";
                $_SESSION['err_title'] = "Please upload an image!...";
                // $error = base64_encode("Please upload an image!...");
                $error = "Please upload an image!...";
                header('location: utme_post_utme.php?err='.$error);
            }
         
        }//ends post utme result upload


        //for birth certificate upload
        if (isset($_POST['birth_cert_submit'])) {

            $birth_cert_des = mysqli_escape_string($conn, trim($_POST['birth_cert_des']));
            $birth_cert_track = mysqli_escape_string($conn, trim($_POST['birth_cert_track']));
            $department = $_SESSION['department'];
            $id = $_SESSION['id'];
            
            $allowed = array('jpg', 'jpeg', 'png');

            $fileName = $_FILES['birth_cert_img']['name'];
            $fileTmpName = $_FILES['birth_cert_img']['tmp_name'];
            $fileSize = $_FILES['birth_cert_img']['size'];
            $fileError = $_FILES['birth_cert_img']['error'];
            $fileType = $_FILES['birth_cert_img']['type'];
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $fileDir = "../cre_Image/";
            // $fileNewPath = $fileDir.basename($_FILES['ict_fee_img']['name']);
            

            if (in_array($fileActualExt, $allowed)) {
                if ($fileError == 0) {
                    if ($fileSize < 1000000) {
                        $fileNewName = uniqid('', true). "." .$fileActualExt;
                        $fileNewPath = $fileDir.basename($fileNewName);
                        // $fileDestination = '../feesImage/' .$fileNewName;
                        move_uploaded_file($fileTmpName, $fileNewPath);

                        $sql = "INSERT INTO other_credentials(description, scanned_image, reg_id, department, cred_track) VALUES('$birth_cert_des', '$fileNewPath', '$id', '$department', '$birth_cert_track')";

                        $query = mysqli_query($conn, $sql);

                        if ($query) {
                            $_SESSION['status'] = "success";
                            $_SESSION['status_title'] = "Upload Successful!...";
                            $success = base64_encode("Upload Successful...");
                            header('location: other_credentials.php?succ='.$success);
                        }else {
                            $_SESSION['err'] = "error";
                            $_SESSION['err_title'] = "Something went wrong!...";
                            // $error = base64_encode("Something went wrong!...");
                            $error = "Something went wrong!...";
                            header('location: other_credentials.php?err='.$error);
                        }
                        
                    }else {
                        $_SESSION['err'] = "error";
                        $_SESSION['err_title'] = "Image: $fileName too large!... ";
                        // $error = base64_encode("Image size too large!...");
                        $error = "Image size too large!...";
                        header('location: other_credentials.php?err='.$error);
                    }
                }else {
                    $_SESSION['err'] = "error";
                    $_SESSION['err_title'] = "Image error!...";
                    // $error = base64_encode("Image error!...");
                    $error = "Image error!...";
                    header('location: other_credentials.php?err='.$error);
                }
            }else {
                $_SESSION['err'] = "error";
                $_SESSION['err_title'] = "Please upload an image!...";
                // $error = base64_encode("Please upload an image!...");
                $error = "Please upload an image!...";
                header('location: other_credentials.php?err='.$error);
            }
              
        }//ends birth certificate upload


        //for local government id upload
        if (isset($_POST['local_gv_submit'])) {

            $local_gv_des = mysqli_escape_string($conn, trim($_POST['local_gv_des']));
            $local_gv_track = mysqli_escape_string($conn, trim($_POST['local_gv_track']));
            $department = $_SESSION['department'];
            $id = $_SESSION['id'];
            
            $allowed = array('jpg', 'jpeg', 'png');

            $fileName = $_FILES['local_gv_img']['name'];
            $fileTmpName = $_FILES['local_gv_img']['tmp_name'];
            $fileSize = $_FILES['local_gv_img']['size'];
            $fileError = $_FILES['local_gv_img']['error'];
            $fileType = $_FILES['local_gv_img']['type'];
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $fileDir = "../cre_Image/";
            // $fileNewPath = $fileDir.basename($_FILES['ict_fee_img']['name']);
            

            if (in_array($fileActualExt, $allowed)) {
                if ($fileError == 0) {
                    if ($fileSize < 1000000) {
                        $fileNewName = uniqid('', true). "." .$fileActualExt;
                        $fileNewPath = $fileDir.basename($fileNewName);
                        // $fileDestination = '../feesImage/' .$fileNewName;
                        move_uploaded_file($fileTmpName, $fileNewPath);

                        $sql = "INSERT INTO other_credentials(description, scanned_image, reg_id, department, cred_track) VALUES('$local_gv_des', '$fileNewPath', '$id', '$department', '$local_gv_track')";

                        $query = mysqli_query($conn, $sql);

                        if ($query) {
                            $_SESSION['status'] = "success";
                            $_SESSION['status_title'] = "Upload Successful!...";
                            $success = base64_encode("Upload Successful...");
                            header('location: other_credentials.php?succ='.$success);
                        }else {
                            $_SESSION['err'] = "error";
                            $_SESSION['err_title'] = "Something went wrong!...";
                            // $error = base64_encode("Something went wrong!...");
                            $error = "Something went wrong!...";
                            header('location: other_credentials.php?err='.$error);
                        }
                        
                    }else {
                        $_SESSION['err'] = "error";
                        $_SESSION['err_title'] = "Image: $fileName too large!... ";
                        // $error = base64_encode("Image size too large!...");
                        $error = "Image size too large!...";
                        header('location: other_credentials.php?err='.$error);
                    }
                }else {
                    $_SESSION['err'] = "error";
                    $_SESSION['err_title'] = "Image error!...";
                    // $error = base64_encode("Image error!...");
                    $error = "Image error!...";
                    header('location: other_credentials.php?err='.$error);
                }
            }else {
                $_SESSION['err'] = "error";
                $_SESSION['err_title'] = "Please upload an image!...";
                // $error = base64_encode("Please upload an image!...");
                $error = "Please upload an image!...";
                header('location: other_credentials.php?err='.$error);
            }  
            
        }//ends local government id upload



        //for letter of atestation
        if (isset($_POST['letter_submit'])) {

            $letter_des = mysqli_escape_string($conn, trim($_POST['letter_des']));
            $letter_track = mysqli_escape_string($conn, trim($_POST['letter_track']));
            $department = $_SESSION['department'];
            $id = $_SESSION['id'];
            
            $allowed = array('jpg', 'jpeg', 'png');

            $fileName = $_FILES['letter_img']['name'];
            $fileTmpName = $_FILES['letter_img']['tmp_name'];
            $fileSize = $_FILES['letter_img']['size'];
            $fileError = $_FILES['letter_img']['error'];
            $fileType = $_FILES['letter_img']['type'];
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $fileDir = "../cre_Image/";
            // $fileNewPath = $fileDir.basename($_FILES['ict_fee_img']['name']);
            

            if (in_array($fileActualExt, $allowed)) {
                if ($fileError == 0) {
                    if ($fileSize < 1000000) {
                        $fileNewName = uniqid('', true). "." .$fileActualExt;
                        $fileNewPath = $fileDir.basename($fileNewName);
                        // $fileDestination = '../feesImage/' .$fileNewName;
                        move_uploaded_file($fileTmpName, $fileNewPath);

                        $sql = "INSERT INTO other_credentials(description, scanned_image, reg_id, department, cred_track) VALUES('$letter_des', '$fileNewPath', '$id', '$department', '$letter_track')";

                        $query = mysqli_query($conn, $sql);

                        if ($query) {
                            $_SESSION['status'] = "success";
                            $_SESSION['status_title'] = "Upload Successful!...";
                            $success = base64_encode("Upload Successful...");
                            header('location: index.php?succ='.$success);
                        }else {
                            $_SESSION['err'] = "error";
                            $_SESSION['err_title'] = "Something went wrong!...";
                            // $error = base64_encode("Something went wrong!...");
                            $error = "Something went wrong!...";
                            header('location: other_credentials.php?err='.$error);
                        }
                        
                    }else {
                        $_SESSION['err'] = "error";
                        $_SESSION['err_title'] = "Image: $fileName too large!... ";
                        // $error = base64_encode("Image size too large!...");
                        $error = "Image size too large!...";
                        header('location: other_credentials.php?err='.$error);
                    }
                }else {
                    $_SESSION['err'] = "error";
                    $_SESSION['err_title'] = "Image error!...";
                    // $error = base64_encode("Image error!...");
                    $error = "Image error!...";
                    header('location: other_credentials.php?err='.$error);
                }
            }else {
                $_SESSION['err'] = "error";
                $_SESSION['err_title'] = "Please upload an image!...";
                // $error = base64_encode("Please upload an image!...");
                $error = "Please upload an image!...";
                header('location: other_credentials.php?err='.$error);
            }  
            
        }//ends letter of atestation

        mysqli_close($conn);
    }
?>