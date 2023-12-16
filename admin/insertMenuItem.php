<?php global $db;
require_once "admin.php";

if(isset($_POST['submit'])) {
    $insert = $db->insertMenuItem($_POST['name'], $_POST['url']);

    if($insert) {
        header("Location: adminMenuAction.php");
        exit();
    } else {
        $errorMessage = "Failed to insert new menu item";
    }
}

?>