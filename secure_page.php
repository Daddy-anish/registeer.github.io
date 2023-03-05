<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

// Display secure content
echo "Welcome, " . $_SESSION['username'];
?>