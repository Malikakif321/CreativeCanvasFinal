<?php
// Include the database connection
include 'db.php';

// Initialize a message variable to show feedback
$message = "";

// Handle form submission for adding exhibitions
if (isset($_POST['add_exhibition'])) {
    $event_name = trim($_POST['event_name']);
    $start_date = trim($_POST['start_date']);
    $end_date = trim($_POST['end_date']);

    // Validate input
    if (!empty($event_name) && !empty($start_date) && !empty($end_date)) {
        // Insert data into the database
        $sql = "INSERT INTO exhibition (event_name, start_date, end_date) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $event_name, $start_date, $end_date);

        if ($stmt->execute()) {
            $message = "<div class='success-message'>Exhibition added successfully!</div>";
        } else {
            $message = "<div class='error-message'>Error adding exhibition: " . $conn->error . "</div>";
        }
        $stmt->close();
    } else {
        $message = "<div class='error-message'>All fields are required.</div>";
    }
}

// Handle deletion of exhibitions
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    // Delete the exhibition from the database
    $sql = "DELETE FROM exhibition WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $delete_id);

    if ($stmt->execute()) {
        $message = "<div class='success-message'>Exhibition deleted successfully!</div>";
    } else {
        $message = "<div class='error-message'>Error deleting exhibition: " . $conn->error . "</div>";
    }
    $stmt->close();
}

// Fetch all exhibitions from the database
$sql = "SELECT * FROM exhibition ORDER BY start_date ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Exhibitions</title>
    <link rel="stylesheet" href="responsive_styles.css">
    <style>
        .container {
            max-width: 900px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            text-align: center;
            color: #2c3e50;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
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
        tr:hover {
            background-color: #f2f2f2;
        }
        .success-message {
            color: green;
            font-weight: bold;
            text-align: center;
        }
        .error-message {
            color: red;
            font-weight: bold;
            text-align: center;
        }
        .book-button {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
        }
        .book-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Manage Exhibitions</h1>
        <a href="admin.php" class="back-to-top">Back to Admin Panel</a>

        <!-- Display Feedback Message -->
        <?php if (!empty($message)) echo $message; ?>

        <!-- Form to Add Exhibition -->
        <div class="login-container">
            <h2>Add New Exhibition</h2>
            <form action="" method="POST">
                <label for="event_name">Event Name:</label>
                <input type="text" id="event_name" name="event_name" required>

                <label for="start_date">Start Date:</label>
                <input type="date" id="start_date" name="start_date" required>

                <label for="end_date">End Date:</label>
                <input type="date" id="end_date" name="end_date" required>

                <button type="submit" name="add_exhibition" class="book-button">Add Exhibition</button>
            </form>
        </div>

        <h2>Existing Exhibitions</h2>

        <!-- Display Existing Exhibitions -->
        <?php if ($result && $result->num_rows > 0): ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Event Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Actions</th>
                </tr>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['event_name']; ?></td>
                        <td><?php echo $row['start_date']; ?></td>
                        <td><?php echo $row['end_date']; ?></td>
                        <td>
                            <a href="?delete_id=<?php echo $row['id']; ?>" class="logout-btn" onclick="return confirm('Are you sure you want to delete this exhibition?')">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p class="error-message">No exhibitions found.</p>
        <?php endif; ?>
    </div>

    <footer>
        <p>&copy; 2025 Creative Canvas. All Rights Reserved.</p>
    </footer>
</body>
</html>