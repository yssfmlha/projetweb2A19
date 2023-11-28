<?php
// Connect to your database
$conn = new mysqli('localhost','root','', 'user_db');

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Get user ID from the query parameters
$userId = $_GET['id'];

// Delete user from the user_form table
$sql = "DELETE FROM user_form WHERE id = $userId";
$result = $conn->query($sql);

if ($result) {
    echo 'User deleted successfully';
} else {
    echo 'Failed to delete user';
}

$conn->close();
?>
