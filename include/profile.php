<?php

session_start();

require_once 'include/db_connect.php';

//if (!isset($_SESSION['user']) || !check_cookie())
//    header('Location: index.php');
//
//function check_cookie() {
//    if (isset($_COOKIE['remember'])) {
//        $token = $_COOKIE['remember'];
//        $check_remember = mysqli_query($db_connect, "SELECT * FROM `users` WHERE `token` = '$token'");
//        return true;
//    }
//}
?>