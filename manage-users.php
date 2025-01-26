<?php
include 'db.php'; // Include database connection

// Query to fetch all registered users
$sql_users = "SELECT id, name, email FROM users";
$result_users = $conn->query($sql_users);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Users</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        button {
            padding: 5px 10px;
            background-color: red;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: darkred;
        }
    </style>
    <script>
        function deleteUser(userId) {
            if (confirm("Are you sure you want to delete this user? This will also delete all their associated data.")) {
                window.location.href = "delete_user.php?id=" + userId;
            }
        }
    </script>
</head>
<body>

    <h1>Admin Panel - Manage Users</h1>

    <!-- Back to Admin Panel Button -->
    <a href="admin.php" style="display:inline-block; padding:10px 15px; background:#4CAF50; color:white; text-decoration:none; border-radius:5px;">Back to Admin Panel</a>

    <h2>Registered Users</h2>
    <?php if ($result_users->num_rows > 0): ?>
        <table>
            <tr>
                <th>User ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            <?php while ($user = $result_users->fetch_assoc()): ?>
                <tr id="user_<?php echo $user["id"]; ?>">
                    <td><?php echo $user["id"]; ?></td>
                    <td><?php echo $user["name"]; ?></td>
                    <td><?php echo $user["email"]; ?></td>
                    <td>
                        <button onclick="deleteUser(<?php echo $user['id']; ?>)">Delete User</button>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>No registered users found.</p>
    <?php endif; ?>

</body>
</html>

<?php
$conn->close(); // Close database connection
?>
