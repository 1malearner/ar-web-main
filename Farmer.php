<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FarmerPage</title>
    <link rel="stylesheet" href="Farmer.css">
</head>
<body>
    <div class="sidebar">
        <h2>Farmer Dashboard</h2>
        <ul>
            <li onclick="loadContent('home')">Home</li>
            <li onclick="loadContent('about')">About</li>
            <li onclick="loadContent('market')">Market</li>
            <li onclick="loadContent('livestockManagement')">Livestock Management</li>
            <li onclick="loadContent('manageOrders')">Manage Orders</li>
            <li onclick="logout()">Logout</li>
        </ul>
    </div>
    <div class="content" id="content">
        <h1>Welcome to the Farmer Dashboard</h1>
        <div class="card">
            <h2>Overview</h2>
            <p>This is a simple overview of the farmer dashboard.</p>
        </div>
    </div>

    <script>
        function loadContent(page) {
            let content = document.getElementById('content');
            if (page === 'home') {
                content.innerHTML = `
                    <h1>Home</h1>
                    <div class="card">
                        <h2>Welcome Home</h2>
                        <p>This is the home page of the farmer dashboard.</p>
                    </div>`;
            } else if (page === 'about') {
                content.innerHTML = `
                    <h1>About</h1>
                    <div class="card">
                        <h2>About Us</h2>
                        <p>Information about the farmer dashboard.</p>
                    </div>`;
            } else if (page === 'market') {
                content.innerHTML = `
                    <h1>Market</h1>
                    <div class="card">
                        <h2>Market Overview</h2>
                        <p>Information about the market.</p>
                        <button class="market-btn" onclick="loadMarketContent('livestock')">Livestock Details</button>
                        <button class="market-btn" onclick="loadMarketContent('orders')">Order</button>
                    </div>
                    <div id="marketContent"></div>`;
            } else if (page === 'livestockManagement') {
                content.innerHTML = `
                    <h1>Livestock Management</h1>
                    <div class="card">
                        <h2>Manage Livestock</h2>
                        <button class="livestock-btn" onclick="addLivestock()">Add a Livestock</button>
                        <button class="livestock-btn" onclick="deleteLivestock()">Delete</button>
                        <button class="livestock-btn" onclick="holdLivestock()">Hold</button>
                        <p>Details about livestock management.</p>
                    </div>`;
            } else if (page === 'manageOrders') {
                content.innerHTML = `
                    <h1>Manage Orders</h1>
                    <div class="card">
                        <h2>Order Management</h2>
                        <button class="order-btn" onclick="orderOne()">One</button>
                        <button class="order-btn" onclick="orderTwo()">Two</button>
                        <button class="order-btn" onclick="orderThree()">Three</button>
                        <p>Details about managing orders.</p>
                    </div>`;
            }
        }

        function loadMarketContent(subPage) {
            let marketContent = document.getElementById('marketContent');
            if (subPage === 'livestock') {
                marketContent.innerHTML = `
                    <div class="card">
                        <h2>Livestock Details</h2>
                        <p>Information about livestock available in the market.</p>
                    </div>`;
            } else if (subPage === 'orders') {
                marketContent.innerHTML = `
                    <div class="card">
                        <h2>Order</h2>
                        <p>Details about market orders.</p>
                    </div>`;
            }
        }

        function logout() {
            window.location.href = 'HomePage.php';
        }

        function addLivestock() {
            // can remove
            alert("Functionality to add a livestock");
        }

        function deleteLivestock() {
            // can remove
            alert("Functionality to delete a livestock");
        }

        function holdLivestock() {
            // can remove
            alert("Functionality to hold a livestock");
        }

        function orderOne() {
            // can remove
            alert("Functionality for order one");
        }

        function orderTwo() {
            // can remove
            alert("Functionality for order two");
        }

        function orderThree() {
            // can remove
            alert("Functionality for order three");
        }
    </script>
</body>
</html>
