<?php
include('config.php');

// Start session and redirect user to login page if not logged in
session_start();
if (!isset($_SESSION['valid'])) {
    header("Location: LoginPage.php");
    exit();
}

// Fetch listings for post history
$postHistoryQuery = "SELECT * FROM listings ORDER BY posted_when DESC";
$postHistoryResult = mysqli_query($conn, $postHistoryQuery);

if (!$postHistoryResult) {
    die("Database query failed: " . mysqli_error($conn));
}

// Generate the HTML for the post history table
$output = '
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Listing ID</th>
            <th scope="col">Livestock</th>
            <th scope="col">Breed</th>
            <th scope="col">Age</th>
            <th scope="col">Posted When</th>
        </tr>
    </thead>
    <tbody>';

while ($row = mysqli_fetch_assoc($postHistoryResult)) {
    $output .= '
        <tr>
            <td>' . $row['listing_id'] . '</td>
            <td>' . ($row['livestock_id'] == 1 ? 'Chicken' : 'Cattle') . '</td>
            <td>' . $row['breed'] . '</td>
            <td>' . $row['age'] . '</td>
            <td>' . $row['posted_when'] . '</td>
        </tr>';
}

$output .= '
    </tbody>
</table>';

echo $output;
?>
