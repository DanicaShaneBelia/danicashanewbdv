<?php include_once('dash-header.php'); ?>
<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar" style='background:#012970;'>

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="admin.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>List of Users</span>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="admin.php?page=users">
                        <i class="bi bi-circle"></i><span>Users</span>
                    </a>

            </ul>
        </li><!-- End Components Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="admin.php?page=announcements">
                <i class="bi bi-journal-text"></i><span>Manage Announcements</span>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="admin.php?page=announcements">
                        <i class="bi bi-circle"></i><span>Announcements</span>
                    </a>

            </ul>
        </li><!-- End Forms Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                
                    </a>
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
                        <i class="bi bi-circle"></i><span>Charts</span>
                    </a>
                </li>


            </ul>
        </li><!-- End Charts Nav -->

        



</aside><!-- End Sidebar-->


<hr>

<div style="display: flex; align-items: center; justify-content: center;">

    <?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        switch ($page) {
            case 'announcements':
                include "announcements.php";
                break;
            case 'users':
                include "user_list.php";
            default:
                break;
        }
    } else {
        include('charts.php');
    }
    ?>

</div>



<hr>
<!-- <iframe src="charts.html" width="100%" height="1000" margin-left></iframe> -->
<hr>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
    

    
</head>


<!-- ... (remaining HTML code) ... -->

<style>
    /* Reset some default browser styles */
    body,
    h1,
    h2,
    p {
        margin: 0;
        padding: 0;
        font-family: serif;

    }

    /* Basic styling for the body */
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        font-family: Georgia, 'Times New Roman', Times, serif;
       

    }
    table{
        border:2 px solid #012970;
       
    }

    /* Header styling */
    header {
        background-color: #333;
        color: #fff;
        text-align: center;
        padding: 20px 0;
    }

    /* Navigation styling */
    nav ul {
        list-style-type: none;
        padding: 0;

    }

    nav ul li {
        display: inline;
        margin-right: 20px;
    }

    nav ul li a {
        text-decoration: none;
        color: #fff;
    }

    /* Main content styling */
    main {
        padding: 20px;
        margin-left: 30%;
    }

    /* Announcements section styling */
    #announcements {}

    /* Announcement list styling */
    #announcement-list {
        list-style-type: none;
        padding: 0;
    }

    #announcement-list li {
        margin-bottom: 10px;
        border-bottom: 1px solid #ccc;
        padding-bottom: 10px;
    }

    /* Announcement text styling */
    .announcement-content p {
        font-size: 16px;
        font-family: Georgia, 'Times New Roman', Times, serif;
    }

    /* Reactions and comments styling */
    .reactions,
    .comments {
        margin-top: 10px;
    }

    .reaction-button,
    .comment-button {
        background-color: rgb(82, 123, 180);
        color: #fff;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        margin-right: 5px;
        border-radius: 10px;
    }
    button{
        height: 40px;
        width: 100px;
        border-radius: 15px;
    }
    button:hover{
        background-color: #3876BF;
    }

    .reaction-button:hover,
    .comment-button:hover {
        background-color: rgb(82, 123, 180);
    }

    .comment-input {
        width: 70%;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .comment-list {
        list-style-type: none;
        padding: 0;
    }

    .comment-list li {
        margin-bottom: 5px;
        font-size: 14px;
    }

    /* Add this CSS to your existing <style> section */
    .announcement-card {
        background-color: #fff;
        padding: 20px;
        border: 1px solid #ccc;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        /* Add margin to separate cards */
    }

    /* Add this CSS to your existing <style> section */
    .edit-delete-buttons {
        margin-top: 10px;
        text-align: right;
        padding: 2px;
    }

    .edit-button,
    .delete-button {
        background-color: rgb(82, 123, 180);
        color: #fff;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        margin-right: 5px;
        border-radius: 10px;

    }

    .edit-button:hover,
    .delete-button:hover,
    .comment-button:hover {
        background-color: #AED2FF;
        width: 50px;
    }

    div.announcement-card {
    border: 2px solid #071952;
    border-radius: 20px;
    transition: border-color 0.3s;
    
   
}

div.announcement-card:hover {
    background-color: #AED2FF;
    border-radius: 1rem;
    padding: 1rem 3rem;
    transition: all 0.5s;
}

    #announcements input {
        height: 50px;
        width: 100%;
        border-radius: 10px;
        margin-bottom: 1rem;
    }
    #announcements_input:hover{
        border-color: #AED2FF;
    }

    :root {
        --primary-color: #FF6B6B;
        
        --accent-color: #06D6A0;
        --text-color: #333333;
        --background-color: #F3F3F3;
        --border-color: #CCCCCC;
    }


    /* announcements  */

    .announcements-wrapper {
        margin-top: 5rem;

    }


    section#announcements {
        margin-top: 5rem;
        width: 700px;
        height: 300px;
        font-family: Georgia, 'Times New Roman', Times, serif;
        border-radius: 20px;
        border: 1px solid #ccc;
        padding: 20px;
        background-color: rgb(99, 128, 172);
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);

    }


    .announcement_modal {
        background-color: rgb(0, 0, 0, 0.10);
        position: fixed;
        top: 0;
        left: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
        width: 100%;
        z-index: 100;
    }

    .announcement_header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        color: white;
    }


    .announcement_header p {
        cursor: pointer;
        transition: transform 0.25s;

        &:hover {
            transform: scale(1.10);
        }
    }


    .hidden {
        display: none !important;
    }

    .btn {
       
        height: 40px;
        width: 100px;
        border-radius: 15px;
       
    }



    .announcements_list{
        flex-wrap: wrap;
        max-width: 800px;
        min-width: 500px;
        display: flex;
        gap: 1rem;
    }

    .announcements_list > *{
        flex: 1 1;
        max-width: 300px;
    }
    iframe{
        height: 1000px;
    }
</style>

<body>


    <nav>

    </nav>


    <script>


        const announcementModal = document.getElementById('announcement_modal');
        const createAnnouncementBtn = document.getElementById('create-announcement_btn');
        const closeModal = document.getElementById('close_modal');
        const modalName = document.getElementById('modal_name');
        const submitAnnouncement = document.getElementById('submitAnnouncement');
        const announcementForm = document.getElementById('announcement-form');

        createAnnouncementBtn.addEventListener("click", () => {
            announcementForm.reset();
            toggleAnnouncementModal();
            modalName.innerText = "Create ";
            submitAnnouncement.setAttribute("name", "addAnnouncement");
            submitAnnouncement.innerText = "Create "
        })



        closeModal.addEventListener("click", ()=>{
            toggleAnnouncementModal();
        })

        function editAnnouncement(data) {
            toggleAnnouncementModal();
            modalName.innerText = "Edit Announcement";
            submitAnnouncement.setAttribute("name", "editAnnouncement");
            submitAnnouncement.innerText = "Apply Edit"
            
            announcementForm.querySelectorAll('input').forEach(input =>{
                const inputType = input.getAttribute("name");
                input.value = data[inputType];
            })

        }

        function toggleAnnouncementModal() {
            announcementModal.classList.toggle('hidden')
        }
    </script>


   
</body>


</html>


<?php include('dash-footer.php') ?>