<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body and Background */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #21de47;
            line-height: 1.6;
            padding: 20px;
        }

        /* Header */
        h1 {
            text-align: center;
            color: #333;
            font-size: 4em;
            margin-bottom: 200px;
        }

        /* Navigation Styles */
        nav ul {
            list-style: none;
            display: flex;
            justify-content: center;
            gap: 20px;
            padding: 0;
        }

        nav ul li {
            margin: 50px;
        }

        nav ul li a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
            padding: 20px 20px;
            background-color: #ddd;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        nav ul li a:hover {
            background-color: #ff6347; /* Tomato color */
            color: white;
        }

        /* Footer Styles */
        footer {
            background-color: green;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            width: 100%;
            bottom: 0;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            nav ul {
                flex-direction: column;
                align-items: center;
            }

            nav ul li {
                margin: 5px 0;
            }

            h1 {
                font-size: 1.5em;
            }
        }
    </style>
</head>
<body>
    <h1>Welcome to the Admin Dashboard</h1>
    
    <nav>
        <ul>
            <li><a href="manage-users.php">Manage Users</a></li>
            <li><a href="exhibition-admin.php">Manage Exhibitions</a></li>
            <li><a href="view-bookings.php">View Bookings</a></li>
            <li><a href="featured-artists-admin.php">Featured Artist</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    
    <footer>
        <p>&copy; 2025 Creative Canvas. All Rights Reserved.</p>
    </footer>
</body>
</html>
