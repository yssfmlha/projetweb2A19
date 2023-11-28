<?php
// Connect to your database
$conn = new mysqli('localhost','root','', 'user_db');

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Get user ID and new priority from the query parameters
$userId = $_GET['id'];
$newPriority = $_GET['priority'];

// Update user priority in the user_form table
$sql = "UPDATE user_form SET priority = '$newPriority' WHERE id = $userId";
$result = $conn->query($sql);

if ($result) {
    echo 'User priority updated successfully';
} else {
    echo 'Failed to update user priority';
}

$conn->close();
?>
