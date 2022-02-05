<?php

    session_unset();
    session_destroy();
    header("location: login/student_login.php");

?>