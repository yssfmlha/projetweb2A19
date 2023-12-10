<?php
require_once 'config.php';

if (isset($_POST['dislike'])) {
    $postId = $_POST['post_id'];

    try {
        $conn = DatabaseConfig::getConnexion();

        $stmt = $conn->prepare("UPDATE posts SET dislikes = dislikes + 1 WHERE id = :post_id");
        $stmt->bindParam(':post_id', $postId);
        $stmt->execute();

        header("Location: tables.php");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>