<!DOCTYPE html>
<html lang="en">
    <link rel="stylesheet" href="style.css">
<head>
    <body>
        <header>
          <div class="logo">Creative Canvas Gallery</div>
          <nav>
            <ul>
              <li><a href="index.php">Home</a></li>
              <li><a href="exhibition.php">Exhibitions</a></li>
              <li><a href="virtualtour.php">Virtual Tour</a></li>
              <li><a href="booking.php">Booking</a></li>
              <li><a href="about.php">About Us</a></li>
              <li><a href="login.php">Log In</a></li>
            </ul>
          </nav>
        </header>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Featured Artists | Creative Canvas Gallery</title>
    <section id="featured-artists">
    <h2>Featured Artists</h2>
    <div class="artist-gallery">      <?php
      include 'db.php';
      $sql = "SELECT * FROM featured_artists";
      $result = $conn->query($sql);
      
      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              echo '<div class="artist-card" onclick="toggleExpand(this)">';
              echo '<img src="' . htmlspecialchars($row["image"]) . '" alt="Artist Image">';
              echo '<h3>' . htmlspecialchars($row["name"]) . '</h3>';
              echo '<p>' . htmlspecialchars($row["bio"]) . '</p>';
              echo '<div class="additional-content">';
              echo '<p>' . htmlspecialchars($row["bio"]) . '</p>';
              echo '</div>';
              echo '</div>';
          }
      } else {
          echo '<p>No artists found.</p>';
      }
      $conn->close();
      ?>
>>>>>>> 20ed5b3 (Added Creative Canvas project)
    </div>
  </section>
  <footer>
    <p>&copy; 2024 Creative Canvas Gallery. All Rights Reserved.</p>
  </footer>
  <a href="#top" class="back-to-top">Back to Top</a>
</body>
</html>
=======
</html>