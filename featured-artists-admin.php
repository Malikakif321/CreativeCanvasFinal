<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Artists</title>
    <style>
        .back-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
        }
        .back-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Manage Featured Artists</h1>

    <!-- Back Button -->
    <a href="admin.php" class="back-button">Back to Admin Panel</a>

    <!-- Feedback Message -->
    <?php if (!empty($message)) echo "<p>$message</p>"; ?>

    <!-- Form for Adding Artist -->
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="name">Artist Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="bio">Artist Bio:</label><br>
        <textarea id="bio" name="bio" rows="4" required></textarea><br><br>

        <label for="image">Artist Image:</label><br>
        <input type="file" id="image" name="image" accept="image/*" required><br><br>

        <button type="submit" name="add_artist">Add Artist</button>
    </form>

    <h2>Existing Artists</h2>

    <!-- Table to Display Existing Artists -->
    <?php if ($result->num_rows > 0): ?>
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Bio</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['bio']; ?></td>
                    <td><img src="<?php echo $row['image']; ?>" alt="Artist Image" width="100"></td>
                    <td>
                        <!-- Delete Button -->
                        <a href="?delete_id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this artist?')">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>No artists found.</p>
    <?php endif; ?>

    <!-- Back Button at the bottom -->
    <a href="admin.php" class="back-button">Back to Admin Panel</a>

</body>
</html>
