<?php
    include("inc/dbconnection.php");

    if (isset($_POST['submit_st'])) {
       
        $first_name = mysqli_escape_string($conn, trim($_POST['first_name']));
        $last_name = mysqli_escape_string($conn, trim($_POST['last_name']));
        $gender = mysqli_escape_string($conn, trim($_POST['gender']));
        $username = mysqli_escape_string($conn, trim($_POST['username']));
        $phone_no = mysqli_escape_string($conn, trim($_POST['phone_no']));
        $email = mysqli_escape_string($conn, trim($_POST['email']));
        $department = mysqli_escape_string($conn, trim($_POST['department']));
        $faculty = mysqli_escape_string($conn, trim($_POST['faculty']));
        $password = mysqli_escape_string($conn, trim($_POST['password']));
        $confirm_password = mysqli_escape_string($conn, trim($_POST['confirm_password']));
        $is_student = 1;

        if ($password === $confirm_password) {

            $validSql = "SELECT * FROM registration WHERE email = '$email'";
            $validQuery = mysqli_query($conn, $validSql);

            if ($validQuery) {

                $num = mysqli_num_rows($validQuery);

                if ($num > 0) {

                    session_start();
                    $_SESSION['err'] = "error";
                    $_SESSION['err_title'] = "Email already exist!...";
                    // $error = base64_encode("Email already exist!...");
                    $error = "Email already exist!...";
                    header('location: register.php?err='.$error);

                }else {

                    $validSql2 = "SELECT * FROM registration WHERE username = '$username'";
                    $validQuery2 = mysqli_query($conn, $validSql2);

                    if ($validQuery2) {

                        $num2 = mysqli_num_rows($validQuery2);

                        if ($num2 > 0) {

                            session_start();
                            $_SESSION['err'] = "error";
                            $_SESSION['err_title'] = "Username already exist!...";
                            // $error = base64_encode("Username already exist!...");
                            $error = "Username already exist!...";
                            header('location: register.php?err='.$error);
        
                        }else {
                            $encPassword = password_hash("$password", PASSWORD_DEFAULT);

                            $img_dir = 'profile_pics/';
                            $img_size = $_FILES['image']['size'];

                            if ($img_size < 100000000) {

                                $img_new_path = $img_dir.basename($_FILES['image']['name']);
                                $img_tmp_path = $_FILES['image']['tmp_name'];
                                move_uploaded_file($img_tmp_path, $img_new_path);

                                $sql = "INSERT INTO registration(first_name, last_name, phone_no, email, gender, username, password, is_student, department, faculty, profile_pic) VALUES('$first_name', '$last_name', '$phone_no', '$email', '$gender', '$username', '$encPassword', '$is_student', '$department', '$faculty', '$img_new_path')";

                                $query = mysqli_query($conn, $sql);
                    
                                if ($query) {
                                    session_start();
                                    $_SESSION['status'] = "success";
                                    $_SESSION['status_title'] = "Successful!...";
                                    $success = base64_encode("Successfully Registered...");
                                    header('location: register.php?succ='.$success);
                                }else {
                                    session_start();
                                    $_SESSION['err'] = "error";
                                    $_SESSION['err_title'] = "Something went wrong!...";
                                    // $error = base64_encode("Something went wrong!...");
                                    $error = "Something went wrong!...";
                                    header('location: register.php?err='.$error);
                                }

                            }else {
                                session_start();
                                $_SESSION['err'] = "error";
                                $_SESSION['err_title'] = "Image size is too large!...";
                                // $error = base64_encode("Image size is too large!...");
                                $error = "Image size is too large!...";
                                header('location: register.php?err='.$error);
                            }
                        }
                    }else {
                        session_start();
                        $_SESSION['err'] = "error";
                        $_SESSION['err_title'] = "Something went wrong!...";
                        // $error = base64_encode("Something went wrong!...");
                        $error = "Something went wrong!...";
                        header('location: register.php?err='.$error);
                    }


                    
                    
                }
            }else {
                session_start();
                $_SESSION['err'] = "error";
                $_SESSION['err_title'] = "Query Error!...";
                // $error = base64_encode("Query Error!...");
                $error = "Query Error!...";
                header('location: register.php?err='.$error);
            }
        }else{
            session_start();
            $_SESSION['err'] = "error";
            $_SESSION['err_title'] = "Password did not match!...";
            // $error = base64_encode("Password did not match!...");
            $error = "Password did not match!...";
            header('location: register.php?err='.$error);

        }


    } else {
        session_start();
        $_SESSION['err'] = "error";
        $_SESSION['err_title'] = "Request not submited!...";
        // $error = base64_encode("Request not submited!...");
        $error = "Request not submited!...";
        header('location: register.php?err='.$error);

    }
    // $fileName = $_FILES['image']['name'];
    // $fileTmpName = $_FILES['image']['tmp_name'];
    // $fileSize = $_FILES['image']['size'];
    // $fileError = $_FILES['image']['error'];
    // $fileType = $_FILES['image']['type'];
    // $fileExt = explode('.', $fileName);
    // $fileActualExt = strtolower(end($fileExt));
    // $fileNewName = uniqid('', true). "." .$fileActualExt;
    // $fileDestination = '../profilePic/' .$fileNewName;
    // move_uploaded_file($fileTmpName, $fileDestination);
    mysqli_close($conn);
?>

