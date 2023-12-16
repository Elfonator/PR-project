<?php global $db;
require_once "admin.php";


$menuItems = $db->getMenu();
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
                                        <td><a href="#"><img src="../assets/images/update.png" alt="" style="width: 40px; height: 40px;"></a></td>
                                        <td><a href="#"><img src="../assets/images/delete.png" alt="" style="width: 40px; height: 40px;"></a></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

    <div class="col-lg-12" style="align-items: center">
        <div class="main-button" >
            <a href="#" onclick="toggleForm()" >Add new MENU tab</a>
        </div>
        <?php if(isset($_POST['submit'])) {
            $insert = $db->insertMenuItem($_POST['page_name'], $_POST['page_url']);

            if($insert) {
                header("Location: adminMenuAction.php");
                exit();
            } else {
                $errorMessage = "Failed to insert new menu item";
            }
        }
        ?>

        <div id="menuForm" style="display: none;">
            <div style="display: flex; justify-content: center; align-items: center; padding-top: 50px;">
                <form action="adminMenuAction.php" method="post">
                    <label for="page_name">Insert Page Name: </label>
                    <input type="text" id="page_name" name="page_name" required>
                    <label for="page_url">Insert Page URL: </label>
                    <input type="text" id="page_url" name="page_url" required>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    function toggleForm() {
        var form = document.getElementById('menuForm');
        form.style.display = (form.style.display === 'none' || form.style.display === '') ? 'block' : 'none';
    }
</script>

<?php include_once "../parts/footer.php" ?>