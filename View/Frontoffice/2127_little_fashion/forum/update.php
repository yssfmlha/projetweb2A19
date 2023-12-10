<?php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    try {
        $conn = DatabaseConfig::getConnexion(); // Establish a database connection

        $postId = $_POST['id'];
        $author = $_POST['author'];
        $title = $_POST['title'];
        $content = $_POST['content'];

        // Check for empty fields
        if (empty($author) || empty($title) || empty($content)) {
            echo "All fields are required.";
        } else {
            $stmt = $conn->prepare("UPDATE posts SET author = :author, title = :title, content = :content WHERE id = :id");
            $stmt->bindParam(':id', $postId);
            $stmt->bindParam(':author', $author);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':content', $content);
            $stmt->execute();
            
            header("Location: index.php"); // Redirect to index.php after updating the post
            exit();
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

