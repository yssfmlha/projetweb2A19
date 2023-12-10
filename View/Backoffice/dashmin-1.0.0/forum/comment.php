<?php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['post_id'])) {
    try {
        $conn = DatabaseConfig::getConnexion();
        $post_id = $_GET['post_id'];


        $stmt = $conn->prepare("SELECT * FROM posts WHERE id = :post_id");
        $stmt->bindParam(':post_id', $post_id);
        $stmt->execute();
        $post = $stmt->fetch(PDO::FETCH_ASSOC);

  
        $stmt_comments = $conn->prepare("SELECT * FROM comments WHERE post_id = :post_id");
        $stmt_comments->bindParam(':post_id', $post_id);
        $stmt_comments->execute();
        $comments = $stmt_comments->fetchAll(PDO::FETCH_ASSOC);

        
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} 
?>
