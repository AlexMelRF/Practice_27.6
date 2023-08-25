<?php

//session_start();

//if (isset($_SESSION['user']))
//    header('Location: profile.php');//////////////////////////////////////////////////////////////////
$msg = $_SESSION['message'] ?? null;
$token = hash('gost-crypto', random_int(0,999999));
$_SESSION["CSRF"] = $token;

?>

<form action="include/signin.php" method="POST">
    <label>Log in</label>
    <input type="text" name="login" placeholder="Please, input your login here">
    <label>Password</label>
    <input type="password" name="password" placeholder="Please, input your password here">
    <input type="hidden" name="token" value="<?= $token ?>">
    <label>Remember me <input type="checkbox" name="remember"></label>
    <button type="submit">Submit</button>
    <p>
        <a href="index.php?url=signup">Sign up</a>
    </p>
    <?php
                
    if ($msg)
        echo '<p class="msg">'.$msg.'</p>';
    unset($_SESSION['message']);
                
    ?>
</form>

