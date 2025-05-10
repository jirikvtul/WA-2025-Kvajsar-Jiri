<?php
/**
 * Article model class for handling article-related database operations
 */
class Article {
    private $db;

    /**
     * Constructor for Article class
     * @param PDO $db Database connection instance
     */
    public function __construct($db) {
        $this->db = $db;
    }

    /**
     * Creates a new article in the database
     * @param string $title Article title
     * @param string $content Article content
     * @param int $user_id ID of the user creating the article
     * @return bool True if article was created successfully
     */
    public function create($title, $content, $user_id) {
        $sql = "INSERT INTO articles (title, content, user_id, created_at)
                VALUES (:title, :content, :user_id, NOW())";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':title' => $title,
            ':content' => $content,
            ':user_id' => $user_id
        ]);
    }

    /**
     * Retrieves all articles with their author information
     * @return array Array of articles with user information
     */
    public function getAll() {
        $sql = "SELECT a.*, u.username FROM articles a
                JOIN users u ON a.user_id = u.id
                ORDER BY a.created_at DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Retrieves a single article by its ID
     * @param int $id Article ID
     * @return array|false Article data or false if not found
     */
    public function getById($id) {
        $sql = "SELECT * FROM articles WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Updates an existing article
     * @param int $id Article ID
     * @param string $title New article title
     * @param string $content New article content
     * @return bool True if article was updated successfully
     */
    public function update($id, $title, $content) {
        $sql = "UPDATE articles 
                SET title = :title,
                    content = :content,
                    updated_at = NOW()
                WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':id' => $id,
            ':title' => $title,
            ':content' => $content
        ]);
    }

    /**
     * Deletes an article from the database
     * @param int $id Article ID
     * @return bool True if article was deleted successfully
     */
    public function delete($id) {
        $sql = "DELETE FROM articles WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
?>