<?php
include_once('Included/dbaccess/DBUtil.php');
session_start();
$con = getConnection(); // Make sure this line establishes the database connection



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $activityName = $_POST["activityName"];
    $activityDate = $_POST["activityDate"];
    $activityTime = $_POST["activityTime"];
    $activityLocation = $_POST["activityLocation"];
    $activityOOTD = $_POST["activityOOTD"];


    if (isset($con) && $con) {
        $sql = "INSERT INTO activities (name, user_id, date, time, location, ootd) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $con->prepare($sql);
    

        $stmt->bind_param("sissss", $activityName, $_SESSION['id'],$activityDate, $activityTime, $activityLocation, $activityOOTD);
    
 
        if ($stmt->execute()) {
            echo "<script>alert('Successfully created the activity'); 
             window.location.href = 'users.php';                       
            </script>";
        } else {
            echo "<script>alert('Error creating an activity'); 
            window.location.href = 'users.php';                       
           </script>";
            
        }
    

        $stmt->close();
    } else {

        $errorMessage = "Database connection error.";
    }
    
}
?>

\
