<?php
include 'db.php'; // Ensure this file properly initializes $conn

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT); // Secure password hashing

    if ($conn) { // Ensure the connection is open before preparing the statement
        $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt) { // Ensure the statement prepared successfully
            $stmt->bind_param("sss", $name, $email, $password);

            if ($stmt->execute()) {
                echo "Registration successful! <a href='login.php'>Login here</a>";
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }

        $conn->close();
    } else {
        echo "Database connection error.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up - Creative Canvas Gallery</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
  <div class="logo">Creative Canvas Gallery</div>
  <nav>
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="login.php">Log In</a></li>
      <li><a href="signup.php">Sign Up</a></li>
    </ul>
  </nav>
</header>

<div class="signup-container">
  <h1>Sign Up</h1>
  <form action="signup.php" method="POST">
    <input type="text" name="name" placeholder="Full Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Sign Up</button>
  </form>
  <div class="signup-link">
    <p>Already have an account? <a href="login.php">Log in here</a>.</p>
  </div>
</div>

</body>
</html>
