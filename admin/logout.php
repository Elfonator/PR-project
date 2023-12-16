<?php
session_start();

// Odstráňte všetky údaje o reláciách
session_unset();

// Zrušte reláciu
session_destroy();

// Presmerujte na prihlasovaciu stránku
header('Location: ../index.php');
exit();
