<?php

    function getUserName($id){
        include('dbconnection.php');

        $sql = "SELECT * FROM registration WHERE id = '$id'";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            $num = mysqli_num_rows($query);
            if ($num > 0) {
                while ($row = mysqli_fetch_assoc($query)) {

                    echo($row['first_name'].' '.$row['last_name']);
                }
            }
            
        }
    }//ends getUserName function


    

?>