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
            <!-- Username & Password Login form -->
            <div class="user_login">
                <form action="login.php" method="post">
                    <label>Username</label>
                    <input name="username" type="text" id="username" />
                    <br />

                    <label>Password</label>
                    <input name="password" type="password" id="password" />
                    <br />

                    <div class="checkbox">
                        <input id="remember" type="checkbox" />
                        <label for="remember">Remember me on this computer</label>
                    </div>

                    <div class="action_btns">
                        <div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Back</a></div>
                        <div class="one_half last"><button type="submit" class="btn btn_red">Login</button></div>
                    </div>
                </form>
                <a href="#" class="forgot_password">Forgot password?</a>
            </div>
        </section>
    </div>