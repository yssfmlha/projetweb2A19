<?php
require_once 'comment.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['delete_id'])) {
    try {
        $conn = DatabaseConfig::getConnexion();

        $deleteId = $_GET['delete_id'];

        $stmt = $conn->prepare("DELETE FROM posts WHERE id = :id");
        $stmt->bindParam(':id', $deleteId);
        $stmt->execute();

        header("Location: index.php");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        exit(); 
    }
}
?>
