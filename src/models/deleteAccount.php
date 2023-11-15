<?php
    include_once './src/models/DB.php';
    $uid = $_SESSION["id"];
    DB::deleteAccount($uid);
    session_unset();
    session_destroy();
    header("Location: ./src/auth/login.php");
?>