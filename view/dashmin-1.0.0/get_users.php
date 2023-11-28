<?php
// Connect to your database
$conn = new mysqli('localhost','root','', 'user_db');


if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Fetch users from the user_form table
$result = $conn->query('SELECT * FROM user_form');

if ($result->num_rows > 0) {
    $users = [];
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
    echo json_encode($users);
} else {
    echo '[]';
}

$conn->close();
?>
