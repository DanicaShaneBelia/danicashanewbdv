<?php 
  
    function getUsersTable(){
        global $con;

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT id, lastName, firstName, email, password, age, address, Role, Status, gender FROM users WHERE id != " . $_SESSION['id'];

    $result = mysqli_query($con, $sql);

    if ($result) {

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr data-user-id=" . $row["id"] . ">";
            echo "<td class='idCol'>" . $row["id"] . "</td>";
            echo "<td class='lastNameCol'>" . $row["lastName"] . "</td>";
            echo "<td class='firstNameCol'>" . $row["firstName"] . "</td>";
            echo "<td class='emailCol'>" . $row["email"] . "</td>";
            echo "<td class='passwordCol'>" . $row["password"] . "</td>";
            echo "<td class='ageCol'>" . $row["age"] . "</td>";
            echo "<td class='addressCol'>" . $row["address"] . "</td>";
            echo "<td class='roleCol'>" . $row["Role"] . "</td>";
            echo "<td class='statusCol'>" . $row["Status"] . "</td>";
            echo "<td class='genderCol'>" . $row["gender"] . "</td>";
            echo "<td class='action'>
                <button  class='btn btn-secondary' onclick='handleUpdate(this," . json_encode($row) . ")'>Update</button>
                <button class='btn btn-danger' onclick='handleDelete(" . $row["id"] . ")'>Delete</button>
            </td>";
            echo "</tr>";
        }

        
    } else {
        echo "Error: Unable to retrieve user data.";
    }

    mysqli_close($con);

    }


    function getFemaleCount(){
        global $con;
        $count = 0;
        $sql = "SELECT COUNT(*) AS count_result FROM users WHERE gender = 'female'";
        $result = mysqli_query($con, $sql);
        if($result){
            $row = mysqli_fetch_assoc($result);
            $count = $row["count_result"];
        }

        return $count;
    }


    function getMaleCount(){
        global $con;
        $count = 0;
        $sql = "SELECT COUNT(*) AS count_result FROM users WHERE gender = 'male'";
        $result = mysqli_query($con, $sql);
        if($result){
            $row = mysqli_fetch_assoc($result);
            $count = $row["count_result"];
        }

        return $count;
    }


    function getEveryActivitiesMonth(){
        global $con;
        $obj = array();
        $sql = "WITH RECURSIVE AllMonths AS (
            SELECT 1 AS month
            UNION ALL
            SELECT month + 1
            FROM AllMonths
            WHERE month < 12
          )
          SELECT 
              DATE_FORMAT(CONCAT('2023-', LPAD(AllMonths.month, 2, '0'), '-01'), '%M') AS x,
              IFNULL(COUNT(activities.date), 0) AS y
          FROM AllMonths
          LEFT JOIN activities ON DATE_FORMAT(activities.date, '%m') = LPAD(AllMonths.month, 2, '0')
          GROUP BY AllMonths.month
          ORDER BY AllMonths.month;
          ";
        $result = mysqli_query($con, $sql);

        while($row = mysqli_fetch_assoc($result)){
            $obj[] = $row;
        }
        return json_encode($obj);
    }
