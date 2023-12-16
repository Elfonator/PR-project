<?php
include_once "lib/DB.php";

use PO\Lib\DB;

$db = new DB("localhost", 3306, "root", "", "collection_db");
$statueData = $db->getStatues();
?>

<section class="featured-items" id="featured-items">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-features owl-carousel" style="position: relative; z-index: 5;">
              <?php
              foreach ($statueData as $statue): ?>
                  <div class="item">
                      <div class="thumb">
                          <img src="assets/images/<?= $statue['img_url']; ?>" alt="">
                          <div class="hover-effect">
                              <div class="content">
                                  <h4><?= $statue['name']; ?></h4>
                                  <ul>
                                      <li><span>Type:</span> <?= $statue['type']; ?></li>
                                      <li><span>Manufacturer:</span> <?= $statue['manufacturer']; ?></li>
                                      <li><span>Price:</span> $<?= $statue['price']; ?></li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                  </div>
              <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
