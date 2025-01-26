<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db.php'; // Include database connection

// Check if 'id' is set in the URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $booking_id = $_GET['id'];

    echo "Attempting to delete booking ID: " . $booking_id; // Debugging output

    // Prepare the DELETE SQL statement
    $sql = "DELETE FROM bookings WHERE id = ?";
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $booking_id);
        
        if ($stmt->execute()) {
            echo "<script>alert('Booking deleted successfully!'); window.location.href='view-bookings.php';</script>";
        } else {
            echo "Error deleting booking: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
} else {
    echo "Invalid or missing booking ID.";
}

$conn->close();
?>
