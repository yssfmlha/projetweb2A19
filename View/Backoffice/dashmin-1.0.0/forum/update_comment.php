
<?php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $conn = DatabaseConfig::getConnexion();

        $comment_id = $_POST['comment_id'];
        $updated_comment_text = $_POST['comment_text'];
        $author = $_POST['author'];

        $stmt = $conn->prepare("UPDATE comments SET comment_text = :updated_comment_text, author = :author WHERE id = :id");
        $stmt->bindParam(':updated_comment_text', $updated_comment_text);
        $stmt->bindParam(':author', $author);
        $stmt->bindParam(':id', $comment_id);
        $stmt->execute();

        header("Location: tables.php"); // Redirect back to the blog page after updating a comment
        exit();
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request.";
}
?>
