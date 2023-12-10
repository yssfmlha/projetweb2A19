<?php
try {
    // Connect to your database using PDO
    $pdo = new PDO("mysql:host=localhost;dbname=projetweb", 'root', '');

    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get user ID from the query parameters
    $userId = $_GET['id'];

    // Delete user from the user_form table
    $sql = "DELETE FROM user_form WHERE id = :userId";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->execute();

    echo 'User deleted successfully';
} catch (PDOException $e) {
    echo 'Failed to delete user: ' . $e->getMessage();
} finally {
    // Close the database connection
    $pdo = null;
}
?>
