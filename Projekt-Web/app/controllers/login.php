<?php
/**
 * Login controller
 * Handles user authentication and session management
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../models/Database.php';
require_once '../models/User.php';

session_start();

$db = (new Database())->getConnection();
$userModel = new User($db);

// Process login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    // Validate input
    if (empty($username) || empty($password)) {
        echo 'Vyplňte prosím všechna pole.';
        return;
    }

    // Attempt login
    if ($userModel->login($username, $password)) {
        $_SESSION['username'] = $username; // Set session for proper connection
        header("Location: /WA-2025-Kvajsar-Jiri/Projekt-Web/app/controllers/article_list.php");
        exit();
    } else {
        echo 'Neplatné přihlašovací údaje.';
    }
} else {
    echo 'Neplatný požadavek.';
}
?>