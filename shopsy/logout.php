<?php
    session_start();
    unset($_SESSION["username"]);
    unset($_SESSION["user_code"]);
    header('location:index.php');
?>