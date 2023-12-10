<?php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = DatabaseConfig::getConnexion();

 // Ensure author_id is retrieved from POST data
 $authorId = $_POST['author_id'];
 $author = $_POST['author'];
 $title = $_POST['title'];
 $content = $_POST['content'];
    if ( empty($title) || empty($content)) {
        echo "All fields are required.";
    } else {
        try {
            $stmt = $conn->prepare("INSERT INTO posts (author, author_id, title, content) VALUES (:author, :author_id, :title, :content )");
$stmt->bindParam(':author', $author);
$stmt->bindParam(':author_id', $authorId);
$stmt->bindParam(':title', $title);
$stmt->bindParam(':content', $content);
$stmt->execute();
            // Redirect with JavaScript if header doesn't work
            echo "<script>window.location.href='index.php';</script>";
            exit();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            exit();
        }
    }
}
?>

