<?php
    include("inc/dbconnection.php");

    if (isset($_POST['get_data'])) {
        $email = mysqli_escape_string($conn, trim($_POST['email']));

        $sql = "SELECT * FROM registration WHERE email = '$email'";
        $query = mysqli_query($conn, $sql);
        if ($query) {
           $num = mysqli_num_rows($query);
           if ($num > 0) {
               while ($row = mysqli_fetch_assoc($query)) {
                   
                    $st_first_name = $row['first_name'];
                    $st_last_name = $row['last_name'];
                    $st_phone_no = $row['phone_no'];
                    $st_email = $row['email'];
                    $st_faculty = $row['faculty'];
                    $reg_id = $row['id'];
                    $reg_time = $row['reg_time'];
               }
               $number = rand(0000, 3000);
               $year = substr($reg_time, 0,4);
               $reg_no = "SC/".$year."/".$number;
            //    echo($reg_no);

               $sql3 = "SELECT * FROM matric_no WHERE reg_id = '$reg_id'";
               $query3 = mysqli_query($conn, $sql3);
               if ($query3) {
                   $num3 = mysqli_num_rows($query3);
                   if ($num3 > 0) {

                        session_start();
                        $_SESSION['err'] = "error";
                        $_SESSION['err_title'] = "Error. Already has a Matric No!...";
                        // $error = base64_encode("Error. Already has a Matric No!...");
                        $error = "Error. Already has a Matric No!...";
                        header('location: gen_reg_no.php?err='.$error);

                   }else {

                        $sql2 = "INSERT INTO matric_no (reg_id, reg_no) VALUES('$reg_id', '$reg_no')";
                        $query2 = mysqli_query($conn, $sql2);
                        if ($query2) {
                            session_start();
                            $_SESSION['st_first_name'] = $st_first_name;
                            $_SESSION['st_last_name'] = $st_last_name;
                            $_SESSION['st_phone_no'] = $st_phone_no;
                            $_SESSION['st_email'] = $st_email;
                            $_SESSION['st_faculty'] = $st_faculty;
                            $_SESSION['st_reg_no'] = $reg_no;
        
                            $_SESSION['status'] = "success";
                            $_SESSION['status_title'] = "Successful!..."."Your Matric No is ".$reg_no;
                            $success = base64_encode("Successfully generated...");
                            header('location: gen_reg_no.php?succ='.$success);
                        }else {
                            session_start();
                            $_SESSION['err'] = "error";
                            $_SESSION['err_title'] = "Query error 002!...";
                            // $error = base64_encode("Email already exist!...");
                            $error = "Query error 002!...";
                            header('location: gen_reg_no.php?err='.$error);
                        }
                   }
               }else {
                    session_start();
                    $_SESSION['err'] = "error";
                    $_SESSION['err_title'] = "Query error 003!...";
                    // $error = base64_encode("Email already exist!...");
                    $error = "Query error 003!...";
                    header('location: gen_reg_no.php?err='.$error);
                }

               
           }else {
                session_start();
                $_SESSION['err'] = "error";
                $_SESSION['err_title'] = "User does not exist!...";
                $error = base64_encode("User does not exist!...");
                // $error = "Email already exist!...";
                header('location: gen_reg_no.php?err='.$error);
           }
        }else {
            session_start();
            $_SESSION['err'] = "error";
            $_SESSION['err_title'] = "Query error 001!...";
            // $error = base64_encode("Query error 001!...");
            $error = "Query error 001!...";
            header('location: gen_reg_no.php?err='.$error);
        }
    }
?>