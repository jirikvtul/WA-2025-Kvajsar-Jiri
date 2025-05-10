<?php
/**
 * Registration controller
 * Handles new user registration and validation
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../models/Database.php';
require_once '../models/User.php';

session_start();

$db = (new Database())->getConnection();
$userModel = new User($db);

// Process registration form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get and sanitize form data
    $username = trim($_POST['username'] ?? '');
    $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
    $name = !empty($_POST['name']) ? trim($_POST['name']) : null;
    $surname = !empty($_POST['surname']) ? trim($_POST['surname']) : null;
    $password = $_POST['password'] ?? '';
    $password_confirm = $_POST['password_confirm'] ?? '';

    // Validate required fields
    if (empty($username) || empty($password) || empty($password_confirm)) {
        echo 'Vyplňte prosím všechna povinná pole.';
        return;
    }

    // Validate password match
    if ($password !== $password_confirm) {
        echo 'Hesla se neshodují.';
        return;
    }

    // Check if username is already taken
    if ($userModel->existsByUsername($username)) {
        echo 'Uživatelské jméno je již obsazené.';
        return;
    }

    // Attempt registration
    if ($userModel->register($username, $email, $password, $name, $surname)) {
        header("Location: /WA-2025-Kvajsar-Jiri/Projekt-Web/app/views/auth/login.php");
        exit();
    } else {
        echo 'Registrace se nezdařila.';
    }
} else {
    echo 'Neplatný požadavek.';
}
?>