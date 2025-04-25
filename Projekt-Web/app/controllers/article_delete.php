<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../models/Database.php';
require_once '../models/Article.php';

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: /WA-2025-Kvajsar-Jiri/Projekt-Web/app/views/auth/login.php?error=please_login");
    exit();
}

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];

    $db = (new Database())->getConnection();
    $articleModel = new Article($db);

    if ($articleModel->delete($id)) {
        header("Location: /WA-2025-Kvajsar-Jiri/Projekt-Web/app/controllers/article_list.php");
        exit();
    } else {
        echo "Chyba při mazání článku.";
    }
} else {
    echo "Neplatný požadavek.";
}
?>