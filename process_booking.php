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

<<<<<<< HEAD
if ($exhibition && $date && $phone) {
    $sql = "INSERT INTO bookings (user_id, exhibition, date) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iss", $user_id, $exhibition, $date);
=======
// Validate inputs
if (!empty($exhibition) && !empty($date) && !empty($phone)) {
    // Validate phone number (10-digit numeric format)
    if (!preg_match("/^[0-9]{10}$/", $phone)) {
        echo "<script>alert('Invalid phone number! Please enter a 10-digit number.'); window.history.back();</script>";
        exit();
    }

    // Insert booking into database
    $sql = "INSERT INTO bookings (user_id, exhibition, date, phone) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isss", $user_id, $exhibition, $date, $phone);
>>>>>>> 20ed5b3 (Added Creative Canvas project)

    if ($stmt->execute()) {
        echo "<script>alert('Booking confirmed!'); window.location.href='dashboard.php';</script>";
    } else {
<<<<<<< HEAD
        echo "<script>alert('Error in booking. Please try again.');</script>";
    }

    $stmt->close();
}
=======
        echo "<script>alert('Error in booking. Please try again.'); window.history.back();</script>";
    }

    $stmt->close();
} else {
    echo "<script>alert('All fields are required!'); window.history.back();</script>";
}

>>>>>>> 20ed5b3 (Added Creative Canvas project)
$conn->close();
?>
