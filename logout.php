<?php  
    session_start();

    session_destroy();
    unset($_SESSION['SESS_ROLE']);
    header("location: index.php");
    exit();


?>