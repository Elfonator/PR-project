<?php
include_once "lib/DB.php";

use PO\Lib\DB;

$db = new DB("localhost", 3306, "root", "", "collection_db");

$categoriesData= $db->getCategoriesWithCount();
?>

<?php foreach ($categoriesData as $category): ?>
    <div class="col-lg-3 col-sm-6">
        <div class="popular-item">
            <div class="top-content">
                <div class="icon">
                    <img src="assets/images/<?= $category['icon']; ?>" alt="">
                </div>
                <div class="right">
                    <h4><?= $category['name']; ?></h4>
                    <span><em><?= $category['item_count']; ?></em> Available Items</span>
                </div>
            </div>
            <?php if(($category['item_count']!=0)): ?>
            <div class="thumb">
               <?php
                $randomImagePath = $db->getRandomImage($category['id']);
                ?>
                <img src="assets/images/<?= $randomImagePath; ?>" alt="">
                <span class="likes"><i class="fa fa-heart"></i></span>
            </div>
            <?php else: ?>
            <div class="thumb">
                <img src="assets/images/popular-04.png" alt="">
                <p>No Content Yet</p>
                <span class="likes"><i class="fa fa-heart"></i></span>
            </div>
            <?php endif; ?>
        </div>
    </div>
<?php endforeach; ?>