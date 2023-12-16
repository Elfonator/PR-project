<?php
session_start();
const USERNAME = "admin";
define("HASHED_PASSWORD", password_hash("admin", PASSWORD_DEFAULT));

if(isset($_POST['login'])) {
    if ($_POST['username'] == USERNAME && $_POST['password'] == password_verify($_POST['password'], HASHED_PASSWORD)) {
        $_SESSION['login'] = true;
        header("Location: adminMenuAction.php");
    } else {
        header("Location: login.php?error=1");
        exit();
    }
}

if(isset($_GET['error'])) {
    echo "<p style='color: red'>Incorrect Login Information!</p><br>";
}
?>