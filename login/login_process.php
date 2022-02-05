<?php
    include("../ict/inc/dbconnection.php");


    //for students
    if (isset($_POST['st_submit'])) {

        $username = mysqli_escape_string($conn, trim($_POST['username']));
        $password = mysqli_escape_string($conn, trim($_POST['password']));

        $sql1 = "SELECT * FROM registration WHERE username = '$username' ";
        $query1 = mysqli_query($conn, $sql1);
        if ($query1) {
            $num = mysqli_num_rows($query1);
            if ($num > 0) {
                while($row = mysqli_fetch_assoc($query1)){
                    $encrypt_password = $row['password'];
                    $first_name = $row['first_name'];
                    $last_name = $row['last_name'];
                    $profile_pic = $row['profile_pic'];
                    $department = $row['department'];
                    $is_student = $row['is_student'];
                    $id = $row['id'];
                }

                if (password_verify("$password", $encrypt_password) == 1) {
                    if ($is_student == 1) {
                        session_start();
                        $_SESSION['id'] = "$id";
                        $_SESSION['first_name'] = "$first_name";
                        $_SESSION['last_name'] = "$last_name";
                        $_SESSION['department'] = "$department";
                        $_SESSION['profile_pic'] = "$profile_pic";
                        $_SESSION['status'] = "success";
                        $_SESSION['status_title'] = "Welcome $username";
                        $success = base64_encode("Login Successfully ...");
                        header('location: ../student/index.php?succ='.$success);
                    }else {
                        session_start();
                        $_SESSION['err'] = "error";
                        $_SESSION['err_title'] = "Login failed!...";
                        // $error = base64_encode("Login failed!...");
                        $error = "Login failed!...";
                        header('location: student_login.php?err='.$error);
                    }
                    
                }else {
                    session_start();
                    $_SESSION['err'] = "error";
                    $_SESSION['err_title'] = "Incorrect Password!...";
                    // $error = base64_encode("Incorrect Password!...");
                    $error = "Incorrect Password!...";
                    header('location: student_login.php?err='.$error);
                }
            }else {
                session_start();
                $_SESSION['err'] = "error";
                $_SESSION['err_title'] = "User does not exist!...";
                // $error = base64_encode("User does not exist!...");
                $error = "User does not exist!...";
                header('location: student_login.php?err='.$error);
            }
            

            
        }else {
            session_start();
            $_SESSION['err'] = "error";
            $_SESSION['err_title'] = "Something went wrong!...";
            // $error = base64_encode("Something went wrong!...");
            $error = "Something went wrong!...";
            header('location: student_login.php?err='.$error);
        }

    }





    //for faculty_admins

    if (isset($_POST['ad_submit'])) {

        $username = mysqli_escape_string($conn, trim($_POST['username']));
        $password = mysqli_escape_string($conn, trim($_POST['password']));

        $sql1 = "SELECT * FROM registration WHERE username = '$username' ";
        $query1 = mysqli_query($conn, $sql1);
        if ($query1) {
            $num = mysqli_num_rows($query1);
            if ($num > 0) {
                while($row = mysqli_fetch_assoc($query1)){
                    $encrypt_password = $row['password'];
                    $is_faculty_staff = $row['is_faculty_staff'];
                    $id = $row['id'];
                    $is_ict = $row['is_ict'];
                }

                if (password_verify("$password", $encrypt_password) == 1) {
                    if ($is_faculty_staff == 1) {
                        session_start();
                        $_SESSION['id'] = $id;
                        $_SESSION['username'] = $username;
                        $_SESSION['status'] = "success";
                        $_SESSION['status_title'] = "Welcome $username";
                        $success = base64_encode("Login Successfully ...");
                        header('location: ../faculty/index.php?succ='.$success);
                    }elseif ($is_ict == 1) {
                        session_start();
                        $_SESSION['id'] = $id;
                        $_SESSION['status'] = "success";
                        $_SESSION['status_title'] = "Welcome $username";
                        $success = base64_encode("Login Successfully ...");
                        header('location: ../ict/index.php?succ='.$success);
                    }else {
                        session_start();
                        $_SESSION['err'] = "error";
                        $_SESSION['err_title'] = "Login failed!...";
                        // $error = base64_encode("Login failed!...");
                        $error = "Login failed!...";
                        header('location: admin_login.php?err='.$error);
                    }
                    
                }
            }else {
                session_start();
                $_SESSION['err'] = "error";
                $_SESSION['err_title'] = "User does not exist!...";
                // $error = base64_encode("User does not exist!...");
                $error = "User does not exist!...";
                header('location: admin_login.php?err='.$error);
            }
            

            
        }else {
            session_start();
            $_SESSION['err'] = "error";
            $_SESSION['err_title'] = "Something went wrong!...";
            // $error = base64_encode("Something went wrong!...");
            $error = "Something went wrong!...";
            header('location: admin_login.php?err='.$error);
        }  

    }


    mysqli_close($conn);
?>