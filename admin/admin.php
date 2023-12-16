<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="templatemo">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <title>Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="../assets/css/fontawesome.css">
    <link rel="stylesheet" href="../assets/css/templatemo-snapx-photography.css">
    <link rel="stylesheet" href="../assets/css/owl.css">
    <link rel="stylesheet" href="../assets/css/animate.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

</head>
<?php
session_start();
if(!isset($_SESSION['login'])) {
    header("Location: admin/login.php");
}

include_once "../lib/DB.php";

use PO\Lib\DB;

$db = new DB("localhost", 3306, "root", "", "collection_db");
?>

<body>

<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="admin.php" class="logo">
                        <img src="../assets/images/logo.png" alt="Comicsarium">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="adminMenuAction.php">Menu</a></li>
                        <li><a href="adminStatueAction.php">Statues</a></li>
                        <li><a href="adminCategoryAction.php">Categories</a></li>
                    </ul>
                    <div class="border-button">
                        <a href="logout.php" class="sign-in-up"><i class="fa fa-user"></i> Logout</a>
                    </div>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->

<div class="page-heading">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 header-text">
                <h2>Welcome to <em>Admin</em> Panel</h2>
            </div>
        </div>
    </div>
</div>
<!-- Scripts -->
<!-- Bootstrap core JavaScript -->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

<script src="../assets/js/isotope.min.js"></script>
<script src="../assets/js/owl-carousel.js"></script>

<script src="../assets/js/tabs.js"></script>
<script src="../assets/js/popup.js"></script>
<script src="../assets/js/custom.js"></script>

</body>
</html>