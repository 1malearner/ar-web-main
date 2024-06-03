<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdministratorPage</title>
    <link rel="stylesheet" href="AdministratorPage.css">
</head>
<body>
    <div class="sidebar">
        <h2>Administrator</h2>
        <ul>
            <li onclick="loadContent('orderHistory')">Order History</li>
            <li onclick="loadContent('postHistory')">Post History</li>
            <li onclick="loadContent('userManagement')">User Management</li>
        </ul>
        <a href="Logout.php"><button class="btn">Logout</button></a>
    </div>
    <div class="content" id="content">
        <h1>Welcome to the Administrator Dashboard</h1>
        <div class="card">
            <h2>Overview</h2>
            <p>This is a simple overview of the admin dashboard.</p>
        </div>
    </div>

    <script>
        function loadContent(page) {
            let content = document.getElementById('content');
            if (page === 'orderHistory') {
                content.innerHTML = `
                    <h1>Order History</h1>
                    <div class="card">
                        <h2>Order Details</h2>
                        <p>View and manage your order history here.</p>
                    </div>`;
            } else if (page === 'postHistory') {
                content.innerHTML = `
                    <h1>Post History</h1>
                    <div class="card">
                        <h2>Post Details</h2>
                        <p>View and manage your post history here.</p>
                    </div>`;
            } else if (page === 'userManagement') {
                content.innerHTML = `
                    <h1>User Management</h1>
                    <div class="card">
                        <h2>User Details</h2>
                        <p>Manage your users here.</p>
                    </div>`;
            } 
        }
    </script>
</body>
</html>
