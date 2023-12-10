<?php

require_once 'config.php';


$commentId = $_GET['comment_id'] ?? null;

if ($commentId) {
    try {
        $conn = DatabaseConfig::getConnexion(); 

        
        $stmt = $conn->prepare("DELETE FROM comments WHERE id = :id");
        $stmt->bindParam(':id', $commentId);
        $stmt->execute();

       
        header("Location: index.php?comment_deleted=true");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Comment ID not provided.";
}
?>
