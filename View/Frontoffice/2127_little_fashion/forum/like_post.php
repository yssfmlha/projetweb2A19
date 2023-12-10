<?php
require_once 'config.php';

if (isset($_POST['like'])) {
    $postId = $_POST['post_id'];
    $userId = $_POST['user_id']; // Using $randomId as the user_id

    try {
        $conn = DatabaseConfig::getConnexion();

        // Check if the user has already liked the post
        $stmt_check_like = $conn->prepare("SELECT * FROM UserLikes WHERE user_id = :user_id AND post_id = :post_id");
        $stmt_check_like->bindParam(':user_id', $userId);
        $stmt_check_like->bindParam(':post_id', $postId);
        $stmt_check_like->execute();
        $liked = $stmt_check_like->fetch(PDO::FETCH_ASSOC);

        // Check if the user has disliked the post
        $stmt_check_dislike = $conn->prepare("SELECT * FROM UserDislikes WHERE user_id = :user_id AND post_id = :post_id");
        $stmt_check_dislike->bindParam(':user_id', $userId);
        $stmt_check_dislike->bindParam(':post_id', $postId);
        $stmt_check_dislike->execute();
        $disliked = $stmt_check_dislike->fetch(PDO::FETCH_ASSOC);

        if ($liked) {
            // User has already liked the post, remove the like
            $stmt_delete_like = $conn->prepare("DELETE FROM UserLikes WHERE user_id = :user_id AND post_id = :post_id");
            $stmt_delete_like->bindParam(':user_id', $userId);
            $stmt_delete_like->bindParam(':post_id', $postId);
            $stmt_delete_like->execute();

            $stmt_decrement_likes = $conn->prepare("UPDATE posts SET likes = likes - 1 WHERE id = :post_id");
            $stmt_decrement_likes->bindParam(':post_id', $postId);
            $stmt_decrement_likes->execute();
        } elseif (!$disliked) {
            // User hasn't liked the post and hasn't disliked it, proceed to like
            $stmt_insert_like = $conn->prepare("INSERT INTO UserLikes (user_id, post_id) VALUES (:user_id, :post_id)");
            $stmt_insert_like->bindParam(':user_id', $userId);
            $stmt_insert_like->bindParam(':post_id', $postId);
            $stmt_insert_like->execute();

            $stmt_increment_likes = $conn->prepare("UPDATE posts SET likes = likes + 1 WHERE id = :post_id");
            $stmt_increment_likes->bindParam(':post_id', $postId);
            $stmt_increment_likes->execute();
        }

        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
