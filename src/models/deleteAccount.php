<?php
    $uid = $_SESSION["id"];
    DB::deleteAccount($uid);
    session_unset();
    session_destroy();
    header("Location: ./src/auth/login.php");
?>