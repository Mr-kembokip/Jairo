<?php
// Start the session
session_start();

// If the user clicks the logout button
if (isset($_POST['Logout'])) {
    // Destroy the session
    session_destroy();

  
}
?>


