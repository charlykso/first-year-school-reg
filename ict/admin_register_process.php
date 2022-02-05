<?php

    include("inc/dbconnection.php");

    if (isset($_POST['submit_fac'])) {
       
        
        $username = mysqli_escape_string($conn, trim($_POST['username']));
        $phone_no = mysqli_escape_string($conn, trim($_POST['phone_no']));
        $email = mysqli_escape_string($conn, trim($_POST['email']));
        $faculty = mysqli_escape_string($conn, trim($_POST['faculty']));
        $password = mysqli_escape_string($conn, trim($_POST['password']));
        $confirm_password = mysqli_escape_string($conn, trim($_POST['confirm_password']));
        $is_faculty_staff = 1;

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
                    header('location: register_fac.php?err='.$error);

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
                            $error = "Username exist!...";
                            header('location: register_fac.php?err='.$error);
        
                        }else {
                            $encPassword = password_hash("$password", PASSWORD_DEFAULT);

                            $img_dir = 'profile_pics/';
                            $img_size = $_FILES['image']['size'];

                            if ($img_size < 100000000) {

                                $img_new_path = $img_dir.basename($_FILES['image']['name']);
                                $img_tmp_path = $_FILES['image']['tmp_name'];
                                move_uploaded_file($img_tmp_path, $img_new_path);

                                $sql = "INSERT INTO registration(phone_no, email, username, password, is_faculty_staff,  faculty, profile_pic) VALUES('$phone_no', '$email', '$username', '$encPassword', '$is_faculty_staff', '$faculty', '$img_new_path')";

                                $query = mysqli_query($conn, $sql);
                    
                                if ($query) {
                                    session_start();
                                    $_SESSION['reg_status'] = "success";
                                    $_SESSION['reg_status_title'] = "Successful!...";
                                    $success = base64_encode("Successfully Registered...");
                                    header('location: register_fac.php?succ='.$success);
                                }else {
                                    session_start();
                                    $_SESSION['err'] = "error";
                                    $_SESSION['err_title'] = "Something went wrong!...";
                                    // $error = base64_encode("Something went wrong!...");
                                    $error = "Something went wrong!...";
                                    header('location: register_fac.php?err='.$error);
                                }

                            }else {
                                session_start();
                                $_SESSION['err'] = "error";
                                $_SESSION['err_title'] = "Image size is too large!...";
                                // $error = base64_encode("Image size is too large!...");
                                $error = "Image size is too large!...";
                                header('location: register_fac.php?err='.$error);
                            }
                        }
                    }else {
                        session_start();
                        $_SESSION['err'] = "error";
                        $_SESSION['err_title'] = "Something went wrong!...";
                        // $error = base64_encode("Something went wrong!...");
                        $error = "Something went wrong!...";
                        header('location: register_fac.php?err='.$error);
                    }


                    
                    
                }
            }else {
                session_start();
                $_SESSION['err'] = "error";
                $_SESSION['err_title'] = "Query Error!...";
                // $error = base64_encode("Query Error!...");
                $error = "Query Error!...";
                header('location: register_fac.php?err='.$error);
            }
        }else{
            session_start();
            $_SESSION['err'] = "error";
            $_SESSION['err_title'] = "Password did not match!...";
            // $error = base64_encode("Password did not match!...");
            $error = "Password did not match!...";
            header('location: register_fac.php?err='.$error);

        }


    } else {
        session_start();
        $_SESSION['err'] = "error";
        $_SESSION['err_title'] = "Request method not post!...";
        // $error = base64_encode("Request method not post!...");
        $error = "Request method not post!...";
        header('location: register_fac.php?err='.$error);

    }

mysqli_close($conn);
?>