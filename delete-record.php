<?php
// Retrieve the user ID from the AJAX request
$id = $_POST['id'];

// Create a database connection
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'sd208'; // Replace with your actual database name
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Prepare and execute the SQL delete statement
$stmt = $conn->prepare("DELETE FROM users WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();

// Check if the deletion was successful
if ($stmt->affected_rows > 0) {
    $response = ['status' => 'success', 'message' => 'Record deleted successfully'];
} else {
    $response = ['status' => 'error', 'message' => 'Failed to delete record'];
}

// Close the database connection
$stmt->close();
$conn->close();

// Send the JSON response back to the JavaScript code
header('Content-Type: application/json');
echo json_encode($response);
?>