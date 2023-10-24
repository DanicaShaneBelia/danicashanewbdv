
<?php


if (isset($con) && $con && isset($_SESSION['id'])) {
    $sessionID  = $_SESSION['id'];
    $sql = "SELECT * FROM activities WHERE remarks!='cancelled' ORDER BY date ASC";
    $result = $con->query($sql);

    if ($result && $result->num_rows > 0) {
        // Display activities

        echo '<h2>Activities:</h2>';
        echo '<table>';
        echo '<tr><th>Name</th><th>Date</th><th>Time</th><th>Location</th><th>OOTD</th><th>Remarks</th></tr>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['date'] . '</td>';
            echo '<td>' . $row['time'] . '</td>';
            echo '<td>' . $row['location'] . '</td>';
            echo '<td>' . $row['ootd'] . '</td>';
            echo '<td>' . $row['remarks'] . '</td>';
            echo "<td class='action'> <a onclick='setActivity(".json_encode($row).")'>Set</a>  <a onclick='handleEdit(this, " . json_encode($row) . ")' style='cursor: pointer;'>Edit</a>"; // Add Edit link
            echo '<a href="delete_activity.php?id=' . $row['id'] . '">Delete</a></td>'; // Add Delete link
            echo '</tr>';
        }
        echo '</table>';
        echo '<hr>';

    } else {
        echo '<h1>No activities Found</h1>';
        echo '<hr>';

    }

    $cancelledActStmt = "SELECT * FROM activities WHERE remarks='cancelled' ORDER BY date ASC";
    $cancelledResult = $con->query($cancelledActStmt);
    if ($cancelledResult && $cancelledResult->num_rows > 0) {
        // Display activities

        echo '<h2>Cancelled Activities:</h2>';
        echo '<table>';
        echo '<tr><th>Name</th><th>Date</th><th>Time</th><th>Location</th><th>OOTD</th><th>Remarks</th></tr>';
        while ($row = $cancelledResult->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['date'] . '</td>';
            echo '<td>' . $row['time'] . '</td>';
            echo '<td>' . $row['location'] . '</td>';
            echo '<td>' . $row['ootd'] . '</td>';
            echo '<td>' . $row['remarks'] . '</td>';
            echo "<td class='action'> <a onclick='setActivity(".json_encode($row).")'>Set</a>  <a onclick='handleEdit(this, " . json_encode($row) . ")' style='cursor: pointer;'>Edit</a>"; // Add Edit link
            echo '<a href="delete_activity.php?id=' . $row['id'] . '">Delete</a></td>'; // Add Delete link
            echo '</tr>';
        }
        echo '</table>';
    }
} else {
    // Handle database connection error
    echo "Error accessing the database";
}
?>