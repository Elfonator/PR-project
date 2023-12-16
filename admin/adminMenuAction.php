<?php global $db;
require_once "admin.php";


$menuItems = $db->getMenu();
?>

<?php
if(isset($_POST['insert'])) {
    $insert = $db->insertMenuItem($_POST['page_name'], $_POST['page_url']);

    if ($insert) {
        header("Location: adminMenuAction.php");
        exit();
    } else {
        $errorMessage = "Failed to insert new menu item";
    }
}
    if(isset($_GET['delete'])) {
        $id = intval($_GET['delete']);
        $delete = $db->deleteMenuItem($id);

        if($delete) {
            header("Location: adminMenuAction.php");
        } else {
            $errorMessage = "Failed to delete menu item";
        }
    }

    if (isset($_GET['update'])) {
        $updateItemId = intval($_GET['update']);
        $updateItem = $db->getMenuItem($updateItemId);
    }

    if(isset($_POST['update'])) {
        $update = $db->updateMenuItem($_POST['id'], $_POST['page_name'], $_POST['page_url']);

        if ($update) {
            header("Location: adminMenuAction.php");
        } else {
            $errorMessage = "Failed to update menu item";
        }
    }
?>

<section class="portfolio">
        <div class="top-categories">
            <div class="container">
                <div class="row">
                    <?php foreach ($menuItems as $menuItem): ?>
                        <div class="col-lg col-sm-4">
                            <div class="item" style="text-align: center;">
                                <table style="display: inline-block;">
                                    <tr>
                                        <td><h2 style="display: inline-block;"><?= $menuItem['page_name']; ?></h2></td>
                                        <td>
                                            <a href="?update=<?= $menuItem['id'] ?>" onclick="toggleUpdateForm(<?= $menuItem['id'] ?>)">
                                                <img src="../assets/images/update.png" alt="" style="width: 40px; height: 40px;">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="?delete=<?= $menuItem['id'] ?>" onclick="return confirm('Are you sure you want to delete this item?');">
                                                <img src="../assets/images/delete.png" alt="" style="width: 40px; height: 40px;">
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

    <?php foreach ($menuItems as $menuItem): ?>
        <?php if (isset($updateItem) && $updateItem['id'] === $menuItem['id']): ?>
            <div id="updateForm<?= $menuItem['id'] ?>" style="display: block;">
                <div style="display: flex; justify-content: center; align-items: center; padding-top: 50px;">
                    <form action="adminMenuAction.php" method="post">
                        <label for="page_name">Insert Page Name: </label>
                        <input type="text" id="page_name" name="page_name" value="<?= $updateItem['page_name']; ?>">
                        <label for="page_url">Insert Page URL: </label>
                        <input type="text" id="page_url" name="page_url" value="<?= $updateItem['page_url']; ?>">
                        <input type="hidden" name="id" value="<?= $updateItem['id']; ?>">
                        <button type="submit" name="update">Update</button>
                    </form>
                </div>
            </div>
        <?php else: ?>
            <div id="updateForm<?= $menuItem['id'] ?>" style="display: none;">
            </div>
        <?php endif; ?>
    <?php endforeach; ?>

    <div class="col-lg-12" style="align-items: center">
        <div class="main-button" >
            <a href="#" onclick="toggleForm()" >Add new MENU tab</a>
        </div>

        <div id="menuForm" style="display: none;">
            <div style="display: flex; justify-content: center; align-items: center; padding-top: 50px;">
                <form action="adminMenuAction.php" method="post">
                    <label for="page_name">Insert Page Name: </label>
                    <input type="text" id="page_name" name="page_name" required>
                    <label for="page_url">Insert Page URL: </label>
                    <input type="text" id="page_url" name="page_url" required>
                    <button type="submit" name="insert">Insert</button>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    function toggleUpdateForm(menuItemId) {
        <?php foreach ($menuItems as $menuItem): ?>
        var formId = 'updateForm<?= $menuItem['id'] ?>';
        var formUp = document.getElementById(formId);
        formUp.style.display = (menuItemId === <?= $menuItem['id'] ?>) ? 'block' : 'none';
        <?php endforeach; ?>;
    }
    function toggleForm() {
        var form = document.getElementById('menuForm');
        form.style.display = (form.style.display === 'none' || form.style.display === '') ? 'block' : 'none';
    }
</script>

<?php include_once "../parts/footer.php" ?>