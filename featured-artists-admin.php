<?php
include 'db.php'; // Include database connection

$message = "";

// Handle form submission for adding an artist
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_artist'])) {
    $name = trim($_POST['name']);
    $bio = trim($_POST['bio']);
    $image = $_FILES['image']['name'];
    $target_dir = "Images/";
    $target_file = $target_dir . basename($image);

    // Validate input
    if (!empty($name) && !empty($bio) && !empty($image)) {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            $sql = "INSERT INTO featured_artists (name, bio, image) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $name, $bio, $target_file);

            if ($stmt->execute()) {
                $message = "<p class='success-message'>Artist added successfully!</p>";
            } else {
                $message = "<p class='error-message'>Error adding artist: " . $conn->error . "</p>";
            }
            $stmt->close();
        } else {
            $message = "<p class='error-message'>Error uploading the image.</p>";
        }
    } else {
        $message = "<p class='error-message'>All fields are required.</p>";
    }
}

// Handle deletion of an artist
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);

    $sql = "DELETE FROM featured_artists WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $delete_id);

    if ($stmt->execute()) {
        $message = "<p class='success-message'>Artist deleted successfully!</p>";
    } else {
        $message = "<p class='error-message'>Error deleting artist: " . $conn->error . "</p>";
    }
    $stmt->close();
}

// Fetch all artists from the database
$sql = "SELECT * FROM featured_artists";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Artists</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            padding: 20px;
        }
        h1, h2 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        .success-message {
            color: green;
            text-align: center;
            font-weight: bold;
        }
        .error-message {
            color: red;
            text-align: center;
            font-weight: bold;
        }
        .back-button {
            display: inline-block;
            margin: 20px 0;
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            text-align: center;
        }
        .back-button:hover {
            background-color: #45a049;
        }
        .form-container {
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-container input, .form-container textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .submit-button {
            display: block;
            width: 100%;
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }
        .submit-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Manage Featured Artists</h1>

    <!-- Back Button -->
    <a href="admin.php" class="back-button">Back to Admin Panel</a>

    <!-- Display Feedback Message -->
    <?php if (!empty($message)) echo $message; ?>

    <!-- Form for Adding Artist -->
    <div class="form-container">
        <h2>Add New Artist</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="name">Artist Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="bio">Artist Bio:</label>
            <textarea id="bio" name="bio" rows="4" required></textarea>

            <label for="image">Artist Image:</label>
            <input type="file" id="image" name="image" accept="image/*" required>

            <button type="submit" name="add_artist" class="submit-button">Add Artist</button>
        </form>
    </div>

    <h2>Existing Artists</h2>

    <!-- Display Existing Artists -->
    <?php if ($result && $result->num_rows > 0): ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Bio</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['bio']); ?></td>
                    <td><img src="<?php echo htmlspecialchars($row['image']); ?>" alt="Artist Image" width="100"></td>
                    <td>
                        <!-- Delete Button -->
                        <a href="?delete_id=<?php echo htmlspecialchars($row['id']); ?>" onclick="return confirm('Are you sure you want to delete this artist?')" class="back-button">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p class="error-message">No artists found.</p>
    <?php endif; ?>

    <!-- Back Button at the bottom -->
    <a href="admin.php" class="back-button">Back to Admin Panel</a>
</body>
</html>
