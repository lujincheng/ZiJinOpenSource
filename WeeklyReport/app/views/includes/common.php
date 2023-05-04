<?php

require_once '../app/functions.php';
require_once '../app/auth.php';

// Check if there is any alert message stored in session
if (isset($_SESSION['alert'])) {
    // Display the alert message as a JavaScript alert box
    echo "<script>alert('{$_SESSION['alert']}');</script>";

    // Remove the alert message from the session to prevent it from being displayed again
    unset($_SESSION['alert']);
}

?>
