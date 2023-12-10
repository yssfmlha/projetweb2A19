<?php
try {
    // Connect to your database using PDO
    $pdo = new PDO("mysql:host=localhost;dbname=projetweb", 'root', '');
  

    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch users from the user_form table
    $stmt = $pdo->query('SELECT * FROM user_form');

    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($users);
} catch (PDOException $e) {
    echo 'Failed to fetch users: ' . $e->getMessage();
} finally {
    // Close the database connection
    $pdo = null;
}
?>
