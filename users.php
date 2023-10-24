<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Page</title>
</head>

<body>

    <?php include('users-header.php') ?>


    <style>
        /* CSS style for the PHP-generated table */
        table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            background-color: #fff;
            border: 2px solid #012970;
        }

        table th,
        table td {
            padding: 12px 15px;
            text-align: left;
        }

        table th {
            background-color: #3876BF;
            color: #fff;

        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tr:hover {
            background-color: #AED2FF;
        }

        table td {
            border-bottom: 1px solid #ddd;
        }

        table td:last-child {
            border-bottom: none;
        }

        table td a {
            text-decoration: none;
            margin-right: 10px;
            color: #007bff;
            font-weight: bold;
        }

        table td a:hover {
            text-decoration: underline;
            color: #0056b3;
        }

        /* Style for the modal */
        .modal {
            display: flex;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            align-items: center;
            justify-content: center;
            
        }

        /* Style for the modal content */
        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>




    <!-- ======= Sideb
    r ======= -->
    <aside id="sidebar" class="sidebar" style='background: #012970;'>

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="users.php">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <!-- <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>List of Users</span>
                </a>
                <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="#">
                            <i class="bi bi-circle"></i><span>Users</span>
                        </a>

                </ul>
            </li>End Components Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="manageannouncements">
                    <i class="bi bi-journal-text"></i><span>Announcements</span>
                </a>
                <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="users.php?page=announcements">
                            <i class="bi bi-circle"></i><span>Announcements</span>
                        </a>

                </ul>
            </li><!-- End Forms Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span>
                </a>
                <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                       
                    </li>
                    <li>
                        
                    </li>
                </ul>
            </li><!-- End Tables Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="charts.php">
                    <i class="bi bi-bar-chart"></i><span>Charts</span>
                </a>
                <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="charts.php">
                            <i class="bi bi-circle"></i><span>Chart</span>
                        </a>
                    </li>


                </ul>
            </li><!-- End Charts Nav -->





    </aside><!-- End Sidebar-->





    <!-- HTML Table to display user registrations -->
    <main id="main" class="main">
        <div class="pagetitle">

            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../userManage.php">Home</a></li>
                    <li class="breadcrumb-item active" id="breadcrumb-current">Dashboard</li>
                </ol>
            </nav>
        </div>

        <!-- Your table content -->






</body>

</html>

<?php
// session_start();

// include_once('Included/dbaccess/DBUtil.php');
// $con = getConnection();


// if ($_SESSION["Role"] == null) {
//     header("Location: login.html");
// } else {
//     if ($_SESSION["Role"] == "user") {
//     } else {
//         header("Location: login.html");
//     }
// }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Page</title>
    <link rel="stylesheet" href="staff.css">
</head>
<style>
    body,
    h1,
    h2,
    button {
        margin: 0;
        padding: 0;
        font-family: Georgia, 'Times New Roman', Times, serif;
    }

    /* Apply a background color and set the font for the whole page */
    body {
        background-color: #f0f0f0;
        font-family: Georgia, 'Times New Roman', Times, serif;
    }

    /* Style the header with a background color, text color, and padding */
    header {
        background-color: #333;
        color: #fff;
        padding: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    /* Center-align the header text and make it larger */
    header h1 {
        font-size: 24px;
    }

    /* Style the main content area */
    main {
        max-width: 2000px;

        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    /* Style section headings */
    h2 {
        margin-top: 20px;
    }

    /* Style the buttons for activity controls */
    .button-controls {
        margin-top: 10px;
    }

    button {
        background-color: #333;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        margin-right: 10px;
        font-size: 16px;
    }

    button:hover {
        background-color: #555;
    }

    /* Style the activity list */
    .activity-list {
        margin-top: 20px;
    }

    a {
        display: inline-block;
        padding: 5px 10px;
        text-decoration: none;
        color: #fff;
        /* White text color */
        border-radius: 3px;
        font-weight: bold;
        font-family:  serif;
        transition: background-color 0.3s ease;
    }

    /* Hover effect */
    a:hover {
        background-color: #3876BF;
        /* Darker red color on hover */
        border: 2 px solid;
    }

    /* Style the Add Activity form container */
    #ActivityForm {
        
        background-color: #AED2FF;
        border-radius: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        padding: 20px;
        margin-top: 20px;
        border: 2px solid #012970;
        
    }

    #addActivityForm h2 {
        margin-bottom: 0px;
    }

    /* Style form elements */
    #addActivityForm label {
        display: block;
        margin-bottom: 5px;
    }

    #ActivityForm input[type="text"],
    #ActivityForm textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 3px;
        font-size: 16px;
        
    }

    #ActivityForm button[type="submit"] {
        background-color: #333;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        font-size: 16px;
    }

    #ActivityForm button[type="submit"]:hover {
        background-color: #012970;
    }

    /* Style the "Add Activity" button */
    #addActivityBtn {
        background-color: #3498db;
        /* Blue color */
        color: #fff;
        /* White text color */
        padding: 10px 20px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        font-size: 16px;
    }

    /* Hover effect */
    #addActivityBtn:hover {
        background-color: #2980b9;
        /* Darker blue color on hover */
    }

    .hidden {
        display: none;
    }

    .announcements_list{
        display: flex;
        flex-direction: column;
        gap: 1rem;
        flex-wrap: wrap;
    }
    

    .announcements_list .announcement-card{
        border: 2px solid #192655;
        border-radius: 1rem;
        padding: 1rem 2rem;
        transition: all 0.25s;
    }

    .announcements_list .announcement-card:hover{
        background-color: #AED2FF;
        color: #192655;
        text-decoration: none;
        
        margin-top: 10px;
        display: block;
        transition: color 0.2s; /* Add a smooth transition */
    }

    .hidden{
        display: none !important;
    }
    select{
        height: 40px;
        border-radius: 10px; 
    }
</style>

<body>


<main id="activityPage">
    <section class="activities">
    <div id="bargraph" class="chart-container">
                <h1>Activities by Month</h1>
            </div>
           
        <div class="activity-controls">
            <button id="addActivityBtn">Add Activity</button>
            
            <!-- modal  -->
            <div class="modal hidden">
                <div id="ActivityForm" style="">
                    <div style="display: flex; align-items: center; justify-content: space-between;">
                        <h2 id="FormTitle">Add Activity</h2>
                        <div class="close-btn" id="closeModal" style="cursor: pointer;"><p>X</p></div>
                    </div>

                    <form method="post" action="add_activity.php" id="EditAddForm">
                        <input type="hidden" data-info="id" name="activityId">
                        <label for="activityName">Name:</label>
                        <input type="text" name="activityName" data-info="name" required><br>

                        <label for="activityDate">Date:</label>
                        <input type="date" name="activityDate" data-info="date" required><br>

                        <label for="activityTime">Time:</label>
                        <input type="time" name="activityTime" data-info="time" required><br>

                        <label for="activityLocation">Location:</label>
                        <input type="text" name="activityLocation" data-info="location" required><br>

                        <label for="activityOOTD">OOTD (Outfit of the Day):</label>
                        <input type="text" name="activityOOTD" required data-info="ootd"><br>

                        <button type="submit" id="submitBtn">Add</button>
                    </form>

                    <form action="set_activity.php" method="post" id="setActivityForm">
                        <p>Status : <span id="activityStatus"></span></p>
                        <input type="hidden" name="id">
                        <select name="remarks" id="remarks">
                            <option value="ongoing">Ongoing</option>
                            <option value="done">Done</option>
                            <option value="cancelled">Cancel</option>
                        </select>
                        <br><br>
                        <button type="submit" id="setActivity" name="setActivity">Set Activity</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="activity-list">
     <?php include './show_activities.php'; ?>
        </div>
    </section>
</main>

<?php include 'show_announcements.php'; ?>


    <script src="./scripts/_users/users.js"></script>
</body>

</html>




</body>

</html>
<?php include('users-footer.php') ?>