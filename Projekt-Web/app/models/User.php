<?php
/**
 * User model class for handling user-related database operations
 */
class User {
    private $db;

    /**
     * Constructor for User class
     * @param PDO $db Database connection instance
     */
    public function __construct($db) {
        $this->db = $db;
    }

    /**
     * Checks if a username already exists in the database
     * @param string $username Username to check
     * @return bool True if username exists
     */
    public function existsByUsername($username) {
        $stmt = $this->db->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch() !== false;
    }

    /**
     * Registers a new user in the database
     * @param string $username Username
     * @param string $email User's email
     * @param string $password User's password (will be hashed)
     * @param string|null $name User's first name (optional)
     * @param string|null $surname User's last name (optional)
     * @return bool True if registration was successful
     */
    public function register($username, $email, $password, $name = null, $surname = null) {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("
            INSERT INTO users (username, email, password, name, surname, created_at)
            VALUES (?, ?, ?, ?, ?, NOW())
        ");
        return $stmt->execute([$username, $email, $password_hash, $name, $surname]);
    }

    /**
     * Finds a user by their username
     * @param string $username Username to search for
     * @return array|false User data or false if not found
     */
    public function findByUsername($username) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Authenticates a user and sets session variables if successful
     * @param string $username Username
     * @param string $password Password
     * @return bool True if login was successful
     */
    public function login($username, $password) {
        $user = $this->findByUsername($username);
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            return true;
        }
        return false;
    }
}
?>