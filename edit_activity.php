<?php
include_once('Included/dbaccess/DBUtil.php');
$con = getConnection();

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['id']) && isset($_POST['updateActivity'])) {
    $activityId = $_POST['activityId'];
    $activityName = $_POST['activityName'];
    $activityDate = $_POST['activityDate'];
    $activityTime = $_POST['activityTime'];
    $activityLocation = $_POST['activityLocation'];
    $activityOOTD = $_POST['activityOOTD'];
    $userId = $_SESSION['id'];
    // Create an SQL statement to update the activity in the database
    $sql = "UPDATE activities SET
            name = '$activityName',
            date = '$activityDate',
            time = '$activityTime',
            location = '$activityLocation',
            ootd = '$activityOOTD'
            WHERE id = $activityId";

    if (mysqli_query($con, $sql)) {
        echo "<script>alert('Successfully Edited the Activity');
                window.location.href = 'users.php';
        </script>";
    } else {
        echo "<script>alert('Error Editing the Activity');
        window.location.href = 'users.php';
</script>";
    }

    mysqli_close($con);
}else{
    echo "<script>alert('Error');
    window.location.href = 'users.php';
</script>";
}

?>