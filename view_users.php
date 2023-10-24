<?php
session_start();

// Check if the user is logged in as an admin
if ($_SESSION["Role"] !== "admin") {
    header("Location: landing.html");
    exit();
}

// Database connection information
$servername = "localhost"; // Change to your database server name if it's different
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$database = "sd208"; // Replace with your database name

// Create a database connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// SQL query to retrieve all users
$sql = "SELECT * FROM users"; // Change "members" to "users" if that's your table name
$result = mysqli_query($conn, $sql);

if ($result) {
    // Display the list of users
    echo "<h2>Registered Users</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Last Name</th><th>First Name</th><th>Age</th><th>Address</th><th>Username</th></tr>";
    
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["lastName"] . "</td>";
        echo "<td>" . $row["firstName"] . "</td>";
        echo "<td>" . $row["age"] . "</td>";
        echo "<td>" . $row["address"] . "</td>";
        echo "<td>" . $row["username"] . "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    echo "Error: Unable to retrieve user data.";
}

// Close the database connection
mysqli_close($conn);
?>
