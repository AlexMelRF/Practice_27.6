<?php

session_start();

require_once 'db_connect.php';

function warn($msg) {
    $_SESSION['message'] = $msg;
    header('Location: ../index.php?url=signin');
}
if ($_POST['token'] == $_SESSION['CSRF']) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $remember = $_POST['remember'] ?? null;
    $check_user = mysqli_query($db_connect, "SELECT * FROM `users` WHERE `login` = '$login'");
    // var $user contents array with data from sql query                 
    $user = mysqli_fetch_assoc($check_user);
    if (mysqli_num_rows($check_user) > 0) {
        $pass = password_verify($password, $user['password']);
        if ($pass) {
            if ($remember) { 
                $token = random_bytes(16);
                mysqli_query($db_connect, "UPDATE `users` SET `token` = '$token' WHERE `users`.`login` = '$login'");
                setcookie("remember", $t, time() + 60 * 60 * 24);
            }
            $_SESSION['user'] = [
                "id" => $user['id'],
                "login" => $user['login'],
                "ava" => $user['ava']
            ];
            header('Location: index.php?url=profile');
        } else 
            warn('Login or/and password is/are wrong!');
    } else 
        warn('Login or/and password is/are wrong!');
} else 
    warn('Suspicious activity detected on the page!');

