<?php
// Redirect to page
function redirect($page = FALSE, $message = NULL, $message_type = NULL) {
    if (is_string($page)) {
        $location = $page;
    } else {
        $location = $_SERVER['SCRIPT_NAME'];
    }

    // Check for message
    if ($message != NULL) {
        // Set message
        $_SESSION['message'] = $message;
    }

    // Check for type
    if ($message_type != NULL) {
        // Set message type
        $_SESSION['message_type'] = $message_type;
    }

    // Redirect
    header('Location: ' .$location);
    exit;
}

// Display message
function displayMessage() {
    if (!empty($_SESSION['message'])) {
        // Assign message var
        $message = $_SESSION['message'];

        if (!empty($_SESSION['message_type'])) {
            // Assign type var
            $message_type = $_SESSION['message_type'];

            // Create output
            if ($message_type == 'error') {
                echo '<div class="alert alert-danger">' .$message. '</div>';
            } else {
                echo '<div class="alert alert-success">' .$message. '</div>';
            }
        }

        // Unset the message
        unset($_SESSION['message']);
        unset($_SESSION['message_type']);
    } else {
        echo '';
    }
}