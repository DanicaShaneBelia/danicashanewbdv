<?php

include 'included/dbaccess/DBUtil.php';
$conn = getConnection();

if (isset($_POST['register'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $role = 'user';
    $status = 'active';
    $gender = $_POST['gender']; // Added gender field

    // Check if email already exists
    $emailExist = "SELECT COUNT(*) as emailCount FROM users WHERE email = '$email'";
    $emailResult = $conn->query($emailExist);
    $emailRow = $emailResult->fetch_assoc();

    if ($emailRow['emailCount'] > 0) {
        echo "<script language='javascript'>alert('Email already exists!');
            window.location.href ='landing.html';
            </script>";
        exit;
    }

    // Prepare and bind the values to prevent SQL injection
    $stmt = $conn->prepare('INSERT INTO `users` (`firstName`, `lastName`, `age`,  `email`, `address`, `password`, `Role`, `status`, `gender`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt->bind_param('sssssssss', $fname, $lname, $age, $email, $address, $password, $role, $status, $gender);

    if ($stmt->execute()) {
        session_start();
        $sql = "SELECT * FROM users WHERE email = '" . $email . "' and password = '" . $password . "'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        echo "<script language='javascript'>
            alert('Registered Successfully!');
        </script>";

        $_SESSION['id'] = $row['id'];
        $_SESSION['Role'] = $row['Role'];

        header('Location: users.php');
        exit;
    } else {
        echo 'Error: ' . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

?>