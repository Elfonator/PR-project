<?php
include_once "lib/DB.php";

use PO\Lib\DB;

$db = new DB("localhost", 3306, "root", "", "collection_db");
?>

<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <a href="index.php" class="logo">
                        <img src="assets/images/logo.png" alt="Comicsarium Logo">
                    </a>
                    <ul class="nav">
                        <?php
                        $menu = $db->getMenuItems();
                        foreach ($menu as $menuName => $menuUrl) {
                            echo '<li><a href="'.$menuUrl.'">'.$menuName.'</a></li>';
                        }
                        ?>
                    </ul>
                    <div class="border-button">
                        <a id="modal_trigger" href="#modal" class="sign-in-up"><i class="fa fa-user"></i> Login</a>
                    </div>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                </nav>
            </div>
        </div>
    </div>
</header>
<div id="modal" class="popupContainer" style="display:none;">
    <div class="popupHeader">
        <span class="header_title">Login</span>
        <span class="modal_close"><i class="fa fa-times"></i></span>
    </div>

    <section class="popupBody">
        <?php include_once "admin/login.php" ?>
    </section>
</div>