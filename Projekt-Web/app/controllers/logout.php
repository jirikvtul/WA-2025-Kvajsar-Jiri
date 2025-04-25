<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
session_unset();
session_destroy();

header("Location: /WA-2025-Kvajsar-Jiri/Projekt-Web/app/controllers/article_list.php");
exit();
?>