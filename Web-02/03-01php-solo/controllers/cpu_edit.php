<?php
require_once __DIR__ . '/CpuController.php';

$controller = new CpuController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller->updateCpu();
} else {
    $controller->editCpu();
} 