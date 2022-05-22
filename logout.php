<?php 
    session_start();
    if (isset($_SESSION['key'])) {
        session_unset();
        header('location:login.php');
    }

?>