<?php
/**
 * Article listing controller
 * Displays all articles in a table format
 * Uses ArticleController for handling the display logic
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'ArticleController.php';
$controller = new ArticleController();
$controller->listArticles();
?>