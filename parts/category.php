<?php
include_once "lib/DB.php";

use PO\Lib\DB;

$db = new DB("localhost", 3306, "root", "", "collection_db");

$categoriesData= $db->getCategoriesWithCount();
?>
<div class="top-categories">
    <div class="container">
        <div class="row">
            <?php foreach ($categoriesData as $category): ?>
                <div class="col-lg col-sm-4">
                    <div class="item">
                        <div class="icon">
                            <img src="assets/images/<?= $category['icon']; ?>" alt="">
                        </div>
                        <h4><?= $category['name']; ?></h4>
                        <span>Available Items</span>
                        <span class="counter"><?= $category['item_count']; ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

