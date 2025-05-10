<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require_once '../models/Database.php';
require_once '../models/Article.php';

/**
 * Controller class for handling article-related operations
 */
class ArticleController {
    /** @var PDO Database connection instance */
    private $db;
    /** @var Article Article model instance */
    private $articleModel;

    /**
     * Constructor for ArticleController
     * Initializes database connection and Article model
     */
    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->articleModel = new Article($this->db);
    }

    /**
     * Checks if a user is currently logged in
     * @return bool True if user is logged in
     */
    private function isUserLoggedIn() {
        return isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
    }

    /**
     * Handles article creation
     * Redirects to login page if user is not authenticated
     * Processes POST request to create new article
     */
    public function createArticle() {
        if (!$this->isUserLoggedIn()) {
            header("Location: ../views/auth/login.php?error=please_login");
            exit();
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $title = htmlspecialchars($_POST['title'] ?? '');
            $content = htmlspecialchars($_POST['content'] ?? '');
            $user_id = $_SESSION['user_id'];

            if (empty($title) || empty($content)) {
                $error = 'Vyplňte prosím všechna povinná pole.';
            } elseif ($this->articleModel->create($title, $content, $user_id)) {
                header("Location: ../controllers/article_list.php?success=created");
                exit();
            } else {
                $error = 'Chyba při ukládání článku.';
            }
        }

        include '../views/articles/article_create.php';
    }

    /**
     * Lists all articles
     * Redirects to login page if user is not authenticated
     * Displays articles in a table format
     */
    public function listArticles() {
        if (!$this->isUserLoggedIn()) {
            header("Location: ../views/auth/login.php?error=please_login");
            exit();
        }
        $articles = $this->articleModel->getAll();
        include '../views/articles/article_table_only.php';
    }
}

$controller = new ArticleController();
$controller->createArticle();
?>