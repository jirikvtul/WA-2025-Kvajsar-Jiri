<?php
/**
 * Article update controller
 * Handles updating existing articles in the database
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

// Process article update
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get and sanitize form data
    $id = (int)$_POST['id'];
    $title = htmlspecialchars($_POST['title'] ?? '');
    $content = htmlspecialchars($_POST['content'] ?? '');

    // Validate required fields
    if (empty($title) || empty($content)) {
        echo "Vyplňte prosím všechna pole.";
        return;
    }

    $db = (new Database())->getConnection();
    $articleModel = new Article($db);

    // Attempt to update the article
    if ($articleModel->update($id, $title, $content)) {
        header("Location: /WA-2025-Kvajsar-Jiri/Projekt-Web/app/controllers/article_list.php");
        exit();
    } else {
        echo "Chyba při aktualizaci článku.";
    }
} else {
    echo "Neplatný požadavek.";
}
?>