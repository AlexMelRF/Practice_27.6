<?php

session_start();

require_once 'db_connect.php';

function warn($msg, $url) {
    $_SESSION['message'] = $msg;
    header('Location: ../index.php?url='.$url);
}
$psw = $_POST['password'];
$psw_conf  = $_POST['password_confirm'];
$name = $_POST['name'];
$email = $_POST['email'];
$login = $_POST['login'];
if ($psw === $psw_conf) {
    $check_user = mysqli_query($db_connect, "SELECT * FROM `users` WHERE `login` = '$login'");
    if (mysqli_num_rows($check_user) == 0) {
        $path = 'uploads/'.time().$_FILES['ava']['name'];
        if (!move_uploaded_file($_FILES['ava']['tmp_name'], '../'.$path)) {
            warn('Loading file error!');
        } else {
            $password = password_hash($psw, PASSWORD_BCRYPT);
            mysqli_query($db_connect, "INSERT INTO `users` (`id`, `name`, `login`, `email`, `password`, `ava`) VALUES (NULL, '$name', '$login', '$email', '$password', '$path')");
            warn('Successfull registration!', 'signin');
        }
    } else 
        warn('Please, try another login!', 'sigup');
} else 
    warn('Passwords mismatch!', 'signup');

