<?php

    session_unset();
    session_destroy();
    header("location: Admin_login.php");

?>