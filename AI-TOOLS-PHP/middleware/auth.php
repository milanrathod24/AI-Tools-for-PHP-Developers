<?php
// Middleware Example - Authentication Check
// Include this file at the top of protected pages to prevent unauthorized access.

// Start the session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

/**
 * Check if the user is authenticated (logged in).
 * If not, redirect them to the login page.
 */
function checkAuth() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit(); // Stop script execution after redirect
    }
}

/**
 * Check if the user is a guest (NOT logged in).
 * Useful for redirecting logged-in users away from login/register pages.
 */
function checkGuest() {
    if (isset($_SESSION['user_id'])) {
        header("Location: profile.php");
        exit();
    }
}
?>