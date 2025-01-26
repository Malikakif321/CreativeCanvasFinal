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
<<<<<<< HEAD
            
=======
>>>>>>> 20ed5b3 (Added Creative Canvas project)
            </ul>
          </nav>
        </header>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Featured Artists | Creative Canvas Gallery</title>
    <section id="featured-artists">
    <h2>Featured Artists</h2>
    <div class="artist-gallery">
<<<<<<< HEAD
      <div class="artist-card" onclick="toggleExpand(this)">
        <img src="artist1.jpg" alt="Artist 1">
        <h3>Jack Hartwell</h3>
        <p>Renowned for abstract paintings that captivate the soul.</p>
        <div class="additional-content">
          <p>Jack Hartwell's work delves into the emotional connection between colors and forms. His abstract pieces explore themes of human connection and the natural world, leaving viewers inspired and introspective.</p>
        </div>
      </div>
      <div class="artist-card" onclick="toggleExpand(this)">
        <img src="artist2.jpg" alt="Artist 2">
        <h3>Sophia Bennett</h3>
        <p>A visionary sculptor redefining modern art.</p>
        <div class="additional-content">
          <p>Sophia Bennett's sculptures are a harmonious blend of industrial materials and organic forms. Known for her innovative approach, Sophia creates thought-provoking pieces that challenge perceptions of art and space.</p>
        </div>
      </div>
      <div class="artist-card" onclick="toggleExpand(this)">
        <img src="artist3.jpg" alt="Artist 3">
        <h3>Mia Alvarez</h3>
        <p>Dynamic photographer exploring light and motion.</p>
        <div class="additional-content">
          <p>Mia Alvarez captures the vibrant energy of urban life and the serene beauty of nature. Her photography emphasizes the interplay of light, movement, and emotion, making each piece a narrative of its own.</p>
        </div>
      </div>
=======
      <?php
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
<<<<<<< HEAD
</html>
=======
</html>
>>>>>>> 20ed5b3 (Added Creative Canvas project)
