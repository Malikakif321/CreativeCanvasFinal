<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    echo "<script>alert('Please log in first!'); window.location.href='login.php';</script>";
    exit();
}

include 'db.php';

$user_id = $_SESSION["user_id"];
$exhibition = $_POST["exhibition"];
$date = $_POST["date"];
$phone = $_POST["phone"];

if ($exhibition && $date && $phone) {
    $sql = "INSERT INTO bookings (user_id, exhibition, date) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iss", $user_id, $exhibition, $date);

    if ($stmt->execute()) {
        echo "<script>alert('Booking confirmed!'); window.location.href='dashboard.php';</script>";
    } else {
        echo "<script>alert('Error in booking. Please try again.');</script>";
    }

    $stmt->close();
}
$conn->close();
?>
