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
                <li><a href="featured-artists.php">Featured Artists</a></li>
                <li><a href="exhibition.php">Exhibitions</a></li>
                
                <li><a href="booking.php">Booking</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="login.php">Log In</a></li>
              
              </ul>
            </nav>
          </header>
    </body>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<section id="virtual-tour">
      <section id="virtual-tour" class="section-light">
        <h2>Virtual Tour</h2>
        <p>Take a virtual walk through our gallery and experience art like never before.</p>
        <div class="button-container">
            <button class="book-button" id="start-tour">Start Virtual Tour</button>
        </div>
    </section>
    
        
        
      <footer>
        <p>&copy; 2024 Creative Canvas Gallery. All Rights Reserved.</p>
      </footer>  
      <script>
            document.getElementById('start-tour').addEventListener('click', () => {
          window.location.href = 'virtual-tour.php';
        });
    
        function toggleExpand(element) {
                const cards = document.querySelectorAll('.artist-card');
          cards.forEach(card => {
            if (card !== element) card.classList.remove('expanded');
          });
          element.classList.toggle('expanded');
        }
      </script>