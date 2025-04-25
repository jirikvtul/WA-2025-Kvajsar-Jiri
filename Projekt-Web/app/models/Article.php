<?php
class Article {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

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

    public function getAll() {
        $sql = "SELECT a.*, u.username FROM articles a
                JOIN users u ON a.user_id = u.id
                ORDER BY a.created_at DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $sql = "SELECT * FROM articles WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

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

    public function delete($id) {
        $sql = "DELETE FROM articles WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
?>