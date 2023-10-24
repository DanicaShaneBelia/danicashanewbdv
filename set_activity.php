<?php
include_once('Included/dbaccess/DBUtil.php');
$conn = getConnection();

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['id']) && isset($_POST['setActivity'])) {
    $activityId = $_POST['id'];
    $activityStatus = $_POST['remarks'];
    $userId = $_SESSION['id'];

    $sql = "UPDATE activities SET
            remarks = '$activityStatus'
            WHERE id = $activityId";

    $result = mysqli_query($conn, $sql);
    

    if ($result) {

        $fetchSql = "SELECT name FROM activities WHERE id = $activityId";
        $nameResult = mysqli_query($conn, $fetchSql);
        $activityName = "";
        
        if ($nameResult) {
            $row = mysqli_fetch_assoc($nameResult);
            $activityName = $row['name'];
        }

        echo "<script>alert('Activity named: $activityName set successfully');
        window.location.href='users.php'</script>";
    } else {
        echo "<script>alert('Error setting the activity');
        window.location.href='users.php'</script>";
    }
}else{
    echo "<script>alert('Error setting the activity');
        window.location.href='users.php'</script>";
}
