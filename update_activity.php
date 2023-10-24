<?php
include_once('Included/dbaccess/DBUtil.php');
$con = getConnection();

$errorMessage = '';
$successMessage = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $activityId = $_POST["activityId"];
    $activityName = $_POST["activityName"];
    $activityDate = $_POST["activityDate"];
    $activityTime = $_POST["activityTime"];
    $activityLocation = $_POST["activityLocation"];
    $activityOOTD = $_POST["activityOOTD"];

 // ...

    // Perform validation on form data
    $errors = array();

    if (empty($activityName)) {
        $errors[] = "Activity Name is required.";
    }

    if (empty($activityDate)) {
        $errors[] = "Date is required.";
    }

    if (empty($activityTime)) {
        $errors[] = "Time is required.";
    }

    if (empty($activityLocation)) {
        $errors[] = "Location is required.";
    }

    if (empty($activityOOTD)) {
        $errors[] = "OOTD is required.";
    }

    if (empty($errors)) {
        // Update the activity details in the database
        $sql = "UPDATE activities SET name = ?, date = ?, time = ?, location = ?, ootd = ? WHERE id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("sssssi", $activityName, $activityDate, $activityTime, $activityLocation, $activityOOTD, $activityId);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $successMessage = "Activity updated successfully.";
        } else {
            $errorMessage = "Failed to update activity. Please try again.";
        }

        $stmt->close();
    } else {
        $errorMessage = implode('<br>', $errors);
    }
}

$con->close();
?>