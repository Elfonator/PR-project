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

<section>
    <div class="col-lg-12" style="align-items: center">
        <div class="main-button" style="padding-left: 20px;" >
            <a href="#" onclick="toggleForm()" >Add new CATEGORY</a>
        </div>

        <div id="categoryForm" style="display: none;">
            <div class="col-md-6 offset-md-3 mt-5">
                <form action="adminCategoryAction.php" method="post">
                    <div class="form-group">
                    <label for="name">Insert Name: </label>
                    <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                    <label for="description">Insert description: </label>
                    <input type="text" class="form-control" id="description" name="description" required>
                    </div>
                    <div class="form-group">
                    <label for="icon">Insert icon URL: </label>
                    <input type="text" class="form-control" id="icon" name="icon" required>
                    </div>
                    <hr>
                    <button class="btn btn-secondary bg-black" onclick="toggleForm()">Back</button>
                    <button class="btn btn-primary" type="submit" name="insert">Insert</button>
                </form>
            </div>
        </div>
    </div>
</section>
    <section style="padding: 5px; margin: 5px">
        <?php foreach ($categories as $category): ?>
            <?php if (isset($updateItem) && $updateItem['id'] === $category['id']): ?>
                <div id="updateForm<?= $category['id'] ?>" style="display: block;">
                    <div class="col-md-6 offset-md-3 mt-5">
                        <form action="adminCategoryAction.php" method="post">
                            <div class="form-group">
                            <label for="name">Insert Page Name: </label>
                            <input type="text" class="form-control" id="name" name="name" value="<?= $updateItem['name']; ?>">
                            </div>
                            <div class="form-group">
                            <label for="description">Insert description: </label>
                            <input type="text" class="form-control" id="description" name="description" value="<?= $updateItem['description']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="icon">Insert Icon URL: </label>
                            <input type="text" class="form-control" id="icon" name="icon" value="<?= $updateItem['icon']; ?>">
                            </div>
                            <hr>
                            <button class="btn btn-secondary bg-dark" onclick="toggleUpdateForm(0)">Back</button>
                            <input type="hidden" name="id" value="<?= $updateItem['id']; ?>">
                            <button class="btn btn-primary" type="submit" name="update">Update</button>
                        </form>
                    </div>
                </div>
            <?php else: ?>
                <div id="updateForm<?= $category['id'] ?>" style="display: none;">
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </section>
    <section class="portfolio">

        <div class="top-categories">
            <div class="container" style="margin-right: 10px;">
                    <?php foreach ($categories as $category): ?>
                    <div class = "col-lg-5" style="display: inline-block;width: 30%"" >
                            <div class="item" style="text-align: center;">
                                <table>
                                    <tr style="padding: 5px;">
                                        <td style="width: 20%;"><img src="<?= $category['icon']; ?>" alt=""></td>
                                        <td style="width: 50%;"><h3><?= $category['name']; ?></h3></td>
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
    </section>

    <script>
        function toggleUpdateForm(categoryId) {
            <?php foreach ($categories as $category): ?>
            var formId = 'updateForm<?= $category['id'] ?>';
            var formUp = document.getElementById(formId);
            formUp.style.display = (categoryId === <?= $category['id'] ?>) ? 'block' : 'none';
            <?php endforeach; ?>
        }
        function toggleForm() {
            var form = document.getElementById('categoryForm');
            form.style.display = (form.style.display === 'none' || form.style.display === '') ? 'block' : 'none';
        }
    </script>

<?php include_once "../parts/footer.php" ?>