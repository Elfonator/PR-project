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
            <h6>Featured Contests</h6>
            <h4>View Most <em>Popular</em> Category <em>Contests</em></h4>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="item">
            <div class="thumb">
              <img src="assets/images/featured-image-02.jpg" alt="">
              <div class="hover-effect">
                <div class="content">
                  <div class="top-content">
                    <span class="award">Award Price</span>
                    <span class="price">$1,600</span>
                  </div>
                  <h4>Walk In The Nature Night</h4>
                  <div class="info">
                    <span class="participants"><img src="assets//images/icon-03.png" alt=""><br>60<br>Participants</span>
                    <span class="submittions"><img src="assets//images/icon-01.png" alt=""><br>188<br>Submissions</span>
                  </div>
                  <div class="border-button">
                    <a href="category-details.php">Browse Nature Contests</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="item">
            <div class="thumb">
              <img src="assets/images/featured-image-01.jpg" alt="">
              <div class="hover-effect">
                <div class="content">
                  <div class="top-content">
                    <span class="award">Award Price</span>
                    <span class="price">$3,200</span>
                  </div>
                  <h4>Walk In The Nature Night</h4>
                  <div class="info">
                    <span class="participants"><img src="assets//images/icon-03.png" alt=""><br>78<br>Participants</span>
                    <span class="submittions"><img src="assets//images/icon-01.png" alt=""><br>240<br>Submissions</span>
                  </div>
                  <div class="border-button">
                    <a href="category-details.php">Browse Nature Contests</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="item">
            <div class="thumb">
              <img src="assets/images/featured-image-03.jpg" alt="">
              <div class="hover-effect">
                <div class="content">
                  <div class="top-content">
                    <span class="award">Award Price</span>
                    <span class="price">$4,100</span>
                  </div>
                  <h4>Walk In The Nature Night</h4>
                  <div class="info">
                    <span class="participants"><img src="assets//images/icon-03.png" alt=""><br>112<br>Participants</span>
                    <span class="submittions"><img src="assets//images/icon-01.png" alt=""><br>286<br>Submissions</span>
                  </div>
                  <div class="border-button">
                    <a href="category-details.php">Browse Nature Contests</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="item">
            <div class="thumb">
              <img src="assets/images/featured-image-04.jpg" alt="">
              <div class="hover-effect">
                <div class="content">
                  <div class="top-content">
                    <span class="award">Award Price</span>
                    <span class="price">$3,400</span>
                  </div>
                  <h4>Walk In The Nature Night</h4>
                  <div class="info">
                    <span class="participants"><img src="assets//images/icon-03.png" alt=""><br>54<br>Participants</span>
                    <span class="submittions"><img src="assets//images/icon-01.png" alt=""><br>140<br>Submissions</span>
                  </div>
                  <div class="border-button">
                    <a href="category-details.php">Browse Nature Contests</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="item">
            <div class="thumb">
              <img src="assets/images/featured-image-05.jpg" alt="">
              <div class="hover-effect">
                <div class="content">
                  <div class="top-content">
                    <span class="award">Price</span>
                    <span class="price">$2,200</span>
                  </div>
                  <h4>Walk In The Nature Night</h4>
                  <div class="info">
                    <span class="participants"><img src="assets//images/icon-03.png" alt=""><br>68<br>Participants</span>
                    <span class="submittions"><img src="assets//images/icon-01.png" alt=""><br>162<br>Submissions</span>
                  </div>
                  <div class="border-button">
                    <a href="category-details.php">Browse Nature Contests</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
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