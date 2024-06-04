<?php
include('config.php');

// Start session and redirect user to login page if not logged in
session_start();
if (!isset($_SESSION['valid'])) {
    header("Location: LoginPage.php");
    exit();
}

// Fetch users for user manager
$userManagerQuery = "SELECT * FROM users";
$userManagerResult = mysqli_query($conn, $userManagerQuery);

if (!$userManagerResult) {
    die("Database query failed: ". mysqli_error($conn));
}

// Generate the HTML for the user manager table
$output = '
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">User ID</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Security Question</th>
            <th scope="col">Security Answer</th>
        </tr>
    </thead>
    <tbody>';

while ($row = mysqli_fetch_assoc($userManagerResult)) {
    $output.= '
        <tr>
            <td>'. $row['user_id']. '</td>
            <td>'. $row['username']. '</td>
            <td>'. $row['email']. '</td>
            <td>'. $row['security_question']. '</td>
            <td>'. $row['security_answer']. '</td>
        </tr>';
}

$output.= '
    </tbody>
</table>';

echo $output;
?>