<?php
include('config.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);


// Start session and redirect user to home page if not logged in
session_start();
if (!isset($_SESSION['valid'])) {
    header("Location: LoginPage.php");
    exit();
}

$user_id = $_SESSION['id'];
$user_type = $_SESSION['user_type'];

// Fetch listings based on user type
if ($user_type == 2) { // Seller
    $query = "SELECT * FROM listings WHERE user_id='$user_id'";
} else { // For buyers or other user types, fetch all listings
    $query = "SELECT * FROM listings";
}
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Database query failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<!-- Dashboard content -->
<div class="dashboard-container">
    <h2 class="dashboard-title">Dashboard</h2>
    <!-- Logout button -->
    <a href="Logout.php"><button class="btn">Logout</button></a>
    <!-- Edit Profile Button -->
    <a href="EditProfilePage.php"><button class="btn">Edit Profile</button></a>

    <!-- Button to trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#postListingModal">
        Add Listing
    </button>

    <div class="row">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img class="card-img-top" src="images/cow1.png" alt="Livestock Image">
                    <div class="card-body">
                        <h5 class="card-title">Livestock: <?php echo ($row['livestock_id'] == 1) ? 'Chicken' : 'Cattle'; ?></h5>
                        <p class="card-text">Sex: <?php echo ($row['sex'] == 1) ? 'Male' : 'Female'; ?></p>
                        <p class="card-text">Breed: <?php echo $row['breed']; ?></p>
                        <p class="card-text">Age: <?php echo $row['age']; ?> years</p>
                        <p class="card-text">Description: <?php echo $row['description']; ?></p>
                        <p class="card-text">Posted When: <?php echo $row['posted_when']; ?></p>
                        
                        <?php if ($user_type == 2) { // Only show these options for sellers ?>
                            <?php if ($row['listing_status'] == 0) { ?>
                                <p class="card-text text-danger">Status: Sold</p>
                            <?php } else { ?>
                                <a href="edit_listing.php?listing_id=<?php echo $row['listing_id']; ?>" class="btn btn-primary">Edit Listing</a>
                                <a href="delete_listing.php?listing_id=<?php echo $row['listing_id']; ?>" class="btn btn-primary">Delete Listing</a>
                                <a href="mark_as_sold.php?listing_id=<?php echo $row['listing_id']; ?>" class="btn btn-primary">Mark as Sold</a>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<!-- Modal for Posting Listing -->
<div class="modal fade" id="postListingModal" tabindex="-1" role="dialog" aria-labelledby="postListingModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="postListingModalLabel">Add Listing</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="insert_listing.php" method="post">
                    <div class="form-group">
                        <label for="livestock_id">Livestock</label>
                        <select class="form-control" id="livestock_id" name="livestock_id">
                            <option value="1">Chicken</option>
                            <option value="2">Cattle</option>
                        </select>
                    </div>
                    <!-- Add other input fields for adding a listing -->
                    <!-- Make sure to include user_id as a hidden input field with value <?php echo $user_id; ?> -->
                    <button type="submit" class="btn btn-primary" name="post_listing">Add Listing</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Include jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
