<?php

$msg = $_SESSION['message'] ?? null;

?>

<form action="include/signup.php" method="POST" enctype="multipart/form-data">
    <label>Name</label>
    <input type="text" name="name" placeholder="Please, input your name here">
    <label>Login</label>
    <input type="text" name="login" placeholder="Please, input your login here">
    <label>Email</label>
    <input type="text" name="email" placeholder="Please, input your email here">
    <label>Profile picture</label>
    <input type="file" name="ava">
    <label>Password</label>
    <input type="password" name="password" placeholder="Please, input your password here">
    <label>Password confirm</label>
    <input type="password" name="password_confirm" placeholder="Please, input your password again here">
    <button type="submit">Submit</button>
    <p>
        <a href="index.php?url=signin">Sign in</a>
    </p>
    <?php
                
    if ($msg)
        echo '<p class="msg">'.$msg.'</p>';
    unset($_SESSION['message']);
                
    ?>
</form>