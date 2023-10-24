<?php
// Handle the user deletion logic here
$userId = $_POST['userId'];

// Implement your database deletion code here
// ...

if (/* Deletion is successful */) {
    echo "success";
} else {
    echo "failure";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Delete User</title>
</head>
<body>
    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <!-- Delete user confirmation message goes here -->
            <h2>Delete User</h2>
            <p>Are you sure you want to delete this user?</p>
            <button onclick="confirmDeleteUser(<?php echo $row['id']; ?>)">Delete</button>

            <button onclick="closeDeleteModal()">Cancel</button>
        </div>
    </div>

    <script>
        // JavaScript functions to show/hide the delete modal
        function showDeleteModal() {
            document.getElementById("deleteModal").style.display = "block";
        }

        function closeDeleteModal() {
            window.close();
        }

        function confirmDeleteUser(userId) {
            if (confirm("Are you sure you want to delete this user?")) {
                // Make an AJAX request to delete the user
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        // Check the response from the server
                        if (xhr.responseText === "success") {
                            // Optionally, you can remove the deleted row from the table
                            var rowToDelete = document.getElementById("row-" + userId);
                            if (rowToDelete) {
                                rowToDelete.remove();
                            }
                        } else {
                            alert("Failed to delete user.");
                        }
                        closeDeleteModal();
                    }
                };
                xhr.open("POST", "delete_process.php", true); // Replace "delete_process.php" with the actual endpoint to delete a user
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.send("userId=" + userId);
            }
        }
    </script>
</body>
</html>
