<?php
/**
 * Database connection class for managing PDO database connections
 */
class Database {
    /** @var string Database host */
    private $host = "localhost";
    /** @var string Database name */
    private $db_name = "wa_projekt_2025_jk_01";
    /** @var string Database username */
    private $username = "root";
    /** @var string Database password */
    private $password = "";
    /** @var PDO|null Database connection instance */
    public $conn;

    /**
     * Establishes a database connection using PDO
     * @return PDO|null Database connection instance or null if connection fails
     */
    public function getConnection() {
        $this->conn = null;
        
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=utf8", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Chyba připojení: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>