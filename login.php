<?php
session_start();
include 'db.php'; // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Prepare SQL query to fetch user details
    $sql = "SELECT id, password FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        // Verify password
        if (password_verify($password, $hashed_password)) {
            $_SESSION["user_id"] = $id;
            $_SESSION["email"] = $email;
            header("Location: dashboard.php"); // Redirect to dashboard
            exit();
        } else {
            $error_message = "Invalid email or password!";
        }
    } else {
        $error_message = "User not found!";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Creative Canvas Gallery</title>
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

<div class="login-container">
  <h1>Login</h1>

  <?php if (!empty($error_message)): ?>
    <div class="error-message"><?php echo $error_message; ?></div>
  <?php endif; ?>

  <form id="login-form" action="login.php" method="POST">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
  </form>

  <div class="signup-link">
    <p>Don't have an account? <a href="signup.php">Sign up here</a>.</p>
  </div>
</div>

</body>
</html>
