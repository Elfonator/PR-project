global$db; <!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="author" content="templatemo">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <title>SnapX Photo Contests</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-snapx-photography.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

  </head>

<body>

<?php
include_once "parts/header.php";
$menu = $db->getMenu();

?>
<?php
if(isset($_GET['search'])) {
    $statueName = $_GET['statue'] ?? '';
    $categoryId = $_GET['category'] ?? '';
    $filteredStatues = $db->searchStatues($statueName, $categoryId);
}

?>

  <div class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2 header-text">
          <h2>Discover new Statues with <em>Comicsarium</em></h2>
          <p></p>
        </div>
      </div>
    </div>
  </div>

  <div class="search-form">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <form id="search-form" role="search" action="statues.php" method="get">
            <div class="row">
              <div class="col-lg-5">
                <fieldset>
                    <label for="statue" class="form-label">Search Any Statue</label>
                    <input type="text" name="statue" class="searchText" placeholder="Name..." autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-5">
                <fieldset>
                    <label for="category" class="form-label">Pick Category</label>
                    <select name="category" class="form-select" aria-label="Choose a category" id="category" onchange="this.form.click()">
                        <option selected>Choose a category</option>
                        <?php
                        $categories = $db->getCategories();
                            foreach ($categories as $category) {
                            echo '<option value="' . $category['id'] . '">' . $category['name'] . '</option>';
                        }
                        ?>
                    </select>
                </fieldset>
              </div>
              <div class="col-lg-2">
                <fieldset>
                    <button name="search" class="main-button">Search Now</button>
                </fieldset>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<section class="photos-videos">
    <div class="container">
        <div class="row">
<?php if (!empty($filteredStatues)):?>
    <?php foreach ($filteredStatues as $statue):?>
        <div class="col-lg-4">
            <div class="item">
                <div class="thumb">
                    <img src="<?= $statue['img_url']; ?>" alt="">
                    <div class="top-content">
                        <h5><?= $statue['name']; ?></h5>
                        <h6><?= $statue['type']; ?></h6>
                    </div>
                </div>
            </div>
        </div>
<?php endforeach; ?>
<?php endif; ?>
        </div>
    </div>
</section>

  <section class="photos-videos">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading text-center">
            <h4>Our Featured <em>Statues</em> See Below</h4>
          </div>
        </div>

          <?php
          include_once "parts/statue.php";
          ?>
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