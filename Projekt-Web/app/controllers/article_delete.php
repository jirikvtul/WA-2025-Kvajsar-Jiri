<?php
/**
 * Article deletion controller
 * Handles the deletion of articles from the database
 * Requires user authentication
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../models/Database.php';
require_once '../models/Article.php';

session_start();

// Check if user is authenticated
if (!isset($_SESSION['user_id'])) {
    header("Location: /WA-2025-Kvajsar-Jiri/Projekt-Web/app/views/auth/login.php?error=please_login");
    exit();
}

// Process article deletion
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];

    $db = (new Database())->getConnection();
    $articleModel = new Article($db);

    // Attempt to delete the article
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