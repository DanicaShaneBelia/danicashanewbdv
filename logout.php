<?php
session_start();
session_destroy();
header("Location: landing.html"); // Redirect users to the login page after logging out
exit();
?>
