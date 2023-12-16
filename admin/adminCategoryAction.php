<?php global $db;
require_once "admin.php";


$categories = $db->getCategories();
?>

<?php
if(isset($_POST['insert'])) {
    $insert = $db->insertCategory($_POST['name'], $_POST['description'], $_POST['icon']);

    if ($insert) {
        header("Location: adminCategoryAction.php");
        exit();
    } else {
        $errorMessage = "Failed to insert new menu category";
    }
}
if(isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $delete = $db->deleteCategory($id);

    if($delete) {
        header("Location: adminCategoryAction.php");
    } else {
        $errorMessage = "Failed to delete category";
    }
}

if (isset($_GET['update'])) {
    $updateItemId = intval($_GET['update']);
    $updateItem = $db->getCategory($updateItemId);
}

if(isset($_POST['update'])) {
    $update = $db->updateCategory($_POST['id'], $_POST['name'], $_POST['description'], $_POST['icon']);

    if ($update) {
        header("Location: adminCategoryAction.php");
    } else {
        $errorMessage = "Failed to update menu item";
    }
}
?>

    <section class="portfolio">
        <div class="top-categories">
            <div class="container" style="margin-right: 0; padding-right: 0">
                    <?php foreach ($categories as $category): ?>
                    <div class = "col-lg-4" style="display: inline-block;width: 30%"" >
                            <div class="item" style="text-align: center;">
                                <table>
                                    <tr style="padding: 5px;">
                                        <td style="width: 20%;"><img src="<?= $category['icon']; ?>" alt=""></td>
                                        <td style="width: 40%;"><h3><?= $category['name']; ?></h3></td>
                                        <td style="width: 10%;">
                                            <a href="?update=<?= $category['id'] ?>" onclick="toggleUpdateForm(<?= $category['id'] ?>)">
                                                <img src="../assets/images/update.png" alt="" style="width: 40px; height: 40px;">
                                            </a>
                                        </td>
                                        <td style="width: 10%;">
                                            <a href="?delete=<?= $category['id'] ?>" onclick="return confirm('Are you sure you want to delete this item?');">
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

        <?php foreach ($categories as $category): ?>
            <?php if (isset($updateItem) && $updateItem['id'] === $category['id']): ?>
                <div id="updateForm<?= $category['id'] ?>" style="display: block;">
                    <div style="display: flex; justify-content: center; align-items: center; padding-top: 50px;">
                        <form action="adminCategoryAction.php" method="post">
                            <label for="name">Insert Page Name: </label>
                            <input type="text" id="name" name="name" value="<?= $updateItem['name']; ?>">
                            <label for="description">Insert description: </label>
                            <input type="text" id="description" name="description" value="<?= $updateItem['description']; ?>">
                            <label for="icon">Insert Icon URL: </label>
                            <input type="text" id="icon" name="icon" value="<?= $updateItem['icon']; ?>">
                            <input type="hidden" name="id" value="<?= $updateItem['id']; ?>">
                            <button type="submit" name="update">Update</button>
                        </form>
                    </div>
                </div>
            <?php else: ?>
                <div id="updateForm<?= $category['id'] ?>" style="display: none;">
                </div>
            <?php endif; ?>
        <?php endforeach; ?>

        <div class="col-lg-12" style="align-items: center">
            <div class="main-button" >
                <a href="#" onclick="toggleForm()" >Add new CATEGORY</a>
            </div>

            <div id="categoryForm" style="display: none;">
                <div style="display: flex; justify-content: center; align-items: center; padding-top: 50px;">
                    <form action="adminCategoryAction.php" method="post">
                        <label for="name">Insert Name: </label>
                        <input type="text" id="name" name="name" required>
                        <label for="description">Insert description: </label>
                        <input type="text" id="description" name="description" required>
                        <label for="icon">Insert icon URL: </label>
                        <input type="text" id="icon" name="icon" required>
                        <button type="submit" name="insert">Insert</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        function toggleUpdateForm(categoryId) {
            <?php foreach ($categories as $category): ?>
            var formId = 'updateForm<?= $category['id'] ?>';
            var formUp = document.getElementById(formId);
            formUp.style.display = (categoryId === <?= $category['id'] ?>) ? 'block' : 'none';
            <?php endforeach; ?>;
        }
        function toggleForm() {
            var form = document.getElementById('categoryForm');
            form.style.display = (form.style.display === 'none' || form.style.display === '') ? 'block' : 'none';
        }
    </script>

<?php include_once "../parts/footer.php" ?>