global$db; global$db; <!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="author" content="templatemo">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <title>SnapX Photography Categories</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-snapx-photography.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
<!--

TemplateMo 576 SnapX Photography

https://templatemo.com/tm-576-snapx-photography

-->
  </head>

<body>


<?php
include_once "parts/header.php";
$menu = $db->getMenu();

$maxCountCategory = null;
$maxCount = 0;
$categoriesWithCount = $db -> getCategoriesWithCount();

foreach ($categoriesWithCount as $category) {
    if ($category['item_count'] > $maxCount) {
        $maxCount = $category['item_count'];
        $maxCountCategory = $category;
    }
}

$itemsFromMaxCountCategory = $db->getStatuesByCategory($maxCountCategory['id']);
?>

  <div class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2 header-text">
          <h2>Discover Most Popular Categories with <em>Comicsarium</em></h2>
            <p></p>
        </div>
      </div>
    </div>
  </div>

<?php
include_once "parts/category.php";

?>
  <section class="featured-contests">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading text-center">
            <h6>Featured Content</h6>
            <h4>View Most <em>Popular</em> Category</h4>
          </div>
        </div>
          <?php foreach ($itemsFromMaxCountCategory as $item): ?>
        <div class="col-lg-6">
          <div class="item">
            <div class="thumb">
              <img src="<?=$item['img_url'] ?>" style="max-height: 500px;" alt="">
              <div class="hover-effect">
                <div class="content">
                  <div class="top-content" style="width: 160px;">
                    <span class="award" style="padding-right: 10px">Price</span>
                    <span class="price" style="margin-bottom: 10px;">$<?=$item['price'] ?></span>
                  </div>
                    <hr>
                  <h4><?=$item['name'] ?></h4>
                    <h6>by <?=$item['manufacturer'] ?></h6>
                </div>
              </div>
            </div>
          </div>
        </div>
          <?php endforeach;?>
      </div>
    </div>
  </section>

    <?php
    include_once "parts/footer.php";
    ?>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  
  <script src="assets/js/tabs.js"></script>
  <script src="assets/js/popup.js"></script>
  <script src="assets/js/custom.js"></script>

  </body>
</html>