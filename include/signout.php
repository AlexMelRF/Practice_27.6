<?php

//session_start();

//require_once 'db_connect.php';

//$login = $_SESSION['user']['login'];
//mysqli_query($db_connect, "UPDATE `users` SET `token` = 'NULL' WHERE `users`.`login` = '$login'");
unset($_SESSION['user']);

//session_destroy();

header('Location: ../index.php?url=signin');///////////////////////////////////////////////////////////////////////

