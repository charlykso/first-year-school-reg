<?php

    function checkAccepted($fee_track){
        include('../ict/inc/dbconnection.php'); 
        $sql = "SELECT * FROM accepted WHERE track_file = '$fee_track'";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            $num = mysqli_num_rows($query);
            if ($num > 0) {
                echo 'disabled';
            }
        }
    }

    function checkFee($fee_track){
        include('../ict/inc/dbconnection.php'); 
        $sql = "SELECT * FROM fees WHERE fee_track = '$fee_track'";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            $num = mysqli_num_rows($query);
            if ($num > 0) {
                echo 'disabled';
            }
        }
    }

    function checkAcademicCred($cred_track){
        include('../ict/inc/dbconnection.php'); 
        $sql = "SELECT * FROM academic_cred WHERE cred_track = '$cred_track'";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            $num = mysqli_num_rows($query);
            if ($num > 0) {
                echo 'disabled';
            }
        }
    }

    function checkOtherCreds($cred_track){
        include('../ict/inc/dbconnection.php'); 
        $sql = "SELECT * FROM other_credentials WHERE cred_track = '$cred_track'";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            $num = mysqli_num_rows($query);
            if ($num > 0) {
                echo 'disabled';
            }
        }
    }

    function messageCount($reg_id){
        include('../ict/inc/dbconnection.php'); 
        $sql = "SELECT * FROM notification WHERE reg_id = '$reg_id' AND is_read = 0";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            $num = mysqli_num_rows($query);
            if ($num > 0) {
                echo $num;
            }
        }
    }


    function getUsername($sender){
        include('../ict/inc/dbconnection.php'); 
        $sql = "SELECT * FROM registration WHERE id = '$sender'";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            $num = mysqli_num_rows($query);
            if ($num > 0) {
                while ($row = mysqli_fetch_assoc($query)) {
                    $username = $row['username'];
                    echo (strtoupper($username));
                }
                
            }
        }
    }

    function getDeptCount($department){
        include('../ict/inc/dbconnection.php'); 
        $sql = "SELECT * FROM registration WHERE department LIKE '%$department%'";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            $count = mysqli_num_rows($query);
            echo $count;
        }
    }
?>