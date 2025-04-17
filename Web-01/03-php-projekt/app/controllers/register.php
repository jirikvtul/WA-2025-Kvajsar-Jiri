<?php
require_once '../models/Database.php';
require_once '../models/User.php';

class register {
    private $db;
    private $userModel;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->userModel = new User($this->db);
    }

    public function createUser() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = htmlspecialchars($_POST['username']);
            $email = htmlspecialchars($_POST['email']);
            $password_hash = htmlspecialchars($_POST['password_hash']);
            $name = htmlspecialchars($_POST['name']);
            $surname =htmlspecialchars($_POST['surname']);


            // // Zpracování nahraných obrázků
            // $imagePaths = [];
            // if (!empty($_FILES['images']['name'][0])) {
            //     $uploadDir = '../public/images/';
            //     foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
            //         $filename = basename($_FILES['images']['name'][$key]);
            //         $targetPath = $uploadDir . $filename;

            //         if (move_uploaded_file($tmp_name, $targetPath)) {
            //             $imagePaths[] = '/public/images/' . $filename; // Relativní cesta
            //         }
            //     }
            // }

            // Uložení user do DB - dočasné řešení, než budeme mít výpis knih
            if ($this->userModel->create($username, $email, $password_hash, $name, $surname)) {
                header("Location: ../controllers/login.php");
                exit();
            } else {
                echo "Chyba při ukládání uživatele.";
            }
        }
    }

    public function listUsers(){
        $users = $this->userModel->getAll();
        include '../views/auth/login.php';
    }
}

// Volání metody při odeslání formuláře
$controller = new register();
$controller->createUser();