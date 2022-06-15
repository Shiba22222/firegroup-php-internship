<?php
    include '../../connection.php';
    setcookie("user_name", $user['user_name'], time()-9999, "/","", 0);
    setcookie("user_id", $user['user_id'], time()-9999, "/","", 0);
    setcookie("user_email", $user['user_email'], time()-9999, "/","", 0);
    setcookie("role", $user['role'], time()-9999, "/","", 0);
    header("location: ../login.php")
?>