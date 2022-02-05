<?php 

    include('../ict/inc/dbconnection.php');

    if (isset($_POST['submit_acpt'])) {
        $fee_id = $_POST['fee_id'];
        $reg_id = $_POST['reg_id'];

        $sql = "SELECT * FROM fees WHERE id = '$fee_id'";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            $num = mysqli_num_rows($query);
            if ($num > 0) {
                while ($row = mysqli_fetch_assoc($query)) {
                    $scanned_image = $row['scanned_image'];
                    $description = $row['description'];
                    $department = $row['department'];
                    $track_file = $row['fee_track'];
                    $reg_id = $row['reg_id'];
                    // $fee_id = $row['fee_id'];
                }

                $sql2 = "INSERT INTO accepted(reg_id, scanned_image, description, track_file, department) VALUES('$reg_id', '$scanned_image', '$description', '$track_file', '$department')";

                $query2 = mysqli_query($conn, $sql2);
                if ($query2) {
                    
                    $sql3 = "DELETE FROM fees WHERE id = '$fee_id'";
                    $query3 = mysqli_query($conn, $sql3);
                    if ($query3) {
                        session_start();
                        $_SESSION['status'] = "success";
                        $_SESSION['status_title'] = "Successful!...";
                        $success = base64_encode("Successful...");
                        header('location: index.php?succ='.$success);
                    }else {
                        session_start();
                        $_SESSION['err'] = "error";
                        $_SESSION['err_title'] = "Wrong query!...";
                        // $error = base64_encode("Wrong query!...");
                        $error = "Wrong query!...";
                        header('location: index.php?err='.$error);
                    }
                }else {
                    session_start();
                    $_SESSION['err'] = "error";
                    $_SESSION['err_title'] = "Bad query!...";
                    // $error = base64_encode("Bad query!...");
                    $error = "Bad query!...";
                    header('location: index.php?err='.$error);
                }
            }else {
                session_start();
                $_SESSION['err'] = "error";
                $_SESSION['err_title'] = "Not correct!...";
                // $error = base64_encode("Not correct!...");
                $error = "Not correct!...";
                header('location: index.php?err='.$error);
            }
        }else {
            session_start();
            $_SESSION['err'] = "error";
            $_SESSION['err_title'] = "Something went wrong!...";
            // $error = base64_encode("Something went wrong!...");
            $error = "Something went wrong!...";
            header('location: index.php?err='.$error);
        }
    }//ends accept


    //for delete button
    if (isset($_POST['submit_del'])) {
        $fee_id = $_POST['fee_id'];
        $reg_id = $_POST['reg_id'];

        $sql = "SELECT * FROM fees WHERE id = '$fee_id'";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            $num = mysqli_num_rows($query);
            if ($num > 0) {
                while ($row = mysqli_fetch_assoc($query)) {
                    $scanned_image = $row['scanned_image'];
                    $description = $row['description'];
                    $department = $row['department'];
                    $track_file = $row['fee_track'];
                    $reg_id = $row['reg_id'];
                    // $fee_id = $row['fee_id'];
                }

                $sql2 = "INSERT INTO rejected(reg_id, scanned_image, description, track_file, department) VALUES('$reg_id', '$scanned_image', '$description', '$track_file', '$department')";

                $query2 = mysqli_query($conn, $sql2);
                if ($query2) {
                    
                    $sql3 = "DELETE FROM fees WHERE id = '$fee_id'";
                    $query3 = mysqli_query($conn, $sql3);
                    if ($query3) {
                        session_start();
                        $_SESSION['status'] = "success";
                        $_SESSION['status_title'] = "Successfully deleted!...";
                        $success = base64_encode("Successfully deleted...");
                        header('location: index.php?succ='.$success);
                    }else {
                        session_start();
                        $_SESSION['err'] = "error";
                        $_SESSION['err_title'] = "Wrong query!...";
                        // $error = base64_encode("Wrong query!...");
                        $error = "Wrong query!...";
                        header('location: index.php?err='.$error);
                    }
                }else {
                    session_start();
                    $_SESSION['err'] = "error";
                    $_SESSION['err_title'] = "Bad query!...";
                    // $error = base64_encode("Bad query!...");
                    $error = "Bad query!...";
                    header('location: index.php?err='.$error);
                }
            }else {
                session_start();
                $_SESSION['err'] = "error";
                $_SESSION['err_title'] = "Not correct!...";
                // $error = base64_encode("Not correct!...");
                $error = "Not correct!...";
                header('location: index.php?err='.$error);
            }
        }else {
            session_start();
            $_SESSION['err'] = "error";
            $_SESSION['err_title'] = "Something went wrong!...";
            // $error = base64_encode("Something went wrong!...");
            $error = "Something went wrong!...";
            header('location: index.php?err='.$error);
        }
    }//ends deleting


    //for message
    if (isset($_POST['submit_msg'])) {
        $topic = mysqli_escape_string($conn, trim($_POST['topic']));
        $message = mysqli_escape_string($conn, trim($_POST['message']));
        $fee_id = $_POST['fee_id'];
        $reg_id = $_POST['reg_id'];

        $sql = "INSERT INTO notification(topic, message, reg_id, file_id) VALUES('$topic', '$message', '$reg_id', '$fee_id')";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            session_start();
            $_SESSION['status'] = "success";
            $_SESSION['status_title'] = "Notification Successfully sent!...";
            $success = base64_encode("Notification Successfully sent...");
            header('location: view_std_ict.php?succ='.$success);
        }
    }

    mysqli_close($conn);
?>