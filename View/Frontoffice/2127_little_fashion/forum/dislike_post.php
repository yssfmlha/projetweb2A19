<?php
require_once 'config.php';

if (isset($_POST['dislike'])) {
    $postId = $_POST['post_id'];
    $userId = $_POST['author_id']; // Assuming 'user_id' is sent via the form

    try {
        $conn = DatabaseConfig::getConnexion();

        // Check if the user has already disliked the post
        $stmt_check_dislike = $conn->prepare("SELECT * FROM UserDislikes WHERE user_id = :user_id AND post_id = :post_id");
        $stmt_check_dislike->bindParam(':user_id', $userId);
        $stmt_check_dislike->bindParam(':post_id', $postId);
        $stmt_check_dislike->execute();
        $disliked = $stmt_check_dislike->fetch(PDO::FETCH_ASSOC);

        // Check if the user has liked the post
        $stmt_check_like = $conn->prepare("SELECT * FROM UserLikes WHERE user_id = :user_id AND post_id = :post_id");
        $stmt_check_like->bindParam(':user_id', $userId);
        $stmt_check_like->bindParam(':post_id', $postId);
        $stmt_check_like->execute();
        $liked = $stmt_check_like->fetch(PDO::FETCH_ASSOC);

        if ($disliked) {
            // User has already disliked the post, remove the dislike
            $stmt_delete_dislike = $conn->prepare("DELETE FROM UserDislikes WHERE user_id = :user_id AND post_id = :post_id");
            $stmt_delete_dislike->bindParam(':user_id', $userId);
            $stmt_delete_dislike->bindParam(':post_id', $postId);
            $stmt_delete_dislike->execute();

            $stmt_decrement_dislikes = $conn->prepare("UPDATE posts SET dislikes = dislikes - 1 WHERE id = :post_id");
            $stmt_decrement_dislikes->bindParam(':post_id', $postId);
            $stmt_decrement_dislikes->execute();
        } elseif (!$liked) {
            // User hasn't disliked the post and hasn't liked it, proceed to dislike
            $stmt_insert_dislike = $conn->prepare("INSERT INTO UserDislikes (user_id, post_id) VALUES (:user_id, :post_id)");
            $stmt_insert_dislike->bindParam(':user_id', $userId);
            $stmt_insert_dislike->bindParam(':post_id', $postId);
            $stmt_insert_dislike->execute();

            $stmt_increment_dislikes = $conn->prepare("UPDATE posts SET dislikes = dislikes + 1 WHERE id = :post_id");
            $stmt_increment_dislikes->bindParam(':post_id', $postId);
            $stmt_increment_dislikes->execute();
        }

        header("Location: index.php");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
