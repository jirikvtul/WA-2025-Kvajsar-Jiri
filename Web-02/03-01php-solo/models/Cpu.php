<?php

class Cpu {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($manufacturer, $model, $cores, $threads, $base_frequency, $turbo_frequency, $year, $price, $socket, $description, $link, $images) {
        // Připravíme SQL dotaz pro vložení dat do tabulky processors
        $sql = "INSERT INTO processors (manufacturer, model, cores, threads, base_frequency, turbo_frequency, year, price, socket, description, link, images) 
                VALUES (:manufacturer, :model, :cores, :threads, :base_frequency, :turbo_frequency, :year, :price, :socket, :description, :link, :images)";
        
        $stmt = $this->db->prepare($sql);

        // Převod turbf_frequency na NULL, pokud je prázdné
        $turbo_frequency = $turbo_frequency ?: null;

        // Převod images na JSON, pokud je to pole
        $imagesJson = is_array($images) ? json_encode($images) : $images;

        return $stmt->execute([
            ':manufacturer' => $manufacturer,
            ':model' => $model,
            ':cores' => $cores,
            ':threads' => $threads,
            ':base_frequency' => $base_frequency,
            ':turbo_frequency' => $turbo_frequency,
            ':year' => $year,
            ':price' => $price,
            ':socket' => $socket,
            ':description' => $description,
            ':link' => $link,
            ':images' => $imagesJson
        ]);
    }

    public function getAll() {
        $sql = "SELECT * FROM processors ORDER BY created_at DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}