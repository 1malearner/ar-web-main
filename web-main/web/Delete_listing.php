<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the database connection file
include('config.php');

// Start session and check if the user is logged in
session_start();
if (!isset($_SESSION['valid'])) {
    header("Location: LoginPage.php");
    exit();
}

// Get the listing ID from the URL
if (!isset($_GET['listing_id'])) {
    die("Listing ID not provided.");
}

$listing_id = intval($_GET['listing_id']); // Convert to integer to prevent SQL injection

// Prepare the SQL statement to prevent SQL injection
$stmt = $conn->prepare("DELETE FROM listings WHERE listing_id = ?");
if ($stmt === false) {
    die("Failed to prepare the SQL statement: " . $conn->error);
}
$stmt->bind_param("i", $listing_id);

// Execute the query
$stmt->execute();

// Close statement and connection
$stmt->close();
$conn->close();

// Redirect to the dashboard or another appropriate page
header("Location: Dashboard.php");
exit();
?>
