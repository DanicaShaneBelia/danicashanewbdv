<?php

    include_once './included/dbaccess/DBUtil.php';
    session_start();
    $conn = getConnection();

    if(isset($_POST['deleteUser']) && isset($_POST['idToDelete']) && $_SESSION["Role"]== "admin")  {

        $idToDelete = $_POST['idToDelete'];


        $sql = "DELETE FROM users WHERE id = $idToDelete";
        if (mysqli_query($conn, $sql)) {

            echo "<script>
                window.location.href = 'admin.php?page=users';
            </script>";
        } else {
            echo "Error deleting user: " . mysqli_error($conn);
        }
    }
