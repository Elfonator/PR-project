<?php
session_start();
if(!isset($_SESSION['login'])) {
    header("Location: login.php");
}

include "adminMenuAction.php";
?>
<br><br>
<form action="insertMenuItem.php" method="post">
    <input type="text" name="name" value="" placeholder="Page name"><br>
    <input type="text" name="url" value="" placeholder="Page url"><br>
    <input type="submit" name="submit" value="Insert">
</form>
