<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $conn = DatabaseConfig::getConnexion();

        $postId = $_POST['post_id'];
        $authorId = $_POST['author_id'];
        $author = $_POST['author'];
        $commentText = $_POST['comment_text'];

        $stmt = $conn->prepare("INSERT INTO comments (post_id, author_id, author, comment_text) VALUES (:post_id, :author_id, :author, :comment_text)");
        $stmt->bindParam(':post_id', $postId);
        $stmt->bindParam(':author_id', $authorId);
        $stmt->bindParam(':author', $author);
        $stmt->bindParam(':comment_text', $commentText);
        $stmt->execute();

        header("Location: index.php?post_id={$postId}");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
