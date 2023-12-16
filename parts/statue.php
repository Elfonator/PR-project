<?php
include_once "lib/DB.php";

use PO\Lib\DB;

$db = new DB("localhost", 3306, "root", "", "collection_db");
$statuesData= $db->getStatuesWithCategory();
?>

<?php foreach ($statuesData as $statue): ?>
<div class="col-lg-4">
    <div class="item">
        <div class="thumb">
            <img src="assets/images/<?= $statue['img_url']; ?>" alt="">
            <div class="top-content">
                <h5><?= $statue['name']; ?></h5>
                <h6><?= $statue['type']; ?></h6>
            </div>
        </div>
        <div class="down-content">
            <div class="row">
                <div class="col-7">
                    <h6>Category: <?= $statue['category_name']; ?></h6>
                </div>
                <div class="col-5">

                </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>