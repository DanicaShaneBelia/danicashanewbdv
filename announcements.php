<!DOCTYPE html>
<html lang="en">

<head>

<body>

    <main id="main"><div class="announcements-wrapper">

<button id="create-announcement_btn" class="btn btn-primary">Create</button>
<hr>
<hr>
<?php
if (isset($_POST['addAnnouncement'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    if (!empty($title) && !empty($content)) {
        $query = "INSERT INTO announcements (title, content) VALUES ('$title', '$content')";
        $result = mysqli_query($con, $query);
        if ($result) {
            echo '<script>alert("Your announcement has been added!"); window.location.href="admin.php?page=announcements";</script>';
        } else {
            echo 'Error: ' . mysqli_error($con);
        }
    } else {
        echo '<script>alert("Please input the fields!"); window.location.href="admin.php?page=announcements";</script>';
    }
}

if (isset($_POST['deleteAnnouncement'])) {
    $announcement_id = $_POST['announcement_id'];

    $query = "DELETE FROM announcements WHERE id = $announcement_id";

    if (mysqli_query($con, $query)) {
        echo '<script>window.location.href="admin.php?page=announcements";</script>';
    } else {
        echo 'Error: ' . mysqli_error($con);
    }
}

if (isset($_POST['editAnnouncement'])) {
    $editAnnouncement_id = $_POST['id'];
    $editTitle = $_POST['title'];
    $editContent = $_POST['content'];

    if (!empty($editTitle) && !empty($editContent)) {

        $editSql = "UPDATE announcements SET title = '$editTitle', content = '$editContent' WHERE id = '$editAnnouncement_id'";
        $editResult = mysqli_query($con, $editSql);
        if ($editResult) {
            echo '<script>alert("Announcement has been updated."); window.location.href="admin.php?page=announcements";</script>';
        } else {
            echo '<script>alert("Error"); window.location.href="admin.php?page=announcements";</script>';
        }
    } else {
        echo '<script>alert("Please input the fields."); window.location.href="admin.php?page=announcements";</script>';
    }
}

?>
<div class="announcement_modal hidden" id="announcement_modal">
    <section id="announcements">
        <div class="announcement_header">
            <h2 id="modal_name">Announcements</h2>
            <p id="close_modal">X</p>
        </div>
        <div class="announcement-card">
            <div class="announcement-content">
                <form id="announcement-form" method="POST">
                    <input type="hidden" name="id">
                    <input type="text" name="title" placeholder="Enter announcement title">
                    <input type="text" id="announcement-text" name="content" placeholder="Enter your announcement">
                    <button type="submit" name="addAnnouncement" id="submitAnnouncement">Add Announcement</button>
                </form>
            </div>
        </div>
    </section>
</div>


<?php
$sql = "SELECT * FROM announcements";
$announcementResult = mysqli_query($con, $sql);

if ($announcementResult) {
    echo '<h2>Announcements</h2>';
    echo '<div class="announcements_list">';
    while ($row = mysqli_fetch_assoc($announcementResult)) {

        echo '<div class="announcement-card">';
        echo '<div class="announcement-content">';
        echo '<h2>' . htmlspecialchars($row['title']) . '</h2>';
        echo '<p>' . htmlspecialchars($row['content']) . '</p>';

        echo '<div style="display: flex; gap:1rem;"><form method="POST">';
        echo '<input type="hidden" name="announcement_id" value="' . $row['id'] . '">';
        echo '<button type="submit" name="deleteAnnouncement">Delete</button>';
        echo '</form>';
        echo "<button onclick='editAnnouncement(" . json_encode($row) . ")'>Edit</button></div>";
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';
}

?>
<script>

</script>
</div></main>


</body>
</html>