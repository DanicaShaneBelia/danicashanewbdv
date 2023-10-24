<?php
// Retrieve the user ID and updated values from the AJAX request
$id = $_POST['id'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$password = $_POST['password'];
$age = $_POST['age'];
$address = $_POST['address'];
$role = $_POST['role'];
$status = $_POST['status'];

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

// Prepare and execute the SQL update statement
$stmt = $conn->prepare("UPDATE users SET firstName=?, lastName=?, email=?, password=?, age=?, address=?, role=?, status=? WHERE id=?");
$stmt->bind_param("ssssisssi", $firstName, $lastName, $email, $password, $age, $address, $role, $status, $id);
$stmt->execute();

// Check if the update was successful
if ($stmt->affected_rows > 0) {
    $response = ['status' => 'success', 'message' => 'Record updated successfully'];
} else {
    $response = ['status' => 'error', 'message' => 'Failed to update record'];
}

// Close the database connection
$stmt->close();
$conn->close();

// Send the JSON response back to the JavaScript code
header('Content-Type: application/json');
echo json_encode($response);
?>