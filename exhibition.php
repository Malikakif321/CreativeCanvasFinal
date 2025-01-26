<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upcoming Exhibitions | Creative Canvas Gallery</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <div class="logo">Creative Canvas Gallery</div>
    <nav>
<<<<<<< HEAD
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="featured-artists.html">Featured Artist</a></li>
        <li><a href="virtualtour.html">Virtual Tour</a></li>
        <li><a href="booking.html">Booking</a></li>
        <li><a href="about.html">About Us</a></li>
        <li><a href="login.html">Log In</a></li>
=======
      <ul> 
        <li><a href="index.php">Home</a></li>
        <li><a href="featured-artists.php">Featured Artist</a></li>
        <li><a href="virtualtour.php">Virtual Tour</a></li>
        <li><a href="booking.php">Booking</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="login.php">Log In</a></li>
>>>>>>> 20ed5b3 (Added Creative Canvas project)
      </ul>
    </nav>
  </header>

  <h2>Upcoming Exhibitions</h2>
  <div class="artist-gallery">
<<<<<<< HEAD
    <div class="artist-card">
      <h3>Art & Beyond</h3>
      <p>Jan 1 - Jan 30</p> <br>
      <button class="book-button" onclick="window.location.href='booking.html';">Book Now</button>
    </div>
    <div class="artist-card">
      <h3>Colors of Life</h3>
      <p>Feb 1 - Feb 28</p><br>
      <button class="book-button" onclick="window.location.href='booking.html';">Book Now</button>
    </div>
    <div class="artist-card">
      <h3>Modern Perspectives</h3>
      <p>March 1 - March 30</p><br>
      <button class="book-button" onclick="window.location.href='booking.html';">Book Now</button>
    </div>
=======
    <?php
    include 'db.php';
    $sql = "SELECT * FROM exhibition ORDER BY start_date ASC";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="artist-card">';
            echo '<h3>' . htmlspecialchars($row["event_name"]) . '</h3>';
            echo '<p>' . htmlspecialchars($row["start_date"]) . ' - ' . htmlspecialchars($row["end_date"]) . '</p><br>';
            echo '<button class="book-button" onclick="window.location.href=\'booking.php\';">Book Now</button>';
            echo '</div>';
        }
    } else {
        echo '<p>No exhibitions found.</p>';
    }
    $conn->close();
    ?>
>>>>>>> 20ed5b3 (Added Creative Canvas project)
  </div>

  <footer>
    <p>&copy; 2024 Creative Canvas Gallery. All Rights Reserved.</p>
  </footer>
</body>
</html>
