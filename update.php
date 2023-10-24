<?php
// Database connection parameters
$host = 'localhost'; // Replace with your database host
$username = 'root'; // Replace with your database username
$password = ''; // Replace with your database password
$database = 'sd208'; // Replace with your database name

// Create a database connection
$mysqli = new mysqli($host, $username, $password, $database);

// Check the connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Retrieve data from the form
$firstName = $mysqli->real_escape_string($_POST['firstName']);
$lastName = $mysqli->real_escape_string($_POST['lastName']);
$email = $mysqli->real_escape_string($_POST['email']);
$password = $mysqli->real_escape_string($_POST['password']);
$age = $mysqli->real_escape_string($_POST['age']);
$address = $mysqli->real_escape_string($_POST['address']);
$role = $mysqli->real_escape_string($_POST['role']);
$status = $mysqli->real_escape_string($_POST['status']);
$user_id = isset($_POST['user_id']) ? intval($_POST['user_id']) : null;

if ($user_id === null) {
    die("User ID is missing in the form data.");
}

// Assuming you have a 'users' table with correct column names
$sql = "UPDATE users SET
        first_name = '$firstName',
        last_name = '$lastName',
        email = '$email',
        password = '$password',
        age = '$age',
        address = '$address',
        role = '$role',
        status = '$status'
        WHERE id = $user_id";

if ($mysqli->query($sql) === TRUE) {
    echo "User data updated successfully";
} else {
    echo "Error updating user data: " . $mysqli->error;
}

// Close the database connection
$mysqli->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update User</title>
</head>
<body>
    <div id="updateModal" class="modal">
        <div class="modal-content">
            <!-- Update user form goes here -->
            <h2>Update User</h2>
            <form method="post" action="update_process.php">
                <!-- Include form fields for updating user data -->
                <input type="text" name="firstName" placeholder="First Name">
                <input type="text" name="lastName" placeholder="Last Name">
                <input type="text" name="email" placeholder="Email">
                <input type="text" name="password" placeholder="Password">
                <input type="text" name="age" placeholder="Age">
                <input type="text" name="address" placeholder="Address">
                <input type="text" name="role" placeholder="Role">
                <input type="text" name="status" placeholder="Status">

                <!-- Add a hidden input field for user_id -->
                <input type="hidden" name="user_id" value="123"> <!-- Replace '123' with the actual user ID -->

                <input type="submit" value="Update">
            </form>

            <button onclick="closeUpdateModal()">Close</button>
        </div>
    </div>

    <script>
        // JavaScript function to close the update modal
        function closeUpdateModal() {
            window.close();
        }
    </script>
</body>
</html>
