<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Creative Canvas Gallery</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <div class="logo">Creative Canvas Gallery</div>
    <nav>
      <ul>
        <li><a href="featured-artists.php">Featured Artists</a></li>
        <li><a href="exhibition.php">Exhibitions</a></li>
        <li><a href="virtualtour.php">Virtual Tour</a></li>
        <li><a href="booking.php">Booking</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="login.php">Log In</a></li>
      </ul>
    </nav>
  </header>

  <section id="hero" class="hero-section">
    <h1>Art in Motion</h1>
    <p>Explore creativity through featured artists, upcoming exhibitions, and our immersive virtual tour.</p>
</section>

<section id="about-gallery" class="section-light">
    <h2>Welcome to Creative Canvas Gallery</h2>
    <p class="section-text">
        At Creative Canvas Gallery, we bring together visionary artists and art enthusiasts under one roof. 
        Discover masterpieces that celebrate imagination, culture, and creativity. Whether you're here to explore, learn, or connect, our gallery is your gateway to the world of art.
    </p>
</section>

<section id="mission" class="section-dark">
    <h2>Our Mission</h2>
    <p class="section-text">
        "To inspire creativity, foster artistic expression, and connect communities through timeless works of art."
    </p>
</section>

<section id="explore-collections" class="section-light">
    <h2>Explore Our Collections</h2>
    <p class="section-text">
        Discover a diverse range of art forms that redefine creativity. From abstract paintings and sculptures to modern photography, there’s something for every art lover.
    </p>
    <div class="collections-container">
        <div class="collection-item">
            <h3>Paintings</h3>
            <div class="artist-gallery">
                <div class="artist-card" onclick="toggleExpand(this)">
                    <img src="painting.png" alt="Painting">
                    <p>Expressive, colorful, and timeless pieces of art.</p>
                </div>
            </div>
        </div>
        <div class="collection-item">
            <h3>Sculptures</h3>
            <div class="artist-gallery">
                <div class="artist-card" onclick="toggleExpand(this)">
                    <img src="sculpture.jpg" alt="Sculpture">
                    <p>Modern and classical sculptures that tell stories.</p>
                </div>
            </div>
        </div>
        <div class="collection-item">
            <h3>Photography</h3>
            <div class="artist-gallery">
                <div class="artist-card" onclick="toggleExpand(this)">
                    <img src="photograpgy.jpg" alt="Photography"><br><br>
                    <p>Capturing life’s beauty through a dynamic lens.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="events-preview" class="section-light">
  <h2>Upcoming Events</h2>
  <p class="section-text">Stay tuned for art workshops, exhibitions, and live events that bring creativity to life.</p>
  <div class="button-container">
      <button class="book-button" onclick="window.location.href='exhibition.php';">View Events</button>
  </div>
</section>

<section id="testimonials" style="padding: 2em; background-color: #ffffff; text-align: center;">
    <h2>What Our Visitors Say</h2>
    <div style="display: flex; justify-content: center; gap: 2em; flex-wrap: wrap; margin-top: 1.5em;">
      <div style="width: 300px; padding: 1em; background-color: #f3f4f6; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <p style="font-style: italic; color: #444;">"A breathtaking experience! The art on display is mesmerizing and thought-provoking."</p>
        <p style="font-weight: bold; color: #333;">— Emily R.</p>
      </div>
      <div style="width: 300px; padding: 1em; background-color: #f3f4f6; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <p style="font-style: italic; color: #444;">"A perfect blend of modern and classical art. Truly inspiring!"</p>
        <p style="font-weight: bold; color: #333;">— John M.</p>
      </div>
    </div>
</section>

<footer>
    <p>&copy; 2024 Creative Canvas Gallery. All Rights Reserved.</p>
</footer>
</body>
</html>
