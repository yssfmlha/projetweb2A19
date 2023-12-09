<?php
// Connect to your database
try {
    $pdo = new PDO("mysql:host=localhost;dbname=evenements", 'root', '');

    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get user ID and new priority from the query parameters
    $userId = $_GET['id'];
    $newPriority = $_GET['priority'];

    // Update user priority in the user_form table
    $sql = "UPDATE user_form SET priority = :newPriority WHERE id = :userId";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':newPriority', $newPriority, PDO::PARAM_INT);
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->execute();

    echo 'User priority updated successfully';
} catch (PDOException $e) {
    echo 'Failed to update user priority: ' . $e->getMessage();
} finally {
    // Close the database connection
    $pdo = null;
}
?>
