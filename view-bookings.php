<?php
include 'db.php'; // Include database connection

// Query to fetch all bookings with associated user details
$sql = "SELECT bookings.id, users.name, bookings.exhibition, bookings.date, bookings.phone 
        FROM bookings 
        JOIN users ON bookings.user_id = users.id";
$result = $conn->query($sql);

// Begin HTML structure
echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Bookings</title>
    <a href="admin.php" style="display:inline-block; padding:10px 15px; background:#4CAF50; color:white; text-decoration:none; border-radius:5px;">Back to Admin Panel</a>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        .no-results {
            text-align: center;
            color: #777;
            font-size: 18px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Manage Bookings</h1>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Exhibition</th>
                <th>Date</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>';

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<tr>
                <td>' . htmlspecialchars($row['name']) . '</td>
                <td>' . htmlspecialchars($row['exhibition']) . '</td>
                <td>' . htmlspecialchars($row['date']) . '</td>
                <td>' . htmlspecialchars($row['phone']) . '</td>
                <td>
                    <a href="delete-booking.php?id=' . $row['id'] . '" onclick="return confirm(\'Are you sure you want to delete this booking?\')">Delete</a>
                </td>
            </tr>';
    }
} else {
    echo '<tr class="no-results">
            <td colspan="5">No bookings found.</td>
          </tr>';
}

echo '</tbody>
    </table>
</div>
</body>
</html>';

// Close the database connection
$conn->close();
?>
