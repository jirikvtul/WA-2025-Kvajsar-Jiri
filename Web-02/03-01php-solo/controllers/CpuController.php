<?php
require_once '../models/Database.php';
require_once '../models/Cpu.php';

class CpuController {
    private $db;
    private $cpuModel;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->cpuModel = new Cpu($this->db); 
    }

    public function createCpu() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $manufacturer = htmlspecialchars($_POST['manufacturer']);
            $model = htmlspecialchars($_POST['model']);
            $cores = intval($_POST['cores']);
            $threads = intval($_POST['threads']);
            $base_frequency = floatval($_POST['base_frequency']);
            $turbo_frequency = !empty($_POST['turbo_frequency']) ? floatval($_POST['turbo_frequency']) : null;
            $year = intval($_POST['year']);
            $price = floatval($_POST['price']);
            $socket = htmlspecialchars($_POST['socket']);
            $description = htmlspecialchars($_POST['description']);
            $link = htmlspecialchars($_POST['link']);

            // Zpracování nahraných obrázků (předpokládáme, že jsou uloženy jako JSON pole)
            $imagePaths = [];
            if (!empty($_FILES['images']['name'][0])) {
                $uploadDir = '../public/images/';
                foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
                    $filename = basename($_FILES['images']['name'][$key]);
                    $targetPath = $uploadDir . $filename;

                    if (move_uploaded_file($tmp_name, $targetPath)) {
                        $imagePaths[] = '/public/images/' . $filename; // Relativní cesta
                    }
                }
            }

            // Převod pole obrázků na JSON pro uložení do databáze
            $imagesJson = json_encode($imagePaths);

            // Uložení procesoru do DB
            if ($this->cpuModel->create($manufacturer, $model, $cores, $threads, $base_frequency, $turbo_frequency, $year, $price, $socket, $description, $link, $imagesJson)) {
                header("Location: ../controllers/cpu_list.php"); // Přesměrování na seznam procesorů
                exit();
            } else {
                echo "Chyba při ukládání procesoru.";
            }
        }
    }

    public function listCpus() {
        $cpus = $this->cpuModel->getAll();
        include '../views/cpu/cpu_list.php'; 
    }
}

// Volání metody při odeslání formuláře
$controller = new CpuController();
$controller->createCpu();