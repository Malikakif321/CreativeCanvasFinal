<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    echo "<script>alert('Please log in or sign up first!'); window.location.href='login.php';</script>";
    exit();
}
include 'db.php';

$user_id = $_SESSION["user_id"];

// Fetch user details
$sql = "SELECT name, email FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($name, $email);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - Creative Canvas Gallery</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
  <div class="logo">Creative Canvas Gallery</div>
  <nav>
    <ul>
      <li><a href="dashboard.php">Dashboard</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </nav>
</header>

<div class="container">
  <h1>Welcome, <?php echo htmlspecialchars($name); ?>!</h1>

  <div class="user-info">
    <h2>Your Profile</h2>
    <p><strong>Name:</strong> <?php echo htmlspecialchars($name); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
  </div>

  <div class="bookings">
    <h2>Book Your Spot</h2>
    <form id="booking-form" method="POST" action="process_booking.php">
      <label for="exhibition">Select Exhibition:</label>
      <select id="exhibition" name="exhibition" required onchange="updateDates()">
        <option value="">-- Select an Exhibition --</option>
        <option value="Art & Beyond">Art & Beyond</option>
        <option value="Colors of Life">Colors of Life</option>
        <option value="Modern Perspectives">Modern Perspectives</option>
      </select>

      <label for="date">Select Date:</label>
      <input type="date" id="date" name="date" required disabled>

      <label for="phone">Your Phone Number:</label>
      <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required pattern="[0-9]{10}" title="Enter a valid 10-digit phone number">

      <div class="button-container">
        <button type="submit" class="book-button">Confirm Booking</button>
      </div>
    </form>
  </div>
</div>

<footer>
  <p>&copy; 2024 Creative Canvas Gallery. All Rights Reserved.</p>
</footer>

<script>
  function updateDates() {
    const exhibition = document.getElementById('exhibition').value;
    const dateInput = document.getElementById('date');

    const dateRanges = {
      "Art & Beyond": { start: "2024-01-01", end: "2024-01-30" },
      "Colors of Life": { start: "2024-02-01", end: "2024-02-28" },
      "Modern Perspectives": { start: "2024-03-01", end: "2024-03-30" },
    };

    if (dateRanges[exhibition]) {
      dateInput.disabled = false;
      dateInput.min = dateRanges[exhibition].start;
      dateInput.max = dateRanges[exhibition].end;
      dateInput.value = ""; 
    } else {
      dateInput.disabled = true;
      dateInput.value = "";
    }
  }
</script>

</body>
</html>
