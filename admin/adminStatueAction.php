<?php global $db;
require_once "admin.php";


$statues = $db->getStatues();
$categories = $db -> getCategories();
?>

<?php
if(isset($_POST['insert'])) {
    $insert = $db->insertStatue($_POST['name'], $_POST['type'], $_POST['manufacturer'], $_POST['price'], $_POST['category_id'], $_POST['img_url']);

    if ($insert) {
        header("Location: adminStatueAction.php");
        exit();
    } else {
        $errorMessage = "Failed to insert new statue item";
    }
}
if(isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $delete = $db->deleteStatue($id);

    if($delete) {
        header("Location: adminStatueAction.php");
    } else {
        $errorMessage = "Failed to delete statue item";
    }
}

if (isset($_GET['update'])) {
    $updateItemId = intval($_GET['update']);
    $updateItem = $db->getStatue($updateItemId);
}

if(isset($_POST['update'])) {
    $update = $db->updateStatue($_POST['id'], $_POST['name'], $_POST['type'], $_POST['manufacturer'], $_POST['price'], $_POST['category_id'], $_POST['img_url']);

    if ($update) {
        header("Location: adminStatueAction.php");
    } else {
        $errorMessage = "Failed to update statue item";
    }
}
?>

<section>
<div class="col-lg-12" style="align-items: center;">
    <div class="main-button" style="padding-left: 20px;">
        <a href="#" onclick="toggleForm()" >Add new STATUE</a>
    </div>

    <div id="statueForm" style="display: none;">
        <div style="display: flex; justify-content: center; align-items: center; padding-top: 50px;">
            <form action="adminStatueAction.php" method="post">
                <label for="name">Insert name: </label>
                <input style="width: 100px" type="text" id="name" name="name" required>
                <label for="type">Insert type: </label>
                <input type="text" id="type" name="type" required><br><br>
                <label for="manufacturer">Insert manufacturer: </label>
                <input type="text" id="manufacturer" name="manufacturer" required>
                <label for="price">Insert price: </label>
                <input type="text" id="price" name="price" required><br><br>
                <label for="category_id">Category: </label>
                <select id="category_id" name="category_id" required>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= $category['id']; ?>">
                            <?= $category['name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <label for="img_url">Insert image URL: </label>
                <input type="text" id="img_url" name="img_url" required>
                <button type="submit" name="insert">Insert</button>
            </form>
        </div>
    </div>
</div>
</section>
<section>
<?php foreach ($statues as $statue): ?>
    <?php if (isset($updateItem) && $updateItem['id'] === $statue['id']): ?>
        <div id="updateForm<?= $statue['id'] ?>" style="display: block;">
            <div style="display: flex; justify-content: center; align-items: center; padding-top: 50px;">
                <form action="adminStatueAction.php" method="post">
                    <label for="name">Name: </label>
                    <input type="text" id="name" name="name" value="<?= $updateItem['name']; ?>" required>
                    <label for="type">Statue type: </label>
                    <input type="text" id="type" name="type" value="<?= $updateItem['type']; ?>" required><br><br>
                    <label for="manufacturer">Manufacturer: </label>
                    <input type="text" id="manufacturer" name="manufacturer" value="<?= $updateItem['manufacturer']; ?>" required>
                    <label for="price">Price: </label>
                    <input type="text" id="price" name="price" value="<?= $updateItem['price']; ?>" required><br><br>
                    <label for="category_id">Category: </label>
                    <select id="category_id" name="category_id" required>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?= $category['id']; ?>" <?= ($category['id'] == $updateItem['category_id']) ? 'selected' : ''; ?>>
                                <?= $category['name']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <label for="img_url">Image URL: </label>
                    <input type="text" id="img_url" name="img_url" value="<?= $updateItem['img_url']; ?>" required>
                    <input type="hidden" name="id" value="<?= $updateItem['id']; ?>">
                    <button class="btn-primary" type="submit" name="update">Update</button><br><br>
                </form>
            </div>
        </div>
    <?php else: ?>
        <div id="updateForm<?= $statue['id'] ?>" style="display: none;">
        </div>
    <?php endif; ?>
<?php endforeach; ?>
</section>
<section class="portfolio">
    <div class="top-categories">
        <div class="container">
            <div class="row">
                <?php foreach ($statues as $statue): ?>
                        <div class="col-lg-4"  style="padding-bottom: 10px;">
                            <div class="item" style="text-align: center;">
                                <div class="thumb">
                                    <img src="<?= $statue['img_url']; ?>" alt="statue img">
                                    <div class="top-content">
                                        <h6><?= $statue['name']; ?></h6>
                                    </div>
                                </div>
                                <div class="down-content" style="align-content: center">
                                    <table>
                                        <tr>
                                        <td>
                                            <a href="?update=<?= $statue['id'] ?>" onclick="toggleUpdateForm(<?= $statue['id'] ?>)">
                                                <img src="../assets/images/update.png" alt="" style="width: 40px; height: 40px;">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="?delete=<?= $statue['id'] ?>" onclick="return confirm('Are you sure you want to delete this item?');">
                                                <img src="../assets/images/delete.png" alt="" style="width: 40px; height: 40px;">
                                            </a>
                                        </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<script>
    function toggleUpdateForm(statueId) {
        <?php foreach ($statues as $statue): ?>
        var formId = 'updateForm<?= $statue['id'] ?>';
        var formUp = document.getElementById(formId);
        formUp.style.display = (statueId === <?= $statue['id'] ?>) ? 'block' : 'none';
        <?php endforeach; ?>
    }
    function toggleForm() {
        var form = document.getElementById('statueForm');
        form.style.display = (form.style.display === 'none' || form.style.display === '') ? 'block' : 'none';
    }
</script>

<?php include_once "../parts/footer.php" ?>
