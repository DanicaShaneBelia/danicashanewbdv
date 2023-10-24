<?php
    $sql = "SELECT * FROM announcements";
    $announcementResult = mysqli_query($con, $sql);

    if ($announcementResult) {
        echo "<div id='announcementsPage'>";
        echo '<h2>Announcements</h2>';
        echo '<div class="announcements_list">';
        while ($row = mysqli_fetch_assoc($announcementResult)) {
           
            echo '<div class="announcement-card"> ';
            echo '<div class="announcement-content">';
            echo '<h3>' . htmlspecialchars($row['title']) . '</h3>';
            echo '<p>' . htmlspecialchars($row['content']) . '</p>';

            echo '</div>';
            echo '</div>';
          
        }
        echo '</div>';
        echo '</div>';
    }

    ?>