<?php
include_once('Included/dbaccess/DBUtil.php');
$con = getConnection();
session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id']) && isset($_SESSION['id'])) {
    $activityId = $_GET['id'];
    $userId = $_SESSION['id'];
    // Delete the activity from the database
    $sql = "DELETE FROM activities WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $activityId);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "<script>alert('Deleted the activity successfully');
        window.location.href = 'users.php'</script>";
    } else {
        echo "<script>alert('Error Deleting an activity');
        window.location.href = 'users.php'</script>";
    }

    $stmt->close();
} else {
    echo "Invalid request.";
}

$con->close();
?>