<?php
    $hostName = 'localhost';
    $userName = 'root';
    $passWord = '';
    $databaseName = 'ecommerce';

    $connect = mysqli_connect($hostName, $userName, $passWord, $databaseName);
    if (mysqli_connect_errno()){
        $response = "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $db_select = mysqli_select_db($connect, $databaseName);
    if (!$connect){
        die('Không thể kết nối: ' . mysqli_error($connect));
        exit();
    }
?>
