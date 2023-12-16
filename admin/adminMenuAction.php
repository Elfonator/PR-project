<?php global $db;
require_once "admin.php";


$menuItems = $db->getMenu();
?>
<div class="container">
    <h3>Main menu:</h3><br>
    <?php
    echo "<ul>";
    foreach ($menuItems as $menuItem) {
        echo "<li>".$menuItem['page_name']." 
    <a href='updateMenu.php?id=".$menuItem['id']."'>Update</a>  
    <a href='deleteMenu.php?id=".$menuItem['id']."'onclick='return confirmDelete()'>Delete</a>
    </li>";
    }
    echo "</ul>";

    echo "<a href='insertMenuItem.php'>Add new</a>"
    ?>
</div>