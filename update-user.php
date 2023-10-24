<?php
session_start();
include_once './included/dbaccess/DBUtil.php';
$conn = getConnection();

include_once './included/dbaccess/DBUtil.php';

if (isset($_POST['updateUser']) && $_SESSION['Role'] == "admin") {
    $id = $_POST['id'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $role = $_POST['Role'];
    $status = $_POST['Status'];
    $gender = $_POST['gender']; // Added line for gender field

    $sql = "UPDATE users SET 
        firstName = '$firstName', 
        lastName = '$lastName', 
        email = '$email', 
        password = '$password', 
        age = '$age', 
        address = '$address', 
        Role = '$role', 
        Status = '$status',
        gender = '$gender' 
        WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Record updated successfully');
        window.location.href = 'admin.php?page=users';
        </script>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    echo "Error";
}
?>