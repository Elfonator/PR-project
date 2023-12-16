<?php
session_start();
const USERNAME = "admin";
define("HASHED_PASSWORD", password_hash("admin", PASSWORD_DEFAULT));

if(isset($_POST['login'])) {
    if ($_POST['username'] == USERNAME && $_POST['password'] == password_verify($_POST['password'], HASHED_PASSWORD)) {
        $_SESSION['login'] = true;
        header("Location: admin/adminMenuAction.php");
    } else {
        header("Location: index.php?error=1");
        exit();
    }
}

if(isset($_GET['error'])) {
    echo "";
    echo "<p style='color: red'>Incorrect Login Information!</p><br>";
}
?>

<div class="user_login">
    <form action="" method="post">
        <label>Username</label>
        <input name="username" type="text" id="username" />
        <br />

        <label>Password</label>
        <input name="password" type="password" id="password" />
        <br />

        <div class="checkbox">
            <input id="remember" type="checkbox" />
            <label for="remember">Remember me on this computer</label>
        </div>

        <div class="action_btns">
            <div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Back</a></div>
            <div class="one_half last"><button type="submit" name="login" class="btn btn_red">Login</button></div>
        </div>
    </form>
    <a href="#" class="forgot_password">Forgot password?</a>
</div>
