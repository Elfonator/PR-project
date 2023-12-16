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
<div class="container">
    <h2>Add new item into menu tab:</h2><br>
    <form action="insertMenuItem.php" method="post">
        <input type="text" name="name" value="" placeholder="Page name"><br>
        <input type="text" name="url" value="" placeholder="Page url"><br>
        <input type="submit" name="submit" value="Add">
    </form>
</div>