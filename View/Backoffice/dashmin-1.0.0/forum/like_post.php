<?php

require_once 'config.php';

if (isset($_POST['like'])) {
    $postId = $_POST['post_id'];

    try {
        $conn = DatabaseConfig::getConnexion();

        
        $stmt = $conn->prepare("UPDATE posts SET likes = likes + 1 WHERE id = :post_id");
        $stmt->bindParam(':post_id', $postId);
        $stmt->execute();

        
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
