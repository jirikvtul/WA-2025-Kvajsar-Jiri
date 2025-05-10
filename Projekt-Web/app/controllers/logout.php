<?php
/**
 * Logout controller
 * Handles user logout by destroying the session
 * Redirects to article list page after logout
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
// Clear all session variables
session_unset();
// Destroy the session
session_destroy();

// Redirect to article list page
header("Location: /WA-2025-Kvajsar-Jiri/Projekt-Web/app/controllers/article_list.php");
exit();
?>